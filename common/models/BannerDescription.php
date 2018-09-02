<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%banner_description}}".
 *
 * @property int $id
 * @property int $parent_id
 * @property int $lang_id
 * @property string $title
 * @property string $little_title
 * @property string $description
 * @property string $link_name
 * @property string $link
 */
class BannerDescription extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%banner_description}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'lang_id', 'title'], 'required'],
            [['parent_id', 'lang_id'], 'integer'],
            [['little_title', 'description', 'link_name', 'link'], 'string'],
            [['title','little_title', 'link_name','link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'lang_id' => 'Lang ID',
            'title' => 'Title',
            'little_title' => 'Little Title',
            'description' => 'Description',
            'link_name' => 'Link Name',
            'link' => 'Link',
        ];
    }

    public function getBaner()
    {
        return $this->hasOne(Banner::class, ['id' => 'parent_id']);
    }
}
