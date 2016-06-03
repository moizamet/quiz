<?php

class page_questionnum extends Page
{
	public $title="Question num";
	function init()
	{
		parent::init();

		// $this->add('View_Registration');
		$count=$this->app->stickyGET('count');
		throw new Exception($count, 1);
		

		// $model=$this->add('Model_Qquestions')->addCondition()->tryLoadAny();

		// foreach ($model as $m) {
		// 	$view=$this->add('View_Category');
		// 		// $view->setModel($tweet->newInstance()->load($tweet->id));
		// 		$view->setModel($m->newInstance()->load($m->id));

		// }

		// $this->add('View_Category')->setModel($model);
		// $Quser=$this->add('Model_Quser');
		

	}
}