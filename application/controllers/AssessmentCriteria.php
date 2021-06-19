<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AssessmentCriteria extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m', 'Criteria_m']);
    $this->load->library('email');
  }


  public function index()
  {
    $data['criteria'] = $this->Criteria_m->getCriteria()->result_array();
    $this->template("criteria_v", "Kriteria Penilaian", $data);
  }


  public function updateCriteria($id)
  {
    $data['criteria'] = $this->Criteria_m->getCriteria($id)->row_array();
    $this->template("criteria_index_v", "Indeks Penilaian", $data);
  }


  public function submitEditIndex()
  {

    $post = $this->input->post();
    echo '<pre>';
    var_dump($post);
    die();
  }
}
