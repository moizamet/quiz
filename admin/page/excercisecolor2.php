<?php

class page_excercisecolor2 extends Page
{
	public $title="Color page 2";

	function init()
	{
		parent::init();
		$this->add('View')->addClass('atk-box-large atk-swatch-'.$_GET['color']);

	}
}