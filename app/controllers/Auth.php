<?php
class Auth {
	public function logout(){
		session_start();
		session_destroy();
		header('location: '. base_url . '/login');
	}
}