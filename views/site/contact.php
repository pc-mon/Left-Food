<?php


use yii\widgets\ActiveForm ;
use kartik\select2\Select2;


$r = yii\bootstrap\ActiveForm::begin();

echo $r->field($requests, 'title')->textInput();

echo $r->field($requests, 'desc')->textarea();

echo $r->field($requests, 'address')->textarea();

echo $r->field($requests, 'region')->widget(Select2::classname(), ['data' => array(1,2,3)]);

echo $r->field($requests, 'email')->textInput();

echo $r->field($requests, 'mobile')->textInput();

echo \yii\helpers\Html::submitButton();

yii\bootstrap\ActiveForm::end();
?>




