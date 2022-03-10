<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "thuong_hieu".
 *
 * @property int $id
 * @property string $name Tên thương hiệu
 * @property string|null $slug Slug
 * @property string|null $logo_base_url
 * @property string|null $logo_path
 */
class ThuongHieu extends \yii\db\ActiveRecord
{
    /**
     * @var array
     */
    public $thumbnail;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'thuong_hieu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 45],
            [['slug'], 'string', 'max' => 255],
            [['logo_base_url', 'logo_path'], 'string', 'max' => 1024],
            [['thumbnail'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên thương hiệu',
            'slug' => 'Slug',
            'thumbnail' => 'Logo',
            // 'logo_base_url' => 'Logo Base Url',
            // 'logo_path' => 'Logo Path',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ThuongHieuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ThuongHieuQuery(get_called_class());
    }
}
