<?php

class page_views extends Page
{
	public $title="My page 3";
	function init()
	{
		parent::init();
		$this->add('View')->set('This is my third page');
	}
}