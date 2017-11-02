<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Formulario de Registro';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Para registrarse por favor ingresar la información solicitada en los campos:</p>

    <div class="row">
        
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                

                  <div class="col-sm-6"><?= $form->field($model, 'nombres')->textInput(['autofocus' => true]) ?></div>

                 <div class="col-sm-6"><?= $form->field($model, 'apellidos')->textInput() ?></div>

                  <!-- $form->field($model, 'cedula')->textInput() -->

                 <div class="col-sm-6"><?= $form->field($model, 'telefono')->textInput() ?></div>

                 <div class="col-sm-6"><?= $form->field($model, 'username')->textInput() ?></div>

                <div class="col-sm-6"><?= $form->field($model, 'email') ?></div>

                <div class="col-sm-6"><?= $form->field($model, 'password')->passwordInput() ?></div>



                <div class="form-group">
              <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
                </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>

