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
 * @property string $anhdaidien_base_url
 * @property string $anhdaidien_path
 * @property string|null $ngay_dang Ngày đăng
 * @property string|null $ngay_sua Ngày sửa
 * @property int $thuong_hieu_id Thương hiệu
 * @property int $nguoi_tao_id Người tạo
 * @property int|null $nguoi_sua_id Người sửa
 * @property int $so_luong Số lượng
 * @property string|null $ngay_hang_ve Ngày hàng về
 *
 * @property User                $author
 * @property User                $updater
 * @property ThuongHieuForm     $thuonghieu
 * @property AnhSanPham[] $anhSanPhams
 * @property PhanLoaiSanPham[] $phanLoaiSanPhams
 * @property TuKhoaSanPham[] $tuKhoaSanPhams
 */
// $anh_dai_dien Ảnh đại diện
class SanPham extends \yii\db\ActiveRecord
{
    public $phan_loai_san_phams;
    public $ngay_dang_tu;
    public $giaban_tu;
    public $tu_khoa_san_phams;
    
    /**
     * @var array
     */
    public $attachments;

    /**
     * @var array
     */
    public $anh_dai_dien;

    // /**
    //  * @var string
    //  */
    // public $anh_dai_dien_base_url;

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
            [['name', 'gia_ban', 'gia_canh_tranh', 'thuong_hieu_id', 'so_luong'], 'required', 'message' => '{attribute} không được để trống!'],
            [['mo_ta_chi_tiet'], 'string'],
            [['ban_chay', 'noi_bat', 'moi_ve', 'nguoi_tao_id', 'nguoi_sua_id', 'so_luong'], 'integer'],
            [['gia_ban', 'gia_canh_tranh'], 'number'],
            [['ngay_dang', 'ngay_sua', 'ngay_hang_ve', 'anh_dai_dien'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 150],
            [['mo_ta_ngan_gon'], 'string', 'max' => 500],
            [['attachments', 'phan_loai_san_phams', 'tu_khoa_san_phams'], 'safe'],
            [['anhdaidien_base_url', 'anhdaidien_path'], 'string', 'max' => 1024],
            [['thuong_hieu_id'], 'exist', 'targetClass' => ThuongHieuForm::class, 'targetAttribute' => 'id'],
            //[['base_url', 'path'], 'string', 'max' => 1024],
            // [['ngay_dang', 'ngay_sua'], 'default', 'value' => function () {
            //     return date(DATE_ISO8601);
            // }],
            // [['ngay_dang', 'ngay_sua'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
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
            'anhdaidien_base_url' => 'Ảnh đại diện base url',
            'anhdaidien_path' => 'Ảnh đại diện path',
            'anh_dai_dien' => 'Ảnh đại diện',
            'ngay_dang' => 'Ngày đăng',
            'ngay_sua' => 'Ngày sửa',
            'thuong_hieu_id' => 'Thương hiệu',
            'nguoi_tao_id' => 'Người tạo',
            'nguoi_sua_id' => 'Người sửa',
            'so_luong' => 'Số lượng',
            'ngay_hang_ve' => 'Ngày hàng về',
            'phan_loai_san_phams' => 'Phân loại sản phẩm',
            'tu_khoa_san_phams' => 'Từ khóa sản phẩm',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'nguoi_tao_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(User::class, ['id' => 'nguoi_sua_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThuongHieu()
    {
        return $this->hasOne(ThuongHieuForm::class, ['id' => 'thuong_hieu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnhSanPhams()
    {
        return $this->hasMany(AnhSanPham::class, ['san_pham_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTuKhoaSanPhams()
    {
        return $this->hasMany(TuKhoaSanPham::class, ['san_pham_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhanLoaiSanPhams()
    {
        return $this->hasMany(PhanLoaiSanPham::class, ['san_pham_id' => 'id']);
    }
}
