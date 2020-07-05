<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pasien_model');
        $this->load->model('mlogin');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array();
        $this->template->load('template','pasien/pasien_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pasien_model->json();
    }

    public function read($id) 
    {
        if ($id==0) {
            $row = $this->Pasien_model->get_by_user($this->session->userdata('user_id'));
            $id =  $row->id_pasien;
        }else{
            $row = $this->Pasien_model->get_by_id($id);
        }
        $idecg = $this->Pasien_model->get_by_idecg('id_pasien',$id);
        $dar = array();
        if ($idecg) {
            $dars = $this->Pasien_model->get_by_iddataecg('id_upload',$idecg->id);
            $dar = array();
            foreach ($dars as $key => $value) {
                $dar[] =  $value->value;
            }
        }
        if ($row) {
            $data = array(
                'button' => 'Upload',
                'action' => site_url('pasien/upload'),
        		'id_pasien' => $row->id_pasien,
        		'nama_lengkap' => $row->nama_lengkap,
        		'tgl_lahir' => $row->tgl_lahir,
        		'jenis_kelamin' => $row->jenis_kelamin,
        		'nomerid' => $row->nomerid,
                'analisis' => $row->analisis,
        		'value' => $dar,
	       );
            $this->template->load('template','pasien/pasien_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pasien/create_action'),
	    'id_pasien' => set_value('id_pasien'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'nomerid' => set_value('nomerid'),
	    'analisis' => set_value('analisis'),
	);
        $this->template->load('template','pasien/pasien_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $this->form_validation->set_rules('nomerid', 'nomerid', 'trim|required|is_unique[pasien.nomerid]');
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $nomerid = $this->input->post('nomerid',TRUE);
            $nama_lengkap = $this->input->post('nama_lengkap',TRUE);
            $date = date("YmdHis");
            $nama = explode(" ", $nama_lengkap);
            $data = array(
        		'nama_lengkap' => $nama_lengkap,
        		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
        		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
        		'nomerid' => $nomerid,
        		'analisis' => $this->input->post('analisis',TRUE),
        	);

            $this->Pasien_model->insert($data);
            $data = array(
                'username' => $nomerid,
                'password' => md5('123456'),
                'email' => $nama[0].rand(10,1000).'@gmail.com',
                'first_name' => $nama[0],
                'phone' => '0',
                'Foto' => 'default.png',
                'active' => '1',
            );
            $this->mlogin->insert($data);
            $ida= $this->db->insert_id();
            $data2 = array(
                'id' => $ida,
                'ip_address' => $this->input->ip_address(),
                'created_on' => $date,
            );
            $this->mlogin->insert2($data2);
            $this->load->model('Auth_assignment_model');
            $data = array(
                'item_name' => 'pasien',
                'user_id' => $ida,
                'created_at' => $date,
            );
            $this->Auth_assignment_model->insert($data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pasien'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pasien_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pasien/update_action'),
		'id_pasien' => set_value('id_pasien', $row->id_pasien),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'nomerid' => set_value('nomerid', $row->nomerid),
		'analisis' => set_value('analisis', $row->analisis),
	    );
            $this->template->load('template','pasien/pasien_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->input->post('nomerid',TRUE)!=$this->input->post('nomerids',TRUE)) {
            $this->form_validation->set_rules('nomerid', 'nomerid', 'trim|required|is_unique[pasien.nomerid]');
        }
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pasien', TRUE));
        } else {
            $data = array(
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'nomerid' => $this->input->post('nomerid',TRUE),
		'analisis' => $this->input->post('analisis',TRUE),
	    );

            $this->Pasien_model->update($this->input->post('id_pasien', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pasien'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pasien_model->get_by_id($id);

        if ($row) {
            $this->Pasien_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pasien'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien'));
        }
    }

    function upload(){
        $id= $this->input->post('id');
        $config = array(
            'upload_path' => 'filw',
            'allowed_types' => 'txt',
            'file_name' => $id.'file_'.date('dmYHis'),
            'overwrite' => FALSE,
            'max_size' => 2048,   
            'file_ext_tolower' => TRUE,    
            'max_filename' => 0,
            'remove_spaces' => TRUE             
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')){
            $hasil = "error ".$this->upload->display_errors();
            $data = array('id_pasien'=>$id,'tgljam'=>date("Y-m-d H:i:s"),'file'=> 'default.txt');
        }
        else{
            $hasil = "foto berhasil diperbarui";
            $fot = $this->upload->file_name;
            $data = array('id_pasien'=>$id,'tgljam'=>date("Y-m-d H:i:s"),'file'=> $fot);
        }
        $this->Pasien_model->insertecg("upload",$data);
        $this->session->set_flashdata('hasil', $hasil);
        $ida= $this->db->insert_id();
        $row = $this->Pasien_model->get_by_idecg('id',$ida);
        $open = fopen('filw/'.$row->file,'r');

        while (!feof($open)) 
        {
            $getTextLine = fgets($open);
            $explodeLine = explode(PHP_EOL,$getTextLine);
            
            for ($i=0; $i < count($explodeLine); $i++) { 
                if ($explodeLine[$i]!=0) {
                    $data = array('id_pasien'=>$id,'id_upload'=>$ida,'value'=> $explodeLine[$i]);
                    $this->Pasien_model->insertecg("dataecg",$data);
                }
            }
        }

        fclose($open);

        redirect(site_url('pasien/read/'.$id));
    }
    public function _rules() 
    {
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('analisis', 'analisis', 'trim|required');

	$this->form_validation->set_rules('id_pasien', 'id_pasien', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pasien.php */
/* Location: ./application/controllers/Pasien.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-02 06:27:19 */
/* http://harviacode.com */