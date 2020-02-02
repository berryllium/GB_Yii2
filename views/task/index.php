<?php

use app\models\tables\Tasks;
use yii\widgets\ListView;
use yii\helpers\Html;

$months = [
  '1' => 'январь',
  '2' => 'февраль',
  '3' => 'март',
  '4' => 'апрель',
  '5' => 'май',
  '6' => 'июнь',
  '7' => 'июль',
  '8' => 'август',
  '9' => 'сентябрь',
  '10' => 'октябрь',
  '11' => 'ноябрь',
  '12' => 'декабрь',
];

$this->registerCssFile('../css/task.css');

echo Html::beginForm('', 'get', ['class' => 'row']);
echo Html::label('Фильтровать по месяцу', 'month', ['class' => 'col-sm-3']);
echo Html::dropDownList('month', '', $months, ['prompt' => 'Выберите месяц', 'class' => 'form-control']) . '<br>';
echo Html::submitButton('Применить', ['class' => 'btn btn-success']);
echo Html::endForm();

echo ListView::widget([
  'dataProvider' => $dataProvider,
  'itemView' => 'info.php',
  'options' => ['tag' => 'section', 'class' => 'list row'],
  'itemOptions' => ['tag' => false, 'class' => 'list']
]);
