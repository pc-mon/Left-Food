 
<ul class="list-group">
    <?php
    foreach ($users as $k) {
        $un = app\models\User::findOne(['id' => $k->uid])->username;
        echo "<li class=\"list-group-item\">{$un} <a href='" . yii\helpers\Url::to(['perm/regiondel/', 'id' => $k->id]) . "'><span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span></a> </li>";
    }
    ?>
</ul>

