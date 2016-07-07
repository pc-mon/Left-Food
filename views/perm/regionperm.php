
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h2 class="panel-title">
                    إعطاء تصريح
                </h2>
            </div>
            <div class="panel-body">
                <?php
                $m = new \app\models\regionperm();
                $a = \yii\widgets\ActiveForm::begin();
                
                echo $a->field($m, 'uid')->widget( \kartik\select2\Select2::classname(),['data'=> yii\helpers\ArrayHelper::map(app\models\User::find()->all(), 'id', 'username')] );
                
                echo $a->field($m, 'rid')->widget( \kartik\select2\Select2::classname(),['data'=> yii\helpers\ArrayHelper::map(app\models\Regions::find()->all(), 'id', 'title')] );
                
                
                echo \yii\helpers\Html::submitButton('حفظ', ['class' => 'btn btn-success']);
                
                \yii\widgets\ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <ul class="list-group">
            <?php
            foreach ($regions as $k) {
                echo "<li class=\"list-group-item\"><a class='link' href='" . yii\helpers\Url::to(['perm/region/', 'id' => $k->id]) . "'>{$k->title}</a></li>";
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
