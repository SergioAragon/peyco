<?php

namespace backend\models;

use Yii;

// use yii\base\NotSupportedException;
 use yii\behaviors\TimestampBehavior;
// use yii\db\ActiveRecord;
 use yii\web\IdentityInterface;
use yii\db\Expression;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $id_pedido
 * @property string $fecha_pedido
 * @property integer $estado_id
 * @property integer $municipio_id
 * @property string $direccion
 * @property string $medidas
 *
 * @property Municipio $municipio
 * @property Estado $estado
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido';
    }


    public function behaviors()
    {
        return [
            [
                  'class' => TimestampBehavior::className(),
                  'createdAtAttribute' => 'fecha_pedido',
                  'updatedAtAttribute' => 'updated_at',
                  'value' => new Expression('NOW()'),
              ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cliente_id', 'fecha_pedido', 'estado_id', 'direccion', 'medidas'], 'required'],
            [['id_pedido', 'cliente_id', 'estado_id', 'municipio_id'], 'integer'],
            [['fecha_pedido'], 'safe'],
            [['direccion', 'medidas'], 'string', 'max' => 20],
            [['municipio_id', 'default' => 1], 'exist', 'skipOnError' => true, 'targetClass' => Municipio::className(), 'targetAttribute' => ['municipio_id' => 'id_municipio']],
            [['estado_id', 'default' => 1], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado_id' => 'id_estado']],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['cliente_id' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pedido' => 'Id Pedido',
            'cliente_id' => 'Cliente ID',
            'fecha_pedido' => 'Fecha Pedido',
            'estado_id' => 'Estado',
            'municipio_id' => 'Municipio',
            'direccion' => 'Direccion',
            'medidas' => 'Medidas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipio::className(), ['id_municipio' => 'municipio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['id_estado' => 'estado_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {

        return $this->hasOne(Clientes::className(), ['id' => 'cliente_id']);
    }

}
