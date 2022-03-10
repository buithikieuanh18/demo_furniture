<?php

/**
 * @var yii\web\View $this
 * @var common\models\PhanLoaiForm $model
 */

$this->title = 'Cập nhật danh mục: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Danh mục', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phan-loai-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
