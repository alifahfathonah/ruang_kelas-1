<?php
class Materi extends CI_Controller{ 

	function __construct(){
		parent::__construct(); 
	}  
	function index(){ 
		if ( $this->session->userdata('login') == 1) {
			$data['title'] = 'BIMBEL | MATERI';
		    $data['breadcumb'] = 'MATERI';
		    $id_mapel = $this->session->userdata('mapel');

		    if ($this->session->userdata('level') == '2') {
		    	$data['data'] = $this->db->query("SELECT * FROM t_materi as a JOIN t_mapel as b ON a.materi_mapel = b.mapel_id AND mapel_id = '$id_mapel' order by a.materi_id DESC")->result_array();
		    } else {
		    	$data['data'] = $this->db->query("SELECT * FROM t_materi as a JOIN t_mapel as b ON a.materi_mapel = b.mapel_id order by a.materi_id DESC")->result_array();
		    }
		    
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('materi/index');
		    $this->load->view('v_template_admin/admin_footer');

		} 
		else{
			redirect(base_url('login'));
		}
	} 
	function add(){
		$data['title'] = 'BIMBEL | MATERI';
		$data['breadcumb'] = 'MATERI';
		$id_mapel = $this->session->userdata('mapel');

		if ($this->session->userdata('level') == '2') {
			$data['mapel_data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_id = '$id_mapel' AND mapel_hapus = 0")->result_array();
		}else{
			$data['mapel_data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_hapus = 0")->result_array();
		}
		
		$this->load->view('v_template_admin/admin_header',$data);
		$this->load->view('materi/add');
		$this->load->view('v_template_admin/admin_footer');
	}
	function insert(){
		$set = array(
					'materi_judul' => $_POST['materi_judul'], 
					'materi_isi' => $_POST['materi_isi'],
					'materi_mapel' => $_POST['materi_mapel'],
					'materi_tanggal' => date('Y-m-d'),
				);
		$this->db->set($set);

		if ($this->db->insert('t_materi')) {
			$this->session->set_flashdata('sukses','Berhasil Di Simpan');
			redirect(base_url('materi'));
		}else{
			$this->session->set_flashdata('gagal','Gagal Di Simpan');
			redirect(base_url('materi'));
		}	
	}
	function edit($id){

		$data['title'] = 'BIMBEL | MATERI';
		$data['breadcumb'] = 'MATERI';
		$id_mapel = $this->session->userdata('mapel');

		if ($this->session->userdata('level') == '2') {
			$data['mapel_data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_id = '$id_mapel' AND mapel_hapus = 0")->result_array();

			$data['data'] = $this->db->query("SELECT * FROM t_materi as a JOIN t_mapel as b ON a.materi_mapel = b.mapel_id where a.materi_id = '$id'")->row_array();
		}else{
			$data['mapel_data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_hapus = 0")->result_array();

			$data['data'] = $this->db->query("SELECT * FROM t_materi as a JOIN t_mapel as b ON a.materi_mapel = b.mapel_id where a.materi_id = '$id'")->row_array();
		}

		$this->load->view('v_template_admin/admin_header',$data);
		$this->load->view('materi/edit');
		$this->load->view('v_template_admin/admin_footer');
	}
	function update($id){
		$set = array(
					'materi_judul' => $_POST['materi_judul'], 
					'materi_isi' => $_POST['materi_isi'],
					'materi_mapel' => $_POST['materi_mapel'],
					'materi_tanggal' => date('Y-m-d'),
				);
		$this->db->set($set);
		$this->db->where('materi_id',$id);

		if ($this->db->update('t_materi')) {
			$this->session->set_flashdata('sukses','Berhasil Di Simpan');
			redirect(base_url('materi'));
		}else{
			$this->session->set_flashdata('gagal','Gagal Di Simpan');
			redirect(base_url('materi'));
		}	
	}
	function delete($id){
		$this->db->where('materi_id',$id);
		$this->db->delete('t_materi');

		$this->session->set_flashdata('sukses','Berhasil Hapus Data');
		redirect(base_url('materi'));
	}
}