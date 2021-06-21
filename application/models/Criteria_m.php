<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Criteria_m extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }


  public function getCriteria($id = "")
  {
    if (!empty($id)) {
      $this->db->where(['id' => $id]);
    }
    return $this->db->get("criteria");
  }


  public function getIndexCriteria($id = "", $cid = "")
  {
    if (!empty($id)) {
      $this->db->where(['id' => $id]);
    }
    if (!empty($cid)) {
      $this->db->where(['cid' => $cid]);
    }
    return $this->db->get("criteria_index");
  }


  public function updateIndexCriteria($id, $input)
  {
    $this->db->where(['id' => $id])->update("criteria_index", $input);
    return $this->db->affected_rows();
  }


  public function insertIndexCriteria($input)
  {
    $this->db->insert("criteria_index", $input);
    return $this->db->affected_rows();
  }


  public function replaceIndexCriteria($id, $input)
  {
    if (!empty($input)) {

      if (!empty($id)) {

        $check = $this->getIndexCriteria($id, $input['cid'])->row_array();

        if (!empty($check)) {

          $last_id = $check['id'];
          unset($input['id']);
          $this->updateIndexCriteria($last_id, $input);
        } else {

          $this->insertIndexCriteria($input);
          $last_id = $this->db->insert_id();
        }
      } else {

        $this->insertIndexCriteria($input);
        $last_id = $this->db->insert_id();
      }

      return $last_id;
    }
  }


  public function deleteIfNotExistIndex($id, $deleted)
  {
    if (!empty($id) && !empty($deleted)) {
      $this->db->where_not_in("id", $deleted)->where("cid", $id)->delete("criteria_index");
      return $this->db->affected_rows();
    }
  }
}
