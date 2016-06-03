<?php

class page_followers extends page_twitterApp
{	public $title="My Followers";
	function init()
	{
		parent::init();

		$view=$this->add('View_Lister_Followers',['tag'=>'follower']);
		// $view=$this->add('CRUD');
		// throw new Exception($this->app->auth->model->id, 1);
		
		$model_follower=$this->add('Model_Follow')->addCondition('following_id',$this->app->auth->model->id);
		
		$view->setModel($model_follower);
	}
	// function defalutTemplate()
	// {
	// 	return (['mainTweeter']);
	// }
}
