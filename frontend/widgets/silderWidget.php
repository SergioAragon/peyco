<?php 
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\html;
use frontend\models\Producto;
/**
* 
*/
class silderWidget extends Widget
{
	public $message;

	public function init()
	{
        parent::init();

	}

	public function run()
	{
		$producto = new Producto();

		$producto=$producto->getDataProductos();
		return $this->render('silderWidget', ['data'=>$producto]);
	}


}
?>