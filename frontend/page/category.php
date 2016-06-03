<?php

class page_category extends Page
{
	public $title="category";
	function init()
	{
		parent::init();

		// $this->add('View_Registration');
		$model=$this->add('Model_Qcategory')->tryLoadAny();

		foreach ($model as $m) {
			$view=$this->add('View_Category');
				// $view->setModel($tweet->newInstance()->load($tweet->id));
				$view->setModel($m->newInstance()->load($m->id));

		}

		// $this->add('View_Category')->setModel($model);
		// $Quser=$this->add('Model_Quser');
		

	}
}