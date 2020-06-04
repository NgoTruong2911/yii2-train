<?php

namespace frontend\controllers;

use app\models\User;
use frontend\models\LoginForm;
use Yii;

class LoginController extends \yii\web\Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            
            return $this->redirect('success');
        }
        $model = new LoginForm();
        if($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->redirect('success');
        }
        $model->password_hash = '';
        return $this->render('login',compact('model'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('login');
    }

    public function actionSuccess()
    {
        return $this->render('success');
    }

}
