<?php

class page_tutjava extends Page
{
	public $title="Javascipt";

	function init()
	{
		parent::init();
		$randnumber=rand(1,100);
		$b=$this->add('Button')->set($randnumber);
		$b1=$this->add('Button')->set('javascipt');//->js('click')->reload($b);

		$b1->onClick(function($b1)use($randnumber){
			return 'number is'.$randnumber;
		});

		$this->add('Button')->set('alert')->js('click')->univ()->confirm('Hello');
		$a2=$this->add('Button')->set('button 2');
		$a1=$this->add('Button')->set('button 1')->js('click',$a2->js()->toggle());
		$cmain=$this->add('Button')->set('main')->addClass('atk-swatch-white');
		$c1=$this->add('Button')->set('')->addClass('atk-swatch-red')->js('click',$cmain->js()->removeClass()->addClass('atk-swatch-red'));
		$c1=$this->add('Button')->set('')->addClass('atk-swatch-green')->js('click',$cmain->js()->removeClass()->addClass('atk-swatch-green'));
		$c1=$this->add('Button')->set('')->addClass('atk-swatch-blue')->js('click',$cmain->js()->removeClass()->addClass('atk-swatch-blue'));
		$c1=$this->add('Button')->set('')->addClass('atk-swatch-yellow')->js('click',$cmain->js()->removeClass()->addClass('atk-swatch-yellow'));
		
		//$c2=$this->add('Button')->set('')->addClass('atk-swatch-blue')->js('click',$cmain->js()->addClass('atk-swatch-blue atk-swatch-red'));
		//$c2=$this->add('Button')->set('')->addClass('atk-swatch-yellow')->js('click',$cmain->js()->removeClass('atk-swatch-blue'));
		//$c2=$this->add('Button')->set('')->addClass('atk-swatch-red')->js('click',$cmain->js()->addClass('atk-swatch-red'));
		//$c1->js('click',$cmain->js()->removeClass('atk-swatch-red'));

		
	}
}