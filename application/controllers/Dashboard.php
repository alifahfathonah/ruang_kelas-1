<?php
class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  
	function index(){
		if ( $this->session->userdata('login') == 1) {
		    $data['title'] = 'BIMBEL | DASHBOARD';
		    $data['breadcumb'] = 'DASHBOARD';

		    //data jumlah
		    $data['siswa'] = $this->db->query("SELECT * FROM t_user where user_level = '2'")->num_rows();
		    $data['materi'] = $this->db->query("SELECT * FROM t_materi")->num_rows();
		    $data['film'] = $this->db->query("SELECT * FROM t_film")->num_rows(); 
		    $data['evaluasi'] = $this->db->query("SELECT * FROM t_evaluasi where evaluasi_hapus = 0")->num_rows();

		    $data['rank'] = $this->db->query("SELECT *,SUM(hasil_nilai) AS totnilai FROM t_hasil as a  JOIN t_user as b ON a.hasil_siswa = b.user_id GROUP BY a.hasil_siswa ORDER BY totnilai desc LIMIT 5")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('dashboard/index');
		    $this->load->view('v_template_admin/admin_footer');

		}
		else{
			redirect(base_url('login'));
		}
	} 
}