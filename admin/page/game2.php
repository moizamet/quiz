<?php



class page_game2 extends Page
{
	public $title="Game";
	function init()
	{
		parent::init();
		$form=$this->add('Form');
		$form->addField('enter_number');
		$form->addSubmit('Go');
		$form->onSubmit(function() use ($form){
			$this->app->memorize('val',$form['enter_number']);
			return $form->js()->redirect($this->app->url('game3'));
		});


	}
}