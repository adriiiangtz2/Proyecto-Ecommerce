<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use webvimark\modules\UserManagement\models\User;

/**
 * This is the model class for table "usuario".
 *
 * @property int $usu_id Id
 * @property string $usu_nombre Nombre
 * @property string $usu_paterno Apellido paterno
 * @property string $usu_materno Apellido materno
 * @property int $usu_fkuser Usuario Webvimark
 *
 * @property Carro[] $carros
 * @property CatFavorito[] $catFavoritos
 * @property CatTarjeta[] $catTarjetas
 * @property Domicilio[] $domicilios
 * @property User $usuFkuser
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usu_nombre', 'usu_paterno', 'usu_fkuser'], 'required'],
            [['usu_fkuser'], 'integer'],
            [
                ['usu_nombre', 'usu_paterno', 'usu_materno'],
                'string',
                'max' => 50,
            ],
            [
                ['usu_fkuser'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::className(),
                'targetAttribute' => ['usu_fkuser' => 'id'],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usu_id' => 'Id',
            'usu_nombre' => 'Nombre',
            'usu_paterno' => 'Apellido paterno',
            'usu_materno' => 'Apellido materno',
            'usu_fkuser' => 'Usuario Webvimark',
            'userUsername' => 'User Username',
            'userEmail' => 'User Email',
        ];
    }

    /**
     * Gets query for [[Carros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarros()
    {
        return $this->hasMany(Carro::className(), [
            'car_fkusuario' => 'usu_id',
        ]);
    }

    /**
     * Gets query for [[CatFavoritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatFavoritos()
    {
        return $this->hasMany(CatFavorito::className(), [
            'fav_fkusuario' => 'usu_id',
        ]);
    }

    /**
     * Gets query for [[CatTarjetas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatTarjetas()
    {
        return $this->hasMany(CatTarjeta::className(), [
            'tar_fkusuario' => 'usu_id',
        ]);
    }

    /**
     * Gets query for [[Domicilios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDomicilios()
    {
        return $this->hasMany(Domicilio::className(), [
            'dom_fkusuario' => 'usu_id',
        ]);
    }

    /**
     * Gets query for [[UsuFkuser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuFkuser()
    {
        return $this->hasOne(User::className(), ['id' => 'usu_fkuser']);
    }

    //Esta funcion trae los 3 campos de  usuario y se guarda en en la funcion SELECT
    public function getNombreCompleto()
    {
        return $this->usu_nombre . ' ' .  $this->usu_paterno . ' ' . $this->usu_materno;
    }
    //Se le asigna la funcion get y se llama en tarjeta para traer los nombres, SELECT
    public static function getMap2()
    {
        return ArrayHelper::map(Usuario::find()->all(), 'usu_id','nombreCompleto');
    }
    public static function map()
    {
        return ArrayHelper::map(Usuario::find()->all(), 'usu_id', 'usu_nombre');
    }

    // Traer Datos de wevimark
    public function getUserUsername(){
        return $this->usuFkuser->username;
    }
    public function getUserEmail(){
        return $this->usuFkuser->email;
    }
    public  static function usuario(){
        return Usuario::find()->where(['usu_fkuser' => Yii::$app->user->id])->one();
    }




}