<?php

use app\models\tables\Tasks;
use yii\widgets\ListView;
use yii\helpers\Html;

$months = [
  '1' => Yii::t('app', 'm_1'),
  '2' => Yii::t('app', 'm_2'),
  '3' => Yii::t('app', 'm_3'),
  '4' => Yii::t('app', 'm_4'),
  '5' => Yii::t('app', 'm_5'),
  '6' => Yii::t('app', 'm_6'),
  '7' => Yii::t('app', 'm_7'),
  '8' => Yii::t('app', 'm_8'),
  '9' => Yii::t('app', 'm_9'),
  '10' => Yii::t('app', 'm_10'),
  '11' => Yii::t('app', 'm_11'),
  '12' => Yii::t('app', 'm_12'),
];

$this->registerCssFile('../css/task.css');

echo Html::beginForm('', 'get', ['class' => 'row']);
echo Html::label(Yii::t('app', 'f_month'), 'month', ['class' => 'col-sm-3']);
echo Html::dropDownList('month', '', $months, ['prompt' => Yii::t('app', 'f_month'), 'class' => 'form-control']) . '<br>';
echo Html::submitButton(Yii::t('app', 'confirm'), ['class' => 'btn btn-success']);
echo Html::endForm();

echo ListView::widget([
  'dataProvider' => $dataProvider,
  'itemView' => 'info.php',
  'options' => ['tag' => 'section', 'class' => 'list row'],
  'itemOptions' => ['tag' => false, 'class' => 'list']
]);
