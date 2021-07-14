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


  public function insertItem($input)
  {
    $this->db->insert("items", $input);
    return $this->db->affected_rows();
  }


  public function updateItem($id, $input)
  {
    $this->db->where(['id' => $id])->update("items", $input);
    return $this->db->affected_rows();
  }


  public function getInstallment($id = "", $item_id = "")
  {
    if (!empty($id)) {
      $this->db->where(['id' => $id]);
    }
    if (!empty($item_id)) {
      $this->db->where(['items_id' => $item_id]);
    }
    return $this->db->get("installment");
  }


  public function updateInstallment($id, $input)
  {
    $this->db->where(['id' => $id])->update("installment", $input);
    return $this->db->affected_rows();
  }


  public function insertInstallment($input)
  {
    $this->db->insert("installment", $input);
    return $this->db->affected_rows();
  }


  public function replaceInstallment($id, $input)
  {
    if (!empty($input)) {

      if (!empty($id)) {

        $check = $this->getInstallment($id, $input['items_id'])->row_array();

        if (!empty($check)) {

          $last_id = $check['id'];
          unset($input['id']);
          $this->updateInstallment($last_id, $input);
        } else {

          $this->insertInstallment($input);
          $last_id = $this->db->insert_id();
        }
      } else {

        $this->insertInstallment($input);
        $last_id = $this->db->insert_id();
      }

      return $last_id;
    }
  }


  public function deleteIfNotExistInstallment($id, $deleted)
  {
    if (!empty($id) && !empty($deleted)) {
      $this->db->where_not_in("id", $deleted)->where("items_id", $id)->delete("installment");
      return $this->db->affected_rows();
    }
  }
}
