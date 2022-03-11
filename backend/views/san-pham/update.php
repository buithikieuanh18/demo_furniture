<?php

/**
 * @var yii\web\View $this
 * @var common\models\SanPhamForm $model
 */

$this->title = 'Cập nhật sản phẩm: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="san-pham-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
