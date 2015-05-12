<?php
namespace app\components;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use common\models\Uploads;

class FileUploadController extends Controller 
{
	public $upload_path  = 'event_files';
	public $delete_filed = ['logo','poster'];
	public $modelName	 = 'Uploads';

    public function actionUploadAjax() {
        $this->Uploads(true);
    }

    public function actionDeleteFileJson($id, $field) {

        $fileName = Yii::$app->request->post('key');

        if (in_array($field, $this->delete_filed)) {
              $model = $this->findModel($id);
              $files = Json::decode($model->{$field});
   
            if (array_key_exists($fileName, $files)) {
            		$this->deleteFile($fileName,$model->ref);
                    unset($files[$fileName]);
                    $model->{$field} = Json::encode($files);
                    $model->save();
        	}
        }
    }

	public function actionDeleteFileDb($ref) {

		 $fileName = Yii::$app->request->post('key');

        $model = Uploads::find()->where([
            'ref'=>$ref,
            'realfile_name'=>$fileName
        ])->One();
        if ($model !== NULL) {
            $model->delete();
        }

       $this->deleteFile($fileName,$ref);
    }

    protected function uploadSingleFile($model, $attribute, $ref, $tempFile = null) {
        $file = [];
        $json = '';
        try {
            $UploadedFile = UploadedFile::getInstance($model, $attribute);
            if ($UploadedFile !== null) {
                $this->CreateDir($ref);
                $oldFileName = $UploadedFile->basename . '.' . $UploadedFile->extension;
                $newFileName = md5($UploadedFile->basename . time()) . '.' . $UploadedFile->extension;
                $savePath = $this->upload_path . '/'.$ref.'/' . $newFileName;
                $UploadedFile->saveAs($savePath);

                if ($this->isImage($this->getUploadPath() . '/'.$ref.'/' . $newFileName)) {
                            $this->createThumbnail($ref, $newFileName);
                }

                $file[$newFileName] = $oldFileName;
                $json = Json::encode($file);
            } 
            else {
                $json = $tempFile;
            }
        }
        catch(Exception $e) {
            $json = $tempFile;
        }
        return $json;
    }
    
    protected function uploadMultipleFile($model, $attribute, $ref, $tempFile = null) {
        $files = [];
        $json = '';
        $tempFile = Json::decode($tempFile);
        $UploadedFiles = UploadedFile::getInstances($model, $attribute);
        if ($UploadedFiles !== null) {
            $this->CreateDir($ref);
            foreach ($UploadedFiles as $file) {
                try {
                    $oldFileName = $file->basename . '.' . $file->extension;
                    $newFileName = md5($file->basename . time()) . '.' . $file->extension;
                    $savePath = $this->upload_path . '/'.$ref.'/' . $newFileName;
                    $file->saveAs($savePath);

                    if ($this->isImage($this->getUploadPath() . '/'.$ref.'/' . $newFileName)) {
                            $this->createThumbnail($ref, $newFileName);
                    }

                    $files[$newFileName] = $oldFileName;
                }
                catch(Exception $e) {
                }
            }
            $json = json::encode(ArrayHelper::merge($tempFile, $files));
        } 
        else {
            $json = $tempFile;
        }
        return $json;
    }

    public function Uploads($isAjax = false) {
        if (Yii::$app->request->isPost) {
            $images = UploadedFile::getInstancesByName('upload_ajax');
            if ($images) {
                
                if ($isAjax === true) {
                    $ref = Yii::$app->request->post('ref');
                } 
                else {
                    $modelName = Yii::$app->request->post($this->modelName);
                    $ref = $modelName['ref'];
                }
                
               $this->CreateDir($ref);
                
                foreach ($images as $file) {
                    $fileName = $file->baseName . '.' . $file->extension;
                    $realFileName = md5($file->baseName . time()) . '.' . $file->extension;
                    $savePath = $this->upload_path . '/' . $ref . '/' . $realFileName;
                    if ($file->saveAs($savePath)) {
                        
                        if ($this->isImage($this->getUploadPath() . $ref.'/' . $realFileName)) {
                            $this->createThumbnail($ref, $realFileName);
                        }
                        // save to upload table
                        $this->saveFile($ref, $fileName, $realFileName);
                        
                        if ($isAjax === true) {
                            echo json_encode(['success' => 'true']);
                        }
                    } 
                    else {
                        if ($isAjax === true) {
                            echo json_encode(['success' => 'false', 'eror' => $file->error]);
                        }
                    }
                }
            }
        }
    }

