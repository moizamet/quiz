<?php

class Page_tweetaccount extends Page
{
	 public $title=" ";

	function init()
	{
		parent::init();

		$row=$this->add('Columns');
		$col=$row->addColumn(4);
		// $col->add('View')->set('Login')->addClass('atk-size-tera');
		// $form=$col->add('Form')->addClass('atk-push');
		// $form->addField('line','uname','Username');
		// $form->addField('Password','pass','Password');
		// $form->addSubmit('Authenticate');
		// $form->onSubmit(function($form){
		// 	$user=$this->add('Model_User')->addCondition('username',$form['uname']);
		// 	$user_a=$user->addCondition('password',$form['pass']);
		// 	$user_a->tryLoadAny();
		// 	if($user_a->loaded())
		// 	{
		// 		$this->app->memorize('uid',$user_a['id']);
		// 		return $this->js()->univ()->redirect('user',['id'=>$user_a['id']]);
		// 	}
		// 	else
		// 		return $this->add('View_Error')->set('incorrect username or password');
				
				
		// });


		
		
		$col->add('View')->set('Register')->addClass('atk-size-tera');
		$formr=$col->add('Form');
		$Model_User=$this->add('Model_User');
		$formr->setModel($Model_User);
		$formr->addField('upload','profileimage');
		$formr->addSubmit('Register');
		$formr->onSubmit(function($formr){
			$model=$this->add('Model_User')->addCondition('username',$formr['username']);
			$model->tryLoadAny();
				if ($model->loaded())
					throw new Exception('username already exists', 1);
					
				$formr->save();
				return 'user successfully registered !';
		});

	}
	function defaultTemplate()
	{
		return (['mainTweeter']);
	}
}