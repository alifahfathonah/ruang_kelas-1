<?php
class Film extends CI_Controller{ 

	function __construct(){
		parent::__construct();
	} 
	function index(){ 
		if ( $this->session->userdata('login') == 1) {
			$data['title'] = 'BIMBEL | FILM PEMBELAJARAN';
		    $data['breadcumb'] = 'FILM PEMBELAJARAN';
		    $id_mapel = $this->session->userdata('mapel');

		    if ($this->session->userdata('level') == '2') {
		    	$data['data'] = $this->db->query("SELECT * FROM t_film as a JOIN t_mapel as b ON a.film_mapel = b.mapel_id AND a.film_mapel = '$id_mapel' order by a.film_id DESC")->result_array();
		    	$data['mapel_data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_id = '$id_mapel' AND mapel_hapus = 0")->result_array();
		    } else {
		    	$data['data'] = $this->db->query("SELECT * FROM t_film as a JOIN t_mapel as b ON a.film_mapel = b.mapel_id order by a.film_id DESC")->result_array();
		    	$data['mapel_data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_hapus = 0")->result_array();
		    }

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('film/index');
		    $this->load->view('v_template_admin/admin_footer');

		}
		else{
			redirect(base_url('login'));
		} 
	} 
	function add(){
		$link = $_POST['film_link'];
		//api cek link
		$video_url = @file_get_contents('https://www.youtube.com/oembed?format=json&url='.$link);
		if (@$video_url) {
			$cek = strpos($link,"https://www.");
			if (@$cek) {
				$link_fix = str_replace('youtube.com/watch?v=', '', $link);
			}else{
				$link_fix = str_replace('https://www.youtube.com/watch?v=', '', $link);
			}

			$set = array(
						'film_judul' => $_POST['film_judul'], 
						'film_link' => $link_fix,
						'film_tanggal' => date('Y-m-d'),
						'film_mapel' => $_POST['film_mapel'],
					);
			$this->db->set($set);

			if ($this->db->insert('t_film')) {
				$this->session->set_flashdata('sukses','Berhasil Di Simpan');
				redirect(base_url('film'));
			}else{
				$this->session->set_flashdata('gagal','Gagal Di Simpan');
				redirect(base_url('film'));
			}	
		}else{
			$this->session->set_flashdata('gagal','Link video salah');
			redirect(base_url('film'));
		}
		
	}
	function edit($id){
		$link = $_POST['film_link'];
		//api cek link
		$video_url = @file_get_contents('https://www.youtube.com/oembed?format=json&url='.$link);

		if (@$video_url) {
			$cek = strpos($link,"https://www.");
			if (@$cek) {
				$link_fix = str_replace('youtube.com/watch?v=', '', $link);
			}else{
				$link_fix = str_replace('https://www.youtube.com/watch?v=', '', $link);
			}
			
			$set = array(
						'film_judul' => $_POST['film_judul'], 
						'film_link' => $link_fix,
						'film_mapel' => $_POST['film_mapel'],
					);
			$this->db->set($set);
			$this->db->where('film_id',$id);

			if ($this->db->update('t_film')) {
				$this->session->set_flashdata('sukses','Berhasil Di Simpan');
				redirect(base_url('film'));
			}else{
				$this->session->set_flashdata('gagal','Gagal Di Simpan');
				redirect(base_url('film'));
			}	
		}else{
			$this->session->set_flashdata('gagal','Link video salah');
			redirect(base_url('film'));
		}
	}
	function delete($id){
		$this->db->where('film_id',$id);
		$this->db->delete('t_film');

		$this->session->set_flashdata('sukses','Berhasil Hapus Data');
		redirect(base_url('film'));
	}
}