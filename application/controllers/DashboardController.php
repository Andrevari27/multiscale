<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$model = array();
		$this->load->model($model);
	}

	public function index()
	{
		$data = array(
			'judul' => 'Dashboard',
		);

		$this->load->view('backend/templates/header',$data);
		$this->load->view('backend/dashboard',$data);
		$this->load->view('backend/templates/footer',$data);
	}


}
