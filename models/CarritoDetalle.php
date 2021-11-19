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
    /* Funcion para llamar los datos de carrito_detalle para el carrito. */
    public static function productosCarrito()
    {
        /*  Se compara que el registro de carro corresponde al usuario logueado, que este tenga el estatus de 
        'Apartado' y que los datos de carrito_detalle asociados al carro tengan estatus de 1 */
        return self::find()->innerJoin('carro', 'car_id = cardet_fkcarro and car_fkusuario = ' . Usuario::usuario()->usu_id . ' and car_estatus = "Apartado" and cardet_estatus = 1')->all();
    }
    /* Funcion para el contador de productos en el navbar */
    public static function carritoContador()
    {
        /* El contador inicia en 0 */
        $contador = 0;
        /* Un if para que esta funcion solo funcione cuando el usuario logueado tenga rol de Usuario. Sin esto el sistema causa un
        error */
        if (!Yii::$app->user->isGuest && !Yii::$app->user->isSuperAdmin) {
            /* Hacemos la consulta de los productos activos en el carrito */
            $contenidoCarrito = self::find()->innerJoin('carro', 'car_id = cardet_fkcarro and car_fkusuario = ' . Usuario::usuario()->usu_id . ' and car_estatus = "Apartado" and cardet_estatus = 1')->all();
            /* Un foreach que mete la consulta en una variable */
            foreach ($contenidoCarrito as $pro) :
                /*Por cada dato que hay en el carrito_detalle y la cantidad de estos se suma al contador */
                $contador = $contador + $pro->cardet_cantidad;
            endforeach;
            /* Se regresa el dato final de contador */
            return $contador;
        } else { /* Si el usuario no tiene el rol Usuario no se manda ningun dato */
            return null;
        }
    }
    /* Funcion para traer el precio del producto seleccionado */
    public function getProductoPrecio()
    {
        $producto = $this->cardetFkproducto;
        $precio=0;
        /* Condicion para detectar si el producto tiene un descuento para aplicarlo en la vista de carrito */
        if ($producto->pro_descuento != 0 || $producto->pro_descuento != null) {
            $descuento =  $producto->pro_descuento;
            $precio=($producto->pro_precio - ($producto->pro_precio * ($descuento / 100)));
        } else {  /* Si no hay descuento se muestra el precio regular de la tabla producto */
            $precio = $producto ->pro_precio;
        }
        return $precio;
    }
    public static function domicilio()
    {
        return ArrayHelper::map(Domicilio::find()->where(['dom_fkusuario' => Usuario::usuario()->usu_id])->all(), 'dom_id', 'dom_ciudad');
    }
    /* Funcion para traer el domicilio asociado al carro activo */
    public static function domicilioCheck()
    {
        return Domicilio::find()->where(['dom_id' => Carro::carro()->car_fkdomicilio])->one();
    }
    /* Funcion para traer la tarjeta asociada al carro activo */
    public static function tarjetaCheck()
    {
        return CatTarjeta::find()->where(['tar_id' => Carro::carro()->car_fktarjeta])->one();
    }
    /* Funcion para traer el metodo de envio asociado al carro activo */
    public static function envioCheck()
    {
        return Envio::find()->where(['env_id' => Carro::carro()->car_fkenvio])->one();
    }
    /* Funcion para traer todos los datos del envio */
    public static function envioModal()
    {
        return Envio::find()->all();
    }
    /* Funcion que trae un dato cualquiera de la tabla domicilio asociado al usuario */
    public static function domicilioPredeterminado()
    {
        return Domicilio::find()->where(['dom_fkusuario' => Usuario::usuario()->usu_id])->one();
    }
    /* Funcion que trae un dato cualquiera de la tabla cat_tarjeta asociado al usuario */
    public static function tarjetaPredeterminado()
    {
        return CatTarjeta::find()->where(['tar_fkusuario' => Usuario::usuario()->usu_id])->one();
    }
    /* Funcion que trae un dato de producto de carrito_detalle apartir de la id del producto seleccionado en el id */
    public static function productoRepetido($id)
    {
        return CarritoDetalle::find()->andWhere(['cardet_fkproducto' => $id])->andWhere(['cardet_fkcarro' => Carro::carro()->car_id])->one();
    }
}
