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
            'fav_fkusuario' => 'Usuario',
            'productoNombre' => 'Nombre Producto',
            'usuarioNombre' => ' Nombre usuario',
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

    public function getProductoNombre(){
        return $this->favFkproducto->pro_nombre;
    }
    public function getUsuarioNombre(){
        return $this->favFkusuario->usu_nombre;
    }
}
