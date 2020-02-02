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
    Yii::$app->mailer->compose()
    ->setFrom('from@domain.com')
    ->setTo('to@domain.com')
    ->setSubject('Тема сообщения')
    ->setTextBody('Текст сообщения')
    ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
    ->send();

      // $mail = $event->sender;
      // $to = Users::findOne($mail->responsible_id)->email;
      // Yii::$app->mailer->compose()
      //     ->setFrom('from@domain.com')
      //     ->setTo($to)
      //     ->setSubject($mail->title)
      //     ->setTextBody("<b>$mail->description</b")
      //     ->send();
  });
  }
}