<?php

class Model_Tweet extends SQL_Model
{
	public $table='tweet';
	function init()
	{
		parent::init();

		//$this->addField('name');
		$this->hasOne('User');
		$this->hasMany('Social');
		$this->addField('message')->type('text');
		$this->add('filestore/Field_File','tweetimage_id');
		$this->addField('date')->type('date');
		$this->add('dynamic_model/Controller_AutoCreator');

		$this->addExpression('Followings')->set(function($m){
			return $m->refSQL('user_id')->fieldQuery('Followings');
		});

		$this->addExpression('username')->set(function(){
			return $this->refSQL('user_id')->fieldQuery('username');
		});

		$this->addExpression('uname')->set(function(){
			return $this->refSQL('user_id')->fieldQuery('name');
		});

		$this->addExpression('likeCount')->set(function(){
			return $this->refSQL('Social')->addCondition('like',true)->count();
		});

		$this->addExpression('image')->set(function(){
			return $this->refSQL('user_id')->fieldQuery('imagename');
		});

		
	}
}