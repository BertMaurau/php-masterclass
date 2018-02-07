<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\order\Order */

$this -> title = $model -> id;
$this -> params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this -> params['breadcrumbs'][] = $this -> title;
?>
<div class="order-view">

    <h1><?= Html::encode($this -> title) ?></h1>

    <?=
    DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'customer_id',
            'date',
        ],
    ])
    ?>

</div>
