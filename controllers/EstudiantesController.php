<?php

namespace app\controllers;

use Yii;
use app\models\Estudiantes;
use app\models\EstudiantesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\filters\ProcesoCerrado;
use app\filters\InscripcionCerrada;


/**
 * EstudiantesController implements the CRUD actions for Estudiantes model.
 */
class EstudiantesController extends Controller
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
            'proceso' => [
                'class' => ProcesoCerrado::className(),
                'denyActions' => ['estudiantes/create', 'estudiantes/view'],
                'returnPath' => '/procesos/proceso-cerrado',
            ],
            'inscripcion' => [
                'class' => InscripcionCerrada::className(),
                'denyActions' => ['estudiantes/create', 'estudiantes/view'],
                'returnPath' => '/inscripciones/inscripcion-cerrada',
            ],
        ];
    }

    /**
     * Lists all Estudiantes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstudiantesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estudiantes model.
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
     * Crea o actualiza un modelo Estudiante
     * Si la creación o actualización es correcta se redirecciona a 
     * la creación o actualización de la inscripción.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!($model = Estudiantes::getEstudianteUser()))
        {
			$model = new Estudiantes();
			$model->id_user = Yii::$app->user->id;
		}
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/inscripciones/create']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
        /*
        $model = new Estudiantes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Updates an existing Estudiantes model.
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
     * Deletes an existing Estudiantes model.
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
     * Finds the Estudiantes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Estudiantes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estudiantes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
