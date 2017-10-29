<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use frontend\views\site\view;
use backend\models\Clientes;


/* @var $this yii\web\View */
/* @var $model backend\models\Pedido */

// $this->title = $model->id;
// $this->title = $model->nombres;

$this->title = $model->id_pedido;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pedido-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pedido], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        
        'model' => $model,
        'attributes' => [
            'id_pedido',
            //'fecha_pedido',
            //'estado_id',
            'municipio_id',
            'direccion',
            'medidas',
        ],
        

    ]) ?>

</div>
