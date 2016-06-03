<?php

class Model_Message extends SQL_Model
{
	public $table="message";
	function init()
	{
		parent::init();

		$this->hasOne('User','msgfrom_id');
		$this->hasOne('User','msgto_id');
		$this->addField('message')->type('text');
		$this->addField('date');
		$this->addField('time');
		$this->addField('to');
		$this->addHook('beforeSave',$this);
		$this->add('dynamic_model/Controller_AutoCreator');

	}

function beforeSave()
{
	// date_default_timezone_set('Asia/Delhi');
	$this['date']=date('d-m-Y');
	$this['time']=date('H:i:s',time());
	// $this->time=time(h-m-s)

	// $date=date('d-m-Y');
	// $time=date('h:i:sa');
	// throw new Exception($date." time ".$time, 1);
	


	$this->save();
}

}