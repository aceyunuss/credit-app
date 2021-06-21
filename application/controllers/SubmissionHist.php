<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubmissionHist extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m', 'Item_m', 'Submission_m']);
    $this->load->library('email');
  }

  public function index()
  {
    $uid = $this->session->userdata('user_id');

    $data['subs'] = $this->Submission_m->getSubmission("", $uid)->result_array();
    $this->template("submission_hist_v", "Riwayat Pengajuan", $data);
  }
}
