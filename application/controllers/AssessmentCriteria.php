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
    $data['idx_list'] = $this->Criteria_m->getIndexCriteria("", $id)->result_array();
    $this->template("criteria_index_v", "Indeks Penilaian", $data);
  }


  public function submitEditIndex()
  {

    $post = $this->input->post();
    $del = [];

    $this->db->trans_begin();

    foreach ($post['val'] as $k => $v) {

      $idx = !empty($post['idx'][$k]) ?  $post['idx'][$k] : "";

      $upd = [
        'cid'   => $post['cid'],
        'index' => $post['val'][$k],
        'desc'  => $post['desc'][$k],
      ];


      $act = $this->Criteria_m->replaceIndexCriteria($idx, $upd);

      if ($act) {
        $del[] = $act;
      }
    }

    $this->Criteria_m->deleteIfNotExistIndex($post['cid'], $del);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses mengubah data');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal mengubah data');
    }

    redirect('assessmentcriteria/updatecriteria/' . $post['cid']);
  }
}
