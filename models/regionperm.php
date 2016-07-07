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
class regionperm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regionperm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rid' ,'uid'], 'required'] 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'التسلسل'),
            'rid' => Yii::t('app', 'المنطقة'),
            'uid' => Yii::t('app', 'المستخدم'),
        ];
    }
    
    function getUser(){
       return $this->hasOne(app\models\User::className(), ['id' => 'uid']);
    }
}