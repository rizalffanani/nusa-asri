<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title'=>'Stok Barang');
        $this->template->load('template','barang/barang_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Barang_model->json();
    }

    
    public function json0() {
        header('Content-Type: application/json');
        echo $this->Barang_model->json0();
    }

    public function read($id) 
    {
        $row = $this->Barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'title' => $row->id_barang,
        'id_barang' => $row->id_barang,
		'sku' => $row->sku,
		'nama_barang' => $row->nama_barang,
		'jenis_barang' => $row->jenis_barang,
		'kategori' => $row->kategori,
		'ukuran' => $row->ukuran,
		'varian' => $row->varian,
		'stok' => $row->stok,
		'unit' => $row->unit,
		'harga_jual' => $row->harga_jual,
	    );
            $this->template->load('template','barang/barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Create',
            'button' => 'Create',
            'action' => site_url('barang/create_action'),
	    'id_barang' => set_value('id_barang'),
	    'sku' => set_value('sku'),
	    'nama_barang' => set_value('nama_barang'),
	    'jenis_barang' => set_value('jenis_barang'),
	    'kategori' => set_value('kategori'),
	    'ukuran' => set_value('ukuran'),
	    'varian' => set_value('varian'),
	    'stok' => set_value('stok'),
	    'unit' => set_value('unit'),
	    'harga_jual' => set_value('harga_jual'),
	);
        $this->template->load('template','barang/barang_form', $data);
    }
    
    public function create_action() 
    {

        $this->form_validation->set_rules('sku', 'sku', 'trim|required|is_unique[barang.sku]');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'sku' => $this->input->post('sku',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'jenis_barang' => $this->input->post('jenis_barang',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
		'ukuran' => $this->input->post('ukuran',TRUE),
		'varian' => $this->input->post('varian',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'unit' => $this->input->post('unit',TRUE),
		'harga_jual' => $this->input->post('harga_jual',TRUE),
	    );

            $this->Barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('barang/update_action'),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'sku' => set_value('sku', $row->sku),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'jenis_barang' => set_value('jenis_barang', $row->jenis_barang),
		'kategori' => set_value('kategori', $row->kategori),
		'ukuran' => set_value('ukuran', $row->ukuran),
		'varian' => set_value('varian', $row->varian),
		'stok' => set_value('stok', $row->stok),
		'unit' => set_value('unit', $row->unit),
		'harga_jual' => set_value('harga_jual', $row->harga_jual),
	    );
            $this->template->load('template','barang/barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
		'sku' => $this->input->post('sku',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'jenis_barang' => $this->input->post('jenis_barang',TRUE),
		'kategori' => $this->input->post('kategori',TRUE),
		'ukuran' => $this->input->post('ukuran',TRUE),
		'varian' => $this->input->post('varian',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'unit' => $this->input->post('unit',TRUE),
		'harga_jual' => $this->input->post('harga_jual',TRUE),
	    );

            $this->Barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $this->Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('jenis_barang', 'jenis barang', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
	$this->form_validation->set_rules('ukuran', 'ukuran', 'trim|required');
	$this->form_validation->set_rules('varian', 'varian', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');
	$this->form_validation->set_rules('unit', 'unit', 'trim|required');
	$this->form_validation->set_rules('harga_jual', 'harga jual', 'trim|required');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-19 17:03:13 */
/* http://harviacode.com */