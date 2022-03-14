<?php

namespace common\models;

use common\models\query\TuKhoaQuery;
use Yii;

/**
 * This is the model class for table "tu_khoa".
 *
 * @property int $id
 * @property string $name Từ khóa
 * @property string|null $slug Slug
 * 
 * @property TuKhoaSanPham[] $tuKhoaSanPhams
 */
class TuKhoa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tu_khoa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Từ khóa',
            'slug' => 'Slug',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TuKhoaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TuKhoaQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     * Hàm liên kết giữa đối tượng từ khóa sản phẩm và từ khóa
    */

    public function getTuKhoaSanPhams()
    {
        return $this->hasMany(TuKhoaSanPham::class, ['tu_khoa_id' => 'id']);
    }
}
