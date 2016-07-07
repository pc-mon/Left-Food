<?php

namespace app\controllers;

use Yii;
use app\models\Regions;
use app\models\RegionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\regionperm;

/**
 * RegionsController implements the CRUD actions for Regions model.
 */
class PermController extends Controller {

    function actionIndex() {

        $model = new \app\models\authassignment();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->findOne(
                            [
                                'item_name' => Yii::$app->request->post()['authassignment']['item_name'],
                                'user_id' => Yii::$app->request->post()['authassignment']['user_id']
                            ]
                    ) == false)
            {
            $model->item_name = Yii::$app->request->post()['authassignment']['item_name'];
            $model->user_id = Yii::$app->request->post()['authassignment']['user_id'];
            $model->created_at = new \yii\db\Expression('NOW()');
            $model->save();
            }
        }
        return $this->render('index');
    }

    public function actionPer($id) {
        $this->layout = 'n';

        return $this->render('per', array('authassignments' => \app\models\authassignment::find()->where(['item_name' => $id])->all()));
    }

    public function actionPerdel($item_name, $user_id) {

        \app\models\authassignment::deleteAll(['item_name' => $item_name, 'user_id' => $user_id]);

        $this->goBack('perm/index');
    }

    function actionRegionperm() {

        $model = new regionperm();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
        }
        return $this->render('regionperm', array('regions' => Regions::find()->all()));
    }

    public function actionRegion($id) {
        $this->layout = 'n';

        return $this->render('region', array('users' => regionperm::find()->leftJoin('user', 'uid=user.id')->where(['rid' => $id])->all()));
    }

    public function actionRegiondel($id) {

        regionperm::deleteAll(['id' => $id]);

        $this->goBack('perm/regionperm');
    }

    public function actionAbout($done = 0) {

        if ($done > 0) {
            $r = requests::findOne(['id' => $done]);
            $r->finished = \yii::$app->user->id;

            $r->save();
        }
        return $this->render('about');
    }

    public function actionAbouts($id) {
        $this->layout = 'n';

        return $this->render('abouts', array('abouts' => \app\models\requests::findOne(['id' => $id])));
    }

}
