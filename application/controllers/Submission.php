<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submission extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m']);
    $this->load->library('email');
  }

  public function index()
  {
    $this->template("consumer/req_v", "Pengajuan");
  }
}
