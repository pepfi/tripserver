<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

//require_once ../libraries/Format;

class Books extends REST_Controller
{
	public function index_get()
	{
	     $users = [
	            ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
	            ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com', 'fact' => 'Developed on CodeIgniter'],
	            ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'fact' => 'Lives in the USA'], 
	            ['id' => 4, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
	        ];	

	    $this->response($users, 200);

	}

	public function index_post()
	{
		$this->response($book, 201);
	}
}