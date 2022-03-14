<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use trntv\filekit\widget\Upload;
use kartik\datetime\DateTimePicker;
use yii\web\JsExpression;
use rmrevin\yii\fontawesome\FAS;
use dosamigos\selectize\SelectizeTextInput;

use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var common\models\SanPhamForm $model
 * @var yii\bootstrap4\ActiveForm $form
 * @var common\models\ThuongHieuForm[] $thuonghieus
 */
?>

<div class="san-pham-form">
    <?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
]); ?>
        <div class="card">
            <div class="card-body">
                <?php echo $form->errorSummary($model) ?>

                <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?php echo $form->field($model, 'slug')
                ->hint(Yii::t('backend', 'If you leave this field empty, the slug will be generated automatically'))
                ->textInput(['maxlength' => true]) ?>

                <?php echo $form->field($model, 'mo_ta_ngan_gon')->textarea(['maxlength' => true, 'rows' => 3]) ?>

                <?php // echo $form->field($model, 'mo_ta_chi_tiet')->textarea(['rows' => 6]) ?>
                <?php echo $form->field($model, 'mo_ta_chi_tiet')->widget(
                \yii\imperavi\Widget::class,
                [
                    'plugins' => ['fullscreen', 'fontcolor', 'video'],
                    'options' => [
                        'minHeight' => 400,
                        'maxHeight' => 400,
                        'buttonSource' => true,
                        'convertDivs' => false,
                        'removeEmptyTags' => true,
                        'imageUpload' => Yii::$app->urlManager->createUrl(['/file/storage/upload-imperavi']),
                    ],
                ]
            ) ?>

                <?php //echo $form->field($model, 'ban_chay')->textInput() ?>
                <?php //echo $form->field($model, 'noi_bat')->textInput() ?>
                <?php //echo $form->field($model, 'moi_ve')->textInput() ?>
                <table>
                    <th> <?php echo $form->field($model, 'ban_chay')->checkbox() ?></th>
                    <th> <?php echo $form->field($model, 'noi_bat')->checkbox() ?></th>
                    <th> <?php echo $form->field($model, 'moi_ve')->checkbox() ?></th>
                </table>

                <?php echo $form->field($model, 'gia_ban')->textInput(['type' => 'number', 'min' => 0]) ?>
                
                <?php echo $form->field($model, 'gia_canh_tranh')->textInput(['type' => 'number', 'min' => 0]) ?>
                
                <?php echo $form->field($model, 'so_luong')->textInput(['type' => 'number', 'min' => 0]) ?>
                
                <?php //echo $form->field($model, 'ngay_hang_ve')->textInput() ?>
                <?= $form->field($model, 'ngay_hang_ve')->widget(\yii\jui\DatePicker::classname(), [
                    'language' => 'vi',
                    'dateFormat' => 'dd/MM/yyyy',
                    'options' => [
                        'class' => 'form-control'
                    ]
                ]) ?>

                <?php //echo $form->field($model, 'gia_ban')->textInput() ?>
                <?php //echo $form->field($model, 'gia_canh_tranh')->textInput() ?>
                <?php //echo $form->field($model, 'so_luong')->textInput() ?>
                
                <?php echo $form->field($model, 'anh_dai_dien')->widget(
                    Upload::class,
                    [
                        'url' => ['/file/storage/upload'],
                        'maxFileSize' => 5000000, // 5 MiB,
                        'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                    ]
                ) ?>

                <?php echo $form->field($model, 'attachments')->widget(
                    Upload::class,
                    [
                        'url' => ['/file/storage/upload'],
                        'sortable' => true,
                        'maxFileSize' => 10000000, // 10 MiB
                        'maxNumberOfFiles' => 10,
                    ]
                ) ?>

                <?=$form->field($model, 'phan_loai_san_phams')->inline()->checkboxList(ArrayHelper::map( 
                    \common\models\PhanLoaiForm::find()->all(),'id','name')) ?>
                <?php //echo $form->field($model, 'ngay_dang')->textInput() ?>

                <?php //echo $form->field($model, 'ngay_sua')->textInput() ?>

                <?php //echo $form->field($model, 'thuong_hieu_id')->textInput() ?>
                <?php echo $form->field($model, 'thuong_hieu_id')->dropDownList(\yii\helpers\ArrayHelper::map(
                \common\models\ThuongHieuForm::find()->all(),
                'id',
                'name'
                ), ['prompt' => '']) ?>

                <?= $form->field($model, 'tu_khoa_san_phams')->widget(SelectizeTextInput::class, [
                    // calls an action that returns a JSON object with matched
                    // tags
                    'loadUrl' => ['tu-khoa/list'],
                    'options' => ['class' => 'form-control'],
                    'clientOptions' => [
                        'plugins' => ['remove_button'],
                        'valueField' => 'name',
                        'labelField' => 'name',
                        'searchField' => ['name'],
                        'create' => true,
                    ],
                ])->hint('Mỗi từ khóa cách nhau một dấu phẩy.') ?>
                <?php //echo $form->field($model, 'nguoi_tao_id')->textInput() ?>
                <?php //echo $form->field($model, 'nguoi_sua_id')->textInput() ?>
                
            </div>
            <div class="card-footer">
                <?php //echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                <?php echo Html::submitButton(
                $model->isNewRecord? FAS::icon('save').' '.Yii::t('backend', 'Create'):FAS::icon('save').' '. Yii::t('backend', 'Save Changes'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
            ) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
