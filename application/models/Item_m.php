<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Item_m extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function getItem($id = "")
  {

    if (!empty($id)) {
      $this->db->where(['id' => $id]);
    }

    return $this->db->get("items");
  }

  public function getInstallmentItem($id = "", $item = "")
  {

    if (!empty($id)) {
      $this->db->where(['id' => $id]);
    }

    if (!empty($item)) {
      $this->db->where(['items_id' => $item]);
    }

    return $this->db->get("installment");
  }
}
