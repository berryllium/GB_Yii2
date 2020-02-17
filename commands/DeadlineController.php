<?php

namespace app\commands;
use yii\console\Controller;
use yii\console\ExitCode;
use app\models\tables\Tasks;

class DeadlineController extends Controller {
  public function actionIndex($time = 24) {
    if (Tasks::sendMailExpiringTasks($time)) {
      echo 'Рассылка проведена';
      return ExitCode::OK;
    } else {
      $this->stderr('Не удалось отправить сообщение. Error: ' . ExitCode::getReason(ExitCode::IOERR));
      return ExitCode::IOERR;
    }
  }

}