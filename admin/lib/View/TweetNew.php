<?php

class View_TweetNew extends View
{
	function init()
	{
		parent::init();
		//$id=$this->app->recall('uid');
		// throw new Exception($this->app->auth->model->id, 1);
		
		$id=$this->app->auth->model->id;
		$muser=$this->add('Model_User')->tryLoadBy('id',$id);
		// $muser->tryLoadAny();
		$this->template->set('name',$muser['name']);
		$this->template->set('username',$muser['username']);

	 	$form=$this->add('Form');
		$form->addField('Text','message','');
		$form->addField('upload','uploadimage','')->setModel('filestore/File');
		$form->addSubmit(['Post','icon'=>'plus'],null,'post')->addClass('atk-swatch-ink');
		
		if($form->isSubmitted()){
			$msg=$this->add('Model_Tweet');
			$msg['user_id']=$id;
			$msg['date']=date('y-m-d');
			$msg['message']=$form['message'];
			// throw new Exception($form['uploadimage'], 1);
			
			$msg['tweetimage_id']=$form['uploadimage'];
			$msg->save();
			$form->js()->univ()->location($this->api->url(null))->execute();
			// $form->js()->reload()->execute();
		}

		
			
			// if ($form->isSubmit()) 
			// {
			//  $this->js(true)->univ->alert('hello');

			// }

		// $form->onSubmit(function($form)
		// {
		// 	return $this->js(true)->univ->alert('hello');
		// });
	}	
	function defaultTemplate()
	{
		return (['tweetNew']);
	}
}