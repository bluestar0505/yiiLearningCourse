<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\School;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = $model->departmentid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->departmentid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->departmentid], [
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
            'departmentid',
            'departmentname',
            [
                'label' => 'School Name',
                'value' => School::findOne(['schoolid'=>$model->schoolid])->schoolname
            ],
            'uploadtime',
            'modifytime',
        ],
    ]) ?>

</div>
