<?php

class page_allnotification extends page_twitterApp
{	public $title="My Notifications";
	function init()
	{
		parent::init();

		$view=$this->add('View_Notification');
		$model=$this->add('Model_Social')->addCondition('userid',$this->app->auth->model->id);

		$view->setModel($model);

		
	}
	
}
