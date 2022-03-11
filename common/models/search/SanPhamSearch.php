<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SanPhamForm;
use common\models\API_Furniture;

/**
 * SanPhamSearch represents the model behind the search form about `common\models\SanPhamForm`.
 */
class SanPhamSearch extends SanPhamForm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ban_chay', 'noi_bat', 'moi_ve', 'thuong_hieu_id', 'nguoi_tao_id', 'nguoi_sua_id', 'so_luong'], 'integer'],
            [['name', 'slug', 'mo_ta_ngan_gon', 'mo_ta_chi_tiet'], 'safe'],
            [['gia_ban', 'gia_canh_tranh'], 'number'],
            //[['ngay_dang', 'ngay_sua', 'ngay_hang_ve'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
            [['ngay_dang', 'ngay_sua', 'ngay_hang_ve','ngay_dang_tu'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SanPhamForm::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'ban_chay' => $this->ban_chay,
            'noi_bat' => $this->noi_bat,
            'moi_ve' => $this->moi_ve,
            'gia_ban' => $this->gia_ban,
            'gia_canh_tranh' => $this->gia_canh_tranh,
            //'ngay_dang' => $this->ngay_dang,
            //'ngay_sua' => $this->ngay_sua,
            'thuong_hieu_id' => $this->thuong_hieu_id,
            'nguoi_tao_id' => $this->nguoi_tao_id,
            'nguoi_sua_id' => $this->nguoi_sua_id,
            'so_luong' => $this->so_luong,
            //'ngay_hang_ve' => $this->ngay_hang_ve,
        ]);

        // Select *  from sanpham where gia_ban >= {$this->giaban_tu}
        if($this->giaban_tu != '') {
            $query->andFilterWhere(['>=', 'gia_ban', $this->giaban_tu]);
        }
        // and gia_ban <= {$this->gia_ban}
        if($this->gia_ban != '') {
            $query->andFilterWhere(['<=', 'gia_ban', $this->gia_ban]);
        }

        // d | d/m | d/m/y
        if($this->ngay_dang_tu != '') {
            $query->andFilterWhere(['>=', 'date(ngay_dang)', API_Furniture::convertDMYtoYMD($this->ngay_dang_tu)]);
        }
        // and ngay_dang <= {$this->ngay_dang}
        if($this->ngay_dang != '') {
            $query->andFilterWhere(['<=', 'date(ngay_dang)', API_Furniture::convertDMYtoYMD($this->ngay_dang)]);
        }


        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'mo_ta_ngan_gon', $this->mo_ta_ngan_gon])
            ->andFilterWhere(['like', 'mo_ta_chi_tiet', $this->mo_ta_chi_tiet]);
            //->andFilterWhere(['like', 'anhdaidien_base_url', $this->anhdaidien_base_url])
            //->andFilterWhere(['like', 'anhdaidien_path', $this->anhdaidien_path]);

        return $dataProvider;
    }
}
