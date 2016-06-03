<?php

class page_findpeople extends page_twitterApp
{
	function init()
	{
		parent::init();

		$string=$_GET['person'];
		// throw new Exception($string, 1);
		
		$user=$this->add('Model_User')->addCondition('name','like','%'.$string.'%');
		$this->add('View_Lister_Followers',['tag'=>'search'])->setModel($user);
		// $this->add('CRUD')->setModel($user);

	}
}