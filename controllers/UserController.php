<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\LoginForm;


class UserController extends DefaultController
{
	public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->login())
        {

            if(empty(trim($model->user->accessToken)))
            {

                $model->user->accessToken = \Yii::$app->security->generateRandomString();

                $model->user->save();

            }

            return ['token' => $model->user->accessToken];

        }

        return $model->getErrors();
    }

    public function actionCurrent()
    {
        return Yii::$app->user->identity;
    }
}	