<?php

class page_foorms extends Page
{
	public $title="Form";
	function init()
	{
		parent::init();
		$form=$this->add('Form',null,null,['form/minimal']); //stacked,horzontal,empty,minimal
		$form->addField('First Name');
		$form->addField('Last Name');
		$form->addField('Radio','Gender')->setValueList(['Male','Female']);
		$adds=$form->addField('Address');
		$adds->addButton('Varify','before');
		$adds->addButton('Varify','after');
		$form->addField('DropDown','Country')->setValueList(['India','USA','UK']);
	}
}