<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatCp;

/**
 * CatCpSearch represents the model behind the search form of `app\models\CatCp`.
 */
class CatCpSearch extends CatCp
{
    public $municipioNombre; // p4
    public $estadoNombre;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cp_id', 'cp_fkmunicipio', 'cp_fkestado', 'cp_cp'], 'integer'],
            [['cp_colonia', 'municipioNombre','estadoNombre'], 'safe'],
        ];                   //p5
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    ////////////////////////////////////////
   

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CatCp::find();

        // add conditions that should always apply here

        $query->joinWith(['cpFkmunicipio','cpFkestado']); //p7->1

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'cp_id',
                'cp_cp',
                'cp_colonia',
                'municipioNombre'=> [
                    'asc'=>['mun_nombre' => SORT_ASC],
                    'desc'=>['mun_nombre' => SORT_DESC],
                    'default'=>SORT_ASC,
                ],
                'estadoNombre'=> [
                    'asc'=>['est_nombre' => SORT_ASC],
                    'desc'=>['est_nombre' => SORT_DESC],
                    'default'=>SORT_ASC,
                ],
            ]
        ]);
        // p8

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'cp_id' => $this->cp_id,
            'cp_fkmunicipio' => $this->cp_fkmunicipio,
            'cp_fkestado' => $this->cp_fkestado,
            'cp_cp' => $this->cp_cp,
        ]);

        $query->andFilterWhere(['like', 'cp_colonia', $this->cp_colonia])
        ->andFilterWhere(['like', 'mun_municipio', $this->municipioNombre])
        ->andFilterWhere(['like', 'est_estado', $this->estadoNombre]);
                                 //p6
        return $dataProvider;
    }
}
