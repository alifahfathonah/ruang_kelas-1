<?php
class Guru extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){ 
		if ( $this->session->userdata('login') == 1) {
			$data['title'] = 'BIMBEL | DATA GURU';
		    $data['breadcumb'] = 'DATA GURU';
		    $data['data'] = $this->db->query("SELECT * FROM t_user as a JOIN t_mapel as b ON a.user_mapel = b.mapel_id JOIN t_kelas as c ON a.user_kelas = c.kelas_id WHERE a.user_level = 2 AND a.user_hapus = 0 order by a.user_id DESC")->result_array();

		    $data['mapel_data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_hapus = 0")->result_array();

		    $data['kelas_data'] = $this->db->query("SELECT * FROM t_kelas WHERE kelas_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('guru/index');
		    $this->load->view('v_template_admin/admin_footer');

		} 
		else{
			redirect(base_url('login'));
		}
	}  
	function add(){
		$nip = $_POST['nip'];
		$cek = $this->db->query("SELECT * FROM t_user WHERE user_email = '$nip' AND user_level = '2' AND user_hapus = 0")->num_rows();
		if (@$cek < 1) {
			$set = array(
						'user_name' => $_POST['user_name'], 
						'user_email' => $nip,
						'user_password' => md5($nip),
						'user_tempat_lahir' => $_POST['user_tempat_lahir'],
						'user_tgl_lahir' => $_POST['user_tgl_lahir'],
						'user_tlp' => $_POST['user_tlp'],
						'user_alamat' => $_POST['user_alamat'],
						'user_level' => '2',
						'user_tanggal' => date('Y-m-d'),
						'user_mapel' => $_POST['user_mapel'],
						'user_kelas' => $_POST['user_kelas'],
					);
			$this->db->set($set);

			if ($this->db->insert('t_user')) {
				$this->session->set_flashdata('sukses','Berhasil Di Simpan');
				redirect(base_url('guru'));
			}else{
				$this->session->set_flashdata('gagal','Gagal Di Simpan');
				redirect(base_url('guru'));
			}	
		}else{
			$this->session->set_flashdata('gagal','NIP Sudah Ada');
			redirect(base_url('guru'));
		}
	}
	function edit($id){
		$nip = $_POST['nip'];
		
			$set = array(
						'user_name' => $_POST['user_name'], 
						'user_email' => $nip,
						'user_password' => md5($nip),
						'user_tempat_lahir' => $_POST['user_tempat_lahir'],
						'user_tgl_lahir' => $_POST['user_tgl_lahir'],
						'user_tlp' => $_POST['user_tlp'],
						'user_alamat' => $_POST['user_alamat'],
						'user_mapel' => $_POST['user_mapel'],
						'user_kelas' => $_POST['user_kelas'],
					);
			$this->db->set($set);
			$this->db->where('user_id',$id);

			if ($this->db->update('t_user')) {
				$this->session->set_flashdata('sukses','Berhasil Di Edit');
				redirect(base_url('guru'));
			}else{
				$this->session->set_flashdata('gagal','Gagal Di Edit');
				redirect(base_url('guru'));
			}	
	}
	function delete($id){
		$this->db->where('user_id',$id);
		$this->db->set('user_hapus','1');
		$this->db->update('t_user');


		$this->session->set_flashdata('sukses','Berhasil Hapus Data');
		redirect(base_url('guru'));
	}
}