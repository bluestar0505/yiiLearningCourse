<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\School;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\Course */

$this->title = $model->courseid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->courseid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->courseid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'courseid',
            'coursename',
            [
                'label' => 'School Name',
                'value' => School::findOne(['schoolid'=>$model->schoolid])->schoolname
            ],
            [
                'label' => 'Department Name',
                'value' => Department::findOne(['departmentid'=>$model->departmentid])->departmentname
            ],
            'uploadtime',
            'modifytime',
        ],
    ]) ?>

</div>
