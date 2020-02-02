<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int|null $creator_id
 * @property int|null $responsible_id
 * @property date|null $deadline
 * @property int|null $status_id
 * @property Status $status
 * @property Users $creator
 * @property Users $responsible
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['creator_id', 'responsible_id', 'status_id'], 'integer'],
            [['deadline'], 'date', 'format' => 'yyyy-mm-dd'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'creator_id' => 'Автор',
            'responsible_id' => 'Ответственный',
            'deadline' => 'Срок',
            'status_id' => 'Статус',
        ];
    }
    public function getStatus() {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }
    public function getCreator() {
        return $this->hasOne(Users::class, ['id' => 'creator_id']);
    }
    
    public function getResponsible() {
        return $this->hasOne(Users::class, ['id' => 'responsible_id']);
    }

    public function getCreators() {
        return Users::find()->select(['id', 'name'])->asArray()->all();
    }

    public function getResponsibles() {
        return Users::find()->select(['id', 'name'])->asArray()->all();
    }

    public function getStatuses() {
        return Status::find()->select(['status', 'description'])->asArray()->all();
    }


}
