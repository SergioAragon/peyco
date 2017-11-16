<?php

/* @var $this yii\web\View */
/* @var $model backend\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
// use yii\helpers\Html;
// use yii\widgets\ActiveForm;

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Pedido';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="pedido-form">
    
    <h3><?= $id = Yii::$app->user->identity->nombres .' '. Yii::$app->user->identity->apellidos; ?></h3>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'pedido-form']); ?>

                
                <!--  $form->field($model, 'id_pedido')->textInput() -->

                <!--  $form->field($model, 'fecha_pedido')->textInput()  -->

                 <!-- $form->field($model, 'cliente_id')->textInput() -->

                <?= $form->field($model, 'municipio_id')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'medidas')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
