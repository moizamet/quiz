<?php

class Model_Social extends SQL_Model
{
	public $table='social';
	function init()
	{
		parent::init();

		$this->hasOne('User');
		$this->hasOne('Tweet');

		$this->addField('like')->type('boolean')->defaultValue(false);
		$this->addField('comment')->type('text');
		$this->addField('notification')->type('boolean')->defaultValue(true);

		$this->add('dynamic_model/Controller_AutoCreator');

		$this->addExpression('userid')->set(function(){
			return $this->refSQL('tweet_id')->fieldQuery('user_id');
		});

		$this->addExpression('actionname')->set(function(){
			return $this->refSQL('user_id')->fieldQuery('name');
		});

		
	}

	
}