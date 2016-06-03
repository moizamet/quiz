<?php

class page_testing extends Page
{
	public $title="test auth";
	function init()
	{
	parent::init();
	
        if ($_GET['V1']&&$_GET['V2'])
        {
                $v1=$_GET['V1'];
                $v2=$_GET['V2'];

                $view=$this->add('View_Info')->addClass('atk-swatch-red');
                $view->set('Addition = '.($v1+$v2));
                $view2=$this->add('View_Info')->addClass('atk-swatch-red');
                $view2->set('Substraction = '.($v1-$v2));
                $view3=$this->add('View_Info')->addClass('atk-swatch-red');
                $view3->set('Multiplication = '.$v1*$v2);
                $view4=$this->add('View_Info')->addClass('atk-swatch-red');
                $view4->set('Division = '.$v1/$v2);
        }
        $form=$this->add('Form');
        $form->addfield('first');
        $form->addfield('second');
        $form->addSubmit('Calculate');


        if ($form->isSubmitted())
        {
                $this->js()->univ()->redirect($this->app->url(null),['V1'=>$form['first'],'V2'=>$form['second']])->execute();
        }
        $this->add('Button')->set('Reset')->onClick(function()
        {
                $_GET['V1']=null;
                $_GET['V2']=null;
                return $this->js()->univ()->redirect($this->app->url(null));

        });


	}

}