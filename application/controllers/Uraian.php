<?php
class Uraian extends CI_Controller{ 

	function __construct(){
		parent::__construct(); 
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['title'] = 'BIMBEL | URAIAN';
		    $data['breadcumb'] = 'URAIAN';
		    $id_mapel = $this->session->userdata('mapel');

		    if ($this->session->userdata('level') == '2') {
		    	$data['data'] = $this->db->query("SELECT * FROM t_uraian as a JOIN t_mapel as b ON a.uraian_mapel = b.mapel_id WHERE a.uraian_mapel = '$id_mapel' AND a.uraian_hapus = 0 order by a.uraian_id DESC")->result_array();
		    }else{
		    	$data['data'] = $this->db->query("SELECT * FROM t_uraian as a JOIN t_mapel as b ON a.uraian_mapel = b.mapel_id WHERE a.uraian_hapus = 0 order by a.uraian_id DESC")->result_array();
		    }
		    
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('uraian/index');
		    $this->load->view('v_template_admin/admin_footer');

		}  
		else{
			redirect(base_url('login'));
		}
	} 
	function delete($id){
		$this->db->where('uraian_id',$id);
		$this->db->set('uraian_hapus','1');

		if ($this->db->update('t_uraian')) {
			$this->session->set_flashdata('sukses','Berhasil Di Simpan');
		}else{
			$this->session->set_flashdata('gagal','Gagal Di Simpan');
		}
		redirect(base_url('uraian'));
	}
	function add(){
		if ( $this->session->userdata('login') == 1) {
			$data['title'] = 'BIMBEL | URAIAN';
		    $data['breadcumb'] = 'URAIAN';
		    $id_mapel = $this->session->userdata('mapel');

		    if ($this->session->userdata('level') == '2') {
		    	$data['mapel_data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_id = '$id_mapel' AND mapel_hapus = 0")->result_array();
		    }else{
		    	$data['mapel_data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_hapus = 0")->result_array();
		    }
		    
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('uraian/add');
		    $this->load->view('v_template_admin/admin_footer');

		}
		else{
			redirect(base_url('login'));
		}
	}
	function edit($id){ 
		if ( $this->session->userdata('login') == 1) {
			$data['title'] = 'BIMBEL | URAIAN';
		    $data['breadcumb'] = 'URAIAN';
		    $data['id'] = $id;
		    $id_mapel = $this->session->userdata('mapel');

		    if ($this->session->userdata('level') == '2') {
		    	$data['mapel_data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_id = '$id_mapel' AND mapel_hapus = 0")->result_array();
		    }else{
		    	$data['mapel_data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_hapus = 0")->result_array();
		    }
		    
		    $db = $this->db->query("SELECT * FROM t_uraian as a JOIN t_mapel as b ON a.uraian_mapel = b.mapel_id where a.uraian_id = '$id'")->row_array();

		    //soal di pecah bentuk array//
			$soal = '['.$db['uraian_soal'].']';
			$x = json_decode($soal,true);
			$data['data'] = $x[0];

			$data['mapel_val'] = $db['mapel_nama'];
			$data['mapel_id'] = $db['mapel_id'];

			$this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('uraian/edit');
		    $this->load->view('v_template_admin/admin_footer');
		}
		else{
			redirect(base_url('login'));
		}
	}
	function save(){
		$id = $_POST['id'];
		if (@$id) {
			//edit
			$set = array(
						'uraian_judul' => $_POST['uraian_judul'],
						'uraian_soal' => json_encode($_POST), 
						'uraian_mapel' => $_POST['uraian_mapel'],
					);

			$this->db->where('uraian_id',$id);
			$this->db->set($set);
			if ($this->db->update('t_uraian')) {
				$this->session->set_flashdata('sukses','Data berhasil di edit');
			}else{
				$this->session->set_flashdata('gagal','Data gagal di edit');
			}
		}else{
			//save

			$set = array(
						'uraian_judul' => $_POST['uraian_judul'],
						'uraian_soal' => json_encode($_POST),
						'uraian_status' => 0,
						'uraian_tanggal' => date('Y-m-d'), 
						'uraian_mapel' => $_POST['uraian_mapel'],
					);

			$this->db->set($set);
			if ($this->db->insert('t_uraian')) {
				$this->session->set_flashdata('sukses','Data berhasil di tambah');
			}else{
				$this->session->set_flashdata('gagal','Data gagal di tambah');
			}
		}

		redirect(base_url('uraian'));
		
	}

	function hasil(){
		$iduser = $this->session->userdata('id');
		$soal = $_POST['id'];
		//ambil id hasil
		$idhasil = $this->db->query("SELECT * FROM t_hasil where hasil_siswa = '$iduser' AND hasil_soal = '$soal'")->row_array();
		$set = array(
						'uraian_hasil_judul' => $_POST['uraian_judul'],
						'uraian_hasil_soal' => json_encode($_POST),
						'uraian_hasil_tanggal' => date('Y-m-d'), 
						'uraian_hasil_hasil' => $idhasil['hasil_id'],
						'uraian_hasil_mapel' => $_POST['mapel'],
					);

			$this->db->set($set);
		if ($this->db->insert('t_uraian_hasil')) {
			$this->session->set_flashdata('sukses','Data berhasil di kirim');
		}else{
			$this->session->set_flashdata('gagal','Data gagal di kirim');
		}

		redirect(base_url('evaluasi/kerjakan'));
	}
	function koreksi($id){ 
		if ( $this->session->userdata('login') == 1) {
			$data['title'] = 'BIMBEL | KOREKSI URAIAN';
		    $data['breadcumb'] = 'KOREKSI URAIAN';
		    $data['id'] = $id;
		    $db = $this->db->query("SELECT * FROM t_uraian_hasil as a JOIN t_mapel as b ON a.uraian_hasil_mapel = b.mapel_id where a.uraian_hasil_hasil = '$id'")->row_array();

		    //soal di pecah bentuk array//
			$soal = '['.$db['uraian_hasil_soal'].']';
			$x = json_decode($soal,true);
			$data['data'] = $x[0];

			$data['mapel_val'] = $db['mapel_nama'];

			$this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('uraian/koreksi'); 
		    $this->load->view('v_template_admin/admin_footer');
		}
		else{
			redirect(base_url('login'));
		}
	}
	function koreksi_save(){
		$id = $_POST['id'];

		$sum = 0;
		for ($i = 1; $i < 6; $i++) {
			$sum+= $_POST['koreksi'.$i];
		}

		$set = array(
						'hasil_uraian_nilai'=> $sum,
						'hasil_status'=> 1
					);

		$this->db->where('hasil_id',$id);
		$this->db->set($set);

		if ($this->db->update('t_hasil')) {
			$this->session->set_flashdata('sukses','Data berhasil di simpan');
		}else{
			$this->session->set_flashdata('gagal','Data gagal di simpan');
		}

		redirect(base_url('evaluasi/view_hasil'));
	}
}