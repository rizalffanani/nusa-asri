<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->authclass->check_isvalidated(base_url());
        $this->load->model('Users_model');
        $this->load->model('Mlogin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $users = $this->Users_model->get_all();

        $data = array(
            'users_data' => $users,
            'title' => 'User List'
        );

        $this->template->load('template','admin/user/users_list', $data);
    }

    public function chek($id='',$stas='')
    {
        $data = array(
            'active' => $stas,
        );
        $this->Users_model->update($id, $data);
        redirect(site_url('users'));
    }

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id' => $row->id,
                'title' => 'Read User',
                'button' => 'Upload',
                'action' => site_url('users/upload'),
        		'username' => $row->username,
        		'password' => $row->password,
        		'email' => $row->email,
        		'first_name' => $row->first_name,
        		'nokartuidentitas' => $row->nokartuidentitas,
        		'company' => $row->company,
        		'phone' => $row->phone,
        		'Foto' => $row->Foto,
        		'active' => $row->active,
                'val' => @$this->session->flashdata('hasil'),
    	    );
            $this->template->load('template','admin/user/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'title' => 'Create Users',
            'action' => site_url('users/create_action'),
	    'id' => set_value('id'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'email' => set_value('email'),
	    'first_name' => set_value('first_name'),
	    'nokartuidentitas' => set_value('nokartuidentitas'),
	    'company' => set_value('company'),
	    'phone' => set_value('phone'),
	    'Foto' => set_value('Foto'),
	    'active' => set_value('active'),
	);
        $this->template->load('template','admin/user/users_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $date = date("YmdHis");
            $data = array(
        		'username' => "user".rand(1,100),
        		'password' => md5("123456"),
        		'email' => $this->input->post('email',TRUE),
        		'first_name' => $this->input->post('first_name',TRUE),
                'phone' => $this->input->post('phone',TRUE),
        		'nokartuidentitas' => $this->input->post('nokartuidentitas',TRUE),
        		'Foto' => 'default.png',
        		'active' => '1',
        	);
            $this->Users_model->insert($data);
            $ida= $this->db->insert_id();
            $this->load->model('mlogin');
            $data2 = array(
                'id' => $ida,
                'ip_address' => $this->input->ip_address(),
                'created_on' => $date,
            );
            $this->mlogin->insert2($data2);
            $this->load->model('Auth_assignment_model');
            $dat = array(
                'item_name' => 'kasir',
                'user_id' => $ida,
                'created_at' => $date,
            );
            $this->Auth_assignment_model->insert($dat);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'title' => 'Update User',
                'action' => site_url('users/update_action'),
		'id' => set_value('id', $row->id),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'email' => set_value('email', $row->email),
		'first_name' => set_value('first_name', $row->first_name),
		'nokartuidentitas' => set_value('nokartuidentitas', $row->nokartuidentitas),
		'company' => set_value('company', $row->company),
		'phone' => set_value('phone', $row->phone),
		'Foto' => set_value('Foto', $row->Foto),
		'active' => set_value('active', $row->active),
	    );
            $this->template->load('template','admin/user/users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        // $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $us = $this->input->post('username',TRUE);
            $data = array(
        		// 'username' => $us,
        		'email' => $this->input->post('email',TRUE),
                'first_name' => $this->input->post('first_name',TRUE),
        		'nokartuidentitas' => $this->input->post('nokartuidentitas',TRUE),
        		'phone' => $this->input->post('phone',TRUE),
	       );
            $this->Users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users/read/'.$us));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            // $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    function upload(){
        $id= $this->input->post('id');$us= $this->input->post('username');
        $config = array(
            'upload_path' => 'template/dist/img',
            'allowed_types' => 'gif|jpg|png',
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
            $data = array('Foto'=> 'default.png');
        }
        else{
            $hasil = "foto berhasil diperbarui";
            $fot = $this->upload->file_name;
            $data = array('Foto'=> $fot);  
        }
        $this->Users_model->update($id,$data);
        $this->session->set_flashdata('hasil', $hasil);
        $this->read($us);
    }

    public function update_pass() 
    {
        $row = $this->Users_model->get_by_id($this->session->userdata("user_id"));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'title' => 'Update Password',
                'action' => site_url('users/update_Password'),
                'id' => set_value('id', $row->username),
            );
            $this->template->load('template','admin/user/users_pass', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_password() 
    {
        $this->form_validation->set_rules('passlama', 'passlama', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passretype]|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('passretype', 'Password 2', 'trim|required|min_length[6]|max_length[15]');        
        if ($this->form_validation->run() == FALSE) {
            $this->update_pass();
        } else {
            $username = $this->security->xss_clean($this->input->post('id'));
            $password = $this->security->xss_clean(md5($this->input->post('passlama')));
            $query = $this->Mlogin->validateusername($username,$password);
            if($query){
                $data = array(
                    'password' => md5($this->input->post('password', TRUE)),
                );
                $this->Users_model->updatepass($username, $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('login/logout'));
            }else{
                $this->update_pass();            
            }                        
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('username', 'username', 'trim|required|alpha_numeric|min_length[6]|max_length[12]|is_unique[users.username]');
	$this->form_validation->set_rules('email', 'email', 'trim|required|valid_emails|is_unique[users.email]');
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-18 02:04:05 */
/* http://harviacode.com */