<?php

class View_Lister_CommonTweets extends View{
	public $selfpage;
	public $like;
	public $share;
	public $remove;
	public $comment;
	public $edit;
	protected $class='Button';
	function init()
	{
		parent::init();
		
		$this->like=$this->add($this->class,null,'likebtn');
		$this->like->addClass('atk-size-milli atk-swatch-ink');


		$this->share=$this->add($this->class,null,'sharebtn');
		$this->share->addClass('atk-size-milli atk-swatch-ink');

		$this->comment=$this->add($this->class,null,'commentbtn');
		$this->comment->addClass('atk-size-milli atk-swatch-ink');

		// $i = $this->add('Buton')->set('window');
		//$pop = $this->add('View_Popover');
		// $pop->add('Button')->set(['Facebook','icon'=>'facebook-squared'])->addClass('atk-push-small atk-swatch-blue');
		// $pop->add('Button')->set(['Twitter','icon'=>'twitter'])->addClass('atk-push-small atk-swatch-green');
		// $pop->add('Button')->set(['Instagram','icon'=>'instagramm'])->addClass('atk-push-small atk-swatch-red');

		// $this->share->js('click', $pop->showJS());
		

	}


	
	function setModel($m)
	{
		parent::setModel($m);
		
	
		

		$comment_model=$this->add('Model_Social');
		$comment_model->addCondition('tweet_id',$this->model->id);
		$comment_model->addCondition('comment',"!="," ");
		$comment_model->tryLoadAny();
		
		$this->share->onClick(function()
		{
			return $this->js()->univ()->frameURL('Share',$this->app->url('share'),['width'=>400]);
		});
		$v = $this->add('View');
		$newcomment=$this->add('View');
		foreach ($comment_model as $junk) {
			$view=$v->add('View_Lister_Comment',['parent'=>$this]);
			$view->setModel($junk->newInstance()->load($junk->id));
		}



		$newcomment->add('View_NewComment',['tweet_id'=>$this->model->id,'parent'=>$this]);
		$v->js()->hide();
		$newcomment->js()->hide();




		$this->template->trySet('url',$this->app->url('user',['id'=>$this->model['user_id']]));
		$this->share->set(['Share','icon'=>'user']);
		$this->comment->set(['Comment','icon'=>'comment']);


		$self=$this;
		$likecheck=$this->add('Model_Social');
		$likecheck->addCondition('user_id',$this->app->auth->model->id)->addCondition('tweet_id',$this->model->id)->addCondition('like',true);
		$likecheck->tryLoadAny();
		if ($likecheck->loaded())
		{

			$this->like->set(['Unlike','icon'=>'thumbs-down-alt']);
			$this->like->addClass('atk-size-milli atk-swatch-blue');

			$this->like->onClick(function()use($self){
				$current=$this->model;
				$social=$this->add('Model_Social');
				$social->addCondition('user_id',$this->app->auth->model->id);
				$social->addCondition('comment','=',null);
				$social->addCondition('tweet_id',$current->id);
				$social->tryLoadAny();
				$social->delete();

				$self->js()->reload()->execute();
			});
		}
		else
		{
			$this->like->set(['like','icon'=>'thumbs-up-alt']);
			$this->like->onClick(function()use($self){
				$current=$this->model;
				$social=$this->add('Model_Social');
				$social['user_id']=$this->app->auth->model->id;
				$social['tweet_id']=$current['id'];
				$social['like']=true;
				$social->save();
				$self->js()->reload()->execute();
				
			});

		}

		

		$this->comment->on('click',function($js,$data)use($newcomment,$v){
			$js_action = [
						$v->js()->toggle(),
						$newcomment->js()->toggle()
						];

			return $js_action;
		});

		
	}


	function defaultTemplate(){
		return ['tweetePage'];
	}
}