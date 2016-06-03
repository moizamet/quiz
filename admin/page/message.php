<?php

class page_message extends page_twitterApp
{
	public $title="Messages !!";
	function init()
	{
		parent::init();

		$toid=$this->app->stickyGET('toid');
		// throw new Exception($toid, 1);
		
		$model=$this->add('Model_Message');
		

		
			// $model->addCondition($model->dsql()->orExpr()
			// 					->where($model->dsql()->andExpr()
			// 						->where('msgto_id',$this->app->auth->model->id)
			// 						->where('msgfrom_id',$toid)
			// 						)
			// 					->where($model->dsql()->orExpr()
			// 						->where('msgto_id',$toid)
			// 						->where('msgfrom_id',$this->app->auth->model->id)
			// 					)
			// 				);

			$model->addCondition($model->dsql()->orExpr()
			->where($model->dsql()->andExpr()
				->where('msgto_id',$this->app->auth->model->id)
				->where('msgfrom_id',$toid)
				)
			->where($model->dsql()->andExpr()
				->where('msgfrom_id',$this->app->auth->model->id)
				->where('msgto_id',$toid)
				)
				);

		

		// $model->addCondition(('msgto_id',$this->app->auth->model->id),'or',('msgfrom_id',$toid));
		// $model->addCondition(('msgfrom_id',$toid),'or',('msgfrom_id',$this->app->auth->model->id));
		// $model->setOrder('date','desc');
		// $model->setOrder('time','asc');
		// $model->_dsql()->del('fields')->field($model->dsql()->expr('DISTINCT([0])',[$model->getElement('msgfrom_id')]));

		foreach ($model as $msg ) {
			$view=$this->add('View_Lister_Message');
			$view->setModel($msg->newInstance()->load($msg->id));
		}



			// $this->add('CRUD')->setModel($model);
		// $this->add('CRUD')->setModel($model);

		$this->add('View_Newmessage',['toid'=>$toid]);
	}
}