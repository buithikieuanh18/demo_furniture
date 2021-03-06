<?php

namespace backend\controllers;

use Yii;
use common\models\TuKhoaForm;
use common\models\search\TuKhoaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\traits\FormAjaxValidationTrait;
use yii\web\Response;

/**
 * TuKhoaController implements the CRUD actions for TuKhoaForm model.
 */
class TuKhoaController extends Controller
{
    use FormAjaxValidationTrait;

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all TuKhoaForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $tukhoa = new TuKhoaForm();
        $this->performAjaxValidation($tukhoa);
        if ($tukhoa->load(Yii::$app->request->post()) && $tukhoa->save()) {
            return $this->redirect(['index']);
        }

        $searchModel = new TuKhoaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $tukhoa,
        ]);
    }

    /**
     * Displays a single TuKhoaForm model.
     * @param int $id ID
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TuKhoaForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TuKhoaForm();
        $this->performAjaxValidation($model);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TuKhoaForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->performAjaxValidation($model);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TuKhoaForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TuKhoaForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TuKhoaForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TuKhoaForm::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionList($query)
    {
        $models = TuKhoaForm::find()
        ->andFilterWhere(['LIKE', 'name', $query])
        ->all(); //tao danh sach doi tuong
        $items = [];
        /** @var TuKhoaForm $model */
        foreach ($models as $model) {
            $items[] = ['name' => $model->name];
        }
        // We know we can use ContentNegotiator filter
        // this way is easier to show you here :)
        Yii::$app->response->format = Response::FORMAT_JSON;
    
        return $items;
    }
}
