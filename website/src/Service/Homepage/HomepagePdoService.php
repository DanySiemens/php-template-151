<?php
namespace dany\Service\Homepage;

class HomepagePdoService implements  HomepageService
{
	/**
	 *  @ var \PDO
	 */
	private $pdo;

	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function getAllPost()
	{	
		try {
			$stmt = $this->pdo->prepare("Select * FROM post");
			$stmt->execute();
			
			if($stmt->rowCount() >= 1)
			{
				return $stmt;
			}
			else
			{
				return NULL;	
			}
		}
		catch(PDOException $e) {
			return "Error: " . $e->getMessage();
		}
	}
	
	


	public function addPost($UserId, $Titel, $Inhalt)
	{
		try {
			$stmt = $this->pdo->prepare("INSERT INTO `post`(user_id, title, content) VALUES (? , ?, ?)");
			$stmt->bindValue(1,$UserId);
			$stmt->bindValue(2,$Titel);
			$stmt->bindValue(3,$Inhalt);
			$stmt->execute();
		}
		catch(PDOException $e) {
			return "Error: " . $e->getMessage();
		}
	}
	public function deletePost($post_id)
	{
		try {
			$stmt = $this->pdo->prepare("DELETE FROM `like` WHERE post_id=?");
			$stmt->bindValue(1,$post_id);
			$stmt->execute();
			$stmt = $this->pdo->prepare("DELETE FROM `post` WHERE id=?");
			$stmt->bindValue(1,$post_id);
			$stmt->execute();
		}
		catch(PDOException $e) {
			return "Error: " . $e->getMessage();
		}
	}
}