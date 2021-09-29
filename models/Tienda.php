<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tienda".
 *
 * @property int $tie_id Id
 * @property string $tie_nombre Nombre
 *
 * @property Producto[] $productos
 */
class Tienda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tienda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tie_nombre'], 'required'],
            [['tie_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tie_id' => 'Id',
            'tie_nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['pro_fktienda' => 'tie_id']);
    }

    /* public static function getMap()
    {
        return ArrayHelper::map(Tienda::find()->all(), 'tie_id', 'tie_nombre');
    } */

    public static function map()
    {
        return ArrayHelper::map(Tienda::find()->all(), 'tie_id', 'tie_nombre');
    }

}
