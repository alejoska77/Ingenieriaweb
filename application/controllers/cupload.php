<?php
/**
* 
*/
class Cupload extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mupload');
		$this->load->helper('download');
        if (!$this->session->userdata('s_idUsuario')) {
            redirect('clogin');
        }
	}

	public function index(){
		$data['error'] = "";
		$data['errorArch'] = "";
		$data['estado'] = "";
        $data['archivo'] = "";
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('vupload',$data);
		$this->load->view('layout/footer');
	}

	public function subirImagen(){
		$config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload',$config);

        if (!$this->upload->do_upload("fileImagen")) {
            $data['error'] = $this->upload->display_errors();
			$this->load->view('layout/header');
			$this->load->view('layout/menu');
			$this->load->view('vupload',$data);
			$this->load->view('layout/footer');
        } else {

            $file_info = $this->upload->data();

            $this->crearMiniatura($file_info['file_name']);

            $titulo = $this->input->post('titImagen');
            $imagen = $file_info['file_name'];
            
            $subir = $this->mupload->subir($titulo,$imagen);      
            $data['titulo'] = $titulo;
            $data['imagen'] = $imagen;

            $this->load->view('layout/header');
			$this->load->view('layout/menu');
			$this->load->view('vImagenSubida', $data);
			$this->load->view('layout/footer');
            
        }
    }
    
    function crearMiniatura($filename){
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'images/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['new_image']='images/thumbs/';
        $config['thumb_marker']='';//captura_thumb.png
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }

}