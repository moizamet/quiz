<?php

class page_np2 extends Page
{
	public $title="My page 2";
	function init()
	{
		parent::init();
		$this->add('View')->set('This is my second page');
	}
}