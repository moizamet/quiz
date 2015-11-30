<?php

class page_cart extends Page
{
	public $title="awake";
	public $item=['shirt','Jeans'];
	function init()
	{
	
	parent::init();
	$view=$this->add('View_Basket');
	$shirt_btn=$this->add('Button')->set('Shirt');
	
	$shirt_btn->onClick(function()use($view){
		$view->addItem($this->item['shirt']);
		return "Shirt Item Added In Cart";
	});
	$jeans_btn=$this->add('Button')->set('Jeans');
	$jeans_btn->onClick(function()use($view){
		$view->addItem($this->item['Jeans']);
		return "Jeans Item Added In Cart";	
	});

	}

	
}