<?php



class page_game extends Page
{
	public $title="Game";
	function page_index()
	{
		// parent::init();
		$this->add('View')->set('Welcome to the Guessing Game');
		$this->add('View')->set('Rules');
		$btn=$this->add('Button')->set("START")->addClass('atk-swatch-red');
		
		$rand=rand(1,100);

		$this->app->memorize('val',$rand);
		
		$btn->onclick(function(){
			$this->app->redirect('game3');
		});



	}
}