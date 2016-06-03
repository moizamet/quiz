<?php

class page_following extends page_twitterApp
{	public $title="I am Following";
	function init()
	{
		parent::init();

		$view=$this->add('View_Lister_Followers',['tag'=>'following']);
		// $view=$this->add('CRUD');
		// throw new Exception($this->app->auth->model->id, 1);
		
		$model_follower=$this->add('Model_Follow')->addCondition('follower_id',$this->app->auth->model->id);
		
		$view->setModel($model_follower);
	}
	// function defalutTemplate()
	// {
	// 	return (['mainTweeter']);
	// }
}
