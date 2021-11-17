<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;

/**
 * ProductoSearch represents the model behind the search form of `app\models\Producto`.
 */
class ProductoSearch extends Producto
{
    public $marca;
    public $menorPrecio;
    public $mayorPrecio;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_id', 'pro_fktipo', 'pro_fkmarca', 'pro_fktienda'], 'integer'],
            [['pro_nombre', 'pro_fecha', 'pro_descripcion', 'pro_dimensiones', 'pro_imagen', 'pro_estatus', 'pro_color', 'marca', 'tipo', 'tienda', 'menorPrecio', 'mayorPrecio'], 'safe'],
            [['pro_precio', 'pro_descuento'], 'number'],
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
    public function search($params, $producto = null, $orden = null)
    {
        $query = Producto::find();

        // add conditions that should always apply here
        $query->joinWith('proFkmarca');

        // if(isset($params['ProductoSearch']['menorPrecio']) && $params['ProductoSearch']['menorPrecio'] !=""){
        //     $query->andWhere('>','pro_precio', $params['ProductoSearch']['menorPrecio']);
        // }
        // if (isset($params['ProductoSearch']['mayorPrecio']) && $params['ProductoSearch']['mayorPrecio'] != "") {
        //     $query->andWhere('<', 'pro_precio', $params['ProductoSearch']['mayorPrecio']);
        // }
        if (isset($params['ProductoSearch']['menorPrecio']) && $params['ProductoSearch']['menorPrecio'] != '') {
            $query->andwhere(['>', 'pro_precio', $params['ProductoSearch']['menorPrecio']]);
        }
        if (isset($params['ProductoSearch']['mayorPrecio']) && $params['ProductoSearch']['mayorPrecio'] != '') {
            $query->andwhere(['<', 'pro_precio', $params['ProductoSearch']['mayorPrecio']]);
        }

        if (isset($producto) && $producto == 0) {
            unset($_SESSION['producto']);
        }
        if (isset($orden) && $orden == 0) {
            unset($_SESSION['orden']);
        }
        if (!isset($producto) && isset($_SESSION['producto'])) {
            $producto = $_SESSION['producto'];
        }
        if (isset($producto)) {
            $_SESSION['producto'] = $producto;
            if ($producto == 3) {
                $query->andwhere(['<', 'pro_precio', 500]);
            } elseif ($producto == 4) {
                $query->andwhere(['>', 'pro_precio', 1000]);
            } elseif ($producto == 5){
                $query->andwhere(['=', 'pro_color', 'Blanco']);
            } elseif ($producto == 6){
                $query->andwhere(['=', 'pro_color', 'Negro']);
            }elseif ($producto == 7){
                $query->andwhere(['=', 'pro_color', 'Gris']);
            }elseif ($producto == 8){
                $query->andwhere(['=', 'pro_color', 'Rojo']);
            }
        }

        if (!isset($orden)) {
            $orden = $_SESSION['orden'];
        }
        if (isset($orden)) {
            $_SESSION['orden'] = $orden;
            if ($orden == 1) {
                $query->orderBy(['pro_precio' => SORT_ASC]);
            } elseif ($orden == 2) {
                $query->orderBy(['pro_precio' => SORT_DESC]);
            }
        }
        $query->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 20]
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'pro_id',
                'pro_nombre',
                'pro_descripcion',
                'pro_dimensiones',
                'pro_imagen',
                'pro_estatus',
                'pro_color',
                'pro_fecha',
                'pro_precio',
                'pro_descuento',
                'marca' => [
                    'asc' => ['pro_fkmarca' => 'SORT_ASC'],
                    'desc' => ['pro_fkmarca' => 'SORT_DESC'],
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
            'pro_id' => $this->pro_id,
            'pro_precio' => $this->pro_precio,
            'pro_fecha' => $this->pro_fecha,
            'pro_descuento' => $this->pro_descuento,
            'pro_fktipo' => $this->pro_fktipo,
            'pro_fkmarca' => $this->pro_fkmarca,
            'pro_fktienda' => $this->pro_fktienda,
        ]);

        $query->andFilterWhere(['like', 'pro_nombre', $this->pro_nombre])
            ->andFilterWhere(['like', 'pro_descripcion', $this->pro_descripcion])
            ->andFilterWhere(['like', 'pro_dimensiones', $this->pro_dimensiones])
            ->andFilterWhere(['like', 'pro_imagen', $this->pro_imagen])
            ->andFilterWhere(['like', 'pro_estatus', $this->pro_estatus])
            ->andFilterWhere(['like', 'pro_color', $this->pro_color])
            ->andFilterWhere(['like', 'pro_fkmarca', $this->marca]);

        return $dataProvider;
    }
}
