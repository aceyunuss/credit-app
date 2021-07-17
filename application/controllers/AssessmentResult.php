<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AssessmentResult extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m', 'Assessment_m', 'Submission_m', 'Criteria_m', 'Item_m']);
    $this->load->library('email');
  }

  public function index()
  {
    $data['asm'] = $this->Assessment_m->getAssessment()->result_array();
    $this->template("assessment_result_v", "Hasil Penilaian", $data);
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
    
    switch ($data['asm']['status']) {
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

    $this->template("assessment_detail_v", "Detail Hasil Penilaian", $data);
  }
}
