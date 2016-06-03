<?php

class View_MainQuestion extends View
{

	public $count;
	public $arr=[];
	// function formatRow()
	// {
	// 	parent::formatRow();

	// 	$this->current['caturl']=$this->app->url('questions',['cid'=>$this->model->id]);

	// }

	function init()
	{
		parent::init();
		
		$a=[];
		$a[]=$this->app->recall('arr');
			throw new Exception($a, 1);

	}

	function setModel($m)
	{
		parent::setModel($m);

		$buttn=$this->add('Button',null,'btn');
		$buttn->set('Next');
		$buttn->addClass('atk-swatch-green');
		// $ids=[]
		// $ids=$this->app->recall('ids');



		$qquestions=$this->add('Model_Qquestions')->addCondition('qcategory_id',$catid);
		$qquestions->tryLoadAny();
		// $this->add('CRUD')->setModel($qquestions);
		$this->app->memorize('score',0);
		for ($i=0; $i<$count ; $i=$i+1)
		{
			
			$this->js()->univ()->redirect('questionnum',['count'=>$q]);
		}
		
		
	}
	
	function defaultTemplate()
	{
		return (['questions']);
	}
}