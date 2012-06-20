<?php

class Application_Form_Login extends Twitter_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setAttrib("horizontal", true)->setAttrib("method", 'post');
        $this->setAction("");

		$this->addElement("text", "username", array(
			"label" => "Username"
		));

		$this->addElement("password", "password", array(
			"label" => "Password",
			"required" => true,
		));


		$this->addElement("submit", "login", array("label" => "LOGIN"));
		$this->addElement("reset", "reset", array("label" => "Reset"));

		
		
    }


}

