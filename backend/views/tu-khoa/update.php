<?php

/**
 * @var yii\web\View $this
 * @var common\models\TuKhoaForm $model
 */

$this->title = 'Cập nhật từ khóa: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Từ khóa', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tu-khoa-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
