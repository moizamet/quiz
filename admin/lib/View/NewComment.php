<?php

class View_NewComment extends View
{
	public $tweet_id;
	public $this;
	function init()
	{
		parent::init();

		$form=$this->add('Form');
		$form->addField('Line','comment','')->validateNotNull();
		$form->addSubmit('Comment',null,'post')->addClass('atk-swatch-blue');

		if ($form->isSubmitted())
		{
			$social=$this->add('Model_Social');
			$social['user_id']=$this->app->auth->model->id;
			$social['tweet_id']=$this->tweet_id;
			$social['comment']=$form['comment'];
			$social->save();
			$this->parent->js()->reload()->execute();
		}

	}

	function defaultTemplate()
	{
		return(['newComment']);
	}
}