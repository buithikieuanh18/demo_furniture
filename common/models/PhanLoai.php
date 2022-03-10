<?php

namespace common\models;

use yii\behaviors\SluggableBehavior;

use Yii;

/**
 * This is the model class for table "phan_loai".
 *
 * @property int $id
 * @property string $name Tên danh mục sản phẩm
 * @property string|null $slug Slug
 */
class PhanLoai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phan_loai';
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
            'name' => 'Tên danh mục sản phẩm',
            'slug' => 'Slug',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PhanLoaiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PhanLoaiQuery(get_called_class());
    }

}
