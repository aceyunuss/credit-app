<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assessment extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m', 'Item_m', 'Criteria_m', 'Submission_m', 'Assessment_m']);
    $this->load->library('email');
  }


  public function index()
  {
    $this->db->where(['status' => 'Menunggu Persetujuan']);
    $data['subs'] = $this->Submission_m->getSubmission()->result_array();
    $this->template("assessment_v", "Penilaian", $data);
  }


  public function process($id)
  {

    $data['installment'] = $this->Item_m->getInstallmentItem()->result_array();
    $data['items'] = $this->Item_m->getItem()->result_array();
    $data['subs'] = $this->Submission_m->getSubmission($id)->row_array();
    $data['quest'] = $this->Submission_m->getSubmissionCriteria("", $id)->result_array();

    $this->db->join("item_criteria", "item_criteria.criteria_id=criteria.id and item_id=" . $data['subs']['item'], "left");
    $data['criteria'] = $this->Criteria_m->getCriteria()->result_array();
    $data['criteria_index'] = $this->Criteria_m->getIndexCriteria()->result_array();

    $this->template("process_assessment_v", "Proses Penilaian", $data);
  }

  public function submitAssessment()
  {
    $post = $this->input->post();

    $upd = [
      'status'      => $post['status'] == "y" ? "Disetujui" : "Ditolak",
      'score'       => $post['score'],
      'review_date' => date("Y-m-d H:i:s")
    ];

    $this->db->trans_begin();

    $this->Assessment_m->setScore($post['sub_id'], $upd);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses melakukan penilaian');
      redirect('assessment');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal melakukan penilaian');
      redirect('assessment/process/' . $post['sub_id']);
    }
  }
}
