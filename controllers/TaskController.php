<?php

namespace app\controllers;

use app\models\tables\Tasks;
use yii\web\Controller;

class TaskController extends Controller
{
  public function actionIndex()
  {
    return $this->render('index');
  }

  public function actionCard($id) {
    $model = new Tasks();
    $model = $model->findOne(['id' => $id]);
    return $this->render('info', ['model' => $model]);
  }
}