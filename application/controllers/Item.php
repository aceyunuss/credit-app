<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m', 'Item_m']);
    $this->load->library('email');
  }


  public function index()
  {
    $data['item'] = $this->Item_m->getItem()->result_array();
    $this->template("item_v", "Daftar Barang", $data);
  }


  public function detail($id)
  {
    $data['item'] = $this->Item_m->getItem($id)->row_array();
    $data['installment'] = $this->Item_m->getInstallmentItem("", $id)->result_array();
    $this->template("detail_item_v", "Daftar Barang", $data);
  }

  public function add()
  {
    $data['item'] = [];
    $data['installment'] = [];
    $this->template("detail_item_v", "Daftar Barang", $data);
  }

  public function submitItem()
  {
    $post = $this->input->post();

    $item_id = isset($post['item_id']) ? $post['item_id'] : "";

    $ins = [
      'kode_barang' => $post['code'],
      'name'        => $post['name'],
      'price'       => $post['price'],
      'dp'          => $post['dp']
    ];

    if (!empty($_FILES['item']['name'])) {
      $this->session->set_userdata("dir_upload", "item");
      $upload = $this->ups("item");
      $ins['pict'] = $upload;
    }

    $this->db->trans_begin();

    if (empty($item_id)) {
      $ms = "menginput";
      $this->Item_m->insertItem($ins);
      $item_id = $this->db->insert_id();
    } else {
      $ms = "mengubah";
      $this->Item_m->updateItem($item_id, $ins);
    }

    foreach ($post['idi'] as $k => $v) {

      $idi = !empty($post['idi'][$k]) ?  $post['idi'][$k] : "";

      $upd = [
        'items_id'  => $item_id,
        'period'    => $post['desc'][$k]
      ];

      $act = $this->Item_m->replaceInstallment($idi, $upd);

      if ($act) {
        $del[] = $act;
      }
    }

    $this->Item_m->deleteIfNotExistInstallment($item_id, $del);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses ' . $ms . ' data');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal ' . $ms . ' data');
    }

    redirect('item/detail/' . $item_id);
  }
}
