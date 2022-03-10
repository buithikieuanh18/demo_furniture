<?php

/**
 * @var yii\web\View $this
 * @var common\models\SanPham $model
 */

$this->title = 'Create San Pham';
$this->params['breadcrumbs'][] = ['label' => 'San Phams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="san-pham-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
