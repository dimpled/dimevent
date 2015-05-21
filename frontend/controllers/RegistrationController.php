<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Registration;
use frontend\models\Employee;
use frontend\models\Office;
use frontend\models\RegistrationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use frontend\models\LoginForm;
use yii\widgets\ActiveForm;

/**
 * RegistrationController implements the CRUD actions for Registration model.
 */
class RegistrationController extends Controller
{
    public function behaviors()
    {
        return [
	    'access' => [
		'class' => AccessControl::className(),
		'rules' => [
		    [
			'allow' => true,
			'actions' => ['index', 'view','create','login-popup'], 
			'roles' => ['?', '@'],
		    ],
		    [
			'allow' => true,
			'actions' => ['create', 'update', 'delete'], 
			'roles' => ['@'],
		    ],
		],
	    ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
	if (parent::beforeAction($action)) {
	    if (in_array($action->id, array('create', 'update'))) {
		
	    }
	    return true;
	} else {
	    return false;
	}
    }
    
    /**
     * Lists all Registration models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RegistrationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Registration model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
	if (Yii::$app->getRequest()->isAjax) {
	    return $this->renderAjax('view', [
		'model' => $this->findModel($id),
	    ]);
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }



    /**
     * Creates a new Registration model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type=1)
    {
	if (Yii::$app->getRequest()->isAjax) {
	    $model = new Registration();

		$model->personal_type = $type;

		if($type==1){
			$model = $this->setDataEmp($model);
		}
	    
	    

	    if ($model->load(Yii::$app->request->post())) {
		Yii::$app->response->format = Response::FORMAT_JSON;
			if ($model->save()) {
				$this->Sendmail($model->email,$model->title.$model->fist_name.' '.$model->last_name,$model);
			    $result = [
				'status' => 'success',
				'action' => 'create',
				'message' => '<strong><i class="glyphicon glyphicon-remove-sign"></i> Success!</strong> ' . Yii::t('app', 'Data completed.'),
				'data' => $model,
			    ];
			    return $result;
			} else {
			    $result = [
				'status' => 'error',
				'content' => '<strong><i class="glyphicon glyphicon-remove-sign"></i> Success!</strong> ' . Yii::t('app', 'Can not create the data.'),
				'data' => $model,
			    ];
			    return $result;
			}
	    } else {
		return $this->renderAjax('create', [
		    'model' => $model,
		]);
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }

    public function setDataEmp(Registration $model){
    	if(!Yii::$app->user->isGuest){
    		$user = Employee::findOne(['code'=>Yii::$app->user->id]);
    		$model->personal_type = 1;
    		$model->email = $user->email;
            $model->title = $user->title;
            $model->fist_name = $user->name;
            $model->last_name = $user->surname;
            $model->position  = $user->position;
            $model->department  = Office::findOne($user->department)->name;
            $model->office = 'โรงพยาบาลขอนแก่น';
            $model->self_office = $user->department;
            $model->department_id = $user->department;
            $model->province_code  = 28;
            $model->employee_id = $user->code;
    	}
    	return $model;
    	 
    }

    /**
     * Updates an existing Registration model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
	if (Yii::$app->getRequest()->isAjax) {
	    $model = $this->findModel($id);

	    if ($model->load(Yii::$app->request->post())) {
		Yii::$app->response->format = Response::FORMAT_JSON;
		if ($model->save()) {

		    $result = [
			'status' => 'success',
			'action' => 'update',
			'message' => '<strong><i class="glyphicon glyphicon-remove-sign"></i> Success!</strong> ' . Yii::t('app', 'Data completed.'),
			'data' => $model,
		    ];
		    return $result;
		} else {
		    $result = [
			'status' => 'error',
			'content' => '<strong><i class="glyphicon glyphicon-remove-sign"></i> Success!</strong> ' . Yii::t('app', 'Can not update the data.'),
			'data' => $model,
		    ];
		    return $result;
		}
	    } else {
		return $this->renderAjax('update', [
		    'model' => $model,
		]);
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }

    /**
     * Deletes an existing Registration model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
	if (Yii::$app->getRequest()->isAjax) {
	    Yii::$app->response->format = Response::FORMAT_JSON;
	    if ($this->findModel($id)->delete()) {
		$result = [
		    'status' => 'success',
		    'action' => 'update',
		    'message' => '<strong><i class="glyphicon glyphicon-remove-sign"></i> Success!</strong> ' . Yii::t('app', 'Deleted completed.'),
		    'data' => $id,
		];
		return $result;
	    } else {
		$result = [
		    'status' => 'error',
		    'content' => '<strong><i class="glyphicon glyphicon-warning-sign"></i> Error!</strong> ' . Yii::t('app', 'Can not delete the data.'),
		    'data' => $id,
		];
		return $result;
	    }
	} else {
	    throw new NotFoundHttpException('Invalid request. Please do not repeat this request again.');
	}
    }

    /**
     * Finds the Registration model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Registration the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Registration::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function Sendmail($email,$fullname='',$model){
         Yii::$app->mailer->compose('@frontend/views/layouts/mail',[
            'fullname'=>$fullname,
            'id'=>$model->id,
            'date'=>$model->register_date
          ])->setFrom(['seminar@kkh.go.th'=>'Khon Kaen Hospital'])
         ->setTo($email)
         ->setSubject('ยินดีต้อนรับสู่งานประชุมวิชาการโรงพยาบาลขอนแก่น 2558')
         ->attach(Yii::getAlias('@webroot').'/attach/'.'brochure.pdf')
         ->attach(Yii::getAlias('@webroot').'/attach/'.'doc.docx')
         ->attach(Yii::getAlias('@webroot').'/attach/'.'register.docx')
         ->attach(Yii::getAlias('@webroot').'/attach/'.'submission.docx')
         ->send();
    }

    public function actionLoginPopup() {
        if (Yii::$app->getRequest()->isAjax) {
           
            $model = new LoginForm();

            if ($model->load(Yii::$app->request->post()) && !$model->validate()) {
			    Yii::$app->response->format = Response::FORMAT_JSON;
			    return ActiveForm::validate($model);
			}

            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                 $result = [
                	'status' => 'success'
                 ];
                return $result;

            } else {
                return $this->renderAjax('/registration/login_popup', [
                            'model' => $model
                ]);
            }
        }
    }


}
