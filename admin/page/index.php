<?php

class page_index extends Page
{
	public $title="use of get";
	function init()
	{
		parent::init();
		$this->add('Button');
		$this->add('P')->set('hello'.$_GET['$text']);
	}
}