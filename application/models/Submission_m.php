
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Submission_m extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }


  public function insertSubmission($data)
  {
    $this->db->insert("submission", $data);
    return $this->db->affected_rows();
  }


  public function getSubmission($id = "", $user = "")
  {
    if (!empty($id)) {
      $this->db->where(['id' => $id]);
    }
    if (!empty($user)) {
      $this->db->where(['user_id' => $user]);
    }
    return $this->db->get("submission");
    
  }
}
