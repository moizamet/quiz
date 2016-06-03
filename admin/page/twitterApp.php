<?php

class page_twitterApp extends Page
{
	// public $title="User";
	function init()
	{
		parent::init();
       	
        
		$this->app->auth->check();
        // $auth->allowPage('twitter');
        if($this->app->auth->model->loaded())
        {
            $this->js()->univ()->redirect('user',['id'=>$this->app->auth->model['id']]);
        }
		

		$button=$this->add('Button',null,'log');
		$button->addClass('atk-size-reset atk-swatch-ink');


		if ($this->app->auth->model->loaded())
		{
			// $m=$this->add('Menu_Horizontal')->addClass('atk-swatch-blue');
			// $menu=$m->addMenu('user');
			// $menu->addItem('ch',null);
			$this->add('Button',null,'chpass')->set('Change Password')->link($this->app->url('changePassword'))->addClass('atk-size-reset atk-swatch-ink');
		 	$edit=	$this->add('Button',null,'edit')->set('Edit')->addClass('atk-size-reset atk-swatch-ink');
		 	$edit->onClick(function(){
		 		return $this->js()->univ()->frameURL('Update Profile ',$this->app->url('edit'),['width'=>'400']);

		 	});
		 	
			$button->set('Logout')->link('/logout');
			$this->add('Button',null,'profile')->set('Profile')->addClass('atk-size-reset atk-swatch-ink')->link('user',['id'=>$this->app->auth->model->id]);
		}
		else
		{
			$button->set('Login')->link('tweetaccount');	
			$this->add('Button',null,'profile')->set('Create Account')->addClass('atk-size-reset atk-swatch-ink')->link('tweetaccount');

		}


		
	}

	function defaultTemplate()
	{
		return (['mainTweeter']);
	}
}