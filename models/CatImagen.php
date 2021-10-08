<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_imagen".
 *
 * @property int $ima_id Id
 * @property string $ima_url Url
 * @property int $ima_fkproducto Producto
 *
 * @property Producto $imaFkproducto
 */
class CatImagen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_imagen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ima_url', 'ima_fkproducto'], 'required'],
            [['ima_fkproducto'], 'integer'],
            [['ima_url'], 'string', 'max' => 50],
            [['ima_fkproducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['ima_fkproducto' => 'pro_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ima_id' => 'Id',
            'ima_url' => 'Url',
            'ima_fkproducto' => 'Producto',
        ];
    }

    /**
     * Gets query for [[ImaFkproducto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImaFkproducto()
    {
        return $this->hasOne(Producto::className(), ['pro_id' => 'ima_fkproducto']);
    }
}
