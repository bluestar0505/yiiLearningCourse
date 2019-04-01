<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\School */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'School',
]) . ' ' . $model->schoolid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Schools'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->schoolid, 'url' => ['view', 'id' => $model->schoolid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="school-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
