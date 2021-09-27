<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Envio;

/**
 * EnvioSearch represents the model behind the search form of `app\models\Envio`.
 */
class EnvioSearch extends Envio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['env_id'], 'integer'],
            [['env_metodo', 'env_tiempo'], 'safe'],
            [['env_costo'], 'number'],
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
        $query = Envio::find();

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
            'env_id' => $this->env_id,
            'env_costo' => $this->env_costo,
        ]);

        $query->andFilterWhere(['like', 'env_metodo', $this->env_metodo])
            ->andFilterWhere(['like', 'env_tiempo', $this->env_tiempo]);

        return $dataProvider;
    }
}
