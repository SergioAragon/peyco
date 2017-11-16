<?php

/* @var $this yii\web\View */
 
use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\base\model;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <div class="site-about"> -->
    <div>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>This is the About page. You may modify the following file to customize its content:</p>

    <!-- <code><= //__FILE__ ></code> -->

    <!-- <body class=" = \dmstr\helpers\AdminLteHelper::skinClass() -->
    <!--?php $this->beginBody() ?-->
    <!-- <div class="wrapper"> -->
	<div>
        <!--?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?-->

        <!--?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?-->
		<?=Html::a('Ayuda', ['/archivos/ayudausuarios'] ) ?><br>
		
        <!--?= $this->render(
        	// '/../web/archivos/ayudausuarios.pdf'
            // ['content' => $content, 'directoryAsset' => $directoryAsset]
            Html::encode('/../web/archivos/ayudausuarios.pdf')
        ) ?-->

        
    </div>

    <!--?php $this->endBody() ?-->

    <!-- </body> -->

</div>
