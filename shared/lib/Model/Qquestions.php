<?php

class Model_Qquestions extends SQL_Model
{
	public $table="qquestions";

	function init()
	{
		parent::init();

		$this->hasOne('Qcategory');

		$this->addField('question');
		$this->addField('1');
		$this->addField('2');
		$this->addField('3');
		$this->addField('4');
		$this->addField('correct')->enum(['1','2','3','4']);
		

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}