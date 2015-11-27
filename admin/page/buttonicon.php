<?php

class page_buttonicon extends Page
{
	public $title="My page 3";
	function init()
	{
		parent::init();
		$button=$this->add('Button')->set(['helloq','icon'=>'users']);
		// $button->addClass(atk-fsda)

		$this->add('Button')->set(['other','icon'=>'doc-inv']);
	}
}