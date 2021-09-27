<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Descuento;

/**
 * DescuentoSearch represents the model behind the search form of `app\models\Descuento`.
 */
class DescuentoSearch extends Descuento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['des_id', 'des_fkproducto'], 'integer'],
            [['des_inicio', 'des_fin'], 'safe'],
            [['des_descuento'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Descuento::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'des_id' => $this->des_id,
            'des_inicio' => $this->des_inicio,
            'des_fin' => $this->des_fin,
            'des_descuento' => $this->des_descuento,
            'des_fkproducto' => $this->des_fkproducto,
        ]);

        return $dataProvider;
    }
}
