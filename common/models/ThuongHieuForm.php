<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "thuong_hieu".
 *
 * @property int $id
 * @property string $name Tên thương hiệu
 * @property string|null $slug Slug
 * @property string  $logo_base_url
 * @property string $logo_path
 */
class ThuongHieuForm extends ThuongHieu
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            //BlameableBehavior::class,
            'slug' => [
                'class' => SluggableBehavior::class,
                'attribute' => 'name',
                'ensureUnique' => true,
                'immutable' => true
            ],
            //'thumbnail' =>
            [
                'class' => UploadBehavior::class,
                'attribute' => 'thumbnail',
                'pathAttribute' => 'logo_path',
                'baseUrlAttribute' => 'logo_base_url',
            ],
        ];
    }
}
