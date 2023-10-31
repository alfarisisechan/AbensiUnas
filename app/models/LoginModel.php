<?php

class LoginModel {
	
	private $table = 'user_tbl';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function checkLogin($data)
	{
		$query = "SELECT * FROM user_tbl WHERE username = :username AND password = :password";
		$this->db->query($query);
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', $data['password']);
		$data =  $this->db->single();
		return $data;
	}
	public function checkLoginRole($data)
	{
		$query = "SELECT * FROM user_tbl WHERE username = :username AND password = :password";
		$this->db->query($query);
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', $data['password']);
		$data =  $this->db->single();
		return $data;
	}
}