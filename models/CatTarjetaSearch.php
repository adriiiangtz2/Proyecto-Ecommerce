<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatTarjeta;

/**
 * CatTarjetaSearch represents the model behind the search form of `app\models\CatTarjeta`.
 */
class CatTarjetaSearch extends CatTarjeta
{
    public $usuarioNombre;
    public $nombreCompleto;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tar_id', 'tar_fkusuario'], 'integer'],
            [['tar_numtarjeta', 'tar_expiracion', 'tar_financiera', 'tar_tipo','usuarioNombre','nombreCompleto',], 'safe'],
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
        $query = CatTarjeta::find();

        // add conditions that should always apply here

        $query->joinWith('tarFkusuario');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'tar_id',
                'tar_numtarjeta',
                'tar_expiracion',
                'tar_financiera',
                'tar_tipo',
                'usuarioNombre'=> [
                    'asc'=>['usu_nombre' => SORT_ASC],
                    'desc'=>['usu_nombre' => SORT_DESC],
                    'default'=>SORT_ASC,
                ],
                'nombreCompleto'=> [
                     // Concatenamos con CONCAT y ponemos los campos para buscar y el orden afecta la busqueda
                    'asc'=>['CONCAT(usu_nombre," ",usu_paterno," ",usu_materno)' => SORT_ASC],
                    'desc'=>['CONCAT(usu_nombre," ",usu_paterno," ",usu_materno)' => SORT_DESC],
                    'default'=>SORT_ASC,
                ],
                'tar_nombre',
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
            'tar_id' => $this->tar_id,
            'tar_fkusuario' => $this->tar_fkusuario,
        ]);

        $query->andFilterWhere(['like', 'tar_numtarjeta', $this->tar_numtarjeta])
            ->andFilterWhere(['like', 'tar_expiracion', $this->tar_expiracion])
            ->andFilterWhere(['like', 'tar_nombre', $this->tar_nombre])
            ->andFilterWhere(['like', 'tar_financiera', $this->tar_financiera])
            ->andFilterWhere(['like', 'tar_tipo', $this->tar_tipo])
            ->andFilterWhere(['like', 'usu_nombre', $this->usuarioNombre])
            // Concatenamos con CONCAT y ponemos los campos para buscar y el orden afecta la busqueda
            ->andFilterWhere(['like', 'CONCAT(usu_nombre," ",usu_paterno," ",usu_materno)', $this->nombreCompleto]);
            
        return $dataProvider;
    }
}
