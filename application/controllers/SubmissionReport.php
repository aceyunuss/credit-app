<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubmissionReport extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m', 'Assessment_m', 'Submission_m', 'Criteria_m', 'Item_m', 'Sales_m']);
    $this->load->library('email');
  }

  public function index()
  {
    $this->db->where(['status !=' => 'Menunggu Persetujuan']);
    $data['asm'] = $this->Assessment_m->getAssessment()->result_array();
    $this->template("submission_report_v", "Laporan Pengajuan", $data);
  }


  public function detail($id)
  {
    $data['installment'] = $this->Item_m->getInstallmentItem()->result_array();
    $data['items'] = $this->Item_m->getItem()->result_array();
    $data['asm'] = $this->Assessment_m->getAssessment($id)->row_array();
    $data['quest'] = $this->Submission_m->getSubmissionCriteria("", $id)->result_array();

    $this->db->join("item_criteria", "item_criteria.criteria_id=criteria.id and item_id=" . $data['asm']['item'], "left");
    $data['criteria'] = $this->Criteria_m->getCriteria()->result_array();
    $data['criteria_index'] = $this->Criteria_m->getIndexCriteria()->result_array();
    $data['sales'] = $this->Sales_m->getSales()->result_array();

    $this->template("submission_detail_v", "Detail Hasil Penilaian", $data);
  }
}
