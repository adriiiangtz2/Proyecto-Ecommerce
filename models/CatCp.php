<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_cp".
 *
 * @property int $cp_id Id
 * @property int $cp_fkmunicipio Municipio
 * @property int $cp_fkestado Estado
 * @property int $cp_cp Código Postal
 * @property string $cp_colonia Colonia
 *
 * @property CatEstados $cpFkestado
 * @property CatMunicipios $cpFkmunicipio
 * @property Domicilio[] $domicilios
 */
class CatCp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_cp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cp_id', 'cp_fkmunicipio', 'cp_fkestado', 'cp_cp', 'cp_colonia'], 'required'],
            [['cp_id', 'cp_fkmunicipio', 'cp_fkestado', 'cp_cp'], 'integer'],
            [['cp_colonia'], 'string', 'max' => 60],
            [['cp_id'], 'unique'],
            [['cp_fkmunicipio'], 'exist', 'skipOnError' => true, 'targetClass' => CatMunicipios::className(), 'targetAttribute' => ['cp_fkmunicipio' => 'mun_id']],
            [['cp_fkestado'], 'exist', 'skipOnError' => true, 'targetClass' => CatEstados::className(), 'targetAttribute' => ['cp_fkestado' => 'est_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cp_id' => 'Id',
            'cp_fkmunicipio' => 'Municipio',
            'cp_fkestado' => 'Estado',
            'cp_cp' => 'Código Postal',
            'cp_colonia' => 'Colonia',
        ];
    }

    /**
     * Gets query for [[CpFkestado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCpFkestado()
    {
        return $this->hasOne(CatEstados::className(), ['est_id' => 'cp_fkestado']);
    }

    /**
     * Gets query for [[CpFkmunicipio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCpFkmunicipio()
    {
        return $this->hasOne(CatMunicipios::className(), ['mun_id' => 'cp_fkmunicipio']);
    }

    /**
     * Gets query for [[Domicilios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDomicilios()
    {
        return $this->hasMany(Domicilio::className(), ['dom_fkcp' => 'cp_id']);
    }   
}
