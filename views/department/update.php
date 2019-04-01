<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Department',
]) . ' ' . $model->departmentid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->departmentid, 'url' => ['view', 'id' => $model->departmentid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'schools' =>$schools
    ]) ?>

</div>
