<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\search\TuKhoaSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = 'Từ khóa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tu-khoa-index">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Tạo từ khóa', ['create'], ['class' => 'btn btn-success']) ?>
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
                        'options' => ['style' => 'width: 15%'],
                    ],
                    [
                        'attribute' => 'name',
                        'value' => function ($model) {
                            return Html::a(Html::encode($model->name), ['update', 'id' => $model->id]);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'slug',
                        'options' => ['style' => 'width: 30%'],
                    ],
                    
                    ['class' => \common\widgets\ActionColumn::class],
                ],
            ]); ?>
    
        </div>
        <div class="card-footer">
            <?php echo getDataProviderSummary($dataProvider) ?>
        </div>
    </div>

</div>
