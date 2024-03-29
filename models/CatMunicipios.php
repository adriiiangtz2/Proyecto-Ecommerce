<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_municipios".
 *
 * @property int $mun_id Id
 * @property int $mun_fkestado Estado
 * @property string $mun_municipio Municipio
 *
 * @property CatCp[] $catCps
 * @property CatEstados $munFkestado
 */
class CatMunicipios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_municipios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mun_fkestado', 'mun_municipio'], 'required'],
            [['mun_fkestado'], 'integer'],
            [['mun_municipio'], 'string', 'max' => 49],
            [['mun_fkestado'], 'exist', 'skipOnError' => true, 'targetClass' => CatEstados::className(), 'targetAttribute' => ['mun_fkestado' => 'est_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mun_id' => 'Id',
            'mun_fkestado' => 'Estado',
            'mun_municipio' => 'Municipio',
            'estadoNombre' => 'Estado',
        ];
    }

    /**
     * Gets query for [[CatCps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatCps()
    {
        return $this->hasMany(CatCp::className(), ['cp_fkmunicipio' => 'mun_id']);
    }

    /**
     * Gets query for [[MunFkestado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMunFkestado()
    {
        return $this->hasOne(CatEstados::className(), ['est_id' => 'mun_fkestado']);
    }

    public function getEstadoNombre()
    {

        return $this->munFkestado->est_estado;
    }
    public static function getMunicipiosList($est_id)
    {
        $MunicipiosList = self::find()
            ->select(['mun_id', 'mun_municipio'])
            ->where(['est_id' => $est_id])
            ->asArray()
            ->all();
        return  $MunicipiosList;
    }

    public static function map()
    {
        return ArrayHelper::map(CatMunicipios::find()->all(), 'mun_id', 'mun_municipio');
    }
}
