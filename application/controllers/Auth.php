<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends Core_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['User_m']);
    $this->load->library('email');
  }

  public function index()
  {
    if (empty($this->session->userdata('user_id'))) {

      $data['title'] = "Credit Apps - Login";
      $this->load->view("login_v", $data);
    } else {

      $this->load->model(['Item_m']);

      $data['usr'] = $this->User_m->getUser()->num_rows();
      $data['sub'] = $this->User_m->getSubs();
      $data['apr'] = $this->User_m->getApprove();
      $data['rjc'] = $this->User_m->getReject();

      $this->db->where(['created_date >=' => date('Y-m-d')]);
      $data['today_user'] = $this->User_m->getUser()->num_rows();

      $this->db->limit(6);
      $this->db->where(["pict !=" => NULL]);
      $data['item'] = $this->Item_m->getItem()->result_array();

      $data['role'] = $this->session->userdata('role');
      
      $this->template('dashboard_v', "Dashboard", $data);
    }
  }

  public function login()
  {
    $validation_config = [
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required'
      ],
      [
        'field' => 'pass',
        'label' => 'Password',
        'rules' => 'required'
      ],
    ];

    $this->form_validation->set_rules($validation_config);

    if ($this->form_validation->run() == false) {
      $this->session->set_userdata('result', 'Email dan password harus diisi.');
    } else {
      $email = $this->input->post('email');
      $pass = md5($this->input->post('pass'));

      if ($this->input->post('role') == 'c') {
        $this->db->where(['role' => 'Konsumen']);
      } else {
        $this->db->where(['role !=' => 'Konsumen']);
      }

      $user = $this->User_m->getUserLogin($email, $pass)->row_array();

      if (empty($user)) {
        $this->session->set_userdata('result', 'Email dan password tidak cocok. Silahkan cek kembali');
      }

      $data_session = [
        'user_id' => $user['id'],
        'role'    => $user['role'],
        'name'    => $user['fullname']
      ];

      $this->session->set_userdata($data_session);

      redirect('home');
    }
  }


  public function out()
  {
    $this->session->sess_destroy();
    redirect('auth');
  }


  public function submitRegist()
  {
    $post = $this->input->post();

    $birthdate_str = strtotime($post['dob']);
    $birthdate = date('Y-m-d', $birthdate_str);

    $ins = [
      'fullname'      => $post['name'],
      'email'         => $post['email'],
      'phone'         => $post['phone'],
      // 'address'       => $post['addr'],
      // 'birthdate'     => $birthdate,
      'role'          => "Konsumen",
      // 'gender'        => $post['gender'],
      'password'      => md5($post['pass']),
      'created_date'  => date("Y-m-d H:i:s"),
      'updated_date'  => date("Y-m-d H:i:s")
    ];

    $this->db->trans_begin();

    $check = $this->User_m->getUserByEmail($post['email'])->num_rows();

    if ($check > 0) {
      $this->session->set_userdata('result', 'Email sudah terdaftar');
      redirect('auth/register');
    }

    $this->User_m->createUser($ins);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses membuat akun');
      redirect('auth');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal membuat akun');
      redirect('auth/register');
    }
  }


  public function forgot()
  {
    $data['title'] = "Online Learning - Forgot Password";
    $this->load->view("components/header", $data);
    $this->load->view("v_forgot_password");
    $this->load->view("components/footer");
  }

  public function register()
  {
    $data['title'] = "Credit Apps - Register";
    $this->load->view('register_v', $data);
  }

  public function changePassword()
  {
    $user_id = $this->session->userdata('user_id');

    $post = $this->input->post();

    $password = md5($post['new_pass']);

    $this->db->trans_begin();

    $this->User_m->changePassword($user_id, $password);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      redirect('auth');
      // $this->session->set_userdata('result', 'Sukses mengubah materi');
    } else {
      $this->db->trans_rollback();
      // $this->session->set_userdata('result', 'Gagal mengubah materi');
    }
  }

  public function profile()
  {
    $user = $this->session->userdata();

    $data['sub'] = $this->User_m->getSubs($user['user_id']);
    $data['apr'] = $this->User_m->getApprove($user['user_id']);
    $data['rjc'] = $this->User_m->getReject($user['user_id']);
    $data['profile'] = $this->User_m->getUserById($user['user_id'])->row_array();

    $this->template("profile_v", "Profil", $data);
  }


  public function submitEditProfile()
  {
    $post = $this->input->post();

    $birthdate_str = strtotime($post['dob']);
    $birthdate = date('Y-m-d', $birthdate_str);

    $ins = [
      'fullname'      => $post['name'],
      'email'         => $post['email'],
      'phone'         => $post['phone'],
      'address'       => $post['addr'],
      'birthdate'     => $birthdate,
      'gender'        => $post['gender'],
      'updated_date'  => date("Y-m-d H:i:s")
    ];

    $this->db->trans_begin();

    $this->User_m->updateuser($post['user_id'], $ins);

    if ($this->db->trans_status() !== FALSE) {
      $this->db->trans_commit();
      $this->session->set_userdata('result', 'Sukses mengubah profil');
    } else {
      $this->db->trans_rollback();
      $this->session->set_userdata('result', 'Gagal mengubah profil');
    }
    redirect('auth/profile');
  }

  public function nf()
  {
    $this->template("nf_v", "Not Found");
  }
}
