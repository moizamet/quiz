<?php

class Model_User extends SQL_Model
{
	public $table='user';
	function init()
	{
		parent::init();

		$this->addField('name');
		$this->addField('username');
		$this->addField('password')->type('password');
		$this->addField('gender')->Enum(['Male','Female']);
		$this->addField('date')->type('date');
		//$this->add('filestore/Field_File','image_id');
		$this->add('filestore/Field_File','image_id');

		$this->hasMany('Tweet');
		$this->hasMany('Social');
		$this->hasMany('Follow','following_id',null,'following');
		$this->hasMany('Follow','follower_id',null,'followers');
		$this->hasMany('Message','msgfrom_id');
		$this->hasMany('Message','msgto_id');
		//$this->hasMany('Follow',null,null,'followers');

		$this->addExpression('tW')->set(function($m){
			return $m->refSQL('Tweet')->count();
		});

		$this->addExpression('Followings')->set(function($m){
			return $m->refSQL('following')->count();
		});

		$this->addExpression('Followers')->set(function($m){
			return $m->refSQL('followers')->count();
		});	

		$this->addExpression('imagename')->set(function($m)
		{
			return $m->refSQL('image_id')->fieldQuery('filename');
		});

		// $this->addExpression('mytweet')->set(function($m){
		// 	return $m->refSQL('Tweet')->count();
		// });

		$this->add('dynamic_model/Controller_AutoCreator');

		//$this->debug();

	}
}