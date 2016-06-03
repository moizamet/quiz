<?php

class View_Lister_UserTweets extends View_Lister_CommonTweets{
	public $selfpage;
	public $like;
	public $share;
	public $remove;
	public $comment;
	public $edit;
	protected $class='Button';
	function init()
	{
		parent::init();
		

	}



	function setModel($m)
	{
		parent::setModel($m);

		if ($this->app->auth->model->id==$this->model['user_id'])
		{
		$this->remove=$this->add($this->class,null,'removebtn');
		$this->remove->addClass('atk-size-milli atk-swatch-red');

		$this->edit=$this->add($this->class,null,'editbtn');
		$this->edit->addClass('atk-size-milli atk-swatch-ink');
		$this->edit->link('edittweet',['tweetrid'=>$this->model->id]);
		
		$this->remove->set(['Remove','icon'=>'trash']);
		$this->edit->set(['edit','icon'=>'edit']);

		
		// $page=$this->selfpage;

		$this->remove->onClick(function(){
			$id=$this->model['id'];
			$modeltweet=$this->add('Model_Social')->addCondition('tweet_id',$id);
			$modeltweet->deleteAll();
			$model=$this->add('Model_Tweet')->load($id);
			// throw new Exception($this->selfpage, 1);
			
			$model->delete();	
			return $this->js()->univ()->location($this->app->url(null))->execute();
		});

		}
		
	}


}