<?php

class page_followers extends Page
{	public $title="";
	function init()
	{
		parent::init();

		// $view=$this->add('View_Lister_Followers');
		$view=$this->add('CRUD');

		$model_follower=$this->add('Model_Follow')->addCondition('following_id',$this->app->auth->model->id);
		$f_j=$model_follower->join('user');
		$f_j->addField('name');
		
		$view->setModel($model_follower);
	}
	function defalutTemplate()
	{
		return (['mainTweeter']);
	}
}
