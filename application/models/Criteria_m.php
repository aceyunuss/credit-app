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
    return $this->db->get("adm_criteria");
  }
}
