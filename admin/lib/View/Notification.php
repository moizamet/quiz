<?php

class View_Notification extends CompleteLister
{
	public $label="";
	function init()
	{
		parent::init();
		$this->template->trySet('seeall',$this->label);
	}

	function formatRow()
	{
		parent::formatRow();

		if ($this->model['like']==true)
		{
			$text=' Likes your Tweet';
	
		}

		if ($this->model['comment']!=null)
		{
			$text=' Commented on  your Tweet '." \"".$this->model['comment']." \"";
		}
			$this->current_row['noti']=$text;
			$this->current_row['notiurl']=$this->app->url('singletweet',['tweetid'=>$this->model['tweet_id']]);	
		

	}

	function defaultTemplate()
	{
		return (['notification' ]);
	}
}