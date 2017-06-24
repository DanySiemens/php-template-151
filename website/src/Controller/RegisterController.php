<?php

namespace dany\Controller;

use dany\SimpleTemplateEngine;
use dany\Service\Register\RegisterService;
use dany\Service\Security\CSRFProtectionService;

class RegisterController
{
	private $template;
	private $registerService;
	private $csrfService;
	public function __construct(SimpleTemplateEngine $template, RegisterService $registerService, CSRFProtectionService $csrfProtection)
	{
		$this->template = $template;
		$this->registerService = $registerService;
		$this->csrfService = $csrfProtection;
	}
	public function showRegister()
	{
		echo $this->template->render("register.html.php", ["csrf" => $this->csrfService->getHtmlCode("csrfRegister")]);
	}
	public function register(array $data)
	{
		if(array_key_exists("csrf", $data))
		{
		if(!$this->csrfService->validateToken("csrfRegister", $data["csrf"]))
		{
			$this->showRegister();
			return;
		}
		}
		else
		{
			$this->showRegister();
			return;
		}
		if(!array_key_exists("email", $data) OR !array_key_exists("password", $data))
		{
			$this->showRegister();
			return;
		}
		if($this->registerService->reg($data["email"], $data["password"]))
		{
			header("Location: /");
		}
		else 
		{
			$this->showRegister();
			echo "User with this email already exists";
		}
	}
	
	public function activate(array $data)
	{
		if(!array_key_exists("url", $data) OR !array_key_exists("user_id", $data))
		{
			echo "Not found";
			return;
		}
		else
		{
			$this->registerService->acti($data["url"], $data["user_id"]);
		}
	}

	

}
		
