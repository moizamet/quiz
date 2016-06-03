<?php

class page_twitter extends Page
{
	public $title="Twitter";

	function init()
	{
		parent::init();



		$this->add('CRUD')->setModel('User');

		$this->add('CRUD')->addClass('atk-push')->setModel('Tweet');

		$this->add('CRUD')->addClass('atk-push')->setModel('Follow');

		$this->add('CRUD')->addClass('atk-push')->setModel('Social');

		// $model=$this->add('Model_Social');
		// $model->addCondition('comment','=',null);
		// $this->add('CRUD')->addClass('atk-push')->setModel($model);

		$this->add('CRUD')->addClass('atk-push')->setModel('Message');

		

	}
}