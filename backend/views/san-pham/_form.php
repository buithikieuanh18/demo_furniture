<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\SanPham $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="san-pham-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'mo_ta_ngan_gon')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'mo_ta_chi_tiet')->textarea(['rows' => 6]) ?>
                <?php echo $form->field($model, 'ban_chay')->textInput() ?>
                <?php echo $form->field($model, 'noi_bat')->textInput() ?>
                <?php echo $form->field($model, 'moi_ve')->textInput() ?>
                <?php echo $form->field($model, 'gia_ban')->textInput() ?>
                <?php echo $form->field($model, 'gia_canh_tranh')->textInput() ?>
                <?php echo $form->field($model, 'anh_dai_dien')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'ngay_dang')->textInput() ?>
                <?php echo $form->field($model, 'ngay_sua')->textInput() ?>
                <?php echo $form->field($model, 'thuong_hieu_id')->textInput() ?>
                <?php echo $form->field($model, 'nguoi_tao_id')->textInput() ?>
                <?php echo $form->field($model, 'nguoi_sua_id')->textInput() ?>
                <?php echo $form->field($model, 'so_luong')->textInput() ?>
                <?php echo $form->field($model, 'ngay_hang_ve')->textInput() ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
