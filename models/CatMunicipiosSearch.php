<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatMunicipios;

/**
 * CatMunicipiosSearch represents the model behind the search form of `app\models\CatMunicipios`.
 */
class CatMunicipiosSearch extends CatMunicipios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mun_id', 'mun_fkestado'], 'integer'],
            [['mun_municipio'], 'safe'],
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
        $query = CatMunicipios::find();

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
            'mun_id' => $this->mun_id,
            'mun_fkestado' => $this->mun_fkestado,
        ]);

        $query->andFilterWhere(['like', 'mun_municipio', $this->mun_municipio]);

        return $dataProvider;
    }
}
