<?php

namespace backend\controllers;

use common\models\PhanLoaiForm;
use Yii;
use common\models\SanPhamForm;
use common\models\search\SanPhamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PhanLoaiSanPham;
use common\models\TuKhoaForm;
use common\models\TuKhoaSanPham;
use yii\helpers\ArrayHelper;

use common\traits\FormAjaxValidationTrait;

/**
 * SanPhamController implements the CRUD actions for SanPhamForm model.
 */
class SanPhamController extends Controller
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
     * Lists all SanPhamForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchPhanLoai = new PhanLoaiForm();
        $searchModel = new SanPhamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchPhanLoai' => $searchPhanLoai,
        ]);
    }

    /**
     * Displays a single SanPhamForm model.
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
     * Creates a new SanPhamForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SanPhamForm();
        $this->performAjaxValidation($model);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SanPhamForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->performAjaxValidation($model);
        $model->phan_loai_san_phams = ArrayHelper::map(PhanLoaiSanPham::findAll(['san_pham_id' => $id]), 'phan_loai_id', 'phan_loai_id');

        //$tukhoa_sanpham = ArrayHelper::map(TuKhoaSanPham::findAll(['san_pham_id' => $id]), 'tu_khoa_id', 'tu_khoa_id');
        $tukhoa_sanpham = TuKhoaSanPham::findAll(['san_pham_id' => $id]);
        $model->tu_khoa_san_phams = [];
        foreach($tukhoa_sanpham as $item) {
            $tukhoa = TuKhoaForm::findOne($item->tu_khoa_id);
            $model->tu_khoa_san_phams[] = $tukhoa->name; //$tukhoa->name;
        }
        $model->tu_khoa_san_phams = implode(',', $model->tu_khoa_san_phams);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SanPhamForm model.
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
     * Finds the SanPham model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SanPhamForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SanPhamForm::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
