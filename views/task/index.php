<?php

use app\models\tables\Tasks;
use yii\widgets\ListView;
use yii\helpers\Html;

$this->registerCssFile('../css/task.css');

// echo Html::

echo ListView::widget([
  'dataProvider' => $dataProvider,
  'itemView' => 'info.php',
  'options' => ['tag' => 'section', 'class' => 'list row'],
  'itemOptions' => ['tag' => false, 'class' => 'list']
]);