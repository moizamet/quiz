<?php

class index_page extends index_page{
	public $title='class & Object';

	function init()
	{
		parent::init();
		$this->add('Text')->set('Testing');
	}
}