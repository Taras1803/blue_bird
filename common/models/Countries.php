<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%countries}}".
 *
 * @property integer $id
 * @property string $de
 * @property string $en
 * @property string $ru
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%countries}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['de', 'en', 'ru'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'de' => 'De',
            'en' => 'En',
            'ru' => 'Ru',
        ];
    }

    public static function getCountries()
    {
        $lang = Lang::getCurrent();
        $countries = Countries::find()->orderBy([$lang->url => SORT_ASC])->all();
        $data = [];

        $data[2] = Countries::findOne(2)->{$lang->url};
        $data[1] = Countries::findOne(1)->{$lang->url};
        foreach ($countries as $country)
            if($country->id == 1 || $country->id == 2){

            } else
                $data[$country->id] = $country->{$lang->url};

        return $data;
    }

    public static function getCountriesName()
    {
        $countries = Countries::find()->orderBy(['ru' => SORT_ASC])->all();
        $data = [];
        foreach ($countries as $country)
            $data[$country->ru] = $country->ru;

        return $data;
    }

    public static function getCountry($id)
    {
        $lang = Lang::getCurrent();
        $country = Countries::find()->where(['id' => $id])->one();
        return $country->{$lang->url};
    }
}
