<?php

class Model_Follow extends SQL_Model
{
	public $table='follow';
	function init()
	{
		parent::init();

		$this->hasOne('User','follower_id');
		//$this->hasOne('User');
		$this->hasOne('User','following_id');
		//$this->addField('test');
		
		$this->addExpression('user_email')->set(function($m,$q){
			return $m->refSQL('follower_id')->fieldQuery('username');
		});

		$this->addExpression('following_user_email')->set(function($m,$q){
			return $m->refSQL('following_id')->fieldQuery('username');
		});
		$this->add('dynamic_model/Controller_AutoCreator');
	}


}