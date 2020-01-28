<?php

use app\models\tables\Tasks;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

$this->registerCssFile('../css/task.css');

$dataProvider = new ActiveDataProvider([
  'query' => Tasks::find(),
  'pagination' => [
      'pageSize' => 5
  ]
]);

echo ListView::widget([
  'dataProvider' => $dataProvider,
  'itemView' => 'info.php',
  'options' => ['tag' => 'section', 'class' => 'list']
]);