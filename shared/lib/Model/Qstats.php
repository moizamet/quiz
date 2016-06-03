<?php

class Model_Qstats extends SQL_Model
{
	public $table="qstats";

	function init()
	{
		parent::init();

		$this->hasOne('Quser');
		$this->hasOne('Qquestions');
		$this->addField('date')->type('date');
		$this->addField('score');
		

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}