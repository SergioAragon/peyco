<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Clientes */

$this->title = 'Actualizar Datos Cliente: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="clientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    
        
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    		<div class="row">            

                  <div class="col-sm-6"><?= $form->field($model, 'nombres')->textInput(['autofocus' => true]) ?></div>

                 <div class="col-sm-6"><?= $form->field($model, 'apellidos')->textInput() ?></div>

                  <!-- $form->field($model, 'cedula')->textInput() -->

                 <div class="col-sm-6"><?= $form->field($model, 'telefono')->textInput() ?></div>

                 <div class="col-sm-6"><?= $form->field($model, 'username')->textInput() ?></div>

                <div class="col-sm-6"><?= $form->field($model, 'email') ?></div>

                <!-- <div class="col-sm-6">< $form->//field($model, 'password_hash')->passwordInput() ></div> -->

			</div>

                <div class="form-group">
              <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
                </div>


            <?php ActiveForm::end(); ?>
        

</div>
