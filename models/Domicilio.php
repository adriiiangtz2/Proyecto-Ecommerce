<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "domicilio".
 *
 * @property int $dom_id Id
 * @property string $dom_ciudad Ciudad
 * @property string $dom_colonia Colonia
 * @property string $dom_calle Calle
 * @property string $dom_numExt Número exterior
 * @property string $dom_numInt Número interior
 * @property string $dom_telefono Número de teléfono
 * @property int $dom_fkusuario Usuario
 * @property int $dom_fkcp Código postal
 *
 * @property Carro[] $carros
 * @property CatCp $domFkcp
 * @property Usuario $domFkusuario
 */
class Domicilio extends \yii\db\ActiveRecord
{
    public $mun_fkestado;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'domicilio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dom_ciudad', 'dom_colonia', 'dom_calle', 'dom_numExt', 'dom_numInt', 'dom_telefono', 'dom_fkusuario', 'dom_fkcp'], 'required'],
            [['dom_ciudad', 'dom_colonia', 'dom_calle'], 'string'],
            [['dom_fkusuario', 'dom_fkcp'], 'integer'],
            [['dom_numExt', 'dom_numInt'], 'string', 'max' => 10],
            [['dom_telefono'], 'string', 'max' => 12],
            [['dom_fkusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['dom_fkusuario' => 'usu_id']],
            [['dom_fkcp'], 'exist', 'skipOnError' => true, 'targetClass' => CatCp::className(), 'targetAttribute' => ['dom_fkcp' => 'cp_cp']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dom_id' => 'Id',
            'dom_ciudad' => 'Ciudad',
            'dom_colonia' => 'Colonia',
            'dom_calle' => 'Calle',
            'dom_numExt' => 'Número exterior',
            'dom_numInt' => 'Número interior',
            'dom_telefono' => 'Número de teléfono',
            'dom_fkusuario' => 'Usuario',
            'dom_fkcp' => 'Código postal',
            'coloniaNombre' => 'colonia',

            'usuarioNombre' => 'usuario',
        ];
    }

    /**
     * Gets query for [[Carros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarros()
    {
        return $this->hasMany(Carro::className(), ['car_fkdomicilio' => 'dom_id']);
    }

    /**
     * Gets query for [[DomFkcp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDomFkcp()
    {
        return $this->hasOne(CatCp::className(), ['cp_cp' => 'dom_fkcp']);
    }

    /**
     * Gets query for [[DomFkusuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDomFkusuario()
    {
        return $this->hasOne(Usuario::className(), ['usu_id' => 'dom_fkusuario']);
    }

    public function getColoniaNombre()
    {

        return $this->domFkcp->cp_colonia;
    }
    public function getUsuarioNombre()
    {

        return $this->domFkusuario->usu_nombre;
    }
    public static function map()
    {
        return ArrayHelper::map(Domicilio::find()->all(), 'dom_id', 'dom_id');
    }
    //Funcion para traer el usuario
    public  static function Domicilio()
    {
        return Domicilio::find()->where(['dom_fkusuario' => Yii::$app->usuario->usu_id])->one();
    }
    public static function cp($cp_id)
    {
        $colonias = [];
        $cp = CatCp::find()->where(['cp_cp' => $cp_id])->all();
        foreach ($cp as $c) {
            $colonias[] = ['id' => $c->cp_colonia, 'name' => $c->cp_colonia];
        }
        return $colonias;
    }
    public static function domi()
    {
        return Domicilio::find()->where(['dom_fkusuario' => Usuario::usuario()->usu_id])->all();
    }
}
