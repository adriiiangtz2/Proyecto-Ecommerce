<?php

namespace app\models;

use Yii;
use app\models\Usuario;
use app\models\CatTarjeta;
/* hola */
/**
 * This is the model class for table "cat_favorito".
 *
 * @property int $fav_id Id
 * @property int $fav_fkproducto Producto
 * @property int $fav_fkusuario Usuario
 *
 * @property Producto $favFkproducto
 * @property Usuario $favFkusuario
 */
class CatFavorito extends \yii\db\ActiveRecord
{
    public $descuento = 0;
    public $precio = 0;
    public $opera = 0;
    public $total = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_favorito';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fav_fkproducto', 'fav_fkusuario'], 'required'],
            [['fav_fkproducto', 'fav_fkusuario'], 'integer'],
            [['fav_estado'], 'safe'],
            [['fav_fkproducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['fav_fkproducto' => 'pro_id']],
            [['fav_fkusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['fav_fkusuario' => 'usu_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fav_id' => 'Id',
            'fav_fkproducto' => 'Producto',
            'productoNombre' => 'Nombre Producto',
            'fav_fkusuario' => 'Usuario',
            // 'usuarioNombre' => ' Nombre usuario',
            'nombreCompleto' => ' Nombre Usuario',
            'fav_estado' => 'Estatus',
        ];
    }

    /**
     * Gets query for [[FavFkproducto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavFkproducto()
    {
        return $this->hasOne(Producto::className(), ['pro_id' => 'fav_fkproducto']);
    }

    /**
     * Gets query for [[FavFkusuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavFkusuario()
    {
        return $this->hasOne(Usuario::className(), ['usu_id' => 'fav_fkusuario']);
    }
    //funcion que trae el nombre de la tabla PRODUCTOS y se muestra en el form FAVORITOS
    public function getProductoNombre(){
        return $this->favFkproducto->pro_nombre;
    }
    public function getProductoImagen(){
        return $this->favFkproducto->pro_imagen;
    }
    public function getFavoritoSeleccion(){ 
        return "{$this->productoNombre} {$this->productoImagen}";
    }

    // public static function favorito(){

    // }



    // Estas 3 funciones traen el nombre y apellido de un usuario y se guardan VISTA
    // Esta funcion guarda el nombre de la tabla USUARIO y se muestra en el form FAVORITOS
    public function getUsuarioNombre(){
        return $this->favFkusuario->usu_nombre;
    }
    public function getUsuarioPaterno(){
        return $this->favFkusuario->usu_paterno;
    }
    public function getUsuarioMaterno(){
        return $this->favFkusuario->usu_materno;
    }
    // Se hace una concatenacion de las funciones de la linea 73, se muestra en la vista VISTA
    public function getNombreCompleto(){ 
        return $this->usuarioNombre . ' ' . $this->usuarioPaterno . ' ' . $this->usuarioMaterno;
    }

    //funcion que trae el usuario que inicia sesion 
    //esta funcion se manda al controlador
    public static function favorito() { 
        return CatFavorito::find()->where(['fav_fkusuario'=> Usuario::usuario()->usu_id,'fav_estado'=>1] )->orderBy(['fav_id'=>SORT_DESC])->all();
    }
    
    // consulta como tiene el estatus
    public static function estado($id)
    {
        $es =  CatFavorito::find()->andWhere([
            'fav_fkusuario' => Usuario::usuario()->usu_id,
            'fav_fkproducto'  => $id,
            ])->one();
            if(isset($es)){
                return  $es->fav_estado;
            }
            else{
                return $es = 0;
            }
        }
 
        //funcion que trar productos con descuento , un limite de 4 y de manera desordenada
        public static function Producto() { 
            //array de descuentos
            $entrada = array(20,30,40);
            //numero random para la posicion del arreglo
            $azar=rand(0,2);
            $valor = $entrada[$azar];
           
            return Producto::find()->where(['pro_descuento'=>$valor] )->orderBy(['rand()' => SORT_DESC])->limit(4)->all();
        }
        public static function Cuentas(){
            $favo2= self::favorito();
            $favorito = new CatFavorito();
            foreach ($favo2 as $favoritos){
                $favorito->descuento= $favoritos->favFkproducto->pro_descuento;
                $favorito->precio   = $favoritos->favFkproducto->pro_precio;
                $favorito->opera    = (($favorito->precio)/100)* $favorito->descuento; 
                $favorito->total    = $favorito->precio-$favorito->opera;
            }
            return $favorito; 
        }       
}