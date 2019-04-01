<?php

namespace app\controllers;

use app\models\Department;
use Yii;
use app\models\Course;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends Controller
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
     * Lists all Course models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Course::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Course model.
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
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Course();
        $model->uploadtime = date("Y-m-d H:m:s");
        $model->modifytime = date("Y-m-d H:m:s");
        if ($model->load(Yii::$app->request->post())) {
            $model->schoolid = Department::getSchoolID($model->departmentid);
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->courseid]);
            }
        }
        $arr_departments = ArrayHelper::map(Department::find()->all(), 'departmentid', 'departmentname');
        return $this->render('create', [
            'model' => $model, 'departments' =>$arr_departments
        ]);
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->modifytime = date("Y-m-d H:m:s");

        if ($model->load(Yii::$app->request->post())) {
            $model->schoolid = Department::getSchoolID($model->departmentid);
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->courseid]);
            }
        }

        $arr_departments = ArrayHelper::map(Department::find()->all(), 'departmentid', 'departmentname');
        return $this->render('update', [
            'model' => $model, 'departments' =>$arr_departments
        ]);
    }

    /**
     * Deletes an existing Course model.
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
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
