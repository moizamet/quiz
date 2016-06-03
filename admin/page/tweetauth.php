<?php

class page_tweetauth extends Page
{
	function init()
	{
		parent::init();

		// $auth=$this->add('Auth');
		// $auth->usePasswordEncryption();
		// $auth->setModel('User','username','password');
		// $auth->check();

		// if($this->app->auth->model->loaded())
		// {
		// 	$this->js()->univ()->redirect('tweetUser',['id'=>$this->app->auth->model['id']]);
		// }

		 $auth=$this->add('Auth');
        $auth->usePasswordEncryption();
        $auth->setModel('User','username','password');
        $auth->check();
        //$auth->allowPage('twitter');
        if($this->app->auth->model->loaded())
        {
            $this->js()->univ()->redirect('user',['id'=>$this->app->auth->model['id']]);
        }

	}
}