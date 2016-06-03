<?php

class page_quser extends Page
{
	public $title=" User Control Pannel";

	function init()
	{
		parent::init();

		

		$quser=$this->add('Model_Quser');
		$this->add('CRUD')->setModel($quser);

		$qcategory=$this->add('Model_Qcategory');
		$this->add('CRUD')->setModel($qcategory);

		$qquestions=$this->add('Model_Qquestions');
		$this->add('CRUD')->setModel($qquestions);

		$qstats=$this->add('Model_Qstats');
		$this->add('CRUD')->setModel($qstats);

		



	}
}