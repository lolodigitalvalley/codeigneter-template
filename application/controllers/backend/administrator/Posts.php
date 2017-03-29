<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends MY_Controller {

	public function index()
	{
		$this->backend->view('form_v');
	}
}
