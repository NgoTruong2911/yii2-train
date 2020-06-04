<?php

namespace frontend\modules\news\controllers;

use frontend\models\News;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Default controller for the `management` module
 */
class NewsController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function beforeAction($action)
    {
        if(!Yii::$app->user->identity){
            Yii::$app->session->setFlash('error', "Please login");
            return $this->redirect('login/login');
        }
        return parent::beforeAction($action);

    }
    

    public function actionIndex()
    {
        $user_logged_in_id = Yii::$app->user->identity->id;
        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->where(['author' => $user_logged_in_id]),
        ]);
        return $this->render('index',['dataProvider' => $dataProvider]);
    }
}
