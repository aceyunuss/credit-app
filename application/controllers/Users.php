<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m']);
    $this->load->library('email');
  }

  public function index()
  {
    $data['list_user'] = $this->User_m->getUser()->result_array();

    $this->template("users_v", "Pengguna Aplikasi", $data);
  }
}
