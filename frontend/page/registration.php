<?php

class page_registration extends Page
{
	public $title="first";
	function init()
	{
		parent::init();

		// $this->add('View_Registration');
		$this->add('View')->set('Welcome to registration page');
		$form=$this->add('Form');
		$mdl=$this->add('Model_Quser');
		$form->setModel('Model_Quser');
		// $form->addField('Name');
		// $form->addField('username');
		// $form->addField('password');
		// $form->addField('Gender');
		$form->addSubmit('Register');
		$form->onSubmit(function () use($form)
		{
			$mdl=$this->add('Model_Quser')->tryLoadAny();
			
			$form->save();

			return $this->js()->univ()->alert('Registered successfully');

		});

		// $Quser=$this->add('Model_Quser');
		

	}
}