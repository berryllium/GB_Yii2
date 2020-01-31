<?php 

use app\widgets\Task;
use \yii\helpers\Html;

echo Task::widget([
    'id' => $model->id,
    'title' => $model->title,
    'description' => $model->description,
    'status' => $model->status->status,
]);