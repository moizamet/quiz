<?php

class page_index extends Page
{
	public $title="Moiz Amet";
	function init()
	{
		parent::init();
		$form=$this->add('Form');
		$form->addField('Line','ull','Enter Page name')->validateNotNull();
		$form->addSubmit('Search')->addClass('atk-size-mega atk-swatch-blue ');
		$form->onSubmit(function($form){
			return $this->js()->redirect($this->app->url($form['ull']));
		});
	
		// $this->add('Button');
		// $this->add('P')->set('hello'.$_GET['$text']);
	}
}

