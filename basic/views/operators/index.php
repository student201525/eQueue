<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OperatorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operators-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--       <?//= Html::a('Create Operators', ['create'], ['class' => 'btn btn-success']) ?>-->
<!--    </p>-->
    <button>Залогиниться</button>
    <button class="btn btn-success">Я всё</button>
    <button>Разлогиниться</button>

<!-- <?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'idUser',
//            'idOperatorWindow',
//            'beginWork',
//            'endWork',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); ?>-->

<table>
    <?php
        $model=\app\models\Tickets::find()
            ->select('numberTicket, createDate, idTicketWindow')
            ->all();
        ?>

    <tr>
        <th><b>Ticket</b></th>
        <th><b>createDate</b></th>
        <th><b>Win</b></th>
    </tr>
    <?php
        if($model)
            foreach ($model as $m) :?>
    <tr>
        <td><?php echo $m->numberTicket;?></td>
        <td><?php echo $m->createDate;?></td>
        <td><?php echo $m->idTicketWindow;?></td>
    </tr>
    <?php endforeach; ?>


</table>
</div>
