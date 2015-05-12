<?php

namespace backend\Controllers;

use Yii;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;

use common\models\Events;
use common\models\EventsSearch;
use common\models\Uploads;

use app\components\UploadController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use app\components\UploadInterface;
use app\components\FileUploadController;

/**
 * EventsController implements the CRUD actions for Events model.
 */
class EventsController extends FileUploadController implements UploadInterface
{
    public $upload_path = 'event_files';
    public $modelName = 'Events';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Events models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Events model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Events();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->logo = $this->uploadSingleFile($model,'logo',$model->ref);
            $model->poster =  $this->uploadSingleFile($model,'poster',$model->ref);
            $this->Uploads(false);

            if($model->save()){
                 return $this->redirect(['view', 'id' => $model->id]);
            }

        } else {
             $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(),10);
        }

        

        $logo['initialPreview'] = [];
        $logo['initialPreviewConfig'] = [];

        $poster['initialPreview'] = [];
        $poster['initialPreviewConfig'] = [];

        $attachFile['initialPreview'] = [];
        $attachFile['initialPreviewConfig'] = [];

        return $this->render('create', [
            'model' => $model,
            'logo' =>$logo,
            'poster'=>$poster,
            'attachFile' => $attachFile
        ]);  
    }

    /**
     * Updates an existing Events model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model      = $this->findModel($id);

        $tempLogo   = $model->logo;
        $tempPoster = $model->poster;

        $logo       = $this->initPriviewJson($model->logo,$model->ref,['events/delete-file-json','id'=>$id,'field'=>'logo']);
        $poster     = $this->initPriviewJson($model->poster,$model->ref,['events/delete-file-json','id'=>$id,'field'=>'poster']);
        $attachFile = $this->initPriviewDb($model->ref,['events/delete-file-db','ref'=>$model->ref]);

        if ($model->load(Yii::$app->request->post())) {

            $model->logo   = $this->uploadSingleFile($model,'logo',$model->ref,$tempLogo);
            $model->poster =  $this->uploadSingleFile($model,'poster',$model->ref,$tempPoster);
            $this->Uploads(false);

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } 

        return $this->render('update', [
            'model' => $model,
            'logo'=>$logo,
            'poster'=>$poster,
            'attachFile' => $attachFile
        ]);

    }

    /**
     * Deletes an existing Events model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->removeUploadDir($model->ref);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpdateField(){

        Yii::$app->response->format = Response::FORMAT_JSON;

        $fields = ['status','open'];

        if(Yii::$app->request->getIsAjax()){
            $data = Yii::$app->request->post();
            $model = $this->findModel($data['pk']);
            if(in_array($data['field'],$fields)){
                $model->{$data['field']} = $data['value'];
            }
            
            return ['success'=>$model->save()];
        }
    }

    public function saveFile($ref,$fileName,$realFileName){
        $model                  = new Uploads;
        $model->ref             = $ref;
        $model->file_name       = $fileName;
        $model->realfile_name   = $realFileName;
        return $model->save();
    }

}
