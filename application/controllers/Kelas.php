<?php
class Kelas extends CI_Controller{ 

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['title'] = 'BIMBEL | KELAS';
		    $data['breadcumb'] = 'KELAS';
		    $data['data'] = $this->db->query("SELECT * FROM t_kelas WHERE kelas_hapus = 0 order by kelas_id DESC")->result_array();
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('kelas/index');
		    $this->load->view('v_template_admin/admin_footer');

		} 
		else{ 
			redirect(base_url('login'));
		}
	} 
	function add(){
		$set = array(
						'kelas_nama' => $_POST['kelas_nama'],
						'kelas_tanggal' => date('Y-m-d'), 
					);
		$this->db->set($set);

		if ($this->db->insert('t_kelas')) {
			$this->session->set_flashdata('sukses','Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('gagal','Gagal Di Simpan');
		}

		redirect(base_url('kelas'));
		
	}
	
	function edit($id){
		$set = array(
						'kelas_nama' => $_POST['kelas_nama'],
						'kelas_tanggal' => date('Y-m-d'), 
					);
		$this->db->set($set);
		$this->db->where('kelas_id',$id);
		if ($this->db->update('t_kelas')) {
			$this->session->set_flashdata('sukses','Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('gagal','Gagal Di Simpan');
		}

		redirect(base_url('kelas'));
	}
	function delete($id){
		$this->db->where('kelas_id',$id);
		$this->db->set('kelas_hapus',1);
		$this->db->update('t_kelas');

		$this->session->set_flashdata('sukses','Berhasil Hapus Data');
		redirect(base_url('kelas'));
	}
}