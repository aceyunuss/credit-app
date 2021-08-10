<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sales_m extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function getSales($id = "")
  {

    if (!empty($id)) {
      $this->db->where(['sales_id' => $id]);
    }

    return $this->db->get("sales");
  }

  public function insertSales($input)
  {
    $this->db->insert("sales", $input);
    return $this->db->affected_rows();
  }


  public function updateSales($id, $input)
  {
    $this->db->where(['sales_id' => $id])->update("sales", $input);
    return $this->db->affected_rows();
  }

  public function deleteSales($id)
  {
    $this->db->where("sales_id", $id)->delete("sales");
  }
}
