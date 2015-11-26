<?php

class page_exerciseColor extends Page
{
	public $title="Color";
	function init()
	{
		parent::init();
		$this->add('P')->set('Select color');
		$form=$this->add('Form');

		$form->addField("Dropdown","select_color")->setValueList(['red'=>'Strawberry', 'green'=>'Grass', 'blue'=>'Sky', 'yellow'=>'Banana']);
    $form->addSubmit("Submit");
    $but=$this->add('Button')->set("Not Now");
    $but->onClick(function($but){
    	return $this->js()->univ()->alert("you are leaving this page");
    });

    $form->onSubmit(function($form){

    	//return $this->app->js()->redirect(null,['color'=>$form["select_color"]]);
    	return $this->api->redirect("excercisecolor2",['color'=>$form["select_color"]]);
    });

	if($_GET['color']){
	    $this->add('View')->addClass('atk-box-large atk-swatch-'.$_GET['color']);
	}

    
	}
}