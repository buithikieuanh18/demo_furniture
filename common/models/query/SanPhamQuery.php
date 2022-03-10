<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\SanPham]].
 *
 * @see \common\models\SanPham
 */
class SanPhamQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\SanPham[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\SanPham|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
