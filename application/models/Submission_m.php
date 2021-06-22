
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


  public function insertSubmissionCriteria($data)
  {
    $this->db->insert_batch("submission_quest", $data);
    return $this->db->affected_rows();
  }


  public function getSubmissionCriteria($id = "", $sid = "")
  {
    if (!empty($id)) {
      $this->db->where(['id' => $id]);
    }
    if (!empty($sid)) {
      $this->db->where(['sid' => $sid]);
    }
    return $this->db->get("submission_quest");
  }


  public function getNumber()
  {
    $this->db->where("YEAR(insert_date) =", date("Y"), false);
    $this->db->select("COUNT(id) as urut");
    $get = $this->db->get("submission")->row()->urut;
    $get++;
    $lst = str_repeat(0, 5 - strlen($get)) . $get;

    return "PJ." . date("Ym") . "." . $lst;
  }
}
