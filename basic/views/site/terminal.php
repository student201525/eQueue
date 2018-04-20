<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OperatorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Terminal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-terminal">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('get Ticket',['/site/window'],['class'=>'btn btn-lg btn-success'])?>
    </p>

</div>
