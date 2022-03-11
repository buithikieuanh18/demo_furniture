<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\SanPham $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="san-pham-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>
    <?php echo $form->field($model, 'name') ?>
    <?php echo $form->field($model, 'slug') ?>
    <?php echo $form->field($model, 'mo_ta_ngan_gon') ?>
    <?php echo $form->field($model, 'mo_ta_chi_tiet') ?>
    <?php // echo $form->field($model, 'ban_chay') ?>
    <?php // echo $form->field($model, 'noi_bat') ?>
    <?php // echo $form->field($model, 'moi_ve') ?>
    <?php // echo $form->field($model, 'gia_ban') ?>
    <?php // echo $form->field($model, 'gia_canh_tranh') ?>
    <?php // echo $form->field($model, 'anhdaidien_base_url') ?>
    <?php // echo $form->field($model, 'anhdaidien_path') ?>
    <?php // echo $form->field($model, 'ngay_dang') ?>
    <?php // echo $form->field($model, 'ngay_sua') ?>
    <?php // echo $form->field($model, 'thuong_hieu_id') ?>
    <?php // echo $form->field($model, 'nguoi_tao_id') ?>
    <?php // echo $form->field($model, 'nguoi_sua_id') ?>
    <?php // echo $form->field($model, 'so_luong') ?>
    <?php // echo $form->field($model, 'ngay_hang_ve') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
