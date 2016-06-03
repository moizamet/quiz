<?php

class View_TweetUser extends View
{
	function init()
	{
		parent::init();

		// $this->template->trySet('tweetpath',$this->app->url('tweet_tweets'));
		
		$this->add('Button',null,'trend')->addClass('atk-size-kilo atk-shape-circle atk-swatch-green')->set('See Trend')->link($this->app->url('tweet_tweets'));
		$this->add('Button',null,'followers')->addClass('atk-size-reset atk-swatch-ink')->set('See Followers')->link($this->app->url('followers'));
		$this->add('Button',null,'following')->addClass('atk-size-reset atk-swatch-ink')->set('See Following')->link($this->app->url('following'));
		
	}
	function setModel($m)
	{
		parent::setModel($m);
		if ($this->model->id==$this->app->auth->model->id)
		{
		$this->add('Button',null,'message')->set('Message')->addClass('atk-swatch-ink atk-size-reset')->link($this->app->url('usermessage'));

		}
		else
		{
		$this->add('Button',null,'message')->set('Message')->addClass('atk-swatch-ink atk-size-reset')->link($this->app->url('message',['toid'=>$this->model->id]));
		}

	}

	function defaultTemplate()
	{
		return (['tweetUser']);
	}
}