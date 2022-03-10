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
class PhanLoaiForm extends PhanLoai
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
            ]
        ];
    }

}
