<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\PhanLoaiForm $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="phan-loai-form">
    <?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
]); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?php //echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'slug')
                ->hint(Yii::t('backend', 'If you leave this field empty, the slug will be generated automatically'))
                ->textInput(['maxlength' => true]) ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
