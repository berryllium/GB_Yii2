<?php

namespace app\controllers;

use app\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{
  public function actionIndex()
  {
    $params = [
      'list' => [
        [
          'id' => 1,
          'name' => 'Купить хлеб'
        ],
        [
          'id' => 2,
          'name' => 'Записаться в спортзал'
        ],
        [
          'id' => 3,
          'name' => 'Чуть поспать'
        ],
      ]
    ];
    return $this->render('index', $params);
  }
  public function actionCard($id, $name)
  {
    $model = new Task();
    $model->id = $id;
    $model->name = $name;

    if (!$model->validate()) {
      var_dump($model->getErrors());
      exit;
    }

    $params = [
      'task' => $model
    ];
    return $this->render('card', $params);
  }
  public function actionInfo() {
    $this->render('info');
  }
}