<?php

class View_Lister_Comment extends View
{	public $parent;
	public $like;
	public $remove;
	function init()
	{
		parent::init();

			//$this->like=$this->add('Button',null,'clike')->addClass('atk-size-micro')->set('Like');
	}
	function setModel($m)
	{
		parent::setModel($m);
		$comment_user=$this->model['user_id'];
		$user=$this->app->auth->model->id;
		$self=$this;
		if ($comment_user==$user)
		{
			$this->remove=$this->add('Button',null,'cremove')->addClass('atk-swatch-red atk-size-micro')->set('Remove');
			$this->remove->onClick(function(){
			$models=$this->add('Model_Social')->addCondition('id',$this->model->id);
			$models->tryLoadAny();
				// throw new Exception($this->model->id.'user-id'.$models['user_id'].'tweet-id'.$models['tweet_id'], 1);
				
			$models->delete();
			return $this->parent->js()->reload()->execute();
		});
		}

	}

	function defaultTemplate()
	{
		return (['commentTemplate']);
	}
}