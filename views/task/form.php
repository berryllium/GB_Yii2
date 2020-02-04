<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form container">
    <h1 class="text-center"><?= $model->title ?></h1>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-6">
            <?= $form->field($model, 'deadline')->widget(DatePicker::class, [
                'name' => 'check_issue_date',
                'value' => date('yyyy-mm-dd', strtotime('+2 days')),
                'options' => ['placeholder' => 'Select issue date ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6"><?= $form->field($model, 'creator_id')->dropDownList(ArrayHelper::map($model->creators, 'id', 'name'), ['prompt' => Yii::t('app', 'sel_author')]) ?></div>
        <div class="col-sm-6"><?= $form->field($model, 'responsible_id')->dropDownList(ArrayHelper::map($model->responsibles, 'id', 'name'), ['prompt' => Yii::t('app', 'sel_resp')]) ?></div>
    </div>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'status_id')->dropDownList(ArrayHelper::map($model->statuses, 'status', 'description'), ['prompt' => Yii::t('app', 'sel_status')]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'image')->fileInput(['value' => 'tsat']) ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12">
            <?= Html::submitButton(Yii::t('app', 'save'), ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('app', 'del'), [Yii::t('app', 'del'), 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'q_del_task'),
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<?= Html::img(Yii::$app->urlManager->createUrl('images/small/' . $model->image)) ?>
</div>