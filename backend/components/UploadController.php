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

class UploadController extends Controller
{
    public $upload_path = 'uploads';
    public $modelName;

    protected function actionDeletefile($id, $field, $fileName) {
        $status = ['success' => false];
        if (in_array($field, ['docs', 'covenant'])) {
            $model = $this->findModel($id);
            $files = Json::decode($model->{$field});
            if (array_key_exists($fileName, $files)) {
                if ($this->deleteFile('file', $model->ref, $fileName)) {
                    $status = ['success' => true];
                    unset($files[$fileName]);
                    $model->{$field} = Json::encode($files);
                    $model->save();
                }
            }
        }
        echo json_encode($status);
    }
    
    protected function deleteFile($type = 'file', $ref, $fileName) {
        if (in_array($type, ['file', 'thumbnail'])) {
            if ($type === 'file') {
                $filePath = Freelance::getUploadPath() . $ref . '/' . $fileName;
            } 
            else {
                $filePath = Freelance::getUploadPath() . $ref . '/thumbnail/' . $fileName;
            }
            @unlink($filePath);
            return true;
        } 
        else {
            return false;
        }
    }
    
    protected function actionDownload($id, $file, $file_name) {
        $model = $this->findModel($id);
        if (!empty($model->ref) && !empty($model->covenant)) {
            Yii::$app->response->sendFile($model->getUploadPath() . '/' . $model->ref . '/' . $file, $file_name);
        }
        else {
            $this->redirect(['/freelance/view', 'id' => $id]);
        }
    }
    
    protected function uploadSingleFile($model, $attribute, $ref, $tempFile = null) {
        $file = [];
        $json = '';
        try {
            $UploadedFile = UploadedFile::getInstance($model, $attribute);
            if ($UploadedFile !== null) {
                //$this->CreateDir($ref);
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
            //$this->CreateDir($ref);
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

    /*|*********************************************************************************|
    |====================================== Helpers ====================================|
    |*********************************************************************************|*/

    public function getUploadPath() {
        return $basePath = Yii::getAlias('@webroot') . '/' . $this->upload_path . '/';
    }
    
    public function getUploadUrl() {
        return $basePath = Url::base(true) . '/' . $this->upload_path . '/';
    }

    protected function CreateDir($folderName) {
        if ($folderName != NULL) {
            $basePath = Yii::getAlias('@webroot') . '/' . $this->upload_path . '/';
            if (BaseFileHelper::createDirectory($basePath . $folderName, 0777)) {
                BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail', 0777);
            }
        }
    }

    protected function removeUploadDir($dir) {
        BaseFileHelper::removeDirectory(PhotoLibrary::getUploadPath() . $dir);
    }

    protected function createThumbnail($folderName, $fileName, $width = 250) {
        $uploadPath = $this->getUploadPath() . $folderName . '/';
        $file  = $uploadPath . $fileName;
        $image = Yii::$app->image->load($file);
        $image->resize($width);
        $image->save($uploadPath . 'thumbnail/' . $fileName);
    }

    protected function isImage($filePath) {
        return @is_array(getimagesize($filePath)) ? true : false;
    }
    
    /*|*********************************************************************************|
    |================================ Upload Ajax ====================================|
    |*********************************************************************************|*/

    
    public function actionUploadAjax() {
        $this->Uploads(true);
    }

    public function actionDeleteFileAjax($db=true) {
        $ref = Yii::$app->request->get('ref');
        $realfile_name = Yii::$app->request->get('realfile_name');

        $filename  = $this->getUploadPath() . $ref . '/' . $realfile_name;
        $thumbnail = $this->getUploadPath() . $ref . '/thumbnail/' . $realfile_name;

        $model = Uploads::find()->where([
            'ref'=>$ref,
            'realfile_name'=>$realfile_name
        ])->One();
        if ($model !== NULL) {
            $model->delete();
        }

        @unlink($thumbnail);
        try {
            @unlink($filename);
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['success' => false]);
        }
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
    
    
    public function initialPreview($data, $ref, $field, $type = 'file') {
        $initial = [];
        $files = Json::decode($data);
        if (is_array($files)) {
            foreach ($files as $key => $value) {
                if ($type == 'file') {
                    $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                } 
                elseif ($type == 'config') {
                    $initial[] = ['caption' => $value, 'width' => '120px', 'url' => Url::to(['/events/deletefile-ajax', 'fileName' => $key]), 'key' => $key];
                } 
                else {
                    $initial[] = Html::img($this->getUploadUrl() . $ref . '/' . $value, ['class' => 'file-preview-image', 'alt' => $model->file_name, 'title' => $model->file_name]);
                }
            }
        }
        return $initial;
    }
    
    public function getInitPreviewJson($jsonData,$ref,$id=null) {
         return [
            'initialPreview'=>$this->initRenderTemplate($jsonData,'image',$ref,$id), 
            'initialPreviewConfig'=>$this->initRenderTemplate($jsonData,'config',$ref,$id)
        ];
    }

    protected function getInitialPreviewDb($ref) {
        $datas = Uploads::find()->where(['ref' => $ref])->all();
        $initialPreview = [];
        $initialPreviewConfig = [];
        foreach ($datas as $key => $value) {
            array_push($initialPreview, $this->getPreviewTemplate('image',$value->realfile_name,$value->file_name,$value->ref));
            array_push($initialPreviewConfig, $this->getPreviewTemplate('config',$value->realfile_name,$value->file_name,$value->ref));
        }
        return ['initialPreview'=>$initialPreview, 'initialPreviewConfig'=>$initialPreviewConfig];
    }
    
    public function initRenderTemplate($jsonData,$type,$ref,$id=null) {
        $files = Json::decode($jsonData);
        $initial = [];
        if (is_array($files)) {
            foreach ($files as $realFileName => $fileName) {
                 $initial[] = $this->getPreviewTemplate($type,$realFileName,$fileName,$ref,$id);
            }
        }
        return  $initial;
    }
    
    public function getPreviewTemplate($type,$realFileName='',$fileName='',$ref='',$id=null) {

        if ($type == 'config') {
            return ['caption' => $fileName, 'width' => '120px', 'url' => $this->getDeleteAjaxUrl($ref,$realFileName,$id), 'key' => $realFileName];
        } 
        else {
            if ($this->isImage($this->getUploadPath() . '/'.$ref.'/' . $realFileName)) {
                return Html::img($this->getUploadUrl() . $ref .  '/thumbnail/' . $realFileName, ['class' => 'file-preview-image', 'alt' => $fileName, 'title' => $fileName]);
            } 
            else {
                return "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
            }
        }
    }

    public function ss($type, $realFileName='', $fileName='', $ref='', $deleteUrl='#') {

        if ($type == 'config') {
            return ['caption' => $fileName, 'width' => '120px', 'url' => $deleteUrl, 'key' => $realFileName];
        } 
        else {
            if ($this->isImage($this->getUploadPath() . '/'.$ref.'/' . $realFileName)) {
                return Html::img($this->getUploadUrl() . $ref .  '/thumbnail/' . $realFileName, ['class' => 'file-preview-image', 'alt' => $fileName, 'title' => $fileName]);
            } 
            else {
                return "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
            }
        }
    }



    // protected function getDeleteAjaxUrl(){
    //     return Url::to('#');
    // }
}
