<?php

class page_np1 extends Page
{
	public $title="My page 1";
	function init()
	{
		parent::init();
		$this->add('View')->set('This is my first page');
		$this->add('Button')->set("Next Page")->link('np2');
		$this->api->menu->addMenuItem('np2','Next Page');

		$mm=$this->add('Menu_Horizontal');
		
		$sm=$mm->addMenu('submenue');
		$sm->addMenuItem('np1','SubSub menu');



       


	}
}