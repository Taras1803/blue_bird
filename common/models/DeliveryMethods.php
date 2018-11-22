<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%delivery-methods}}".
 *
 * @property int $id
 * @property string $slug
 * @property string $title_ru
 * @property string $title_uk
 * @property string $descriptio_ru
 * @property string $descriptio_uk
 */
class DeliveryMethods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%delivery_methods}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug'],'unique'],
            [['slug', 'title_ru', 'title_uk'], 'required'],
            [['descriptio_ru', 'descriptio_uk'], 'string'],
            [['slug', 'title_ru', 'title_uk'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Ключ',
            'title_ru' => 'Заголовок на русском',
            'title_uk' => 'Заголовок на украинском',
            'descriptio_ru' => 'Описание на русском',
            'descriptio_uk' => 'Описание на украинском',
        ];
    }

    static function getMethods()
    {
        $data = [];
        $methods = self::find()->all();
        $lang = Lang::getCurrent();
        foreach ($methods as $method)
            $data[$method->slug] = [
                'title' => $method->{'title_' . $lang->url},
                'name' => $method->title_ru,
                'description' => $method->{'descriptio_' . $lang->url},
            ];

        return $data;
    }
}
