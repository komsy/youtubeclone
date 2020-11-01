<?php

namespace common\helpers;


/** @var $channel \common\models\user */
use yii\helpers\Url;

class Html
{
	public static function channelLink($user, $schema= false)
	{
		return \yii\helpers\Html::a($user->username, 
			Url::to([ '/channel/view', 'username' => $user->username
			], $schema), 
			['class'=>'text-dark']);
	}
}