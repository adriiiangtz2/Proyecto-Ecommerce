<?php

namespace app\models;

use Yii;
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
   
}
