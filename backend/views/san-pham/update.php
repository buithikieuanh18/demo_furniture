<?php

/**
 * @var yii\web\View $this
 * @var common\models\SanPham $model
 */

$this->title = 'Update San Pham: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'San Phams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="san-pham-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
