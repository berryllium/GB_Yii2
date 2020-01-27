<?php 

use app\widgets\Task;
use \yii\helpers\Html;

echo Task::widget([
    'id' => $model->id,
    'title' => $model->title,
    'description' => $model->description
]);

echo Html::tag('a', 'Назад', [
  'href' => '/task'
]);
