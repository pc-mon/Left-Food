 
<ul class="list-group">
    <?php
    foreach ($authassignments as $k) {
        $un = app\models\User::findOne(['id' => $k->user_id])->username;
        echo "<li class=\"list-group-item\">{$un} <a href='" . yii\helpers\Url::to(['perm/perdel/', 'user_id' => $k->user_id, 'item_name' => $k->item_name]) . "'><span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span></a> </li>";
    }
    ?>
</ul>

 