<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cat_estados".
 *
 * @property int $est_id Id
 * @property string $est_estado Estado
 *
 * @property CatCp[] $catCps
 * @property CatMunicipios[] $catMunicipios
 */
class CatEstados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_estados';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['est_id', 'est_estado'], 'required'],
            [['est_id'], 'integer'],
            [['est_estado'], 'string', 'max' => 31],
            [['est_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'est_id' => 'Id',
            'est_estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[CatCps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatCps()
    {
        return $this->hasMany(CatCp::className(), ['cp_fkestado' => 'est_id']);
    }

    /**
     * Gets query for [[CatMunicipios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatMunicipios()
    {
        return $this->hasMany(CatMunicipios::className(), ['mun_fkestado' => 'est_id']);
    }

     public static function getMap4(){
        return ArrayHelper::map(CatEstados::find()->all(),'est_id','est_estado'); 
    }
    public static function getEstados(){
        return self::find()->select(['est_estado','est_id'])->indexBy('est_id')->column();
    }   
    public static function sumaid(){

       return self::find()->select(['est_id'=>'( MAX(`est_id`)+ 1) '])->one()->est_id;
       
    }
}
