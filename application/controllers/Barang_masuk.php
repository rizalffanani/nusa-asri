<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_masuk_model');
        $this->load->model('Barang_model');
        $this->load->library('form_validation');        
	   $this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title'=>'Barang Masuk');
        $this->template->load('template','barang_masuk/barang_masuk_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Barang_masuk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Barang_masuk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'title' => $row->idbrgmasuk,
        'idbrgmasuk' => $row->idbrgmasuk,
		'tanggal' => $row->tanggal,
		'id_barang' => $row->id_barang,
		'penerima' => $row->penerima,
		'pemasok' => $row->pemasok,
		'tandaterima' => $row->tandaterima,
		'jumlah' => $row->jumlah,
		'harga_beli' => $row->harga_beli,
	    );
            $this->template->load('template','barang_masuk/barang_masuk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_masuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Tambah Barang Masuk',
            'button' => 'Create',
            'action' => site_url('barang_masuk/create_action'),
	    'idbrgmasuk' => set_value('idbrgmasuk'),
	    'tanggal' => date("Y-m-d"),
	    'id_barang' => set_value('id_barang'),
	    'penerima' => set_value('penerima'),
	    'pemasok' => set_value('pemasok'),
	    'tandaterima' => set_value('tandaterima'),
	    'jumlah' => set_value('jumlah'),
	    'harga_beli' => set_value('harga_beli'),
	);
        $this->template->load('template','barang_masuk/barang_masuk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $id_barang = $this->input->post('id_barang',TRUE);
            $jumlah = $this->input->post('jumlah',TRUE);
            $config = array(
                'upload_path' => 'filw',
                'allowed_types' => 'gif|jpg|png',
                'file_name' => rand(10,1000).'file_'.date('dmYHis'),
                'overwrite' => FALSE,
                'max_size' => 2048,   
                'file_ext_tolower' => TRUE,    
                'max_filename' => 0,
                'remove_spaces' => TRUE             
            );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);            
            $data = array(
                'tanggal' => $this->input->post('tanggal',TRUE),
                'id_barang' => $id_barang,
                'penerima' => $this->input->post('penerima',TRUE),
                'pemasok' => $this->input->post('pemasok',TRUE),
                'jumlah' => $jumlah,
                'harga_beli' => $this->input->post('harga_beli',TRUE),
            );
            if (!$this->upload->do_upload('tandaterima')){
                $data['tandaterima'] = 'default.png';
            }
            else{
                $fot = $this->upload->file_name;
                $data['tandaterima'] = $fot; 
            }
            $this->Barang_masuk_model->insert($data);
            $row = $this->Barang_model->get_by_id($id_barang);
            if ($row) {
                $data = array(
                    'stok' => ($row->stok+$jumlah),
                );
                $this->Barang_model->update($row->id_barang, $data);
            }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang_masuk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_masuk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('barang_masuk/update_action'),
		'idbrgmasuk' => set_value('idbrgmasuk', $row->idbrgmasuk),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'penerima' => set_value('penerima', $row->penerima),
		'pemasok' => set_value('pemasok', $row->pemasok),
		'tandaterima' => set_value('tandaterima', $row->tandaterima),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'harga_beli' => set_value('harga_beli', $row->harga_beli),
	    );
            $this->template->load('template','barang_masuk/barang_masuk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_masuk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idbrgmasuk', TRUE));
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'penerima' => $this->input->post('penerima',TRUE),
		'pemasok' => $this->input->post('pemasok',TRUE),
		'tandaterima' => $this->input->post('tandaterima',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'harga_beli' => $this->input->post('harga_beli',TRUE),
	    );

            $this->Barang_masuk_model->update($this->input->post('idbrgmasuk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang_masuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_masuk_model->get_by_id($id);

        if ($row) {
            $this->Barang_masuk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang_masuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_masuk'));
        }
    }

    public function panggil(){
        $id = $this->input->post('product_code',TRUE);
        $data = $this->Barang_model->get_by_id($id);
        echo json_encode($data);
    }
 

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('penerima', 'penerima', 'trim|required');
	$this->form_validation->set_rules('pemasok', 'pemasok', 'trim|required');
	// $this->form_validation->set_rules('tandaterima', 'tandaterima', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('harga_beli', 'harga beli', 'trim|required');

	$this->form_validation->set_rules('idbrgmasuk', 'idbrgmasuk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Barang_masuk.php */
/* Location: ./application/controllers/Barang_masuk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-19 17:14:20 */
/* http://harviacode.com */