<?php

namespace app\models;

use Yii;
use app\models\Usuario;
use app\models\CatTarjeta;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_tarjeta".
 *
 * @property int $tar_id Id
 * @property string $tar_numtarjeta Número de tarjeta
 * @property string $tar_expiracion Fecha de vencimiento
 * @property string $tar_financiera Institución financiera
 * @property string $tar_tipo Tipo
 * @property int $tar_fkusuario Usuario
 *
 * @property Usuario $tarFkusuario
 */
class CatTarjeta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_tarjeta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tar_numtarjeta','tar_nombre','tar_expiracion', 'tar_financiera', 'tar_tipo', 'tar_fkusuario'], 'required'],
            [['tar_financiera', 'tar_tipo'], 'string'],
            [['tar_fkusuario'], 'integer'],
            [['tar_nombre'], 'safe'],
            [['tar_numtarjeta'], 'string', 'max' => 20],
            [['tar_expiracion'], 'string', 'max' => 5],
            [['tar_fkusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['tar_fkusuario' => 'usu_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tar_id' => 'Id',
            'tar_numtarjeta' => 'Número de tarjeta',
            'tar_expiracion' => 'Fecha de vencimiento',
            'tar_financiera' => 'Institución financiera',
            'tar_tipo' => 'Tipo',
            'tar_fkusuario' => 'Usuario',
            'tar_nombre' => 'Nombre',
            'usuarioNombre' => 'Usuario Tarjeta',
        ];
    }

    /**
     * Gets query for [[TarFkusuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarFkusuario()
    {
        return $this->hasOne(Usuario::className(), ['usu_id' => 'tar_fkusuario']);
    }

    // Estas 3 funciones traen el nombre y apellido de un usuario y se guardan VISTA
    public function getUsuarioNombre(){
        return $this->tarFkusuario->usu_nombre;
    }
    public function getUsuarioPaterno(){
        return $this->tarFkusuario->usu_paterno;
    }
    public function getUsuarioMaterno(){
        return $this->tarFkusuario->usu_materno;
    }
    // Se hace una concatenacion de las funciones de la linea 73, se muestra en la vista VISTA
    public function getNombreCompleto(){ 
        return $this->usuarioNombre . ' ' . $this->usuarioPaterno . ' ' . $this->usuarioMaterno;
    }

    public static function tarjeta() { 
        return CatTarjeta::find()->where(['tar_fkusuario'=> Usuario::usuario()->usu_id] )->all();
    }
}