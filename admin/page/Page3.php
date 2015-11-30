<?php

class page_index extends Page 
{
	public $title='Moiz Amet';

	function init()
	{
		parent::init();
		$this->add('Text')->set('page');
		$this->add('Mycl')->Mybutn();

	}


}

class Mycl extends Button
{
	function Mybutn()
	{
		$this->set("in function");
	}
}


