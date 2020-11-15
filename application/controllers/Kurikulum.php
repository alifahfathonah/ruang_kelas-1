<?php
class Kurikulum extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['title'] = 'BIMBEL | KI & KD';
		    $data['breadcumb'] = 'KI & KD';
		    $data['data'] = $this->db->query("SELECT * FROM t_kurikulum")->row_array();
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('kurikulum/index');
		    $this->load->view('v_template_admin/admin_footer');

		}
		else{
			redirect(base_url('login'));
		}
	} 
	function edit($id){
		
		$set = array(
					'kurikulum_isi' => $_POST['kurikulum_isi'], 
					'kurikulum_tgl_edit' => date('Y-m-d'),
				);
		$this->db->set($set);
		$this->db->where('kurikulum_id',$id);
		if ($this->db->update('t_kurikulum')) {
			$this->session->set_flashdata('sukses','Berhasil Di Edit');
			redirect(base_url('kurikulum'));
		}else{
			$this->session->set_flashdata('gagal','Gagal Di Edit');
			redirect(base_url('kurikulum'));
		}	
	}
}