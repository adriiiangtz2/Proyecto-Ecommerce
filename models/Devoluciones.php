<?php

namespace app\models;

use Yii;
// probando
/**
 * This is the model class for table "devoluciones".
 *
 * @property int $dev_id Id
 * @property string|null $dev_comentario Comentario
 * @property string $dev_estatus Estatus
 * @property int $dev_fkcarritodetalle Carrito detalle
 *
 * @property CarritoDetalle $devFkcarritodetalle
 */
class Devoluciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'devoluciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dev_comentario', 'dev_estatus'], 'string'],
            [['dev_estatus', 'dev_fkcarritodetalle'], 'required'],
            [['dev_fkcarritodetalle'], 'integer'],
            [['dev_fkcarritodetalle'], 'exist', 'skipOnError' => true, 'targetClass' => CarritoDetalle::className(), 'targetAttribute' => ['dev_fkcarritodetalle' => 'cardet_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dev_id' => 'Id',
            'dev_comentario' => 'Comentario',
            'dev_estatus' => 'Estatus',
            'dev_fkcarritodetalle' => 'id Producto',
        ];
    }

    /**
     * Gets query for [[DevFkcarritodetalle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDevFkcarritodetalle()
    {
        return $this->hasOne(CarritoDetalle::className(), ['cardet_id' => 'dev_fkcarritodetalle']);
    }
}
