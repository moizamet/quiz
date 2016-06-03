<?php

class Page_start extends Page
{
	public $title=' ';

	function init()
	{
		parent::init();
	}

	function defaultTemplate()
	{
		return (['start']);
	}
}
