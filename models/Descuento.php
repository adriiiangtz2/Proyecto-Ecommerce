<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "descuento".
 *
 * @property int $des_id Id
 * @property string $des_inicio Fecha de inicio
 * @property string $des_fin Fecha de finalización
 * @property float $des_descuento Descuento
 * @property int $des_fkproducto Producto
 *
 * @property Producto $desFkproducto
 */
class Descuento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'descuento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['des_inicio', 'des_fin', 'des_descuento', 'des_fkproducto'], 'required'],
            [['des_inicio', 'des_fin'], 'safe'],
            [['des_descuento'], 'number'],
            [['des_fkproducto'], 'integer'],
            [['des_fkproducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['des_fkproducto' => 'pro_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'des_id' => 'Id',
            'des_inicio' => 'Fecha de inicio',
            'des_fin' => 'Fecha de finalización',
            'des_descuento' => 'Descuento',
            'des_fkproducto' => 'Producto',
        ];
    }

    /**
     * Gets query for [[DesFkproducto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDesFkproducto()
    {
        return $this->hasOne(Producto::className(), ['pro_id' => 'des_fkproducto']);
    }

    public static function getMap() 
    {
        return ArrayHelper::map(Producto::find()->all(), 'pro_id', 'pro_nombre');
    }

    

}
