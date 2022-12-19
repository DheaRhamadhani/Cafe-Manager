<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Base_Controller.php';

class Cafe extends Base_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if (!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
	}		

    //field tabel
    var $data = [
        'nama_cafe' => '',
        'telpon' => ''
    ];

    //nama model
    var $context = 'cafe';

    function form(){
        $id = $this->uri->segment(3);
        if($id){
            $this->data = $this->cafe->find_by_id($id);
        }
        $this->load->view('cafe/form',$this->data);
    }

    function save(){
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama_cafe','nama cafe','required');
        $this->form_validation->set_rules('telpon','telpon','required');
        $this->data = [
            'nama_cafe' =>  $this->input->post('nama_cafe'),            
            'telpon' =>  $this->input->post('telpon')            
        ];
        if($this->form_validation->run() == FALSE){
            $this->load->view('cafe/form',$this->data);
        }else{
            if($id == ''){
                $this->cafe->insert($this->data);
            }else{
                $this->cafe->update($id,$this->data);
            }
            redirect(base_url('cafe'));
        }
    }

}
