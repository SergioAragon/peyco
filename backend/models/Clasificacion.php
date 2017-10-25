<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "clasificacion".
 *
 * @property integer $id_clasifi
 * @property string $nombre
 *
 * @property Producto[] $productos
 */
class Clasificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clasificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_clasifi', 'descripcion'], 'required'],
            [['id_clasifi'], 'integer'],
            [['descripcion'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_clasifi' => 'Id Clasifi',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['cod_clasifi' => 'id_clasifi']);
    }
}
