<?php
class page_column extends Page
{
	public $title="Columns";
	function init()
	{
		parent::init();
		$col1=$this->add('Columns');
		$c=$col1->addColumn(6);
		
		$col2=$this->add('Columns');
		$d=$col2->addColumn(6);
		
		$col3=$c->add('Columns');
		$e=$col3->addColumn(6);
		
		$col4=$d->add('Columns');
		$f=$col4->addColumn(6);

		

		$c->add('View_Info')->set('Moiz');
		$d->add('View_Success')->set('Moiz');
		$e->add('View_Warning')->set('Moiz');
		$f->add('View_Error')->set('Moiz');
		

		$this->app->memorize('Name','Moiz');

		$this->add('Button')->set('Next page')->addClass('atk-swatch-red')->link('foorms');

	}
}