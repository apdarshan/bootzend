<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
			$this->view->form = new Application_Form_TestForm;
			if($this->_request->isPost())
			{
                error_log("yes post it is");
				$this->view->form->isValid($this->_getAllParams());
			}
    }


}

