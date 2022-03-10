<?php

/**
 * @var yii\web\View $this
 * @var common\models\PhanLoaiForm $model
 */

$this->title = 'Tạo danh mục sản phẩm';
$this->params['breadcrumbs'][] = ['label' => 'Danh mục', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phan-loai-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
