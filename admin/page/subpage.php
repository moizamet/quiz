<?php



class page_subpage extends Page
{
	public $title="Moiz";
	function init()
	{
		parent::init();
		$m=$this->add('Menu_Horizontal')->addMenu('Main Menu');

		$m->addMenuItem('Student');



		$this->add('Button')->set('Next Page')->link($this->api->url('./subpage2'));

		
	}

function page_subpage2 ()
{
	$this->add('P')->set('It is a subpage');
	$this->add('Button')->set('Next subpage')->link($this->api->url('../subpage3'));
}

function page_subpage3 ()
{
	$this->add('View_Info')->set('It is another subpage');
	$this->add('Button')->set('Main Page')->link($this->api->url('..'));
}
}
