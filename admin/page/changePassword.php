<?php

class Page_changePassword extends page_twitterApp
{
	public $title='Change password';

	function init()
	{
		parent::init();

		$user=$this->add('Model_User')->TryloadBy('id',$this->app->auth->model->id);
		$row=$this->add('Columns');
		$col=$row->addColumn(5);
		$form=$col->add('Form');
		$form->addField('password','old_password');
		$form->addField('password','new_password');
		$form->addField('password','confirm_password');
		$form->addSubmit('Change');

		if($form->isSubmitted())
		{
			if ($form['old_password']!=$user['password'])
			{
				$form->displayError('old_password','wrong password ');
			}
			if (strlen($form['new_password'])<=5)
			{
				
				$form->displayError('new_password','character less than 8');
			}
			if ($form['new_password']!=$form['confirm_password'])
			{
				
				$form->displayError('confirm_password','Password not matched ');
			}

			$user['password']=$form['new_password'];
			$user->save();
			$js=[
				$this->js()->univ()->successMessage('password Change Succesfully'),
				$this->js()->redirect('user',['id'=>$this->app->auth->model->id])
			];
			$this->js(null,$js)->execute();			
		}

	}
}