    public function deleteFile($filename,$ref){
    	$largefile  = $this->getUploadPath() . $ref . '/' . $filename;
        $thumbnail = $this->getUploadPath() . $ref . '/thumbnail/' . $filename;

        unlink($thumbnail);
        try {
            @unlink($largefile);
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['success' => false]);
        }
    }

	public function initPriview($value,$ref='',$deleteUrl='#'){

		$items[] = [
			'filename'=>$value,
			'realFilename'=>$value,
			'ref'=>$ref,
			'deleteUrl'=>$deleteUrl
		];

		$template = $this->isImage($this->checkRef($ref,$value))?'image':'other';

    	return [
            'initialPreview'=>$this->renderTemplate($template,$items), 
            'initialPreviewConfig'=>$this->renderTemplate('config',$items)
        ];
    }

    public function initPriviewJson($Json, $ref='', $deleteUrl='#'){
    	$data = Json::decode($Json);
    	$initPriview =  [];
    	$initPriviewConfig = [];
    	if(is_array($data)){
    		foreach ($data as $real_filename => $filename) {
	    		$item=[
	    			'filename'=>$filename,
					'realFilename'=>$real_filename,
					'ref'=>$ref,
					'deleteUrl'=>Url::to($deleteUrl)
	    		];

	    		$template 			 = $this->isImage($this->checkRef($ref,$real_filename))?'image':'other';
	    		$initPriview[] 	 	 = $this->getPreviewTemplate($template,$item);
	    		$initPriviewConfig[] = $this->getPreviewTemplate('config',$item);
    		}
    	}
    	
    	return [
            'initialPreview' =>$initPriview,
            'initialPreviewConfig' =>$initPriviewConfig
        ];
    }

    public function initPriviewDb($ref,$deleteUrl='#'){
    	$model = $datas = Uploads::find()->where(['ref' => $ref])->all();
    	$initPriview =  [];
    	$initPriviewConfig = [];
    	foreach ($model as $key => $value) {
    		$item=[
    			'filename'=>$value->file_name,
				'realFilename'=>$value->realfile_name,
				'ref'=>$ref,
				'deleteUrl'=>Url::to($deleteUrl)
    		];

    		$template 			 = $this->isImage($this->checkRef($ref,$value->realfile_name))?'image':'other';
    		$initPriview[] 		 = $this->getPreviewTemplate($template,$item);
    		$initPriviewConfig[] = $this->getPreviewTemplate('config',$item);
    	}
    	return [
            'initialPreview' =>$initPriview,
            'initialPreviewConfig' =>$initPriviewConfig
        ];
    }

    public function renderTemplate($template='other',$data=[]){
    	$items = [];
    	foreach ($data as $key => $value) {
    		$items[] = $this->getPreviewTemplate($template,$value);
    	}
    	return $items;
    }

    private function getPreviewTemplate($template,$value) {

    	if($template === 'config'){
    		return [
    			'caption' 	=> $value['filename'], 
    			'width' 	=> '120px', 
    			'url' 		=> $value['deleteUrl'], 
    			'key' 		=> $value['realFilename']
    		];
    	}
    	elseif($template === 'image'){
    	    $imgSrc = $this->checkRef($value['ref'],$value['realFilename']);
    		return Html::img($imgSrc, [
    			'class' => 'file-preview-image', 
    			'alt' 	=> $value['filename'], 
    			'title' => $value['filename']
    		]);
    	}
    	else{
    		return "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
    	}

    }

    /*|*********************************************************************************|
    |====================================== Helpers ====================================|
    |*********************************************************************************|*/

    private function getUploadPath() {
        return $basePath = Yii::getAlias('@webroot') . '/' . $this->upload_path . '/';
    }
    
    private function getUploadUrl() {
        return $basePath = Url::base(true) . '/' . $this->upload_path . '/';
    }

    private function CreateDir($folderName) {
        if ($folderName != NULL) {
            $basePath = Yii::getAlias('@webroot') . '/' . $this->upload_path . '/';
            if (BaseFileHelper::createDirectory($basePath . $folderName, 0777)) {
                BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail', 0777);
            }
        }
    }

    public function removeUploadDir($dir) {
        BaseFileHelper::removeDirectory($this->getUploadPath() . $dir);
    }

    private function createThumbnail($folderName, $fileName, $width = 250) {
        $uploadPath = $this->getUploadPath() . $folderName . '/';
        $file  = $uploadPath . $fileName;
        $image = Yii::$app->image->load($file);
        $image->resize($width);
        $image->save($uploadPath . 'thumbnail/' . $fileName);
    }

    private function isImage($filePath) {
        return @is_array(getimagesize($filePath)) ? true : false;
    }

    private function checkRef($ref,$filename){
    	return $ref===''?$this->getUploadUrl() . $filename : $this->getUploadUrl().$ref.'/thumbnail/'.$filename;
    }

}
