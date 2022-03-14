<?php

namespace common\models;

use yii\db\Expression;
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
 * @property string $anhdaidien_base_url
 * @property string $anhdaidien_path
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
                'immutable' => true,
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'attachments',
                'multiple' => true,
                'uploadRelation' => 'anhSanPhams',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ],
            [
                'class' => UploadBehavior::class,
                'attribute' => 'anh_dai_dien',
                'pathAttribute' => 'anhdaidien_path',
                'baseUrlAttribute' => 'anhdaidien_base_url',
            ],
        ];
    }
    public function beforeSave($insert)
    {
        if($insert){
            $this->ngay_dang = new Expression("NOW()");
            $this->nguoi_tao_id = Yii::$app->user->id;
        }else {
                $this->ngay_sua = new Expression("NOW()");
                $this->nguoi_tao_id = Yii::$app->user->id;
            }
        $this->ngay_hang_ve = API_Furniture::convertDMYtoYMD($this->ngay_hang_ve);
        $this->nguoi_sua_id = 1;

        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        PhanLoaiSanPham::deleteAll(['san_pham_id' => $this->id]);
        foreach ($this->phan_loai_san_phams as $phan_loai_san_pham) {
            $plsp = new PhanLoaiSanPham();
            $plsp->phan_loai_id = $phan_loai_san_pham;
            $plsp->san_pham_id = $this->id;
            $plsp->save();
        }
        $this->nguoi_tao_id = Yii::$app->user->id;

        TuKhoaSanPham::deleteAll(['san_pham_id' => $this->id]);
        if($this->tu_khoa_san_phams != '') {
            $tukhoa = explode(',', $this->tu_khoa_san_phams);
            foreach ($tukhoa as $item) {
                $old_tag = TuKhoaForm::findOne(['name' => trim($item)]);
                if(!is_null($old_tag)) {
                    $is_tukhoa = $old_tag->id;
                } else {
                    $new_tag = new TuKhoaForm();
                    $new_tag->name = $item;
                    $new_tag->save();
                    $id_tukhoa = $new_tag->id;
                }
                $tukhoa_sp = new TuKhoaSanPham();
                $id_tukhoa = $tukhoa_sp->tu_khoa_id;
                $tukhoa_sp->san_pham_id = $this->id;
                $tukhoa_sp->save();
            }
        }

        parent::afterSave($insert, $changedAttributes);
    }

    // /**
    //  * @inheritdoc
    //  */
    // public function behaviors()
    // {
    //     return [
    //         'slug' => [
    //             'class' => SluggableBehavior::class,
    //             'attribute' => 'name',
    //             'ensureUnique' => true,
    //             'immutable' => true
    //         ],
    //         [
    //             'class' => UploadBehavior::class,
    //             'attribute' => 'thumbnail',
    //             'pathAttribute' => 'logo_path',
    //             'baseUrlAttribute' => 'logo_base_url',
    //         ],
    //     ];
    // }
    
}
