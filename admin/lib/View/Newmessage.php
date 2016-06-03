<?php
class View_Newmessage extends View
{
	public $toid;
	function init()
	{
		parent::init();
		$form=$this->add('Form',null,'messagewrite');
		$form->addField('Text','message');
		$form->addSubmit('Send',null,'send');
		$form->onSubmit(function($form)
		{
			$model=$this->add('Model_Message');
			$model['msgfrom_id']=$this->app->auth->model->id;
			$model['msgto_id']=$this->toid;
			$model['message']=$form['message'];
			$model['to']=$this->toid;
			$model->save();
			return $this->js()->univ()->location($this->app->url(null));
		});

	}
	function defaultTemplate()
	{
		return (['newmessage']);
	}
}