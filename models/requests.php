<?php

namespace app\models;

use Yii;

class requests extends \yii\db\ActiveRecord {

    public static function tableName() {
        return 'requests';
    }

    public function rules() {
        $rules = parent::rules();
        return [
            [['title', 'desc', 'email','address','mobile','foods'], 'trim'],
            [['title', 'desc', 'email'], 'required'],
            [['region'], 'integer'],
            ['email', 'email']
        ];
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'رقم الطلب'),
            'title' => Yii::t('app', 'العنوان'),
            'desc' => Yii::t('app', 'التفاصيل'),
            'email' => Yii::t('app', 'الاميل'),
            'region' => Yii::t('app', 'المنطقة'),
            'mobile' => Yii::t('app', 'الجوال'),
            'address' => Yii::t('app','العنوان'),
            'foods' => Yii::t('app','فائض الطعام')
        ];
    }

}
