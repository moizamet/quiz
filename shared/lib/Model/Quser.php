<?php

class Model_Quser extends SQL_Model
{
	public $table="quser";

	function init()
	{
		parent::init();

		$this->hasMany('Qstats');
		$this->addField('name');
		$this->addField('username');
		$this->addField('password')->type('password');
		$this->addField('gender')->enum(['Male','Female']);
		// $this->addExpression('number_of_tests')->set(function($m){
		// 	return $this->refSQL('qstats')->count();
		// });


		$this->add('dynamic_model/Controller_AutoCreator');
	}
}