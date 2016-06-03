<?php

class View_Lister_Message extends View
{
	public $remove;
	function init()
	{
		parent::init();

		// $this->remove=$this->add('Button',null,'removebtn')->set(['Remove','icon'=>'trash'])->addClass('atk-swatch-red atk-size-reset');
	}

	function setModel($m)
	{
		parent::setModel($m);

		if ($this->model['msgfrom_id']==$this->app->auth->model->id)
		{
			$this->template['sender_name']="You ";
			$this->template['you']=" ";

		}
		else
		{
			$this->template['sender_name']=$this->model['msgfrom'];
			$this->template['other']=" ";

		}
	}

	function defaultTemplate()
	{
		return (['message']);
	}
}