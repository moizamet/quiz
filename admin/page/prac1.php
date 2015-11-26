<?php

class page_prac1 extends Page
{
	public $title="Practice Link";

	function init()
	{
		parent::init();
		$this->add('P')->set('I am doing practice');
		$this->add('Button')->link("tutjava");
	}
}