<?php

class View_Lister_MessageUserName extends CompleteLister
{
	function init()
	{
		parent::init();

		
	}

	function formatRow()
	{
		parent::formatRow();
		// if($m->loaded()){
		// 	throw new Exception($m['msgfrom_id'], 1);
			
		// }
		// throw new Exception("Error Processing Request 2", 1);

		if ($this->model['msgfrom_id']==$this->app->auth->model->id)
		{
			$msgid=$this->model['msgto_id'];
		}
		else
		{
			$msgid=$this->model['msgfrom_id'];

		}
		$this->current_row['url']=$this->app->url('message',['toid'=>$msgid]);
		$user=$this->add('Model_User')->load($msgid);
		$this->current_row['msguser']=$user['name'];
		// throw new Exception($msgid, 1);
		

	}

	function defaultTemplate()
	{
		return (['usermessage']);
	}
}