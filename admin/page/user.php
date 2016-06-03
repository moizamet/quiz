<?php

class page_user extends page_twitterApp
{
	// public $title="User";
	function init()
	{
		parent::init();



		$id=$this->app->stickyGET('id');
		
		$user=$this->add('Model_User')->addCondition('id',$id);
		$user->tryLoadAny();
		if ($user->loaded())
			{
				// $user=$this->add('Model_User')->addCondition('id',$)
				$this->add('View_TweetUser',null,'UserPage')->setModel($user);


				$tweets=$this->add('Model_Tweet')->addCondition('user_id',$user['id']);
				$tweets->setOrder('date','desc');

				foreach ($tweets as $tweet) {
				$view=$this->add('View_Lister_UserTweets',['selfpage'=>$this]);
				$view->setModel($tweet->newInstance()->load($tweet->id));
				
				}
				$sidebar=$this->add('View_SideBar',null,'sidebar');
				

			}
		else
		{
			$this->add('View_Info')->set('This user Does not Exits');
		}
		if($id==$this->app->auth->model->id) 
			$this->add('View_TweetNew');
	}

	function defaultTemplate()
	{
		return (['mainTweeter']);
	}
}