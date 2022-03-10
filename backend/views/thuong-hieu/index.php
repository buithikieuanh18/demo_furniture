<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\search\ThuongHieuSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Thương hiệu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thuong-hieu-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Tạo thêm thương hiệu', ['create'], ['class' => 'btn btn-success']) ?>
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
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'thumbnail',
                        'label' => 'Logo',
                        'value' => function($data) {
                            /** @var $data \common\models\ThuonghieuForm  */
                            return Html::img($data->logo_base_url.'/'.$data->logo_path, ['width' => '120px', 'height' => '80px']);
                        },
                        'format' => 'raw',
                        'filter' => false,
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                    ],

                    //'id',
                    'name',
                    'slug',
                    //'logo_base_url:url',
                    //'logo_path',

                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
