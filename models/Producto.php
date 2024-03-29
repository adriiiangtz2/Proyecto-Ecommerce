<?php

namespace app\models;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "producto".
 * archivo modificado
 *
 * @property int $pro_id Id
 * @property string $pro_nombre Nombre
 * @property float $pro_precio Precio
 * @property string $pro_fecha Fecha
 * @property string $pro_descripcion Descripción
 * @property string $pro_dimensiones Dimensiones
 * @property string $pro_imagen Imagen
 * @property string $pro_estatus Estatus
 * @property string $pro_color Color
 * @property int $pro_fktipo Tipo de producto
 * @property int $pro_fkmarca Características
 * @property int $pro_fktienda Tienda
 *
 * @property CarritoDetalle[] $carritoDetalles
 * @property CatFavorito[] $catFavoritos
 * @property Descuento[] $descuentos
 * @property CatMarca $proFkmarca
 * @property Tienda $proFktienda
 * @property CatTipo $proFktipo
 */
class Producto extends \yii\db\ActiveRecord
{

    public $img;
    public $marca;
    public $tipo;
    public $tienda;
    public $menorPrecio;
    public $mayorPrecio;
    public $descuentoCompra;
    public $descuento = 0;
    public $precio = 0;
    public $opera = 0;
    public $total = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_nombre', 'pro_precio', 'pro_fecha', 'pro_descripcion', 'pro_estatus', 'pro_color', 'pro_estrellas' ,'pro_fktipo', 'pro_fkmarca', 'pro_fktienda'], 'required'],
            [['pro_precio', 'pro_descuento', 'descuentoCompra'], 'number'],
            [['pro_estrellas'],'string'],
            [['pro_fecha', 'img'. 'marca','tipo', 'tienda', 'menorPrecio'], 'safe'],
            [['pro_descripcion', 'pro_estatus'], 'string'],
            [['pro_fktipo', 'pro_fkmarca', 'pro_fktienda'], 'integer'],
            [['pro_nombre'], 'string', 'max'            => 100],
            [['pro_dimensiones'], 'string', 'max'       => 50],
            [['pro_imagen'], 'string', 'max'            => 150],
            [['pro_color'], 'string', 'max'             => 10],
            [['img'], 'file', 'extensions'              => 'jpg, gif, png'],
            [['img'], 'file', 'maxSize'                 => '100000'],
            [['pro_fktienda'], 'exist', 'skipOnError'   => true, 'targetClass' => Tienda::className(), 'targetAttribute'   => ['pro_fktienda' => 'tie_id']],
            [['pro_fktipo'], 'exist', 'skipOnError'     => true, 'targetClass' => CatTipo::className(), 'targetAttribute'  => ['pro_fktipo' => 'tip_id']],
            [['pro_fkmarca'], 'exist', 'skipOnError'    => true, 'targetClass' => CatMarca::className(), 'targetAttribute' => ['pro_fkmarca' => 'mar_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_id'          => 'Id',
            'pro_nombre'      => 'Nombre',
            'pro_precio'      => 'Precio',
            'pro_estrellas'   => 'Estrellas',
            'pro_fecha'       => 'Fecha',
            'pro_descripcion' => 'Descripción',
            'pro_dimensiones' => 'Dimensiones',
            'pro_imagen'      => 'Imagen',
            'pro_estatus'     => 'Estatus',
            'pro_color'       => 'Color',
            'pro_fktipo'      => 'Tipo de producto',
            'pro_fkmarca'     => 'Características',
            'pro_fktienda'    => 'Tienda',
            'pro_descuento'   => 'Porcentaje',
            'descuentoCompra' => 'Compra con descuento',
            'img'             => 'Imagen',
            'imagen'          => 'Imagen',
            'marca'           => 'Marca',
            'tipo'            => 'Tipo',
            'tienda'          => 'Tienda',
            'menorPrecio'     => 'Precio Mínimo de Producto',
            'mayorPrecio'     => 'Precio Mayor de Producto',
        ];
    }

    /**
     * Gets query for [[CarritoDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarritoDetalles()
    {
        return $this->hasMany(CarritoDetalle::className(), ['cardet_fkproducto' => 'pro_id']);
    }

    /**
     * Gets query for [[CatFavoritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatFavoritos()
    {
        return $this->hasMany(CatFavorito::className(), ['fav_fkproducto' => 'pro_id']);
    }

    /**
     * Gets query for [[Descuentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDescuentos()
    {
        return $this->hasMany(Descuento::className(), ['des_fkproducto' => 'pro_id']);
    }

    /**
     * Gets query for [[ProFkmarca]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProFkmarca()
    {
        return $this->hasOne(CatMarca::className(), ['mar_id' => 'pro_fkmarca']);
    }

    /**
     * Gets query for [[ProFktienda]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProFktienda()
    {
        return $this->hasOne(Tienda::className(), ['tie_id' => 'pro_fktienda']);
    }

    /**
     * Gets query for [[ProFktipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProFktipo()
    {
        return $this->hasOne(CatTipo::className(), ['tip_id' => 'pro_fktipo']);
    }

    public static function map(){
        return ArrayHelper::map(Producto::find()->all(),'pro_id','pro_nombre');
    }

    public function getMarca()
    {
        return $this->proFkmarca->mar_nombre;
    }

    public static function getMap()
    {
        return ArrayHelper::map(Producto::find()->all(), 'pro_id', 'pro_nombre');
    } 

    public function getImagen()
    {
        return Html::img($this->url);
    }

    public function getUrl(){
        return "/img/" . (empty($this->pro_imagen) ? 'Productos.jpg' : "producto/{$this->pro_imagen}");
    }

    public function getPromedio()
    {
        $promedio = 0;
        $contador = count($this->carritoDetalles);
        foreach($this->carritoDetalles as $producto){
            $promedio += $producto->cardet_valoracion;
        }
        return $promedio/ ($contador == 0 ? 1 : count($this->carritoDetalles));
    }

    public static function Producto()
    {
        //array de descuentos
        $entrada = array(20, 30, 40);
        //numero random para la posicion del arreglo
        $azar = rand(0, 2);
        $valor = $entrada[$azar];

        return Producto::find()->where(['pro_descuento' => $valor])->orderBy(['rand()' => SORT_DESC])->limit(4)->all();
    }
    public function getCuentas()
    {
            $this->descuento = $this->pro_descuento;
            $this->precio   = $this->pro_precio;
            $this->opera    = $this->precio * $this->descuento / 100;
            $this->total    = $this->precio - $this->opera;
    }

    public static function Cuentas2()
    {
        $productos = self::producto();
        $producto = [];
        foreach ($productos as $prod) {
            $pro = new Producto();
            $pro->descuento = $prod->pro_descuento;
            $pro->precio   = $prod->pro_precio;
            $pro->opera    = $pro->precio * $pro->descuento / 100;
            $pro->total    = $pro->precio - $pro->opera;
            $producto[] = $pro;
        }
        return $producto;
    } 
}
