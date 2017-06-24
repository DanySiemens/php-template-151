<?php
namespace dany\Service\Homepage;

Interface HomepageService
{
	public function getAllPost();
	public function addPost($user_id,$title, $content);
	public function deletePost($post_id);
}