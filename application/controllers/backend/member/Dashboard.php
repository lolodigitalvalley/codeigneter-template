<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Member_Controller {

	public function index()
	{
		$this->backend->view('dashboard_v');
	}
}
