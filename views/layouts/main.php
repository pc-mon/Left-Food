<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\authassignment;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
        <link href="css/bootstrap-rtl.min.css" rel="stylesheet">

    </head>
    <body>
<?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'عرب في تركيا',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            $items1 = [
                ['label' => 'الرئيسية', 'url' => ['/site/index']],
                ['label' => 'الطلبات', 'url' => ['/perm/about']],
                ['label' => 'المناطق', 'url' => ['/regions']],
                ['label' => 'صلاحيات المسئولين', 'url' => ['/perm/regionperm']],
                ['label' => 'صلاحيات الصفحات', 'url' => ['/perm/index']],
            ];

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $items1,
            ]);
            $menuItems = array();
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'تسجيل في الموقع', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'تسجيل دخول', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'تسجيل الخروج (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
<?=
Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])
?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; ARinTR.com <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>
<?php
//use app\models\User;
//User::can('/perm/index');
//app\models\auth::can('*');
//echo authassignment::findOne(['user_id'=>Yii::$app->user->id,'item_name'=>'/*'])?'ok':Yii::$app->user->id;
?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
