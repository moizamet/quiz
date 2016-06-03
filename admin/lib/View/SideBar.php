<?php

class View_SideBar extends View
{
	public $view;
	function init()
	{
		parent::init();
		if ($this->app->auth->model->loaded())
		{
		// $this->view=$this->add('View',null,'notification');
		// $this->view->addClass('atk-box');

		$modelsocial=$this->add('Model_Social')->addCondition('userid',$this->app->auth->model->id);
		$modelsocial->addCondition('notification',true);
		$notification=$this->add('View_Notification',['label'=>'See all Notifications'],'notification')->setModel($modelsocial);

		}
		$form=$this->add('Form',null,'searchbtn');
		$form->addField('Line','person','');
		$form->addSubmit('Search Person')->addClass('atk-swatch-ink');
		$form->onSubmit(function($form){
			return $this->js()->redirect($this->app->url('findpeople',['person'=>$form['person']]));
		});




	}

	// function formatRow($m)
	// {
	// 	paretn::formatRow($m);
	// 	if ($this->model['like']==true)
	// 	{
	// 		$text=$this->model['username'].' Like your Tweet';
	// 		$this->view->add('View')->set($text);
	// 	}
		

	// }

	function defaultTemplate()
	{
		return (['sidebar']);
	}
}