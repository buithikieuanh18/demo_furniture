<?php

namespace common\models;

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
class SanPham extends \yii\db\ActiveRecord
{
    /**
     * @var string
     */
    public $anh_dai_dien_base_url;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'san_pham';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'gia_ban', 'gia_canh_tranh', 'anh_dai_dien', 'thuong_hieu_id', 'nguoi_tao_id', 'so_luong'], 'required'],
            [['mo_ta_chi_tiet'], 'string'],
            [['ban_chay', 'noi_bat', 'moi_ve', 'thuong_hieu_id', 'nguoi_tao_id', 'nguoi_sua_id', 'so_luong'], 'integer'],
            [['gia_ban', 'gia_canh_tranh'], 'number'],
            [['ngay_dang', 'ngay_sua', 'ngay_hang_ve'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 150],
            [['mo_ta_ngan_gon'], 'string', 'max' => 500],
            [['anh_dai_dien'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên sản phẩm',
            'slug' => 'Slug',
            'mo_ta_ngan_gon' => 'Mô tả ngắn gọn sản phẩm',
            'mo_ta_chi_tiet' => 'Mô tả chi tiết',
            'ban_chay' => 'Bán chạy',
            'noi_bat' => 'Nổi bật',
            'moi_ve' => 'Mới về',
            'gia_ban' => 'Giá bán',
            'gia_canh_tranh' => 'Giá cạnh tranh',
            'anh_dai_dien' => 'Ảnh đại diện',
            'ngay_dang' => 'Ngày đăng',
            'ngay_sua' => 'Ngày sửa',
            'thuong_hieu_id' => 'Thương hiệu',
            'nguoi_tao_id' => 'Người tạo',
            'nguoi_sua_id' => 'Người sửa',
            'so_luong' => 'Số lượng',
            'ngay_hang_ve' => 'Ngày hàng về',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SanPhamQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SanPhamQuery(get_called_class());
    }
}
