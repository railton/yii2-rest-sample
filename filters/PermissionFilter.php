<?php

namespace app\filters;


use Yii;
use yii\base\ActionFilter;
use yii\web\BadRequestHttpException;

class PermissionFilter extends ActionFilter
{
    public function beforeAction($action)
    {
        $allow =  Yii::$app->user->id == 100 ? true : false;

	    if($allow){
	    	return true;
	    }else{
	    	throw new \yii\web\UnauthorizedHttpException('You are not allowed to access this page');
	    }

	    // or
	    // $controllerId = Yii::$app->controller->id;
	    if($action->id == 'index'){
	    	return true;
	    }else{
	    	throw new \yii\web\UnauthorizedHttpException('You are not allowed to access this page');
	    }
    }
}