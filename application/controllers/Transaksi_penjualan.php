<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_penjualan_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Barang_model');
        $this->load->library('form_validation');        
	   $this->load->library('datatables');
    }

    public function index()
    {
        $data = array('title'=>'Penjualan');
        $this->template->load('template','transaksi_penjualan/transaksi_penjualan_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Transaksi_penjualan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Transaksi_penjualan_model->get_by_id($id);
        if ($row) {

            $datas = $this->Transaksi_penjualan_model->get_by_detail($row->id_transaksi);
            $data = array(
		'title' => "Nota ".$row->id_transaksi,
        'id_transaksi' => $row->id_transaksi,
		'tanggal_transaksi' => $row->tanggal_transaksi,
		'id_pelanggan' => $row->id_pelanggan,
        'nama_pelanggan' => $row->nama_pelanggan,
		'potongan' => $row->potongan,
		'jumlah_potongan' => $row->jumlah_potongan,
		'jml_pembayaran' => $row->jml_pembayaran,
		'total' => $row->total,
		'jenis_pembayaran' => $row->jenis_pembayaran,
        'detail' => $datas,
	    );
            $this->template->load('template','transaksi_penjualan/transaksi_penjualan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_penjualan'));
        }
    }

    public function create() 
    {
        $row = $this->Transaksi_penjualan_model->get_max();
        $data = array(
            'title' => 'Tambah Penjualan',
            'button' => 'Save',
            'action' => site_url('transaksi_penjualan/create_action'),
    	    'id_transaksi' => ($row->id_transaksi+1),
    	    'tanggal_transaksi' => date("Y-m-d"),
    	    'id_pelanggan' => set_value('id_pelanggan'),
    	    'potongan' => set_value('potongan'),
    	    'jumlah_potongan' => set_value('jumlah_potongan'),
    	    'jml_pembayaran' => set_value('jml_pembayaran'),
    	    'total' => set_value('total'),
    	    'jenis_pembayaran' => set_value('jenis_pembayaran'),
            'id_barang'=> set_value('id_barang')
    	);
        $this->template->load('template','transaksi_penjualan/transaksi_penjualan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
            $data = array(
        		'tanggal_transaksi' => $this->input->post('tanggal_transaksi',TRUE).' '.date("H:i:s"),
        		'id_pelanggan' => $this->input->post('id_pelanggan',TRUE),
        		'potongan' => $this->input->post('potongan',TRUE),
        		'jumlah_potongan' => $this->input->post('jumlah_potongan',TRUE),
        		'jml_pembayaran' => $this->input->post('jml_pembayaran',TRUE),
        		'total' => $this->input->post('total',TRUE),
        		'jenis_pembayaran' => $this->input->post('jenis_pembayaran',TRUE),
    	    );
            $this->Transaksi_penjualan_model->insert($data);
            $id_transaksi_penjualan= $this->db->insert_id();
            $id_barang = ($this->input->post('id_barang',TRUE));
            for ($i=0; $i < count($id_barang); $i++) { 
                $data = array(
                    'id_transaksi_penjualan' => $id_transaksi_penjualan,
                    'id_barang' => $this->input->post('id_barang',TRUE)[$i],
                    'qty' => $this->input->post('qty',TRUE)[$i],
                    'harga_jual' => $this->input->post('harga_jual',TRUE)[$i],
                    'subtotal' => $this->input->post('subtototal',TRUE)[$i],
                );

                $this->Transaksi_penjualan_model->insert2($data);
            }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi_penjualan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_penjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi_penjualan/update_action'),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
		'tanggal_transaksi' => set_value('tanggal_transaksi', $row->tanggal_transaksi),
		'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
		'potongan' => set_value('potongan', $row->potongan),
		'jumlah_potongan' => set_value('jumlah_potongan', $row->jumlah_potongan),
		'jml_pembayaran' => set_value('jml_pembayaran', $row->jml_pembayaran),
		'total' => set_value('total', $row->total),
		'jenis_pembayaran' => set_value('jenis_pembayaran', $row->jenis_pembayaran),
	    );
            $this->template->load('template','transaksi_penjualan/transaksi_penjualan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_penjualan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
		'tanggal_transaksi' => $this->input->post('tanggal_transaksi',TRUE),
		'id_pelanggan' => $this->input->post('id_pelanggan',TRUE),
		'potongan' => $this->input->post('potongan',TRUE),
		'jumlah_potongan' => $this->input->post('jumlah_potongan',TRUE),
		'jml_pembayaran' => $this->input->post('jml_pembayaran',TRUE),
		'total' => $this->input->post('total',TRUE),
		'jenis_pembayaran' => $this->input->post('jenis_pembayaran',TRUE),
	    );

            $this->Transaksi_penjualan_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_penjualan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_penjualan_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_penjualan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi_penjualan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_penjualan'));
        }
    }

    public function panggil(){
        $id = $this->input->post('product_code',TRUE);
        $data = $this->Pelanggan_model->get_by_id($id);
        echo json_encode($data);
    }

    public function panggil2(){
        $id = $this->input->post('product_code',TRUE);
        $data = $this->Barang_model->get_by_id($id);
        echo json_encode($data);
    }

    public function tabel(){
        $a = $this->input->post('a',TRUE);
        $id_barang="";?>
            <td>
                <?php echo cmb_dinamis('id_barang[]', 'barang', 'nama_barang', 'id_barang', $id_barang,'select2','panggil2(this.value,'.$a.')') ?>
            </td>
            <td>
                <input type="number" class="form-control" name="qty[]" id="qty<?= $a?>" placeholder="Qty" value="0" min="0" onchange="plus(this.value,<?= $a?>)" />
            </td>
            <td>
                <span id="harga<?= $a?>">0</span>
                <input type="hidden" name="harga_jual[]" id="harga_jual<?= $a?>">
            </td>
            <td>
                <span id="sub<?= $a?>">0</span>
                <input type="hidden" name="subtototal[]" id="subtototal<?= $a?>">
            </td>
            <td><a href="#" onclick="hapus(this)">Hapus</a></td>
    <?php
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal_transaksi', 'tanggal transaksi', 'trim|required');
	$this->form_validation->set_rules('id_pelanggan', 'id pelanggan', 'trim|required');
	$this->form_validation->set_rules('potongan', 'potongan', 'trim|required');
	$this->form_validation->set_rules('jumlah_potongan', 'jumlah potongan', 'trim|required');
	$this->form_validation->set_rules('jml_pembayaran', 'jml pembayaran', 'trim|required');
	$this->form_validation->set_rules('total', 'total', 'trim|required');
	$this->form_validation->set_rules('jenis_pembayaran', 'jenis pembayaran', 'trim|required');

	$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Transaksi_penjualan.php */
/* Location: ./application/controllers/Transaksi_penjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-21 05:05:26 */
/* http://harviacode.com */