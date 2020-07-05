<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_pengeluaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_pengeluaran_model');
        $this->load->library('form_validation');       
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title'=>'Laporan Keuangan');
        $this->template->load('template','transaksi_pengeluaran/transaksi_pengeluaran_index', $data);
    } 

    public function harian()
    {
        $lappengeluaran = $this->Transaksi_pengeluaran_model->get_all("transaksi_pengeluaran","tanggal");
        $lappemasukan = $this->Transaksi_pengeluaran_model->jsonharian2();
        $lappejualan = $this->Transaksi_pengeluaran_model->jsonharian();
        $data = array(
            'title'=>'Laporan Keuangan Harian',
            'lappengeluaran'=>$lappengeluaran,
            'lappemasukan'=>$lappemasukan,
            'lappejualan'=>$lappejualan,
        );
        $this->template->load('template','transaksi_pengeluaran/transaksi_pengeluaran_list', $data);
    } 
    public function labarugi()
    {
        $lappengeluaran = $this->Transaksi_pengeluaran_model->get_all("transaksi_pengeluaran","tanggal","bulan");
        $lappemasukan = $this->Transaksi_pengeluaran_model->jsonharian2("bulan");
        $lappejualan = $this->Transaksi_pengeluaran_model->jsonharian("bulan");
        $data = array(
            'title'=>'Laporan Laba Rugi / Bulan',
            'lappengeluaran'=>$lappengeluaran,
            'lappemasukan'=>$lappemasukan,
            'lappejualan'=>$lappejualan,
        );
        $this->template->load('template','transaksi_pengeluaran/transaksi_pengeluaran_list2', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Transaksi_pengeluaran_model->json();
    }
    
    public function jsonharian() {
        header('Content-Type: application/json');
        echo $this->Transaksi_pengeluaran_model->jsonharian();
    }
    public function jsonharian2() {
        header('Content-Type: application/json');
        echo $this->Transaksi_pengeluaran_model->jsonharian2();
    }

    public function read($id) 
    {
        $row = $this->Transaksi_pengeluaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_transaksi_pengeluaran' => $row->id_transaksi_pengeluaran,
		'tanggal' => $row->tanggal,
		'rincian' => $row->rincian,
		'nominal' => $row->nominal,
		'sumber_dana' => $row->sumber_dana,
	    );
            $this->template->load('template','transaksi_pengeluaran/transaksi_pengeluaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_pengeluaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'title' => 'Laporan Keuangan Pengeluaran',
            'button' => 'Create',
            'action' => site_url('transaksi_pengeluaran/create_action'),
	    'id_transaksi_pengeluaran' => set_value('id_transaksi_pengeluaran'),
	    'tanggal' => set_value('tanggal'),
	    'rincian' => set_value('rincian'),
	    'nominal' => set_value('nominal'),
	    'sumber_dana' => set_value('sumber_dana'),
	);
        $this->template->load('template','transaksi_pengeluaran/transaksi_pengeluaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'rincian' => $this->input->post('rincian',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'sumber_dana' => $this->input->post('sumber_dana',TRUE),
	    );

            $this->Transaksi_pengeluaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi_pengeluaran/harian'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_pengeluaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('transaksi_pengeluaran/update_action'),
		'id_transaksi_pengeluaran' => set_value('id_transaksi_pengeluaran', $row->id_transaksi_pengeluaran),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'rincian' => set_value('rincian', $row->rincian),
		'nominal' => set_value('nominal', $row->nominal),
		'sumber_dana' => set_value('sumber_dana', $row->sumber_dana),
	    );
            $this->template->load('template','transaksi_pengeluaran/transaksi_pengeluaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_pengeluaran/harian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi_pengeluaran', TRUE));
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'rincian' => $this->input->post('rincian',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'sumber_dana' => $this->input->post('sumber_dana',TRUE),
	    );

            $this->Transaksi_pengeluaran_model->update($this->input->post('id_transaksi_pengeluaran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_pengeluaran/harian'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_pengeluaran_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_pengeluaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi_pengeluaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_pengeluaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('rincian', 'rincian', 'trim|required');
	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
	$this->form_validation->set_rules('sumber_dana', 'sumber dana', 'trim|required');

	$this->form_validation->set_rules('id_transaksi_pengeluaran', 'id_transaksi_pengeluaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Transaksi_pengeluaran.php */
/* Location: ./application/controllers/Transaksi_pengeluaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-28 09:23:14 */
/* http://harviacode.com */