<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Course'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'courseid',
            'coursename',
            [
                'attribute' => 'schoolid',
                'value' => 'school.schoolname'
            ],
            [
                'attribute' => 'departmentid',
                'value' => 'department.departmentname'
            ],
            'uploadtime',
            // 'modifytime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
