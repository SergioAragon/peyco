<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pedido;

/**
 * PedidoSearch represents the model behind the search form about `backend\models\Pedido`.
 */
class PedidoSearch extends Pedido
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pedido', 'cliente_id', 'estado_id', 'municipio_id'], 'integer'],
            [['fecha_pedido', 'direccion', 'medidas'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pedido::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pedido' => $this->id_pedido,
            'cliente_id' => $this->cliente_id,
            'fecha_pedido' => $this->fecha_pedido,
            'estado_id' => $this->estado_id,
            'municipio_id' => $this->municipio_id,
        ]);

        $query->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'medidas', $this->medidas]);

        return $dataProvider;
    }
}
