<?php

class View_EditTweet extends View_Lister_UserTweets
{
	public $selfpage;
	public $tweet_id;
	protected $class='Button';
	function init()
	{
		parent::init();
		
		// $this->template->trySet('mymessage','hello');
		$tweet=$this->add('Model_Tweet')->load($this->tweet_id);
		$form=$this->add('Form',null,'mymessage');
		$form->setModel($tweet,['message','date','tweetimage_id']);
		// $form->addField('Date','date',null,'mydate');
		$form->addSubmit(['Post','icon'=>'plus'])->addClass('atk-swatch-ink');
		// $form->addField('Date','date',null,);
		$form->onSubmit(function($form){
			$form->save();
			return $this->js()->redirect($this->app->url('singletweet',['tweetid'=>$this->tweet_id]));
		});
		

	}



	function setModel($m)
	{
		parent::setModel($m);

		// $form->addSubmit('Post',null,'postbtn');


	}

	function defaultTemplate()
	{
		return (['edittweet']);
	}

}