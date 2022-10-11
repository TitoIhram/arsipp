<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();

		//cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') != 'admin_login') {
			if ($this->session->userdata('status') != 'guru_login') {
				
				redirect('auth');
				
			}
		}
	}

	public function index(){
		$this->load->model('m_data');
		$data['home'] = $this->m_data->show_data()->result();
		
		
		$this->load->view('admin/v_home', $data);
		
		
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->m_data->delete_data($where, 'tb_file');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat !<br></b> Data yang diarsipkan berhasil dihapus</div>');
		redirect('home');
	}

	public function edit($id){
		$where = array('id' =>$id);
		$data['home'] = $this->m_data->edit_data($where,'tb_file')->result();
		$this->load->view('admin/v_home_edit', $data);
	}
	
	public function update(){
		$id 		= $this->input->post('id');
		$nomor 		= $this->input->post('nomor');
		$kategori 	= $this->input->post('kategori');
		$judul		= $this->input->post('judul');
		$dokumen	= $_FILES['dokumen'];
		if ($dokumen=''){}else{
			$config['upload_path']		=	'./assets/dokumen';
			$config['allowed_types']	=	'pdf|jpg';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('dokumen')){
				echo "Upload gagal"; die();
			}else{
				$dokumen = $this->upload->data('file_name');
			}
		}
		

		$data = array(
			'nomor'			=> $nomor,
			'kategori'		=> $kategori,
			'judul'			=> $judul,
			'dokumen'		=> $dokumen
		);

		$where = array(
			'id'	=> $id
		);

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat !<br></b> Data yang diarsipkan berhasil diupdate</div>');
		$this->m_data->update_data($where,$data,'tb_file');
		redirect('home');
	}

	public function detail($id){
		$this->load->model('m_data');
		$detail = $this->m_data->detail_data($id);
		$data['detail'] = $detail;
		$this->load->view('admin/v_home_detail', $data);
	}

	function download($id)
	{
		$data = $this->db->get_where('tb_file',['id'=>$id])->row();
		force_download('./assets/dokumen/'.$data->dokumen,NULL);
	}
}
?>
