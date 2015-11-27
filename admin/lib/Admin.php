<?php

class Admin extends App_Admin {

    function init() {
        parent::init();

        $this->api->pathfinder
            ->addLocation(array(
                'addons' => array('addons', 'vendor'),
            ))
            ->setBasePath($this->pathfinder->base_location->getPath() . '/..')
        ;

        $this->api->menu->addMenuItem('/', 'Home');
        $this->api->menu->addMenuItem('np1','Page 1');
        $this->api->menu->addMenuItem('np2','Page 2');
        $this->api->menu->addMenuItem('np3','Page 3');
        

        
    }
}



        // For improved compatibility with Older Toolkit. See Documentation.
        // $this->add('Controller_Compat42')
        //     ->useOldTemplateTags()
        //     ->useOldStyle()
        //     ->useSMLite();
