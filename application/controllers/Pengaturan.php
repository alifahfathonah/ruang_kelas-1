<?php
class Pengaturan extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
		    $data['title'] = 'BIMBEL | PENGATURAN';
		    $data['breadcumb'] = 'PENGATURAN';

		    //data jumlah
		    $data['data'] = $this->db->query("SELECT * FROM t_pengaturan")->row_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('pengaturan/index');
		    $this->load->view('v_template_admin/admin_footer');

		} 
		else{
			redirect(base_url('login'));
		}
	} 
	function save(){ 
		if (@$_FILES['pengaturan_logo']['name']) {
			//upload
			  $config = array(
			  'upload_path' 	=> './assets/pengaturan',
			  'allowed_types' 	=> "gif|jpg|png|jpeg",
			  'overwrite' 		=> TRUE,
			  'max_size' 		=> "2048000",
			  'max_height' 		=> "10000",
			  'max_width' 		=> "20000"
			  );

			//upload foto
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('pengaturan_logo')) {
				//replace Karakter name foto
				$name_foto = $_FILES['pengaturan_logo']['name'];
				$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		        $foto = str_replace($char, '_', $name_foto);
		        $char1 = array('[',']');
		        $foto2 = str_replace($char1, '', $foto);

		        $set = array( 
		        		'pengaturan_background_status'	=>  @$_POST['pengaturan_background_status'],
		        		'pengaturan_latar_status'	=> @$_POST['pengaturan_latar_status'],
						'pengaturan_logo' => $foto2,
						'pengaturan_latar' => $_POST['pengaturan_latar'],
						'pengaturan_kkm' => $_POST['pengaturan_kkm'],
						'pengaturan_tanggal' => date('Y-m-d'), 
					);
				$this->db->set($set);
				if ($this->db->update('t_pengaturan')) {
					$this->session->set_flashdata('sukses','Berhasil Di Simpan');

					//set
					$this->session->set_userdata('logo',$_FILES['pengaturan_logo']['name']);
					$this->session->set_userdata('kkm',$_POST['pengaturan_kkm']);
					$this->session->set_userdata('latar',$_POST['pengaturan_latar']);
              		$this->session->set_userdata('latar-status',$_POST['pengaturan_latar_status']);
              		$this->session->set_userdata('background-status',$_POST['pengaturan_background_status']);

					redirect(base_url('pengaturan'));
				}else{
					$this->session->set_flashdata('gagal','Gagal Di Simpan');

					redirect(base_url('pengaturan'));
				}
		    }else{
		    	$this->session->set_flashdata('gagal','Gagal Di Simpan');
				redirect(base_url('pengaturan'));
		    }
		}

		//background
		if (@$_FILES['pengaturan_background']['name']) {
			//upload
			  $config = array(
			  'upload_path' 	=> './assets/pengaturan',
			  'allowed_types' 	=> "gif|jpg|png|jpeg",
			  'overwrite' 		=> TRUE,
			  'max_size' 		=> "2048000",
			  'max_height' 		=> "10000",
			  'max_width' 		=> "20000"
			  );

			//upload foto
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('pengaturan_background')) {
				//replace Karakter name foto
				$name_foto = $_FILES['pengaturan_background']['name'];
				$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		        $foto = str_replace($char, '_', $name_foto);
		        $char1 = array('[',']');
		        $foto1 = str_replace($char1, '', $foto);

		        $set = array(
		        		'pengaturan_background_status'	=>  $_POST['pengaturan_background_status'],
		        		'pengaturan_latar_status' => $_POST['pengaturan_latar_status'],
						'pengaturan_background' => $foto1,
						'pengaturan_latar' => $_POST['pengaturan_latar'],
						'pengaturan_kkm' => $_POST['pengaturan_kkm'],
						'pengaturan_tanggal' => date('Y-m-d'), 
					);
				$this->db->set($set);
				if ($this->db->update('t_pengaturan')) {
					$this->session->set_flashdata('sukses','Berhasil Di Simpan');

					//set
					$this->session->set_userdata('kkm',$_POST['pengaturan_kkm']);
					$this->session->set_userdata('latar',$_POST['pengaturan_latar']);
					$this->session->set_userdata('background',$_FILES['pengaturan_background']['name']);
					$this->session->set_userdata('background-status',$_POST['pengaturan_background_status']);
					$this->session->set_userdata('latar-status',@$_POST['pengaturan_latar_status']);

					redirect(base_url('pengaturan'));
				}else{
					$this->session->set_flashdata('gagal','Gagal Di Simpan');
					redirect(base_url('pengaturan'));
				}
		    }else{
		    	$this->session->set_flashdata('gagal','Gagal Di Simpan');
				redirect(base_url('pengaturan'));
		    }
		}

		//ada foto keduanya
		if (@$_FILES['pengaturan_logo']['name'] && @$_FILES['pengaturan_background']['name']) {
			//upload
			  $config = array(
			  'upload_path' 	=> './assets/pengaturan',
			  'allowed_types' 	=> "gif|jpg|png|jpeg",
			  'overwrite' 		=> TRUE,
			  'max_size' 		=> "2048000",
			  'max_height' 		=> "10000",
			  'max_width' 		=> "20000"
			  );

			//upload foto
			$this->load->library('upload', $config);
			$this->upload->do_upload('pengaturan_background');
			$this->upload->do_upload('pengaturan_logo');

			//replace Karakter name foto
			$name_foto = $_FILES['pengaturan_background']['name'];
			$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		    $foto = str_replace($char, '_', $name_foto);
		    $char1 = array('[',']');
		    $foto1 = str_replace($char1, '', $foto);

		    ///////////////////////////////////////////////////

		    $name_foto2 = $_FILES['pengaturan_logo']['name'];
			$char2 = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		    $foto2 = str_replace($char2, '_', $name_foto2);
		    $char = array('[',']');
		    $foto = str_replace($char, '', $foto2);

			$set = array(
						'pengaturan_background_status'	=>  @$_POST['pengaturan_background_status'],
						'pengaturan_latar_status'	=> @$_POST['pengaturan_latar_status'],
						'pengaturan_background' => $foto1,
						'pengaturan_logo' => $foto,
						'pengaturan_latar' => $_POST['pengaturan_latar'],
						'pengaturan_kkm' => $_POST['pengaturan_kkm'],
						'pengaturan_tanggal' => date('Y-m-d'), 
					);
			$this->db->set($set); 
			if ($this->db->update('t_pengaturan')) {
				$this->session->set_flashdata('sukses','Berhasil Di Simpan');

				//set
				$this->session->set_userdata('kkm',$_POST['pengaturan_kkm']);
				$this->session->set_userdata('logo',$_FILES['pengaturan_logo']['name']);
				$this->session->set_userdata('background',$_FILES['pengaturan_logo']['name']);
				$this->session->set_userdata('background-status',@$_POST['pengaturan_background_status']);
				$this->session->set_userdata('latar-status',@$_POST['pengaturan_latar_status']);

				redirect(base_url('pengaturan'));
			}else{
				$this->session->set_flashdata('gagal','Gagal Di Simpan');
				redirect(base_url('pengaturan'));
			}
		//tanpa foto
		}else{
			$set = array(
						'pengaturan_background_status'	=>  @$_POST['pengaturan_background_status'],
						'pengaturan_latar_status'	=> @$_POST['pengaturan_latar_status'],
						'pengaturan_latar' => $_POST['pengaturan_latar'],
						'pengaturan_kkm' => $_POST['pengaturan_kkm'],
						'pengaturan_tanggal' => date('Y-m-d'), 
					);
			$this->db->set($set); 
			if ($this->db->update('t_pengaturan')) {
				$this->session->set_flashdata('sukses','Berhasil Di Simpan');

				//set
				$this->session->set_userdata('kkm',$_POST['pengaturan_kkm']);
				$this->session->set_userdata('latar',$_POST['pengaturan_latar']);
				$this->session->set_userdata('background-status',@$_POST['pengaturan_background_status']);
              	$this->session->set_userdata('latar-status',@$_POST['pengaturan_latar_status']);

				redirect(base_url('pengaturan'));
			}else{
				$this->session->set_flashdata('gagal','Gagal Di Simpan');
				redirect(base_url('pengaturan'));
			}
		}
	}
}