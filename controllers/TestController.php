<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;


class TestController extends DefaultController
{
	public function actionIndex()
    {
    	return ['234'];
    }
}	