<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tamtable".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string|null $body
 */
class Tamtable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tamtable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'subject'], 'required'],
            [['body'], 'string'],
            [['name', 'email', 'subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'body' => 'Body',
        ];
    }
}
