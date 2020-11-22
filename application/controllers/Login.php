<?php
class Login extends CI_Controller{

  function __construct(){
    parent::__construct();
  } 
  function index(){
    $data['title'] = "BIMBEL | LOGIN";

    $data['bg'] = $this->db->query("SELECT pengaturan_background as bg FROM t_pengaturan")->row_array();

    //pengaturan 
    $p = $this->db->query("SELECT * FROM t_pengaturan")->row_array();
    $this->session->set_userdata('latar',$p['pengaturan_latar']);
    $this->session->set_userdata('background',$p['pengaturan_background']);
    $this->session->set_userdata('logo',$p['pengaturan_logo']);
    $this->session->set_userdata('latar-status',$p['pengaturan_latar_status']);
    $this->load->view('login',$data);
  }
  function auth(){ 
    $email = $this->input->post('user_email');
    $pass = md5($this->input->post('user_password'));
    // $pass = $this->input->post('user_password');
    $level = $this->input->post('user_level');

    $cek = $this->db->query("SELECT * FROM t_user WHERE user_email = '$email' AND user_password = '$pass' AND user_level = '$level'")->row_array();
   
        if (count($cek['user_email']) > 0) {
          
              //ciptakan sesi
              $this->session->set_userdata('name',$cek['user_name']);
              $this->session->set_userdata('pass',$cek['user_password']);

              $this->session->set_userdata('id',$cek['user_id']);
              $this->session->set_userdata('login','1');
              $this->session->set_userdata('level',$cek['user_level']);
              $this->session->set_userdata('mapel',$cek['user_mapel']);
              $this->session->set_userdata('kelas',$cek['user_kelas']);

              //pengaturan
              $p = $this->db->query("SELECT * FROM t_pengaturan")->row_array();
              $this->session->set_userdata('latar',$p['pengaturan_latar']);
              $this->session->set_userdata('background',$p['pengaturan_background']);
              $this->session->set_userdata('kkm',$p['pengaturan_kkm']);
              $this->session->set_userdata('logo',$p['pengaturan_logo']);
              $this->session->set_userdata('background-status',$p['pengaturan_background_status']);
              $this->session->set_userdata('latar-status',$p['pengaturan_latar_status']);

              redirect(base_url('dashboard')); 
      }
      else{
         $this->session->set_flashdata('gagal','Email / Password salah');
         redirect(base_url('login'));
      }
  }
  function logout(){
    session_destroy();
    redirect(base_url('login')); 
  }
}