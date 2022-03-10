<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use trntv\filekit\widget\Upload;
use yii\web\JsExpression;
use rmrevin\yii\fontawesome\FAS;

/**
 * @var yii\web\View $this
 * @var common\models\ThuongHieuForm $model
 * @var yii\bootstrap4\ActiveForm $form
 */
?>

<div class="thuong-hieu-form">
    <?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
]); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?php echo $form->field($model, 'slug')
                ->hint(Yii::t('backend', 'If you leave this field empty, the slug will be generated automatically'))
                ->textInput(['maxlength' => true]) ?>
                <?php //echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

                <?php //echo $form->field($model, 'logo_base_url')->textInput(['maxlength' => true]) ?>
                <?php //echo $form->field($model, 'logo_path')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'thumbnail')->widget(
                Upload::class,
                [
                    'url' => ['/file/storage/upload'],
                    'maxFileSize' => 5000000, // 5 MiB,
                    'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                ]
            ) ?>
                
            </div>
            <div class="card-footer">
                <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
