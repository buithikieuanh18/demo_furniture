<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var common\models\SanPhamForm $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="san-pham-view">
    <div class="card">
        <div class="card-header">
            <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
        <div class="card-body">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'slug',
                    'mo_ta_ngan_gon',
                    'mo_ta_chi_tiet:ntext',
                    'ban_chay',
                    'noi_bat',
                    'moi_ve',
                    'gia_ban',
                    'gia_canh_tranh',
                    'anhdaidien_base_url:url',
                    'anhdaidien_path',
                    'ngay_dang',
                    'ngay_sua',
                    'thuong_hieu_id',
                    'nguoi_tao_id',
                    'nguoi_sua_id',
                    'so_luong',
                    'ngay_hang_ve',
                    
                ],
            ]) ?>
        </div>
    </div>
</div>
