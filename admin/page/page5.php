<?php

class page_page5 extends Page
{
	public $title='news';
	public $txt='Moiz';

	function init()
	{
		parent::init();
		$this->myfunction('Hello');
	}

function myfunction($txt)
{
	$this->add('Button')->set($txt);
}


}





