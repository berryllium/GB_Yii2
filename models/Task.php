<?php
namespace app\models;
use yii\base\Model;

class Task extends Model {
  public $id = 9;
  public $name;

  public function rules()
  {
    return [
      [['id', 'name'], 'required'],
      [['id'], 'number'],
      [['name'], 'string'],
      [['name'], 'myValidate']
    ];
  }

  public function myValidate($attributeName, $params) {
    if (mb_strlen($this->$attributeName) > 20) {
      $this->addError($attributeName, 'Ожидалась строка длиной не более 20 символов!');
    }
  }
}