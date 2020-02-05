<?php

use app\models\tables\Tasks;
use yii\widgets\ListView;
use yii\helpers\Html;

$this->registerCssFile('../css/task.css');

echo Html::beginForm('', 'get', ['class' => 'row']);
echo Html::label(Yii::t('app', 'f_month'), 'month', ['class' => 'col-sm-3']);
echo Html::dropDownList('month', '', Tasks::getMonths(), ['prompt' => Yii::t('app', 'f_month'), 'class' => 'form-control']) . '<br>';
echo Html::submitButton(Yii::t('app', 'confirm'), ['class' => 'btn btn-success']);
echo Html::endForm();

echo ListView::widget([
  'dataProvider' => $dataProvider,
  'itemView' => 'info.php',
  'options' => ['tag' => 'section', 'class' => 'list row'],
  'itemOptions' => ['tag' => false, 'class' => 'list']
]);
