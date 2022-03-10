<?php

namespace common\models;

use common\models\SanPham;
use yii\behaviors\SluggableBehavior;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;

/**
 * This is the model class for table "san_pham".
 *
 * @property int $id
 * @property string $name Tên sản phẩm
 * @property string|null $slug Slug
 * @property string|null $mo_ta_ngan_gon Mô tả ngắn gọn sản phẩm
 * @property string|null $mo_ta_chi_tiet Mô tả chi tiết
 * @property int $ban_chay Bán chạy
 * @property int $noi_bat Nổi bật
 * @property int $moi_ve Mới về
 * @property float $gia_ban Giá bán
 * @property float $gia_canh_tranh Giá cạnh tranh
 * @property string $anh_dai_dien Ảnh đại diện
 * @property string|null $ngay_dang Ngày đăng
 * @property string|null $ngay_sua Ngày sửa
 * @property int $thuong_hieu_id Thương hiệu
 * @property int $nguoi_tao_id Người tạo
 * @property int|null $nguoi_sua_id Người sửa
 * @property int $so_luong Số lượng
 * @property string|null $ngay_hang_ve Ngày hàng về
 */
class SanPhamForm extends SanPham
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => SluggableBehavior::class,
                'attribute' => 'name',
                'ensureUnique' => true,
                'immutable' => true
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'thumbnail',
                'pathAttribute' => 'logo_path',
                'baseUrlAttribute' => 'logo_base_url',
            ],
        ];
    }
    
}
