<?php

namespace frontend\controllers;

class shoppingCartController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    function actionAddCart($id)
    {

echo $id;

    }

}
