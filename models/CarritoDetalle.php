<?php

namespace app\models;

use Yii;
use app\models\Carro;
use app\models\Producto;
use app\models\CatTarjeta;
use app\models\Devoluciones;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "carrito_detalle".
 *
 * @property int $cardet_id Id
 * @property int $cardet_cantidad Cantidad
 * @property float $cardet_precio Precio
 * @property int|null $cardet_valoracion Valoración
 * @property string|null $cardet_comentario Comentario
 * @property int $cardet_fkproducto Producto
 * @property int $cardet_fkcarro Carrito
 *
 * @property Carro $cardetFkcarro
 * @property Producto $cardetFkproducto
 * @property Devoluciones[] $devoluciones
 */
class CarritoDetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrito_detalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cardet_cantidad', 'cardet_precio', 'cardet_fkproducto', 'cardet_fkcarro'], 'required'],
            [['cardet_cantidad', 'cardet_valoracion', 'cardet_fkproducto', 'cardet_fkcarro'], 'integer'],
            [['cardet_estatus'], 'safe'],
            [['cardet_precio'], 'number'],
            [['cardet_comentario'], 'string'],
            [['cardet_fkproducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['cardet_fkproducto' => 'pro_id']],
            [['cardet_fkcarro'], 'exist', 'skipOnError' => true, 'targetClass' => Carro::className(), 'targetAttribute' => ['cardet_fkcarro' => 'car_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cardet_id'         => 'Id',
            'cardet_cantidad'   => 'Cantidad',
            'cardet_precio'     => 'Precio',
            'cardet_valoracion' => 'Valoración',
            'cardet_comentario' => 'Comentario',
            'cardet_fkproducto' => 'Producto',
            'productoNombre'    => 'Producto',
            'cardet_fkcarro'    => 'Carrito',
            'cardet_estatus'    => 'Estatus',
        ];
    }

    /**
     * Gets query for [[CardetFkcarro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCardetFkcarro()
    {
        return $this->hasOne(Carro::className(), ['car_id' => 'cardet_fkcarro']);
    }

    /**
     * Gets query for [[CardetFkproducto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCardetFkproducto()
    {
        return $this->hasOne(Producto::className(), ['pro_id' => 'cardet_fkproducto']);
    }

    /**
     * Gets query for [[Devoluciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDevoluciones()
    {
        return $this->hasMany(Devoluciones::className(), ['dev_fkcarritodetalle' => 'cardet_id']);
    }

    public function getProductoNombre()
    {
        return $this->cardetFkproducto->pro_nombre;
    }
    public static function map()
    {
        return ArrayHelper::map(CarritoDetalle::find()->all(), 'cardet_id', 'cardet_id');
    }
    public static function productosCarrito()
    {
        return self::find()->innerJoin('carro', 'car_id = cardet_fkcarro and car_fkusuario = ' . Usuario::usuario()->usu_id . ' and car_estatus = "Apartado" and cardet_estatus = 1')->all();
    }
    public function getProductoPrecio()
    {
        return $this->cardetFkproducto->pro_precio;
    }
    public static function domicilio()
    {
        return ArrayHelper::map(Domicilio::find()->where(['dom_fkusuario' => Usuario::usuario()->usu_id])->all(), 'dom_id', 'dom_ciudad');
    }
    public static function domicilioCheck()
    {
        return Domicilio::find()->where(['dom_id' => Carro::carro()->car_fkdomicilio])->one();
    }
    public static function tarjetaCheck()
    {
        return CatTarjeta::find()->where(['tar_id' => Carro::carro()->car_fktarjeta])->one();
    }
    public static function envioCheck()
    {
        return Envio::find()->where(['env_id' => Carro::carro()->car_fkenvio])->one();
    }
    public static function envioModal()
    {
        return Envio::find()->all();
    }
    public static function domicilioPredeterminado()
    {
        return Domicilio::find()->where(['dom_fkusuario' => Usuario::usuario()->usu_id])->one();
    }
    public static function tarjetaPredeterminado()
    {
        return CatTarjeta::find()->where(['tar_fkusuario' => Usuario::usuario()->usu_id])->one();
    }
    public static function productoRepetido($id)
    {
        return CarritoDetalle::find()->andWhere(['cardet_fkproducto' => $id]) -> andWhere(['cardet_fkcarro' => Carro::carro()-> car_id]) -> one();
    }
}
