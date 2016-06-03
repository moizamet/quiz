<?php

class page_questions extends Page
{
	public $title="Questions";
	function init()
	{
		parent::init();

		$catid=$this->app->stickyGET('cid');
		// $catid=1;
		// $ar=[];
		// $qquestions=$this->add('Model_Qquestions')->addCondition('qcategory_id',$catid);
		// $qquestions->tryLoadAny();
		// // $this->app->memorize('score',0);
		// foreach ($qquestions as $question) 
		// {
		// 	$v->setModel($question->newInstance()->load($question->id));
		// 	// $ar[]=$question->id;
		// }
			// throw new Exception($question->id, 1);

			$v=$this->add('View_Question',['catid'=>$catid]);

		// $count=count($ar);
		// $this->app->memorize('count',$count);
		// $this->app->memorize('arr',$ar);
		// $this->add('View_MainQuestion',['count'=>$count]);

		
		
		
		
		
		
	}
}