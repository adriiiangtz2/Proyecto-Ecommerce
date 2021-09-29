<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "envio".
 *
 * @property int $env_id Id
 * @property string $env_metodo Método de envío
 * @property string $env_tiempo Tiempo estimado
 * @property float $env_costo Costo de envío
 *
 * @property Carro[] $carros
 */
class Envio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'envio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['env_metodo', 'env_tiempo', 'env_costo'], 'required'],
            [['env_costo'], 'number'],
            [['env_metodo', 'env_tiempo'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'env_id' => 'Id',
            'env_metodo' => 'Paquetería de envio',
            'env_tiempo' => 'Tiempo estimado',
            'env_costo' => 'Costo de envío',
        ];
    }

    /**
     * Gets query for [[Carros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarros()
    {
        return $this->hasMany(Carro::className(), ['car_fkenvio' => 'env_id']);
       
    }
    public static function map(){
        return ArrayHelper::map(Envio::find()->all(),'env_id','env_metodo');
    }
}
