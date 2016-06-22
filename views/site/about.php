<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

foreach ($requests->find()->all() as $v) echo "{$v->id} - {$v->title} - {$v->email} - {$v->mobile}<br/>";;
?>
 
