<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\tables\Tasks;
use app\models\tables\Users;
use app\models\tables\Status;

class DbController extends Controller
{
  public function actionIndex()
  {
    $result = Tasks::findOne(1);
    // var_dump($result->status);
    var_dump($result->creator);
    // var_dump($result->responsible);
    exit;
  }
  public function actionNewTask()
  {
    $task = new Tasks();
    $task->title = 'Знакомство с Yii';
    $task->description = 'Установить фреймворк';
    $task->creator_id = 1;
    $task->responsible_id = 2;
    $task->deadline = date("Y-m-d");
    $task->status_id = 1;

    $task->save();
    echo 'complete';
    exit;
  }
  public function actionNewUser() {
    $user = new Users();
    $user->login = 'admin';
    $user->name = 'admin';
    $user->role = 'admin';
    $user->save();

    $user = new Users();
    $user->login = 'user';
    $user->name = 'Иван';
    $user->role = 'user';
    $user->save();
  }
  public function actionNewStatus() {
    $status = new Status();
    $status->status = 'Success';
    $status->description = 'Успех';
    $status->save();
  }
}
