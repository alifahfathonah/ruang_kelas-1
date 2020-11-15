<?php
class Profile extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
		    $data['title'] = 'BIMBEL | PROFILE';
		    $data['breadcumb'] = 'PROFILE';

		    //data jumlah 
		    $data['data'] = $this->db->query("SELECT * FROM t_detail where detail_id_user = '1'")->row_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('profile/index');
		    $this->load->view('v_template_admin/admin_footer');

		}
		else{
			redirect(base_url('login'));
		}
	} 
	function save(){

		//variable
		$id = $this->session->userdata('id'); 
		$username = $_POST['detail_username'];
		$email = $_POST['detail_email']; 
		$first = $_POST['detail_first_name'];
		$last = $_POST['detail_last_name'];
		$address = $_POST['detail_address'];
		$city = $_POST['detail_city'];
		$country = $_POST['detail_country'];
		$pos = $_POST['detail_pos'];
		$about = $_POST['detail_about']; 


		if (@$_FILES['detail_foto']) {
			
			//upload
			  $config = array(
			  'upload_path' 	=> './assets/foto',
			  'allowed_types' 	=> "gif|jpg|png|jpeg",
			  'overwrite' 		=> TRUE,
			  'max_size' 		=> "2048000",
			  'max_height' 		=> "10000",
			  'max_width' 		=> "20000"
			  );

			//upload foto
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('detail_foto')) {
				//replace Karakter name foto
				$name_foto = $_FILES['detail_foto']['name'];
				$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
		        $foto = str_replace($char, '_', $name_foto);
		        $char1 = array('[',']');
		        $foto1 = str_replace($char1, '', $foto);

				$set = array(
							'detail_foto' => $foto1, 
							'detail_username' => $username,
							'detail_email' => $email,
							'detail_first_name' => $first,
							'detail_last_name' => $last,
							'detail_address' => $address,
							'detail_city' => $city,
							'detail_country' => $country,
							'detail_pos' => $pos,
							'detail_about' => $about,
						);

				$this->db->set($set);
				$this->db->where('detail_id',$id);
				if ($this->db->update('t_detail')) {
					$this->session->set_flashdata('sukses','Berhasil Di Simpan');
					redirect(base_url('profile'));
				}else{
					$this->session->set_flashdata('gagal','Gagal Di Simpan');
					redirect(base_url('profile'));
				}
			}else{
				$set = array( 
							'detail_username' => $username,
							'detail_email' => $email,
							'detail_first_name' => $first,
							'detail_last_name' => $last,
							'detail_address' => $address,
							'detail_city' => $city,
							'detail_country' => $country,
							'detail_pos' => $pos,
							'detail_about' => $about,
						);

				$this->db->set($set);
				$this->db->where('detail_id',$id);
				if ($this->db->update('t_detail')) {
					$this->session->set_flashdata('sukses','Berhasil Di Simpan');
					redirect(base_url('profile'));
				}else{
					$this->session->set_flashdata('gagal','Gagal Di Simpan');
					redirect(base_url('profile'));
				}
			}
			
		}else{
			$set = array(
						'detail_username' => $username,
						'detail_email' => $email,
						'detail_first_name' => $first,
						'detail_last_name' => $last,
						'detail_address' => $address,
						'detail_city' => $city,
						'detail_country' => $country,
						'detail_pos' => $pos,
						'detail_about' => $about,
					);

			$this->db->set($set);
			$this->db->where('detail_id',$id);
			if ($this->db->update('t_detail')) {
				$this->session->set_flashdata('sukses','Berhasil Di Simpan');
				redirect(base_url('profile'));
			}else{
				$this->session->set_flashdata('gagal','Gagal Di Simpan');
				redirect(base_url('profile'));
			}
		}
	}
}