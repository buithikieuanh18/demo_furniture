<?php

namespace common\models;
use yii\behaviors\SluggableBehavior;

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
class TuKhoaForm extends TuKhoa
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
