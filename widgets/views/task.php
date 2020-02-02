<?php

use \yii\helpers\Html;
use \yii\helpers\Url;

$url = Url::toRoute(['task/update', 'id' => $id]);

switch ($status) {
  case 1: {
      $status = 'bg-warning';
      break;
    }
    case 2: {
      $status = 'bg-success';
      break;
    }
    default: {
      $status = '';
    }
}
?>

<?= Html::beginTag('a', ['class' => "card $status", 'href' => $url]); ?>
<?= Html::tag('h3', $title, ['class' => 'title']); ?>
<?= Html::tag('p', $description, ['class' => 'description']); ?>
<?= Html::tag('p', $creator_id, ['class' => 'creator_id']); ?>
<?= Html::endTag('a'); ?>

