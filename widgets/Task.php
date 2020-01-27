<?php

namespace app\widgets;

use yii\base\Widget;

class Task extends Widget {
    public $title  = 'title';
    public $description  = 'description';

    public function run() {
        return $this->render('task', [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description
        ]);
    }
}