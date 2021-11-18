<?php

namespace app\models;

use Yii;
use app\models\CatTarjeta;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "carro".
 *
 * @property int $car_id Id
 * @property float $car_iva IVA
 * @property string $car_fecha Fecha
 * @property string $car_estatus Estatus
 * @property int $car_fkusuario Usuario
 * @property int $car_fkmetodo Método de pago
 * @property int $car_fkdomicilio Domicilio
 * @property int $car_fkenvio Envío
 *
 * @property Domicilio $carFkdomicilio
 * @property Envio $carFkenvio
 * @property CatMetodopago $carFkmetodo
 * @property Usuario $carFkusuario
 * @property CarritoDetalle[] $carritoDetalles
 */
class Carro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_iva', 'car_fecha', 'car_estatus', 'car_fkusuario', 'car_fkmetodo', 'car_fkenvio'], 'required'],
            [['car_iva'], 'number'],
            [['car_fecha'], 'safe'],
            [['car_total'], 'number'],
            [['car_estatus'], 'string'],
            [['car_fkusuario', 'car_fkmetodo', 'car_fkdomicilio', 'car_fkenvio'], 'integer'],
            [['car_fkusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['car_fkusuario' => 'usu_id']],
            [['car_fkmetodo'], 'exist', 'skipOnError' => true, 'targetClass' => CatMetodopago::className(), 'targetAttribute' => ['car_fkmetodo' => 'met_id']],
            [['car_fkdomicilio'], 'exist', 'skipOnError' => true, 'targetClass' => Domicilio::className(), 'targetAttribute' => ['car_fkdomicilio' => 'dom_id']],
            [['car_fkenvio'], 'exist', 'skipOnError' => true, 'targetClass' => Envio::className(), 'targetAttribute' => ['car_fkenvio' => 'env_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_id'          => 'Id',
            'car_iva'         => 'IVA',
            'car_fecha'       => 'Fecha',
            'car_estatus'     => 'Estatus',
            'car_fkusuario'   => 'Usuario',
            'car_fkmetodo'    => 'Método de pago',
            'car_fkdomicilio' => 'Domicilio',
            'car_fkenvio'     => 'Envío',
            'usuarioNombre'   => 'Usuario',
            'metodoNombre'    => 'Método de pago',
            'envioMetodo'     => 'Método de envío',
            'car_total'       => 'Total',
        ];
    }

    /**
     * Gets query for [[CarFkdomicilio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarFkdomicilio()
    {
        return $this->hasOne(Domicilio::className(), ['dom_id' => 'car_fkdomicilio']);
    }

    /**
     * Gets query for [[CarFkenvio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarFkenvio()
    {
        return $this->hasOne(Envio::className(), ['env_id' => 'car_fkenvio']);
    }

    /**
     * Gets query for [[CarFkmetodo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarFkmetodo()
    {
        return $this->hasOne(CatMetodopago::className(), ['met_id' => 'car_fkmetodo']);
    }

    /**
     * Gets query for [[CarFkusuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarFkusuario()
    {
        return $this->hasOne(Usuario::className(), ['usu_id' => 'car_fkusuario']);
    }

    /**
     * Gets query for [[CarritoDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarritoDetalles()
    {
        return $this->hasMany(CarritoDetalle::className(), ['cardet_fkcarro' => 'car_id']);
    }
    /*Valores concatenados*/
    public function getUsuarioNombre()
    {
        return $this->carFkusuario->usu_nombre;
    }
    public function getUsuarioPaterno()
    {
        return $this->carFkusuario->usu_paterno;
    }
    public function getUsuarioMaterno()
    {
        return $this->carFkusuario->usu_materno;
    }
    /*Concatenacion*/
    public function getNombreCompleto()
    {
        return $this->usuarioNombre . ' ' . $this->usuarioPaterno . ' ' . $this->usuarioMaterno;
    }

    public function getMetodoNombre()
    {
        return $this->carFkmetodo->met_nombre;
    }
    public function getEnvioMetodo()
    {
        return $this->carFkenvio->env_metodo;
    }
    public static function map()
    {
        return ArrayHelper::map(Carro::find()->all(), 'car_id', 'car_id');
    }
    /* Funcion que trae el carro activo del usuario logueado */
    public static function carro()
    {
        return self::find()->where(['and', ['car_fkusuario' => Usuario::usuario()->usu_id], ['car_estatus' => 'Apartado']])->one();
    }
    /* Funcion que trae todos los carros que fueron pagados del usuario logueado. Usado para la lista de pedidos */
    public static function carroPagado()
    {
        return self::find()->where(['and', ['car_fkusuario' => Usuario::usuario()->usu_id], ['car_estatus' => 'Pagado']])->all();
    }
    public function productosPagados()
    {
        /*  Se compara que el registro de carro corresponde al usuario logueado, que este tenga el estatus de 
        'Pagado' y que los datos de carrito_detalle asociados al carro tengan estatus de 1 */
        return CarritoDetalle::find()->innerJoin('carro', '' . $this->car_id . ' = cardet_fkcarro and car_fkusuario = ' . Usuario::usuario()->usu_id . ' and car_estatus = "Pagado" and cardet_estatus = 1')->all();
    }
    /* Funcion para traer consulta de cat_tarjeta */
    public function getTarjetaCarro()
    {
        return CatTarjeta::find()->where(['tar_id' => $this->car_fktarjeta])->one();
    }
}
