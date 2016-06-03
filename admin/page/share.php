<?php

class page_share extends Page
{
	function init()
	{
		parent::init();

		$this->add('Button')->set(['Facebook','icon'=>'facebook-squared'])->addClass('atk-push-small atk-swatch-blue')->onClick(function()
			{
				return $this->js()->univ()->redirect('http://www.facebook.com');
			});
		$this->add('Button')->set(['Twitter','icon'=>'twitter'])->addClass('atk-push-small atk-swatch-green')->onClick(function()
			{
				return $this->js()->univ()->redirect('http://www.twitter.com');
			});
		$this->add('Button')->set(['Instagram','icon'=>'instagramm'])->addClass('atk-push-small atk-swatch-red')->onClick(function()
			{
				return $this->js()->univ()->redirect('http://www.instagramm.com');
			});
	}
}