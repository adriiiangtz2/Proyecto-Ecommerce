<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Carro;

/**
 * CarroSearch represents the model behind the search form of `app\models\Carro`.
 */
class CarroSearch extends Carro
{
    public $usuarioNombre;
    public $metodoNombre;
    public $envioMetodo;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'car_fkusuario', 'car_fkmetodo', 'car_fkdomicilio', 'car_fkenvio'], 'integer'],
            [['car_iva'], 'number'],
            [['car_fecha', 'car_estatus', 'usuarioNombre', 'metodoNombre', 'envioMetodo'], 'safe'],
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
        $query = Carro::find();

        // add conditions that should always apply here

        $query->joinWith('carFkusuario');
        $query->joinWith('carFkmetodo');
        $query->joinWith('carFkenvio');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' =>[
                'car_id',
                'car_iva',
                'car_fecha',
                'car_estatus',
                'usuarioNombre' => [
                    'asc' => ['usu_nombre' => SORT_ASC], 
                    'desc' => ['usu_nombre' => SORT_DESC], 
                    'default' => SORT_ASC,
                ],
                'metodoNombre' => [
                    'asc' => ['met_nombre' => SORT_ASC], 
                    'desc' => ['met_nombre' => SORT_DESC], 
                    'default' => SORT_ASC,
                ],
                'car_fkdomicilio',
                'envioMetodo' => [
                    'asc' => ['env_metodo' => SORT_ASC], 
                    'desc' => ['env_metodo' => SORT_DESC], 
                    'default' => SORT_ASC,
                ]
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
            'car_id' => $this->car_id,
            'car_iva' => $this->car_iva,
            'car_fecha' => $this->car_fecha,
            'car_fkusuario' => $this->car_fkusuario,
            'car_fkmetodo' => $this->car_fkmetodo,
            'car_fkdomicilio' => $this->car_fkdomicilio,
            'car_fkenvio' => $this->car_fkenvio,
        ]);

        $query->andFilterWhere(['like', 'car_estatus', $this->car_estatus])
              ->andFilterWhere(['like', 'usu_nombre', $this->usuarioNombre])
              ->andFilterWhere(['like', 'met_nombre', $this->metodoNombre])
              ->andFilterWhere(['like', 'env_metodo', $this->envioMetodo]);

        return $dataProvider;
    }
}
