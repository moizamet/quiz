<?php

class page_edittweet extends page_twitterApp
{	public $title=" ";
	function init()
	{
		parent::init();

		$tweet_id=$this->app->stickyGET('tweetrid');
		
		
		$model_tweet=$this->add('Model_Tweet')->addCondition('id',$tweet_id);
		$model_tweet->tryLoadAny();
		$this->add('View_EditTweet',['tweet_id'=>$tweet_id])->setModel($model_tweet);
		
	}
	
}
