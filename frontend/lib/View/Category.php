<?php

class View_Category extends View
{
	// function formatRow()
	// {
	// 	parent::formatRow();

	// 	$this->current['caturl']=$this->app->url('questions',['cid'=>$this->model->id]);

	// }

	function init()
	{
		parent::init();
		// $this->model->tryLoadAny();
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