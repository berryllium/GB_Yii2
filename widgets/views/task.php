<?php

use \yii\helpers\Html;

?>

<?= Html::beginTag('a', ['class' => 'card', 'href' => "task/card?id=$id"]); ?>
<?= Html::tag('h3', $title , ['class' => 'title']); ?>
<?= Html::tag('p', $description , ['class' => 'description']); ?>
<?= Html::tag('p', $creator_id , ['class' => 'creator_id']); ?>
<?= Html::endTag('a'); ?>

