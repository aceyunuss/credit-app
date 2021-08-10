<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['Sales_m', 'Submission_m']);
    $this->load->library('email');
  }


  public function index()
  {
    $data['sales'] = $this->Sales_m->getSalesRec()->result_array();
    $this->template("sales_v", "Daftar Sales", $data);
  }


  public function detail($id)
  {
    $data['sales_id'] = $id;
    $data['sales'] = $this->Sales_m->getSales($id)->row_array();

    $this->db->where(['sales_id'=>$id]);
    $data['hist'] = $this->Submission_m->getSubmission()->result_array();

    $this->template("detail_sales_v", "Daftar Sales", $data);
  }

  public function add()
  {
    $data['sales_id'] = "";
    $data['sales'] = [];
    $this->template("detail_sales_v", "Daftar Sales", $data);
  }

  public function submitSales()
  {
    $post = $this->input->post();
    $del = [];

    $sales_id = (isset($post['sales_id']) && !empty($post['sales_id'])) ? $post['sales_id'] : "";

    $ins = [
      'sales_name'  => $post['name'],
    ];

    $this->db->trans_begin();

    if (empty($sales_id)) {
      $ms = "menginput";
      $this->Sales_m->insertSales($ins);
      $sales_id = $this->db->insert_id();
    } else {
      $ms = "mengubah";
      $this->Sales_m->updateSales($sales_id, $ins);
    }


    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses ' . $ms . ' data');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal ' . $ms . ' data');
    }

    redirect('sales/detail/' . $sales_id);
  }


  public function delete($id)
  {

    $this->db->trans_begin();

    $this->Sales_m->deleteSales($id);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses menghapus data');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal menghapus data');
    }

    redirect('sales');
  }
}
