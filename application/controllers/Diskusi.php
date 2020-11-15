<?php
class Diskusi extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
		    $data['title'] = 'BIMBEL | DISKUSI';
		    $data['breadcumb'] = 'DISKUSI';

		    //data jumlah
		    $data['data'] = $this->db->query("SELECT * FROM t_diskusi AS a JOIN t_user AS b ON a.diskusi_iduser = b.user_id order BY a.diskusi_id desc")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('diskusi/index');
		    $this->load->view('v_template_admin/admin_footer');

		}
		else{
			redirect(base_url('login'));
		}
	} 
	function send(){
		$set = array(
						'diskusi_iduser' => $this->session->userdata('id'), 
						'diskusi_text' => $_POST['diskusi_text'], 
						'diskusi_tanggal' => date("Y-m-d"), 
					);

		$this->db->set($set);

		if ($this->db->insert('t_diskusi')) {
			$this->session->set_flashdata('sukses','Berhasil Di kirim');
			redirect(base_url('diskusi'));
		}else{
			$this->session->set_flashdata('gagal','Gagal Di kirim');
			redirect(base_url('diskusi'));
		}	
	}
}