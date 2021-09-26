<?php

namespace app\models;

use Yii;

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
            [['tar_numtarjeta', 'tar_expiracion', 'tar_financiera', 'tar_tipo', 'tar_fkusuario'], 'required'],
            [['tar_financiera', 'tar_tipo'], 'string'],
            [['tar_fkusuario'], 'integer'],
            [['tar_numtarjeta'], 'string', 'max' => 16],
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

    public function getUsuarioNombre(){
        return $this->tarFkusuario->usu_nombre;
    }
   
}
