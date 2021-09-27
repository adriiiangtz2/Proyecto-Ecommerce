<?php

namespace app\models;

use Yii;

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
            [['mun_id', 'mun_fkestado', 'mun_municipio'], 'required'],
            [['mun_id', 'mun_fkestado'], 'integer'],
            [['mun_municipio'], 'string', 'max' => 49],
            [['mun_id', 'mun_fkestado'], 'unique', 'targetAttribute' => ['mun_id', 'mun_fkestado']],
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
}
