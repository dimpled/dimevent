<?php

namespace backend\controllers;

use Yii;
use common\models\MeetingRoom;
use common\models\MeetingRoomSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * MeetingRoomController implements the CRUD actions for MeetingRoom model.
 */
class MeetingRoomController extends Controller
{
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
     * Lists all MeetingRoom models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MeetingRoomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MeetingRoom model.
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
     * Creates a new MeetingRoom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MeetingRoom();

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            $model = new MeetingRoom();
        }

        $searchModel = new MeetingRoomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('create', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

       // if ($model->load(Yii::$app->request->post()) && ($success = $model->save())) {
       //      Yii::$app->response->format = Response::FORMAT_JSON;
       //      return [
       //          'success'=> $success?true:false,
       //          'message' => $success?[]:$model->getErrors(),
       //          'data'=>(array)$model->getAttributes()
       //      ];
       //  } else {
       //      return $this->renderAjax('create', [
       //          'model' => $model,
       //          'searchModel' => $searchModel,
       //          'dataProvider' => $dataProvider,
       //      ]);
       //  }
    }



    /**
     * Updates an existing MeetingRoom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MeetingRoom model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MeetingRoom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MeetingRoom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MeetingRoom::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
