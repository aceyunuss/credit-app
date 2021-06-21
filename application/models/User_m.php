<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function createUser($input)
  {
    $this->db->insert("user", $input);
    return $this->db->affected_rows();
  }

  public function getUser()
  {
    return $this->db->get("user");
  }

  public function getUserLogin($email, $password)
  {
    $this->db->where(['email' => $email, 'password' => $password]);
    return $this->db->get("user");
  }

  public function getUserByEmail($email)
  {
    $this->db->where(['email' => $email]);
    return $this->db->get("user");
  }

  public function getUserById($id)
  {
    $this->db->where(['id' => $id]);
    return $this->db->get("user");
  }

  public function changePassword($id, $password)
  {
    $this->db->set(['password' => $password]);
    $this->db->where(['id' => $id])->update('user');
    return $this->db->affected_rows();
  }

  public function updateUser($id, $data)
  {
    $this->db->where(['id' => $id])->update('user', $data);
    return $this->db->affected_rows();
  }
}
