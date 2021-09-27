<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Devoluciones;

/**
 * DevolucionesSearch represents the model behind the search form of `app\models\Devoluciones`.
 */
class DevolucionesSearch extends Devoluciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dev_id', 'dev_fkcarritodetalle'], 'integer'],
            [['dev_comentario', 'dev_estatus'], 'safe'],
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
        $query = Devoluciones::find();

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
            'dev_id' => $this->dev_id,
            'dev_fkcarritodetalle' => $this->dev_fkcarritodetalle,
        ]);

        $query->andFilterWhere(['like', 'dev_comentario', $this->dev_comentario])
            ->andFilterWhere(['like', 'dev_estatus', $this->dev_estatus]);

        return $dataProvider;
    }
}
