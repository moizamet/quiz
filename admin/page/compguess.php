<?php

class page_compguess extends Page
{
	public $title="Computer Guessing Game";

	function page_index()
	{
		//parent::init();

		$form=$this->add('Form');
		$form->addField('number');
		$form->addsubmit('Go');
		$form->onSubmit(function() use ($form){
			
			$this->app->memorize('value',$form['number']);
			return $this->app->redirect('./subpage4');
		});
	}


	function page_subpage4 ()
	{
		$btn=$this->add('Button')->set('Guess the number');
		$btn->onclick(function()
		{
			$rand=rand(0,10);
			$val=$this->app->recall('value');
			if($rand==$val)
			{
				return $this->add('View')->set($val);
			}
			//{
				//return $this->js()->univ()->alert("Well done !!");
			//}
			//}
			//else
			//{
				//return $this->js()->univ()->alert("Sorry try again!");
			//}
		});

	}
}