<?php
class Mapel extends CI_Controller{ 

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['title'] = 'BIMBEL | MATA PELAJARAN';
		    $data['breadcumb'] = 'MATA PELAJARAN';
		    $data['data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_hapus = 0 order by mapel_id DESC")->result_array();
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('mapel/index');
		    $this->load->view('v_template_admin/admin_footer');

		} 
		else{ 
			redirect(base_url('login'));
		}
	} 
	function add(){
		$set = array(
						'mapel_nama' => $_POST['mapel_nama'],
						'mapel_kepanjangan' => $_POST['mapel_kepanjangan'],
						'mapel_tanggal' => date('Y-m-d'), 
					);
		$this->db->set($set);

		if ($this->db->insert('t_mapel')) {
			$this->session->set_flashdata('sukses','Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('gagal','Gagal Di Simpan');
		}

		redirect(base_url('mapel'));
		
	}
	
	function edit($id){
		$set = array(
						'mapel_nama' => $_POST['mapel_nama'],
						'mapel_kepanjangan' => $_POST['mapel_kepanjangan'],
						'mapel_tanggal' => date('Y-m-d'), 
					);
		$this->db->set($set);
		$this->db->where('mapel_id',$id);
		if ($this->db->update('t_mapel')) {
			$this->session->set_flashdata('sukses','Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('gagal','Gagal Di Simpan');
		}

		redirect(base_url('mapel'));
	}
	function delete($id){
		$this->db->where('mapel_id',$id);
		$this->db->set('mapel_hapus',1);
		$this->db->update('t_mapel');

		$this->session->set_flashdata('sukses','Berhasil Hapus Data');
		redirect(base_url('mapel'));
	}
}