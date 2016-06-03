<?php

class Admin extends ApiFrontend {

    function init() {
        parent::init();

        $this->api->pathfinder
            ->addLocation(array(
                'addons' => array('addons', 'vendor'),
            ))
            ->setBasePath($this->pathfinder->base_location->getPath() . '/..')
        ;
        $this->add('jUI');

        // $this->api->menu->addMenuItem('/', 'Home');
        // $this->api->menu->addMenuItem('np1','Page 1');
        // $this->api->menu->addMenuItem('np2','Page 2');
        // $this->api->menu->addMenuItem('np3','Page 3');
        // $this->api->menu->addMenuItem('/logout','logout');


        // $this->api->menu->addMenuItem('pp1','pp1');
        // $this->api->menu->addMenuItem('pp2','pp2');
        // $this->api->menu->addMenuItem('pp3','pp3');

        // $form=$this->api->add('Form');
        // $form->addField('username');
        // $form->addField('Password','password');
        
        $this->dbconnect();
        $auth=$this->add('Auth');
        $auth->allowPage(['twitter']);
        $auth->usePasswordEncryption();
        $auth->setModel('User','username','password');
        $auth->check();


        // $auth->allowPage('twitter');
        // if($this->app->auth->model->loaded())
        // {
        //     $this->js()->univ()->redirect('user',['id'=>$this->app->auth->model['id']]);
        // }

        // $menu=$this->app->layout->add('Menu_Horizontal',null,'Top_Menu');
        // $menuitem=$menu->addMenu('user');
        // $menuitem->addItem('change password',$this->app->url('changePassword'));  

        // $this->api->jui->addStaticStylesheet('bootstrap','.css');  
    }
    
}



        // For improved compatibility with Older Toolkit. See Documentation.
        // $this->add('Controller_Compat42')
        //     ->useOldTemplateTags()
        //     ->useOldStyle()
        //     ->useSMLite();
