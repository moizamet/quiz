<?php

class View_Category extends View
{
	
	function init()
	{
		parent::init();
		
	}

	function setModel($m)
	{
		parent::setModel($m);
		$btn=$this->add('Button',null,'test')->set('Take Test')->addClass('atk-swatch-green')->link($this->app->url($this->app->url('questions',['cid'=>$this->model->id])));

	}
	
	function defaultTemplate()
	{
		return (['first']);
	}
}