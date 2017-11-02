<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use frontend\views\site\view;
//use backend\models\Clientes;


/* @var $this yii\web\View */
/* @var $model backend\models\Pedido */

// $this->title = $model->id;
// $this->title = $model->nombres;

$this->title = $model->id_pedido;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pedido-view">

    <h2><?= $id = Yii::$app->user->identity->nombres; ?></h2>
        
    <?= DetailView::widget([
        
        'model' => $model,
        'attributes' => [
            'id_pedido',
            'cliente_id',
            //'fecha_pedido',
            //'estado_id',
            'municipio_id',
            'direccion',
            'medidas',
        ],

    ]) ?>

</div>
