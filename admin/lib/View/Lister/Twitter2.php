<?php

class View_Lister_Twitter extends CompleteLister{

	function formatRow(){
		parent::formatRow();
		$this->current_row['url'] = $this->api->url('user',['id'=>$this->model['user_id']]);
		
		
	}

	// function rowRender(){
	// 	// $btn=$this->add('Button');
	// 	$this->current_row=['remove'=>'hello'];
	// 	parent::rowRender('tweetePage');
	// 	// $this->current_row['url'] = $this->api->url('user',['id'=>$this->model['user_id']]);
		
	// }

	function defaultTemplate(){
		return ['tweetePage'];
	}
}