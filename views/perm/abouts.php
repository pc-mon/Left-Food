
<table class="table table-bordered"> 
    <tr>
        <th>
            العنوان
        </th>
        <td>
            <?= $abouts->title ?>
        </td>
    </tr>
    <tr>
        <th>
            التفاصيل
        </th>
        <td>
            <?= $abouts->desc ?>
        </td>
    </tr>
    <tr>
        <th>
            الطعام
        </th>
        <td>
            <?= $abouts->foods ?>
        </td>
    </tr>
    <tr>
        <th>
            الاميل
        </th>
        <td>
            <?= $abouts->email ?>
        </td>
    </tr>
    <tr>
        <th>
            الجوال
        </th>
        <td>
            <?= $abouts->mobile ?>
        </td>
    </tr>
    <tr>
        <th>
            موقع الطعام
        </th>
        <td>
            <?= $abouts->address ?>
        </td>
    </tr>
    <tr>
        <th>
            المنطقه
        </th>
        <td>
            <?= $abouts->region ?>
        </td>
    </tr>
    <tr>
        <th>
            التاريخ و الوقت
        </th>
        <td>
            <?= $abouts->created ?>
        </td>
    </tr>
</table>
<?= $abouts->finished < 1?
\yii\helpers\Html::a('إنتهاء الطلب', yii\helpers\Url::to(['perm/about/', 'done' => $abouts->id]), array('class'=>'btn bnt-success')):'تم الموفقة من عن طريق : '.app\models\User::findOne(['id'=>$abouts->finished])->username
?>