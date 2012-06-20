<?php

class DashboardController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        // if not logged in, redirect to login form  
        if(!Zend_Auth::getInstance()->hasIdentity())  
        {  
            $this->_redirect('/');  
        } 
        $this->view->userInfo = Zend_Auth::getInstance()->getStorage()->read();  
    }

    public function indexAction()
    {
        // action body
    }


}

