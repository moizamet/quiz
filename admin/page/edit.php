<?php

class Page_edit extends Page
{
	 public $title="Edit Pannel ";

	function init()
	{
		parent::init();

		$row=$this->add('Columns');
		$col=$row->addColumn(4);	
		$col->add('View')->set('Edit')->addClass('atk-size-tera');
		$formr=$col->add('Form');
		$Model_User=$this->add('Model_User')->load($this->app->auth->model->id);
		$formr->setModel($Model_User);
		$formr->addSubmit('Save');
		$formr->onSubmit(function($formr){
			$model=$this->add('Model_User')->addCondition('username',$formr['username']);
			$model->tryLoadAny();
			
				if (($model->loaded())and($model->id!=$this->app->auth->model->id))
				{
					throw new Exception('username already exists', 1);
				}
					
				$formr->save();
				return $this->js()->univ()->redirect($this->app->url('user',['id'=>$model->id]));
		});

	}
	// function defaultTemplate()
	// {
	// 	return (['mainTweeter']);
	// }
}