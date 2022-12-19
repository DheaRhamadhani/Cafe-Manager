<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Base_Controller.php';

class Makanan extends Base_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('makanan_model','makanan');
		$this->load->model('cafe_model','cafe');
		
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
	}
		
	//field tabel
	var $data = [
		'nama' => '',
		'harga' => '',
		'gambar' => '',
		'stok' => '',
		'id_cafe' => '',
	];

	//nama model
	var $context = 'makanan';
	
	public function form()
	{
		$id = $this->uri->segment(3);
		if ($id) {
			$this->data = $this->makanan->find_by_id($id);
		}
		$this->data['cafes'] = $this->cafe->find_all();
		$this->data['makanan'] = $this->makanan->find_all();
		
		$this->load->view('makanan/form', $this->data);
	}

	function save()
	{
		$id = $this->input->post('id');
		$file_name = $this->input->post('gambar_lama');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');
		$this->form_validation->set_rules('stok', 'stok', 'required');
		$this->form_validation->set_rules('id_cafe', 'id_cafe', 'required');
		$this->data = [
			'nama' => $this->input->post('nama'),
			'harga' => $this->input->post('harga'),
			'gambar' => $this->input->post('gambar'),
			'stok' => $this->input->post('stok'),
			'id_cafe' => $this->input->post('id_cafe'),
		];
		
		// Debugging
		// echo print_r($_FILES);
		// echo "<br><hr>";
		// echo print_r($_FILES['gambar']['name']);

		// handling upload
		if ($_FILES['gambar']['name'] != "") {
			$config = array(
				'upload_path' => "./assets/uploads/",
				'allowed_types' => "*",
				'overwrite' => TRUE,
				'file_name' => "gambar_" . date('YmdHis'),
				'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
			);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('gambar')) {
				$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.

				$file_name = $upload_data['file_name'];
			} else {
				log_message('ERROR', 'error');
			}
		}
		$this->data['gambar'] = $file_name;

		if ($this->form_validation->run() == FALSE) {
			$this->form();
		} else {
			if ($id == '') {
				$this->makanan->insert($this->data);
			} else {
				$this->makanan->update($id, $this->data);
			}
			redirect(base_url('makanan'));
		}
	}
}
