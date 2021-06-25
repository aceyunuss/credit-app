<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Assessment_m extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function setScore($id, $data)
  {
    $this->db->where(['id' => $id])->update('submission', $data);
    return $this->db->affected_rows();
  }
}
