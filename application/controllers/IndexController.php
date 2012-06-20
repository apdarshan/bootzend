<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $this->view->userInfo = Zend_Auth::getInstance()->getStorage()->read();  
        // $ajaxContext->addActionContext('logout', 'html')
        //             ->addActionContext('changePass', 'xml')
        //             ->initContext();
    }

    public function indexAction()
    {
            $this->_helper->layout->disableLayout();
			// If we're already logged in, just redirect  
            if(Zend_Auth::getInstance()->hasIdentity())  
            {  
                $this->_redirect('registrations/index');  
            }

            $loginForm = new Application_Form_Login;
            $errorMessage='';
			if($this->_request->isPost())
			{
                error_log("yes post it is");
				if($loginForm->isValid($this->_getAllParams()))
                {
                    // get the username and password from the form 
                    $username = $loginForm->getValue('username');  
                    $password = $loginForm->getValue('password');
                    $dbAdapter = Zend_Db_Table::getDefaultAdapter();  
                    $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
                    $authAdapter->setTableName('users')  
                                ->setIdentityColumn('username')  
                                ->setCredentialColumn('password')  
                                ->setCredentialTreatment('MD5(?)');
                    // pass to the adapter the submitted username and password 
                    $authAdapter->setIdentity($username)
                                ->setCredential($password);
                    $auth = Zend_Auth::getInstance();
                    $result = $auth->authenticate($authAdapter);
                    // is the user a valid one?  
                    if($result->isValid())  
                    {
                        // get all info about this user from the login table  
                        // ommit only the password, we don't need that  
                        $userInfo = $authAdapter->getResultRowObject(null, 'password');
                        // the default storage is a session with namespace Zend_Auth  
                        $authStorage = $auth->getStorage();  
                        $authStorage->write($userInfo);
                        $this->_redirect("registrations/index");  
                    }
                    else  
                    {  
                        $errorMessage = "Wrong username or password provided. Please try again.";  
                    }
                }
			}
            $this->view->errorMessage = $errorMessage;  
            $this->view->loginForm = $loginForm; 
    }

    public function logoutAction()
    {
        // action body
        // clear everything - session is cleared also!  
        Zend_Auth::getInstance()->clearIdentity();  
        $this->_redirect('/');  
    }

    public function changepassAction()
    {
        // action body
        if(!Zend_Auth::getInstance()->hasIdentity())  
        {  
            $this->_redirect('/');  
        } 
    }

    public function forgotpassAction()
    {
        // action body
    }

    public function changephoneAction()
    {
        // action body
        if(!Zend_Auth::getInstance()->hasIdentity())  
        {  
            $this->_redirect('/');  
        } 
    }


}









