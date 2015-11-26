<?php

class page_exerciseColor extends Page
{
	public $title="Color";
	function init()
	{
		parent::init();
		$this->add('P')->set('Select color');
		$form=$this->add('Form');

		$form->addField("Dropdown","select_color")->setValueList(['red'=>'Strawberry', 'green'=>'Lime', 'blue'=>'Sky']);
    $form->addSubmit("Submit");
    $this->add('Button')->set("Not Now");
    $form->onSubmit(function($form){

    	return $this->app->js()->redirect(null,['color'=>$form["select_color"]]);
    });

	if($_GET['color']){
	    $this->add('View')->addClass('atk-box-large atk-swatch-'.$_GET['color']);
	}

    
	}
}