<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Course */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Course',
]) . ' ' . $model->courseid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->courseid, 'url' => ['view', 'id' => $model->courseid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="course-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'departments'=>$departments
    ]) ?>

</div>
