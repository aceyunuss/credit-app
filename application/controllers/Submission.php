<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submission extends Core_Controller
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

    $data['criteria'] = $this->Criteria_m->getCriteria()->result_array();
    $data['criteria_index'] = $this->Criteria_m->getIndexCriteria()->result_array();
    $data['items'] = $this->Item_m->getItem()->result_array();
    $data['usr'] = $this->User_m->getUserById($uid)->row_array();
    $this->template("submission_v", "Pengajuan", $data);
  }

  public function getInstallment()
  {

    $item_id = $this->input->get('item');

    if (!empty($item_id)) {
      $rows = $this->Item_m->getInstallmentItem("", $item_id)->result_array();
      $rows[0]['dp'] = $this->Item_m->getItem($item_id)->row()->dp;
    } else {
      $rows = [];
    }

    echo json_encode($rows);
  }


  public function submitSubmission()
  {
    $uid = $this->session->userdata('user_id');

    $post = $this->input->post();
    $item = $this->Item_m->getItem($post['item'])->row()->name;
    $installment = $this->Item_m->getInstallmentItem($post['installment'])->row()->period;
    $num = $this->Submission_m->getNumber();

    $ins = [
      'user_id'           => $uid,
      'sub_number'        => $num,
      'name'              => $post['name'],
      'nik'               => $post['nik'],
      'store_addr'        => $post['store_addr'],
      'home_addr'         => $post['home_addr'],
      'phone'             => $post['phone'],
      'item'              => $post['item'],
      'item_name'         => $item,
      'dp'                => $post['dp'],
      'installment'       => $post['installment'],
      'installment_name'  => $installment,
      'insert_date'       => date("Y-m-d H:i:s"),
      'status'            => 'Menunggu Persetujuan'
    ];

    if (!empty($_FILES['ktp']['name'])) {
      $dir = "submission_" . $uid;
      $this->session->set_userdata("dir_upload", $dir);
      $upload = $this->ups("ktp");
      $ins['ktp'] = $upload;
    }

    if (!empty($_FILES['kk']['name'])) {
      $dir = "submission_" . $uid;
      $this->session->set_userdata("dir_upload", $dir);
      $upload = $this->ups("kk");
      $ins['kk'] = $upload;
    }

    $this->db->trans_begin();

    $this->Submission_m->insertSubmission($ins);
    $sid = $this->db->insert_id();

    $crt = [];

    foreach ($post['criteria'] as $key => $value) {
      $ex = explode("-", $value);
      $crt[] = [
        'sid'   => $sid,
        'cid'   => $ex[0],
        'cidx'  => $ex[1]
      ];
    }
    $this->Submission_m->insertSubmissionCriteria($crt);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses membuat pengajuan');
      redirect('submissionhist');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal membuat pengajuan');
      redirect('submission');
    }
  }
}
