<?php

class View_Question extends View
{
	public $catid;


	function init()
	{
		parent::init();
		$score=0;
		$count=1;
		$qquestions=$this->add('Model_Qquestions')->addCondition('qcategory_id',$this->catid);
		$qquestions->tryLoadAny();
		$form=$this->add('Form',null,null,['form/stacked']);
		foreach ($qquestions as $qmodel) 
		{
			


		$form->addField('Radio',$qmodel->id,$count++." ".$qmodel['question'])->setValueList(['1'=>$qmodel['1'],
			'2'=>$qmodel['2'],
			'3'=>$qmodel['3'],
			'4'=>$qmodel['4']]);
		}
		$btnobj=$form->addSubmit('Submit',null,'btn');
		$btnobj->addClass('atk-swatch-blue');
		$form->onSubmit(function () use ($form,$btnobj,$qquestions,$score){
			foreach ($qquestions as $question) {
			
			if($form[$question->id]==$question['correct'])
			{
			
			$score=$score+1;

			}
			
		}
			return $this->js()->univ()->alert('correct answers => '.$score);
	});

	}

	function setModel($m)
	{
		parent::setModel($m);
		
		

	}
		
	
	function defaultTemplate()
	{
		return (['questions']);
	}
}