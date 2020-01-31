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
        <div class="col-sm-6"><?= $form->field($model, 'creator_id')->dropDownList(ArrayHelper::map($model->creators, 'id', 'name'), ['prompt' => 'Выберите автора']) ?></div>
        <div class="col-sm-6"><?= $form->field($model, 'responsible_id')->dropDownList(ArrayHelper::map($model->responsibles, 'id', 'name'), ['prompt' => 'Выберите исполнителя']) ?></div>
    </div>
    
    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
    
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'status_id')->dropDownList(ArrayHelper::map($model->statuses, 'status', 'description'), ['prompt' => 'Выберите статус']) ?>
        </div>
        
        <div class="form-group col-sm-12">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить задачу?',
                'method' => 'post',
            ],
        ]) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    
</div>