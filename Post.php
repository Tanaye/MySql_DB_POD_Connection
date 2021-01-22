<?php
declare(strict_types=1);
require_once("Database.php");

class Post{
	private object $db;

	function __construct()
	{
		$this->db = new Database();
	}

	//Get All Posts
	function getPosts():array
	{
		$query = "SELECT * FROM tbl_oop_posts";
		$this->db->query($query);
		
		return $this->db->resultSet();
	}

	//Get One Post
	function getPostById(int $id):object
	{
		$query = "SELECT * FROM tbl_oop_posts WHERE id = :id";
		$this->db->query($query);
		$this->db->bind(':id', $id);
		return $this->db->single();
	}	 
	
	//Insurt Records
	function addPost(array $data):bool
	{
		$query = "INSERT INTO tbl_oop_posts (title, content) VALUES(:title, :content)";
		$this->db->query($query);
		$this->db->bind(':title', $data['title']);
		$this->db->bind(':content', $data['content']);

		if($this->db->execute())
		{
			return true;
		}
		else
		{
			return false;
		}

	} 

	//Update Post
	function updatePost(int $key, array $data):bool
	{
		$query = "UPDATE tbl_oop_posts SET title = :title, content = :content WHERE id = :id";
		$this->db->query($query);

		$this->db->bind(':id', $key);
		$this->db->bind(':title', $data['title']);
		$this->db->bind(':content', $data['content']);

		if($this->db->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	//Delete Records
	function deletePost(int $id):bool
	{
		$query = "DELETE FROM tbl_oop_posts WHERE id = :id";
		$this->db->query($query);

		$this->db->bind(':id', $id);
		

		if($this->db->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}