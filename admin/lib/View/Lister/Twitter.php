<?php

class View_Lister_Twitter extends View_Lister_CommonTweets{
	public $pageself;
	public $like;
	public $share;
	public $follow;
	public $comment;
	protected $class='Button';
	function init()
	{
		parent::init();

		$this->follow=$this->add($this->class,null,'followbtn');
		$this->follow->addClass('atk-size-milli atk-swatch-ink');

	}



	function setModel($m)
	{
		parent::setModel($m);
	
		$this->template->trySet('Followers_check',$this->model['Followings']);
	
		$self=$this;
		$followcheck=$this->add('Model_Follow');
		$followcheck->addCondition('following_id',$this->model['user_id'])->addCondition('follower_id',$this->app->auth->model->id);
		$followcheck->tryLoadAny();
		if ($followcheck->loaded())
		{

			$this->follow->set(['Unfollow','icon'=>'user']);
			$this->follow->addClass('atk-size-milli atk-swatch-blue');
			$this->follow->onClick(function()use($self){
			$followmodel=$this->add('Model_Follow');
			$followmodel->addCondition('following_id',$this->model['user_id']);
			$followmodel->addCondition('follower_id',$this->app->auth->model->id);
			$followmodel->tryLoadAny();
			$followmodel->delete();
			$self->js()->reload()->execute();
		});

		}
		else
		{
			$this->follow->set(['Follow','icon'=>'user']);

			$this->follow->onClick(function()use($self){
			$followmodel=$this->add('Model_Follow');
			$followmodel['following_id']=$this->model['user_id'];
			$followmodel['follower_id']=$this->app->auth->model->id;
			$followmodel->save();
			$self->js()->reload()->execute();
			
		});

		}

		
		
			

		$this->follow->onClick(function(){
			$followmodel=$this->add('Model_Follow');
			$followmodel['following_id']=$this->model['user_id'];
			$followmodel['follower_id']=$this->app->auth->model->id;
			$followmodel->save();
			return;
		});
	}


	
}