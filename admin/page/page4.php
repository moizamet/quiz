<?php

class page_index extends Page {
	public $title='class & Object';

	function init()
	{
		parent::init();
		$this->add('Text')->set('Testing');
		$this->add('Moiz',['swatch'=>'blue'])->Mcolr();

	}
}

class Moiz extends Button
{
	public $swatch='green';
	function Mcolr()
	{
		
		$this->set('Moiz')->addClass('atk-swatch-'.$this->swatch);
	}

}			