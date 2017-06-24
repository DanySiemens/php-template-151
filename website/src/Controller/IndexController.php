<?php

namespace dany\Controller;
use dany\SimpleTemplateEngine;
use dany\Service\Homepage\HomepageService;
use dany\Service\Security\CSRFProtectionService;
class IndexController 
{
  private $template;
  private $homepageService;
  private $pdo;
  private $csrfService;
  public function __construct(SimpleTemplateEngine $template, HomepageService $homepageService, \PDO $pdo, CSRFProtectionService $csrfProtectionService)
  {
     $this->template = $template;
     $this->homepageService = $homepageService;
     $this->pdo = $pdo;
     $this->csrfService = $csrfProtectionService;
  }
  public function homepage() 
  {
  	$postsdb = $this->homepageService->getAllPost();
  	$posts = array();
  	if($postsdb != NULL)
  	{
	foreach ($postsdb as $post)
	{
	  $temp['id'] = $post['id'];
	  $temp['user_id'] = $post['user_id'];
	  $temp['title'] = $post['title'];
	  $temp['content'] = $post['content'];
	  }
  	}
    echo $this->template->render("home.html.php"array('posts'=>$posts,'csrf'=> $this->csrfService->getHtmlCode("csrfIndex")));  
  }
  
  
  
  
  
  public function showNewPost()
  {
  	echo $this->template->render("newPost.html.php", ["csrf" => $this->csrfService->getHtmlCode("csrfNewPost")]);
  }
  
  public function addPost(array $data)
  {
  if(array_key_exists("csrf", $data))
  {
  	if(!$this->csrfService->validateToken("csrfNewPost", $data["csrf"]))
  	{
  		$this->showNewPost();
  		return;
  	}
  }
  else
  {
  	$this->showNewPost();
  	return;
  }
  $this->homepageService->addPost($_SESSION['user_id'],$data["title"], $data["content"]);
  header("Location: /");
  }
  
  public function deletePost(array $data)
  {
  if(array_key_exists("csrf", $data))
  {
  	if(!$this->csrfService->validateToken("csrfIndex", $data["csrf"]))
  	{
  		$this->homepage();
  		return;
  	}
  }
  else
  {
  	$this->homepage();
  	return;
  }
  $this->homepageService->deletePost($data["deletePost"]);
  }
}
