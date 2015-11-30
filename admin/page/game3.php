<?php



class page_game3 extends Page
{
	public $title="Game";
	function init()
	{
		parent::init();

		$this->add('View')->set('Value : XX');
		//$btn=$this->add('Button')->set('Play');

		$c=$this->add('Columns');
		$c1=$c->addColumn(6);
		$form=$c1->add('Form');
		$form->addField('enter_your_guess');
		$form->addsubmit('Submit')->addClass('atk-swatch-blue');
		
		if(!$form->app->recall('ch'))
			$form->app->memorize('ch',0);
		
		$form->onSubmit(function() use ($form)
		{
			$chance=$form->app->recall('ch');
			$chance=$chance+1;
			$form->app->memorize('ch',$chance);
			
			$val = $this->app->recall('val');

			$us=$form['enter_your_guess'];
			
			if($us<$val){
				return $this->js()->univ()->alert('Try : '.$chance. ' Your value is Smaller ');
			
			}elseif ($us>$val){
				return $this->js()->univ()->alert('Your:'.$chance.' value is Bigger ');
			}elseif ($us==$val){
				return $this->js()->univ()->alert('Congrates  Matched '.$val.' in chance '.$chance);	
			}else{
				return $this->js()->univ()->alert('Something went wrong '.$chance);
			}

		});

	}
}