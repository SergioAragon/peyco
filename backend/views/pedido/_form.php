<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Estado;
use backend\models\Municipio;
use backend\models\Clientes;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

  <h1><!-- $id = Yii::$app->user->identity->nombres; --></h1>

  <h3><!--?= $id = Yii::$app->user->identity->nombres .' '. Yii::$app->user->identity->apellidos; ?--></h3>

    <?php $form = ActiveForm::begin(); ?>

    <!-- $form->field($model, 'id_pedido')->textInput() -->

    <!-- $form->field($model, 'fecha_pedido')->textInput() -->

    <!--?= $form->field($model, 'cliente_id')->Input([User::find()->one(), 'id', 'nombres']);  ?-->


    <?= $form->field($model, 'estado_id')->DropDownList(
                                  ArrayHelper::map( Estado::find()->all(), 'id_estado', 'descripcion' ),
                                  [
                                            'prompt'=>'seleccione'

                                  ]
                                  );  ?>

    <?= $form->field($model, 'municipio_id')->DropDownList(
                                  ArrayHelper::map( Municipio::find()->all(), 'id_municipio', 'descripcion' ),
                                  [
                                            'prompt'=>'seleccione'

                                  ]
                                  );  ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'medidas')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
