<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submission extends Core_Controller
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

    $ins = [
      'user_id'           => $uid,
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
      'insert_date'       => date("Y-m-d H:i:s")
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
