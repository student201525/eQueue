<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WindowsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Windows';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="windows-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Windows', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'numberWin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
