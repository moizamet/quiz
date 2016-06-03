<?php

class Page_tweet_tweets extends page_twitterApp
{
	public $title="Home Page";

	function init()
	{
		parent::init();
		
			$this->add('View')->set('Tweets !!')->addClass('atk-size-tera');
			$tweets=$this->add('Model_Tweet')->setOrder('date','desc');
			// $tweets_j=$tweets->join('user');
			// $tweets_j->addField('username');

			$this->add('View_SideBar');
			foreach ($tweets as $tweet)
			 {
				$view=$this->add('View_Lister_Twitter');
				$view->setModel($tweet->newInstance()->load($tweet->id));
			}
			

			// $follow_j=$tweets->join('follow');
			// $view=$this->add('CRUD');
		
	}
	// function defaultTemplate()
	// {
	// 	return (['mainTweeter']);
	// }
}