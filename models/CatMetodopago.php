<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_metodopago".
 *
 * @property int $met_id Id
 * @property string $met_nombre Nombre
 *
 * @property Carro[] $carros
 */
class CatMetodopago extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_metodopago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['met_nombre'], 'required'],
            [['met_nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'met_id'     => 'Id',
            'met_nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Carros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarros()
    {
        return $this->hasMany(Carro::className(), ['car_fkmetodo' => 'met_id']);
    }

    public static function map()
    {
        return ArrayHelper::map(CatMetodopago::find()->all(), 'met_id', 'met_nombre');
    }


}
