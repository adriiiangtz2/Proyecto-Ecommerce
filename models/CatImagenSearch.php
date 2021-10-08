<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatImagen;

/**
 * CatImagenSearch represents the model behind the search form of `app\models\CatImagen`.
 */
class CatImagenSearch extends CatImagen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ima_id', 'ima_fkproducto'], 'integer'],
            [['ima_url'], 'safe'],
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
        $query = CatImagen::find();

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
            'ima_id' => $this->ima_id,
            'ima_fkproducto' => $this->ima_fkproducto,
        ]);

        $query->andFilterWhere(['like', 'ima_url', $this->ima_url]);

        return $dataProvider;
    }
}
