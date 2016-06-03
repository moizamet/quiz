<?php

class View_Lister_Followers extends CompleteLister
{
	public $tag;
	function setModel($m){
		parent::setModel($m);
		$js_reload=$this->js()->reload();
		$this->on('click','.do-like',function($js,$data)use($js_reload){
			// return $js->univ()->alert('hello');
			$model=$this->model->load($data['id']);
			// $model->tryLoadAny();
			// throw new Exception($model, 1);.
			
			return $js->univ()->alert($model['id']);
		});
		return $this->model;
	}
	function formatRow()
	{
		parent::formatRow();
		if($this->tag=="follower")
		{
			$this->current_row['name']=$this->model['follower'];
			$this->current_row['username']=$this->model['user_email'];

		}
		else if ($this->tag=="following")
		{
			$this->current_row['name']=$this->model['following'];
			$this->current_row['username']=$this->model['following_user_email'];

		}
		else if ($this->tag=="search")
		{
			$this->current_row['name']=$this->model['name'];
			$this->current_row['username']=$this->model['username'];
		}
		else
		{

		}
	}
	function defaultTemplate()
	{
		return (['followers']);
	}

}