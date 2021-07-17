<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubmissionHist extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m', 'Item_m', 'Criteria_m', 'Submission_m']);
    $this->load->library('email');
  }

  public function index()
  {
    $uid = $this->session->userdata('user_id');

    $data['subs'] = $this->Submission_m->getSubmission("", $uid)->result_array();
    $this->template("submission_hist_v", "Riwayat Pengajuan", $data);
  }

  public function detail($id)
  {
    $data['criteria'] = $this->Criteria_m->getCriteria()->result_array();
    $data['criteria_index'] = $this->Criteria_m->getIndexCriteria()->result_array();
    $data['installment'] = $this->Item_m->getInstallmentItem()->result_array();
    $data['items'] = $this->Item_m->getItem()->result_array();
    $data['subs'] = $this->Submission_m->getSubmission($id)->row_array();
    $data['quest'] = $this->Submission_m->getSubmissionCriteria("", $id)->result_array();

    switch ($data['subs']['status']) {
      case 'Disetujui':
        $data['badge'] = "success";
        break;
      case 'Survey Ulang':
        $data['badge'] = "warning";
        break;
      case 'Ditolaj':
        $data['badge'] = "danger";
        break;
      default:
        $data['badge'] = "primary";
        break;
    }

    $this->template("detail_submission_hist_v", "Detail Riwayat Pengajuan", $data);
  }
}
