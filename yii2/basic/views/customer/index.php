<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\customer\SearchCustomer */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this -> title = 'Customers';
$this -> params['breadcrumbs'][] = $this -> title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this -> title) ?></h1>
    <?php echo $this -> render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'firstname',
            'address',
            'zip',
            [
                'label' => 'Country',
                'value' => function ($model) {
                    die(var_dump($model -> country));
                    //return $model -> country -> name;
                }
            ],
            [
                'label'  => 'Orders',
                'format' => 'html',
                'value'  => function ($model) {
                    return Html::a('View Orders', ['../order/?SearchOrder[customer_id]=' . $model -> id], ['class' => 'btn btn-success']);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?></div>
