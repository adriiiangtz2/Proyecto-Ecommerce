<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CarritoDetalle;

/**
 * CarritoDetalleSearch represents the model behind the search form of `app\models\CarritoDetalle`.
 */
class CarritoDetalleSearch extends CarritoDetalle
{
    public $productoNombre;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cardet_id', 'cardet_cantidad', 'cardet_valoracion', 'cardet_fkproducto', 'cardet_fkcarro'], 'integer'],
            [['cardet_precio'], 'number'],
            [['cardet_comentario', 'productoNombre'], 'safe'],
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
        $query = CarritoDetalle::find();

        // add conditions that should always apply here

        $query->joinWith('cardetFkproducto');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' =>[
                'cardet_id',
                'cardet_cantidad',
                'cardet_precio',
                'cardet_valoracion',
                'cardet_comentario',
                'productoNombre' => [
                    'asc' => ['pro_nombre'  => SORT_ASC], 
                    'desc' => ['pro_nombre' => SORT_DESC], 
                    'default'               => SORT_ASC,
                ],
                'cardet_fkcarro'
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'cardet_id'         => $this->cardet_id,
            'cardet_cantidad'   => $this->cardet_cantidad,
            'cardet_precio'     => $this->cardet_precio,
            'cardet_valoracion' => $this->cardet_valoracion,
            'cardet_fkproducto' => $this->cardet_fkproducto,
            'cardet_fkcarro'    => $this->cardet_fkcarro,
        ]);

        $query->andFilterWhere(['like', 'cardet_comentario', $this->cardet_comentario])
            ->andFilterWhere(['like', 'pro_nombre', $this->productoNombre]);

        return $dataProvider;
    }
}
