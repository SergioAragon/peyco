<?php

namespace frontend\controllers;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

//     public function actionListbycat()
//     {
// $data = new product();
// $product= $data->getProductByCat($id);
// $pages = $data->getPagerProduct($id);
// return $this->render()

//     }


function actionDetail($id)
{
	echo id;
}

}
