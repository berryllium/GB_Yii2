<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $login
 * @property string $name
 * @property string|null $password
 * @property string $role
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'role'], 'required'],
            [['login', 'name', 'role'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'name' => 'Имя',
            'password' => 'Пароль',
            'role' => 'Категория',
        ];
    }

    public function fields() {
        return [
            'id',
            'username' => 'login',
            'password'
        ];
    }
}
