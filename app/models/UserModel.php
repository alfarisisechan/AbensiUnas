<?php

class UserModel {
	
	private $table = 'user_tbl';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

    public function ubahPassword($id, $password)
	{
		$query = "UPDATE user_tbl SET password =:password WHERE username = :username";
		$this->db->query($query);
		$this->db->bind('username', $id);
		$this->db->bind('password', $password);
		$this->db->execute();
		return $this->db->rowCount();
	}
	
}