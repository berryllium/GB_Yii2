<?php

namespace app\models\tables;

use Yii;
use yii\imagine\Image;

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
 * @property string|null $image
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
            [['image'], 'image']
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
            'image' => 'Фото'
        ];
    }
    public function upload() {
        $filepath = Yii::getAlias("@app/web/images/{$this->image->name}");
        $this->image->saveAs($filepath);
        Image::thumbnail($filepath, 150, 150)
            ->save(Yii::getAlias("@app/web/images/small/{$this->image->name}"));
        $this->image = $this->image->name;
        $this->save();
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
