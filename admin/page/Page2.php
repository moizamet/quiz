<?php
class Page2 extends Page2{
	function init(){
		parent::init;
		$this->('View_Box')->set('new page');
	}
}