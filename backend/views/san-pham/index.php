<?php

use common\grid\EnumColumn;
use common\models\Article;
use kartik\date\DatePicker;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FAS;

/**
 * @var yii\web\View $this
 * @var common\models\search\SanPhamSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="san-pham-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a(FAS::icon('plus').' '.'Tạo sản phẩm', ['create'], ['class' => 'btn btn-success']) ?>
        </div>

        <div class="card-body p-0">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?php echo GridView::widget([
                'layout' => "{items}\n{pager}",
                'options' => [
                    'class' => ['gridview', 'table-responsive'],
                ],
                'tableOptions' => [
                    'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0'],
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'id',
                        'options' => ['style' => 'width: 10%'],
                    ],
                    
                    [
                        'attribute' => 'anh_dai_dien',
                        'value' => function($data) {
                            /** @var $data \common\models\SanPhamForm  */
                            return Html::img($data->anhdaidien_base_url.'/'.$data->anhdaidien_path, ['width' => '120px', 'height' => '80px']);
                        },
                        'format' => 'raw',
                        'filter' => false,
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                    ],

                    [
                        'attribute' => 'name',
                        'value' => function ($model) {
                            return Html::a(Html::encode($model->name), ['update', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    //'name',
                    [
                        'attribute' => 'slug',
                        'options' => ['style' => 'width: 15%'],
                    ],
                    //'mo_ta_ngan_gon',
                    //'mo_ta_chi_tiet:ntext',
                    [
                        'attribute' => 'gia_ban',
                        'value' => function($data) {
                            /** @var \common\models\SanPhamForm  $data */
                            
                            return number_format($data->gia_ban, 0, '', '.');
                        },
                        'headerOptions' => ['class' => 'text-right'],
                        'contentOptions' => ['class' => 'text-right'],
                        //'filter' => Html::activeTextInput($searchModel, 'giaban_tu', ['class' => 'form-control', 'type' => 'number']).
                        //Html::activeTextInput($searchModel, 'gia_ban', ['class' => 'form-control', 'type' => 'number']),
                    ],

                    [
                        'attribute' => 'ban_chay',
                        'value' => function($data) {
                            /** @var $data \common\models\SanPhamForm  */
                            if($data->ban_chay)
                                return '<span class="text-success"><i class="fas fa-check"></i></span>';
                            return '<span class="text-danger"></span>';
                        },
                        'format' => 'raw',
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'filter' => Html::activeDropDownList($searchModel, 'ban_chay', [
                            0 => 'Không bán chạy',
                            1 => 'Bán chạy'
                        ], ['prompt' => 'Tất cả', 'class' => 'form-control'])
                    ],

                    [
                        'attribute' => 'noi_bat',
                        'value' => function($data) {
                            /** @var \common\models\SanPhamForm  $data  */
                            if($data->noi_bat)
                                return '<span class="text-success"><i class="fas fa-check"></i></span>';
                            return '<span class="text-danger"></span>';
                        },
                        'format' => 'raw',
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'filter' => Html::activeDropDownList($searchModel, 'noi_bat', [
                            0 => 'Không nổi bật',
                            1 => 'Nổi bật'
                        ], ['prompt' => 'Tất cả', 'class' => 'form-control'])
                    ],

                    [
                        'attribute' => 'moi_ve',
                        'value' => function($data) {
                            /** @var \common\models\SanPhamForm $data  */
                            if($data->moi_ve)
                                return '<span class="text-success"><i class="fas fa-check"></i></span>';
                            return '<span class="text-danger"></span>';
                        },
                        'format' => 'raw',
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'filter' => Html::activeDropDownList($searchModel, 'moi_ve', [
                            0 => 'Hàng cũ',
                            1 => 'Mới về'
                        ], ['prompt' => 'Tất cả', 'class' => 'form-control'])
                    ],

                    // 'gia_ban',
                    // 'gia_canh_tranh',
                    // 'anhdaidien_base_url:url',
                    // 'anhdaidien_path',
                    // 'ngay_dang',
                    [
                        'attribute' => 'ngay_dang',
                        'value' => function($data) {
                            /** @var \common\models\SanPhamForm $data  */
                            return date("d/m/Y", strtotime($data->ngay_dang));
                        },
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                        'filter' => Html::activeTextInput($searchModel, 'ngay_dang_tu', ['class' => 'form-control']).
                        Html::activeTextInput($searchModel, 'ngay_dang', ['class' => 'form-control'])
                    
                    ],
                    // 'ngay_sua',
                    // 'thuong_hieu_id',
                    [
                        'attribute' => 'thuong_hieu_id',
                        'options' => ['style' => 'width: 10%'],
                        'value' => function($data) {
                            /** @var \common\models\SanPhamForm $data  */
                            $thuongHieu = \common\models\ThuongHieuForm::findOne($data->thuong_hieu_id);
                            return $thuongHieu->name;
                        },
                        'filter' => ArrayHelper::map(\common\models\ThuongHieuForm::find()->all(), 'id', 'name'),
                    ],

                    // [
                    //     'value' => function($data) {
                    //         /** @var \common\models\SanPhamForm  $data */
                    //         $phanLoai = [];
                    //         //$phanloai = \common\models\PhanLoaiForm::findOne($data->id);
                    //         foreach ($data->phanLoaiSanPhams as $phanLoaiSanPham) {
                    //             $phanLoai[] = $phanLoaiSanPham->name;
                    //         }
                    //         return implode(', ', $phanLoai);
                    //     }
                    // ],
                    // 'nguoi_tao_id',
                    // [
                    //     'attribute' => 'nguoi_tao_id',
                    //     'options' => ['style' => 'width: 10%'],
                    //     'value' => function ($model) {
                    //         return $model->author->username;
                    //     },
                    // ],
                    // [
                    //     'attribute' => 'nguoi_sua_id',
                    //     'options' => ['style' => 'width: 10%'],
                    //     'value' => function ($model) {
                    //         return $model->author->username;
                    //     },
                    // ],
                    // 'nguoi_sua_id',
                    // 'so_luong',
                    // 'ngay_hang_ve',
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
