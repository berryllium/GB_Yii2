<?php

namespace app\components;

use yii\base\Component;
use app\models\tables\Tasks;
use app\models\tables\Users;
use Yii;
use yii\base\BootstrapInterface;
use yii\base\Event;

class Bootstrap extends Component implements BootstrapInterface {
  public function bootstrap($app) {
    
    $model = new Tasks;
   Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT, function ($event) {
     $task = $event->sender;
     $mailto = Users::findOne($task->responsible_id)->email;
     $subj = $task->title;
     $text = $task->description;
    Yii::$app->mailer->compose()
    ->setFrom('from@domain.com')
    ->setTo($mailto)
    ->setSubject($subj)
    ->setTextBody($text)
    ->setHtmlBody($text)
    ->send();
  });
  }
}