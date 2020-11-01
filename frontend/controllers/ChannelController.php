<?php

namespace frontend\controllers;

use yii\data\ActiveDataProvider;
use common\models\User;
use common\models\Videos;
use yii\web\NotAcceptableHttpException;
use common\models\VideoView;
use common\models\VideoLike;
use common\models\Subscriber;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class ChannelController extends \yii\web\Controller
{
	public function behaviors ()
	{
		return [
			'access'=>[
                'class'=> AccessControl::class,
                'only'=>['subscribe'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ]
                ]
            ],
         ];
	} 

    public function actionView($username)
    {
        $channel= $this->findChannel($username);

        $dataProvider= new ActiveDataProvider([
        	'query' =>Videos::find()->creator($channel->id)->published()
        ]);

       return $this->render('view',[
        	'channel'=>$channel,
        	'dataProvider'=> $dataProvider
        ]);
    }

    public function actionSubscribe($username)
    {
    	$channel =$this->findchannel ($username);

    	$userId= \Yii::$app->user->id;
    	$subscriber= $channel->isSubscribed($userId);
    	if (!$subscriber) {

    		$subscriber =new Subscriber();
	    	$subscriber->channel_id= $channel->id;
	    	$subscriber->user_id= $userId;
	    	$subscriber->created_at =time();
	    	$subscriber->save();
	    	\Yii::$app->mailer->compose([
	    		'html'=>'subscriber-html', 'text'=> 'subscriber-text'], [
	    			'channel'=> $channel,
	    			'user'=> \Yii::$app->user->identity
	    		])
	    	->setFrom(\Yii::$app->params['senderEmail'])
	    	->setTo($channel->email)
	    	->setSubject('You have new subscriber')
	    	->send();

    	} else {
    		$subscriber ->delete();
    	}

    	return $this->renderAjax('_subscribe', [
    		'channel'=> $channel
    	]);

    	
    }


/**
*@param $username
*@throws \yii\web\NotFoundHttpException
*/

protected function findChannel($username)
{
	$channel= User::findByUsername($username);
        if (!$channel) {
        	throw new NotFoundHttpException("Channel does not exist");
        }
        return $channel;
}
}

