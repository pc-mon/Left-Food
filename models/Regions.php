<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "regions".
 *
 * @property integer $id
 * @property string $title
 * @property string $per
 */
class Regions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title' ], 'required'],
            [['per'], 'string'],
            [['title'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'التسلسل'),
            'title' => Yii::t('app', 'الاسم'),
            'per' => Yii::t('app', 'الصلاحيات'),
        ];
    }
}