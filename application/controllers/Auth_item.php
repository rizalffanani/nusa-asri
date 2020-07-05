<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_item extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->authclass->check_isvalidated(base_url());
        $this->load->model('Auth_item_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $auth_item = $this->Auth_item_model->get_all();

        $data = array(
            'title' => 'Auth Item List',
            'auth_item_data' => $auth_item
        );

        $this->template->load('template','admin/auth_item/auth_item_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Auth_item_model->get_by_id($id);
        if ($row) {
            $data = array(
            'title' => 'Auth Item Read',
		'id_aunt' => $row->id_aunt,
		'name' => $row->name,
		'tipe' => $row->tipe,
		'description' => $row->description,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            $this->template->load('template','admin/auth_item/auth_item_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('auth_item'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'title' => 'Auth Item Create',
            'action' => site_url('auth_item/create_action'),
	    'id_aunt' => set_value('id_aunt'),
	    'name' => set_value('name'),
	    'tipe' => set_value('tipe'),
	    'description' => set_value('description'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->template->load('template','admin/auth_item/auth_item_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'tipe' => $this->input->post('tipe',TRUE),
		'description' => $this->input->post('description',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Auth_item_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('auth_item'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Auth_item_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
            'title' => 'Auth Item Update',
                'action' => site_url('auth_item/update_action'),
		'id_aunt' => set_value('id_aunt', $row->id_aunt),
		'name' => set_value('name', $row->name),
		'tipe' => set_value('tipe', $row->tipe),
		'description' => set_value('description', $row->description),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->template->load('template','admin/auth_item/auth_item_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('auth_item'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_aunt', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'tipe' => $this->input->post('tipe',TRUE),
		'description' => $this->input->post('description',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Auth_item_model->update($this->input->post('id_aunt', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('auth_item'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Auth_item_model->get_by_id($id);

        if ($row) {
            $this->Auth_item_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('auth_item'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('auth_item'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('tipe', 'tipe', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id_aunt', 'id_aunt', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Auth_item.php */
/* Location: ./application/controllers/Auth_item.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-13 17:08:49 */
/* http://harviacode.com */