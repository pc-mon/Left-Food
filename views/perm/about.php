<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'الطلبات';
$this->params['breadcrumbs'][] = $this->title;
 $uid = \yii::$app->user->id;
?>
 
 

<div class="row">
    <div class="col-md-4">
        <ul class="list-group">
            <?php
            foreach (\app\models\requests::find()->leftJoin('regionperm', 'rid=region')->where(['regionperm.uid'=>$uid])->orderBy('finished')->all() as $k) {
                echo "<li class=\"list-group-item \"><a style='width:100%' class='btn ".($k->finished>0?' btn-success':' btn-danger')." link' href='" . yii\helpers\Url::to(['perm/abouts/', 'id' => $k->id]) . "'>{$k->title}</a></li>";
            }
            ?>
        </ul>
    </div>
    <div class="col-md-6" id="users">

    </div>
</div>


<?php $this->registerJs(' 
         $(".link").click(function(){
            $.get($(this).attr("href") ,function(data){
                $("#users").html(data);
            });
            return false;
         });
         ', yii\web\View::POS_READY); ?>