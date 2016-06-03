<?php

class page_singletweet extends page_twitterApp
{	public $title=" ";
	function init()
	{
		parent::init();

		$tweet_id=$this->app->stickyGET('tweetid');
		// throw new Exception($tweet_id, 1);
		
		$model_tweet=$this->add('Model_Tweet')->addCondition('id',$tweet_id);
		$model_tweet->tryLoadAny();
		$model_social=$this->add('Model_Social')->addCondition('tweet_id',$tweet_id);
		foreach ($model_social as $value) {
		$m=$model_social->load($value->id);
		$m['notification']=false;
		$m->save();
		}


		if ($model_tweet['user_id']==$this->app->auth->model->id)
		{
			$this->add('View_Lister_UserTweets')->setModel($model_tweet);
		}
		else
		{
			$this->add('View_Lister_Twitter')->setModel($model_tweet);

		}
	}
	function defalutTemplate()
	{
		return (['mainTweeter']);
	}
}
