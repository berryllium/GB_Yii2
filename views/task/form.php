<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creator_id')->dropDownList(ArrayHelper::map($model->creators, 'id', 'name'), ['prompt' => 'Выберите автора']) ?>

    <?= $form->field($model, 'responsible_id')->dropDownList(ArrayHelper::map($model->responsibles, 'id', 'name'), ['prompt' => 'Выберите исполнителя']) ?>

    <?= $form->field($model, 'deadline')->widget(DatePicker::class, [
        'name' => 'check_issue_date',
        'value' => date('yyyy-mm-dd', strtotime('+2 days')),
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]); ?>

    <?= $form->field($model, 'status_id')->dropDownList(ArrayHelper::map($model->statuses, 'status', 'description'), ['prompt' => 'Выберите статус']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>