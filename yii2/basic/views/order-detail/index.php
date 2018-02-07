<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\order\SearchOrderDetail */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this -> title = 'Order Details';
$this -> params['breadcrumbs'][] = $this -> title;
?>
<div class="order-detail-index">

    <h1><?= Html::encode($this -> title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'order_id',
            'product_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
