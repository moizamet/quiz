<?php

class Model_Qcategory extends SQL_Model
{
	public $table="qcategory";

	function init()
	{
		parent::init();
		$this->hasMany('Qquestions');
		$this->addField('name');
		$this->addField('number_of_questions')->type('number');
		$this->addField('time_duration');

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}