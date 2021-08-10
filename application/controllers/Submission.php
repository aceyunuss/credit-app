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

    $now = date("Y-m-d");
    $date = strtotime($now . ' -17 year');
    $data['mindate'] = date('Y-m-d', $date);

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
      $itm = $this->Item_m->getItem($item_id)->row_array();
      $rows[0]['dp'] = number_format($itm['dp'], 2, ',', '.');
      $rows[0]['price'] = number_format($itm['price'], 2, ',', '.');
      $rows[0]['pict'] = !empty($itm['pict']) ? base_url('uploads/item/' . $itm['pict']) :  base_url('assets/img/theme/noi.png');
    } else {
      $rows = [];
    }

    echo json_encode($rows);
  }


  public function submitSubmission()
  {
    $uid = $this->session->userdata('user_id');

    $post = $this->input->post();
    $itm = $this->Item_m->getItem($post['item'])->row_array();
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
      'item_name'         => $itm['name'],
      'item_pict'         => $itm['pict'],
      'dp'                => str_replace(".", "", $post['dp']),
      'installment'       => $post['installment'],
      'installment_name'  => $installment,
      'insert_date'       => date("Y-m-d H:i:s"),
      'status'            => 'Menunggu Persetujuan',
      'birth_place'       => $post['birth_place'],
      'birth_date'        => $post['birth_date']
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

    if (!empty($_FILES['gaji']['name'])) {
      $dir = "submission_" . $uid;
      $this->session->set_userdata("dir_upload", $dir);
      $upload = $this->ups("gaji");
      $ins['gaji'] = $upload;
    }

    $this->db->trans_begin();

    $this->Submission_m->insertSubmission($ins);
    $sid = $this->db->insert_id();

    $crt = [];

    foreach ($post['criteria'] as $key => $value) {
      $ex = explode("|", $value);
      $mx = $this->Criteria_m->getMaxIndex($ex[0]);

      $this->db->where("criteria_id", $ex[0]);
      $wg = $this->Item_m->getCriteria("", $post['item'])->row()->item_weight;


      $crt[] = [
        'sid'       => $sid,
        'cid'       => $ex[0],
        'cid_desc'  => $ex[1],
        'cidx'      => $ex[2],
        'cidx_desc' => $ex[3],
        'score'     => $ex[4],
        'weight'    => $wg,
        'max_score' => $mx
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
