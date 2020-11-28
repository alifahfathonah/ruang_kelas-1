<?php
class Evaluasi extends CI_Controller{ 
 
	function __construct(){
		parent::__construct();
	} 
	function index(){  
		if ( $this->session->userdata('login') == 1) {
			$data['title'] = 'BIMBEL | SOAL EVALUASI';
		    $data['breadcumb'] = 'SOAL EVALUASI';
		    $id_mapel = $this->session->userdata('mapel');
		    $kelas = $this->session->userdata('kelas');

		    if ($this->session->userdata('level') == '2') { 
		    	
		    	$data['data'] = $this->db->query("SELECT * FROM t_evaluasi as a JOIN t_mapel as b ON a.evaluasi_mapel = b.mapel_id JOIN t_kelas as c ON a.evaluasi_kelas = c.kelas_id where a.evaluasi_mapel = '$id_mapel' AND a.evaluasi_hapus = 0 AND a.evaluasi_kelas = '$kelas' order by a.evaluasi_id DESC")->result_array();
 				$data['mapel_data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_id = '$id_mapel' AND mapel_hapus = 0")->result_array();
 				$data['kelas_data'] = $this->db->query("SELECT * FROM t_kelas WHERE kelas_id = '$kelas' AND kelas_hapus = 0")->result_array();

		    }else{

		    	$data['data'] = $this->db->query("SELECT * FROM t_evaluasi as a JOIN t_mapel as b ON a.evaluasi_mapel = b.mapel_id JOIN t_kelas as c ON a.evaluasi_kelas = c.kelas_id where a.evaluasi_hapus = 0 order by a.evaluasi_id DESC")->result_array();
 				$data['mapel_data'] = $this->db->query("SELECT * FROM t_mapel WHERE mapel_hapus = 0")->result_array();
 				$data['kelas_data'] = $this->db->query("SELECT * FROM t_kelas WHERE kelas_hapus = 0")->result_array();
		    }

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('evaluasi/index');
		    $this->load->view('v_template_admin/admin_footer');

		} 
		else{ 
			redirect(base_url('login'));
		}
	} 
	function getMapel(){
		$id = $_POST['idmapel'];
		$data = $this->db->query("SELECT * FROM t_uraian WHERE uraian_mapel = '$id' AND uraian_hapus = 0")->result_array();
		echo json_encode($data);
	}
	function set(){
		 $data['title'] = 'BIMBEL | SOAL EVALUASI';
		 $data['breadcumb'] = 'SOAL EVALUASI';
		 $data['jumlah'] = $_POST['evaluasi_jumlah'];
		 $data['judul'] = $_POST['evaluasi_judul'];
		 $data['timer'] = $_POST['evaluasi_timer'];

		 //mapel
		 $idmapel = $_POST['evaluasi_mapel'];
		 $c = $this->db->query("SELECT * FROM t_mapel WHERE mapel_id = '$idmapel'")->row_array();
		 $data['mapel_nama'] = $c['mapel_nama'];
		 $data['mapel_id'] = $c['mapel_id'];

		 //kelas
		 $idkelas = $_POST['evaluasi_kelas'];
		 $k = $this->db->query("SELECT * FROM t_kelas WHERE kelas_id = '$idkelas'")->row_array();
		 $data['kelas_nama'] = $k['kelas_nama'];
		 $data['kelas_id'] = $k['kelas_id'];
		 
		 $data['kkm'] = $this->db->query("SELECT pengaturan_kkm FROM t_pengaturan")->row_array();
		 $data['bobot'] = round(100 / $data['jumlah']);


		 //uraian
		 $iduraian = $_POST['evaluasi_uraian'];
		 $data['uraian_data'] = $this->db->query("SELECT * FROM t_uraian where uraian_id = '$iduraian'")->row_array(); 

		 //generate idsoal
		$cek = $this->db->query("SELECT * FROM t_evaluasi order by evaluasi_id DESC limit 1")->row_array();

		if (@$cek == null) {
			$data['idsoal'] = 'SOAL1';
		}else{
			$num = str_replace('SOAL', '', $cek['evaluasi_id']);
			$i = $num + 1;
			$data['idsoal'] = 'SOAL'.$i;
		}

		 $this->load->view('v_template_admin/admin_header',$data);
		 $this->load->view('evaluasi/set');
		 $this->load->view('v_template_admin/admin_footer');
	}
	function add(){

		$jum = $_POST['evaluasi_jumlah'];
		$path = 'assets/soal';
		$idsoal = $_POST['evaluasi_id'];

		for ($i=1; $i < $jum+1 ; $i++) {
			if ($_FILES['file'.$i]['tmp_name']) {
			 	move_uploaded_file($_FILES['file'.$i]['tmp_name'], $path.'/'.$idsoal.'_'.$i.'.jpeg');
			} 

			print_r($_FILES['file'.$i]['tmp_name']);
		}

		$uraian = $_POST['evaluasi_uraian'];
		$set = array(
						'evaluasi_id' => $idsoal,
						'evaluasi_judul' => $_POST['evaluasi_judul'],
						'evaluasi_jumlah' => $jum,
						'evaluasi_pertanyaan' => json_encode($_POST),
						'evaluasi_tanggal' => date('Y-m-d'), 
						'evaluasi_uraian' => $uraian,
						'evaluasi_mapel' => $_POST['evaluasi_mapel'],
						'evaluasi_kelas' => $_POST['evaluasi_kelas'],
						'evaluasi_timer' => $_POST['evaluasi_timer'],
					);

		$this->db->set($set);
		if ($this->db->insert('t_evaluasi')) {
			//ubah status uraian
			$this->db->where('uraian_id',$uraian);
			$this->db->set('uraian_status','1');
			$this->db->update('t_uraian');

			$this->session->set_flashdata('sukses','Data berhasil di tambah');
		}else{
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}

		redirect(base_url('evaluasi'));
		
	}
	function edit($id){
		$data['title'] = 'BIMBEL | SOAL EVALUASI';
		$data['breadcumb'] = 'SOAL EVALUASI';
		$data['data'] = $this->db->query("SELECT * FROM t_evaluasi where evaluasi_id = '$id' order by evaluasi_id DESC")->row_array();
		$data['jumlah'] = $data['data']['evaluasi_jumlah'];
		$data['judul'] = $data['data']['evaluasi_judul'];
		$data['kkm'] = $this->db->query("SELECT pengaturan_kkm FROM t_pengaturan")->row_array();
		$data['bobot'] = round(100 / $data['jumlah']);
		$data['idsoal'] = $id;
		$data['id_uraian'] = $data['data']['evaluasi_uraian'];
		$xid = $data['data']['evaluasi_uraian'];
		$x = $this->db->query("SELECT * FROM t_uraian where uraian_id = '$xid'")->row_array();
		$data['uraian_judul'] = $x['uraian_judul'];


		$data['timer'] = $data['data']['evaluasi_timer'];

		//mapel
		$idmapel = $data['data']['evaluasi_mapel'];
		$c = $this->db->query("SELECT * FROM t_mapel WHERE mapel_id = '$idmapel'")->row_array();
		$data['mapel_nama'] = $c['mapel_nama'];
		$data['mapel_id'] = $c['mapel_id'];

		//kelas
		$idkelas = $data['data']['evaluasi_kelas'];
		$k = $this->db->query("SELECT * FROM t_kelas WHERE kelas_id = '$idkelas'")->row_array();
		$data['kelas_nama'] = $k['kelas_nama'];
		$data['kelas_id'] = $k['kelas_id'];

		//soal di pecah bentuk array//
		$soal = '['.$data['data']['evaluasi_pertanyaan'].']';
		$v = str_replace(',"soal_pertanyaan', '},{"soal_pertanyaan', $soal);
		$data['soal'] = json_decode($v,true);
		
		$this->load->view('v_template_admin/admin_header',$data);
		$this->load->view('evaluasi/edit');
		$this->load->view('v_template_admin/admin_footer');
	}
	function update($id){
		$jum = $_POST['evaluasi_jumlah'];
		$path = 'assets/soal';
		$idsoal = $_POST['evaluasi_id'];

		for ($i=1; $i < $jum+1 ; $i++) { 
			move_uploaded_file($_FILES['file'.$i]['tmp_name'], $path.'/'.$idsoal.'_'.$i.'.jpeg');
		}

		$set = array(
						'evaluasi_id' => $idsoal,
						'evaluasi_judul' => $_POST['evaluasi_judul'],
						'evaluasi_jumlah' => $jum,
						'evaluasi_pertanyaan' => json_encode($_POST),
					);
		
		$this->db->where('evaluasi_id',$id);
		$this->db->set($set);
		if ($this->db->update('t_evaluasi')) {
			$this->session->set_flashdata('sukses','Data berhasil di edit');
		}else{
			$this->session->set_flashdata('gagal','Data gagal di edit');
		}

		redirect(base_url('evaluasi'));
	}
	function delete($id){
		$x = $this->db->query("SELECT * FROM t_evaluasi WHERE evaluasi_id = '$id'")->row_array();
		$iduraian = $x['evaluasi_uraian'];

		//delete evaluasi
		$this->db->where('evaluasi_id',$id);
		$this->db->set('evaluasi_hapus','1');
		$this->db->update('t_evaluasi');

		//ubah status
		$this->db->where('uraian_id',$iduraian);
		$this->db->set('uraian_status','0');
		$this->db->update('t_uraian');

		$this->session->set_flashdata('sukses','Berhasil Hapus Data');
		redirect(base_url('evaluasi'));
	}

	function kerjakan(){
		if ( $this->session->userdata('login') == 1) {
			$data['title'] = 'BIMBEL | KERJAKAN EVALUASI';
		    $data['breadcumb'] = 'KERJAKAN EVALUASI';

		    $kelas = $this->session->userdata('kelas');
		    $data['data'] = $this->db->query("SELECT * FROM t_evaluasi as a JOIN t_mapel as b ON a.evaluasi_mapel = b.mapel_id JOIN t_kelas as c ON a.evaluasi_kelas = c.kelas_id where a.evaluasi_hapus = 0 AND a.evaluasi_kelas = '$kelas' order by a.evaluasi_id DESC")->result_array();
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('evaluasi/kerjakan');
		    $this->load->view('v_template_admin/admin_footer');

		}  
		else{
			redirect(base_url('login'));
		}
	}
	function kerjakan_soal($id){
		$siswa = $this->session->userdata('id');
		@$cek = $this->db->query("SELECT * FROM t_hasil where hasil_soal = '$id' AND hasil_siswa = '$siswa'")->num_rows();
		if (@$cek > 0) {
			$this->session->set_flashdata('gagal','Evaluasi sudah dikerjakan !!');
			redirect(base_url('evaluasi/kerjakan'));
		}else{
			$data['title'] = 'BIMBEL | SOAL EVALUASI';
			$data['breadcumb'] = 'SOAL EVALUASI';
			$data['data'] = $this->db->query("SELECT * FROM t_evaluasi as a JOIN t_mapel as b ON a.evaluasi_mapel = b.mapel_id JOIN t_kelas as c ON a.evaluasi_kelas = c.kelas_id where a.evaluasi_id = '$id' order by a.evaluasi_id DESC")->row_array();
			$data['timer'] = $data['data']['evaluasi_timer'];
			$data['jumlah'] = $data['data']['evaluasi_jumlah'];
			$data['judul'] = $data['data']['evaluasi_judul'];
			
			//mapel
			$data['mapel_val'] = $data['data']['mapel_nama'];
			$data['mapel_id'] = $data['data']['mapel_id'];

			//kelas
			$data['kelas_val'] = $data['data']['kelas_nama'];
			$data['kelas_id'] = $data['data']['kelas_id'];

			$data['kkm'] = $this->db->query("SELECT pengaturan_kkm FROM t_pengaturan")->row_array();
			$data['bobot'] = round(100 / $data['jumlah']);

			$data['idsoal'] = $id;

			//soal di pecah bentuk array//
			$soal = '['.$data['data']['evaluasi_pertanyaan'].']';
			$v = str_replace(',"soal_pertanyaan', '},{"soal_pertanyaan', $soal);
			$data['soal'] = json_decode($v,true);
			
			$this->load->view('v_template_admin/admin_header',$data);
			$this->load->view('evaluasi/kerjakan_soal');
			$this->load->view('v_template_admin/admin_footer');
		}		
	}
	function hasil($idsoal){
	  $jum = $_POST['evaluasi_jumlah'];

      //hitung nilai / bobot
      $sum = 0;
      for ($i=1; $i < $jum+1; $i++) { 
        
        if ($_POST['soal_kunci_jawaban'.$i] == md5($_POST['soal_jawaban'.$i])) {
          
          $sum +=count($_POST['soal_jawaban'.$i]);
        } 
      }
      //nilai
      $nilai = $sum * $_POST['evaluasi_bobot']; 

      if ($nilai >= $this->session->userdata('kkm')) {

      	//lulus
      	$status = 1;
      	$set = array(
						'hasil_siswa' => $this->session->userdata('id'),
						'hasil_soal' => $idsoal,
						'hasil_pertanyaan' => json_encode($_POST),
						'hasil_nilai' => $nilai,
						'hasil_mapel' => $_POST['mapel'],
						'hasil_kelas' => $_POST['kelas'],
						'hasil_sisa_timer' => $_POST['evaluasi_timer'],
						'hasil_status' => $status,
						'hasil_tanggal' => date('Y-m-d'), 
					);

		$this->db->set($set);
		if ($this->db->insert('t_hasil')) {
			$this->session->set_flashdata('sukses','Jawaban berhasil di kirim');
		}else{
			$this->session->set_flashdata('gagal','Jawaban gagal di kirim');
		}

		redirect(base_url('evaluasi/kerjakan'));

      }else{
      	//tidak lulus
      	$status = 0;
      	$d = $this->db->query("SELECT * FROM t_evaluasi where evaluasi_id = '$idsoal'")->row_array();
      	$iduraian = $d['evaluasi_uraian'];
      	$set = array(
						'hasil_siswa' => $this->session->userdata('id'),
						'hasil_soal' => $idsoal,
						'hasil_pertanyaan' => json_encode($_POST),
						'hasil_nilai' => $nilai,
						'hasil_mapel' => $_POST['mapel'],
						'hasil_status' => $status,
						'hasil_uraian' => $iduraian,
						'hasil_tanggal' => date('Y-m-d'),
						'hasil_kelas' => $_POST['kelas'],
						'hasil_sisa_timer' => $_POST['evaluasi_timer'], 
					);

		$this->db->set($set);
		if ($this->db->insert('t_hasil')) {

			//kerjakan uraian
			$data['title'] = 'BIMBEL | KERJAKAN URAIAN';
			$data['breadcumb'] = 'KERJAKAN URAIAN';

			$dii = $d['evaluasi_uraian'];
			$db = $this->db->query("SELECT * FROM t_uraian as a JOIN t_mapel as b ON a.uraian_mapel = b.mapel_id where a.uraian_id = '$dii'")->row_array();

		    //soal di pecah bentuk array//
			$soal = '['.$db['uraian_soal'].']';
			$x = json_decode($soal,true);
			$data['data'] = $x[0];

			$data['mapel_val'] = $db['mapel_nama'];
			$data['mapel_id'] = $db['mapel_id'];

			$this->session->set_flashdata('gagal','Nilaimu di bawah KKM kerjakan 5 soal uraian ini');
	      	$this->load->view('v_template_admin/admin_header',$data);
			$this->load->view('uraian/kerjakan');
			$this->load->view('v_template_admin/admin_footer');
		}else{
			$this->session->set_flashdata('gagal','Jawaban gagal di kirim');
			redirect(base_url('evaluasi/kerjakan'));
		}
      }

	}
	function view_hasil(){
		if ( $this->session->userdata('login') == 1) {
			$data['title'] = 'BIMBEL | HASIL EVALUASI';
		    $data['breadcumb'] = 'HASIL EVALUASI';
		    $id = $this->session->userdata('id');
		    $kelas = $this->session->userdata('kelas');
		    $level = $this->session->userdata('level');

		    switch ($level) {
		    	case '1': 
		    		$data['data'] = $this->db->query("SELECT * FROM t_hasil AS a JOIN t_user AS b ON a.hasil_siswa = b.user_id JOIN t_evaluasi AS c ON a.hasil_soal = c.evaluasi_id JOIN t_mapel as d ON a.hasil_mapel = d.mapel_id JOIN t_kelas as e ON a.hasil_kelas = e.kelas_id order BY a.hasil_id DESC")->result_array();
		    		break;
		    	case '2':
		    		$data['data'] = $this->db->query("SELECT * FROM t_hasil AS a JOIN t_user AS b ON a.hasil_siswa = b.user_id JOIN t_evaluasi AS c ON a.hasil_soal = c.evaluasi_id JOIN t_mapel as d ON a.hasil_mapel = d.mapel_id JOIN t_kelas as e ON a.hasil_kelas = e.kelas_id WHERE a.hasil_kelas = '$kelas' order BY a.hasil_id DESC")->result_array();
		    		break;
		    	case '3':
		    		$data['data'] = $this->db->query("SELECT * FROM t_hasil AS a JOIN t_user AS b ON a.hasil_siswa = b.user_id JOIN t_evaluasi AS c ON a.hasil_soal = c.evaluasi_id JOIN t_mapel as d ON a.hasil_mapel = d.mapel_id JOIN t_kelas as e ON a.hasil_kelas = e.kelas_id WHERE a.hasil_siswa = '$id' order BY a.hasil_id DESC")->result_array();
		    		break;
		    	
		    }

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('evaluasi/view_hasil');
		    $this->load->view('v_template_admin/admin_footer');

		} 
		else{
			redirect(base_url('login'));
		}
	}
	function koreksi($id){
		$db = $this->db->query("SELECT * FROM t_hasil where hasil_id = '$id' order by hasil_id DESC")->row_array();

		//hasil di pecah bentuk array//
		$soal1 = '['.$db['hasil_pertanyaan'].']';
		$c = str_replace(',"soal_pertanyaan', '},{"soal_pertanyaan', $soal1);
		$data['hasil'] = json_decode($c,true);

			
		$idsoal = $data['hasil'][0]['evaluasi_id'];
		$data['title'] = 'BIMBEL | SOAL EVALUASI';
		$data['breadcumb'] = 'SOAL EVALUASI';
		$data['data'] = $this->db->query("SELECT * FROM t_evaluasi as a JOIN t_mapel as b ON a.evaluasi_mapel = b.mapel_id JOIN t_kelas as c ON a.evaluasi_kelas = c.kelas_id where a.evaluasi_id = '$idsoal' order by a.evaluasi_id DESC")->row_array();
		$data['timer'] = $data['hasil'][0]['evaluasi_timer'];
		$data['jumlah'] = $data['data']['evaluasi_jumlah'];
		$data['judul'] = $data['data']['evaluasi_judul'];
		
		//mapel
		$data['mapel_val'] = $data['data']['mapel_nama'];
		$data['mapel_id'] = $data['data']['mapel_id'];

		//kelas
		$data['kelas_val'] = $data['data']['kelas_nama'];
		$data['kelas_id'] = $data['data']['kelas_id'];

		$data['kkm'] = $this->db->query("SELECT pengaturan_kkm FROM t_pengaturan")->row_array();
		$data['bobot'] = round(100 / $data['jumlah']);

		$data['idsoal'] = $id;

		//soal di pecah bentuk array//
		$soal = '['.$data['data']['evaluasi_pertanyaan'].']';
		$v = str_replace(',"soal_pertanyaan', '},{"soal_pertanyaan', $soal);
		$data['soal'] = json_decode($v,true);
		
		$this->load->view('v_template_admin/admin_header',$data);
		$this->load->view('evaluasi/koreksi');
		$this->load->view('v_template_admin/admin_footer');
	}
}