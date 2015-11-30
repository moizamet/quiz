<?php

class View_Basket extends View{
	public $items;
	function init(){
		parent::init();

		$this->addClass('atk-box atk-move-right atk-col-3');
		$this->add('H1')->set('Basket');
		
		if($this->app->recall('item')){
			$this->add('View')->set(join(',',$this->app->recall('item')));
		}else{
			$this->add('View')->set('Basket is Empty');

		}
		// var_dump($this->app->recall('item'));

		if($this->app->page !='cartcheck'){
			$this->add('Button')->set('Checkout')->addClass('atk-swatch-green');
		}
		else
		{
			$this->add('Button')->set('Back to Store')->addClass('atk-swatch-green');
		}
		$empty=$this->add('Button')->set('Empty')->addClass('atk-swatch-red');
		
		$empty->onClick(function($empty){
			$this->emptyItem();
			return "Cart is Empty";
		});
	}

	function emptyItem()
	{
		$this->items=[];
		$this->app->memorize('item',$this->items);
	}

	function addItem($item)
	{
		$this->items= $item;
		$this->app->memorize('item',$item);
		$this->app->recall('item');

	}
}