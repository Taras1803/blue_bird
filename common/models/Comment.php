<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $item_id
 * @property int $item_type
 * @property int $lang_id
 * @property string $comment
 * @property int $created_at
 * @property int $status
 * @property int $user_id
 * @property string $user_name
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%comments}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'item_type', 'lang_id', 'comment', 'created_at', 'user_id'], 'required'],
            [['item_id', 'item_type', 'lang_id', 'status', 'user_id','created_at'], 'integer'],
            [['comment','user_name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'ID элемента',
            'item_type' => 'Тип элемента',
            'lang_id' => 'Язык',
            'comment' => 'Коментарий',
            'status' => 'Статус',
            'user_id' => 'ID Пользователя',
            'user_name' => 'Имя Пользователя',
            'created_at' => 'Дата создания',
        ];
    }

    public static function getStatus()
    {
        return [
            0 => 'Выкл',
            1 => 'Вкл',
        ];
    }

    public static function getTypes()
    {
        return [
            1 => 'Товар',
            2 => 'Новость',
        ];
    }

    public static function getLangs()
    {
        return  ArrayHelper::map(Lang::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'name');
    }
}
