<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_pemesanan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data = $this->Transaksi_pemesanan_model->get_all_p1();
        $bp = $this->Transaksi_pemesanan_model->get_pesananditerima();
        $sd = $this->Transaksi_pemesanan_model->get_pesanandiproses();
        $ps = $this->Transaksi_pemesanan_model->get_pesananselesai();
        $sdm = $this->Transaksi_pemesanan_model->get_pesanandikirim();
        $tss = $this->Transaksi_pemesanan_model->get_transaksiselesai();
        $data = array(
            'title'=>'Pemesanan',
            'data'=>$data,'bp'=>$bp,'sd'=>$sd,'ps'=>$ps,'sdm'=>$sdm,'tss'=>$tss,
        );
        $this->template->load('template','transaksi_pemesanan/transaksi_pemesanan_list', $data);
    }     
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Transaksi_pemesanan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Transaksi_pemesanan_model->get_by_id($id);
        $data = $this->Transaksi_pemesanan_model->get_by_id_table("transaksi_pemesanan_detail","id_transaksi_pemesanan",$row->id_transaksi_pemesanan);

        if ($row) {
            $data = array(
		'title' => "Nota ".$row->id_transaksi_pemesanan,
        'id_transaksi_pemesanan' => $row->id_transaksi_pemesanan,
		'tanggal_transaksi' => $row->tanggal_transaksi,
		'id_pelanggan' => $row->id_pelanggan,
        'nama_pelanggan' => $row->nama_pelanggan,
		'tanggal_selesai' => $row->tanggal_selesai,
		'kurir' => $row->kurir,
		'potongan' => $row->potongan,
		'jumlah_potongan' => $row->jumlah_potongan,
		'jenis_pembayaran' => $row->jenis_pembayaran,
		'metode_pembayaran' => $row->metode_pembayaran,
		'jml_pembayaran' => $row->jml_pembayaran,
		'status' => $row->status,
        'total' => $row->total,
        'detail' => $data->result(),
	    );
            $this->template->load('template','transaksi_pemesanan/transaksi_pemesanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_pemesanan'));
        }
    }

    public function cetak($id) 
    {
        $row = $this->Transaksi_pemesanan_model->get_by_id($id);
        $data = $this->Transaksi_pemesanan_model->get_by_id_table("transaksi_pemesanan_detail","id_transaksi_pemesanan",$row->id_transaksi_pemesanan);

        if ($row) {
            $data = array(
        'title' => "Nota ".$row->id_transaksi_pemesanan,
        'id_transaksi_pemesanan' => $row->id_transaksi_pemesanan,
        'tanggal_transaksi' => $row->tanggal_transaksi,
        'id_pelanggan' => $row->id_pelanggan,
        'nama_pelanggan' => $row->nama_pelanggan,
        'tanggal_selesai' => $row->tanggal_selesai,
        'kurir' => $row->kurir,
        'potongan' => $row->potongan,
        'jumlah_potongan' => $row->jumlah_potongan,
        'jenis_pembayaran' => $row->jenis_pembayaran,
        'metode_pembayaran' => $row->metode_pembayaran,
        'jml_pembayaran' => $row->jml_pembayaran,
        'status' => $row->status,
        'total' => $row->total,
        'detail' => $data->result(),
        );
            $this->template->load('template','transaksi_pemesanan/transaksi_pemesanan_cetak', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_pemesanan'));
        }
    }

    public function create() 
    {
        $row = $this->Transaksi_pemesanan_model->get_max();
        $data = array(
            'title' => 'Tambah Pemesanan',
            'button' => 'Save',
            'action' => site_url('transaksi_pemesanan/create_action'),
    	    'id_transaksi_pemesanan' => ($row->id_transaksi_pemesanan +1),
    	    'tanggal_transaksi' =>  date("Y-m-d"),
    	    'id_pelanggan' => set_value('id_pelanggan'),
    	    'tanggal_selesai' => set_value('tanggal_selesai'),
    	    'kurir' => set_value('kurir'),
    	    'potongan' => set_value('potongan'),
    	    'jumlah_potongan' => set_value('jumlah_potongan'),
    	    'jenis_pembayaran' => set_value('jenis_pembayaran'),
    	    'metode_pembayaran' => set_value('metode_pembayaran'),
    	    'jml_pembayaran' => set_value('jml_pembayaran'),
    	    'status' => set_value('status'),
            'total' => set_value('total'),
    	);
        
        if (count($this->cart->contents())==0) {
            $this->deklar("1");
        }
        $this->template->load('template','transaksi_pemesanan/transaksi_pemesanan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            print_r($this->input->post());
            $data = array(
        		'id_transaksi_pemesanan' => $this->input->post('id_transaksi_pemesanan',TRUE),
                'tanggal_transaksi' => $this->input->post('tanggal_transaksi',TRUE),
        		'id_pelanggan' => $this->input->post('id_pelanggan',TRUE),
        		'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
        		'kurir' => $this->input->post('kurir',TRUE),
        		'potongan' => $this->input->post('potongan',TRUE),
        		'jumlah_potongan' => $this->input->post('jumlah_potongan',TRUE),
        		'jenis_pembayaran' => $this->input->post('jenis_pembayaran',TRUE),
        		'metode_pembayaran' => $this->input->post('metode_pembayaran',TRUE),
        		'jml_pembayaran' => $this->input->post('jml_pembayaran',TRUE),
        		'status' => 'pesanan diterima',
                'total' => $this->input->post('total',TRUE),
    	    );
            $this->Transaksi_pemesanan_model->insert('transaksi_pemesanan',$data);

            foreach($this->cart->contents() as $key){
                $data2 = array(
                    'id_barang_pesanan' => $key['id_barang_pesanan'], 
                    'value' => $key['value'], 
                    'id_barang_pesanan_model' => $key['jenis_barang_pesanan_model'], 
                    'nama_barang' => $key['names'], 
                    'qty' => $key['qty'], 
                    'unit' => $key['unit'], 
                    'harga_barang' => $key['price'], 
                    'jumlah' => $key['subtotal'], 
                    'id_transaksi_pemesanan' => $this->input->post('id_transaksi_pemesanan',TRUE),
                );
                $this->Transaksi_pemesanan_model->insert('transaksi_pemesanan_detail',$data2);
                $ida= $this->db->insert_id();
                for ($i=0; $i < count($key['nama_kain']); $i++) { 
                    $data3 = array(
                        'nama_kain' => $key['nama_kain'][$i], 
                        'bidang' => $key['bidang'][$i], 
                        'ukuran' => $key['ukuran'][$i], 
                        'pemakaian' => $key['pemakaian'][$i], 
                        'harga' => $key['hrga'][$i], 
                        'idtransaksi_pemesanan_detail' => $ida,
                    );
                    $this->Transaksi_pemesanan_model->insert('transaksi_pemesanan_kain',$data3);
                }
                $this->cart->remove($key['rowid']);
            }

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('status_pemesanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_pemesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update',
                'button' => 'Update',
                'action' => site_url('transaksi_pemesanan/update_action'),
		'id_transaksi_pemesanan' => set_value('id_transaksi_pemesanan', $row->id_transaksi_pemesanan),
		'tanggal_transaksi' => set_value('tanggal_transaksi', $row->tanggal_transaksi),
		'id_pelanggan' => set_value('id_pelanggan', $row->id_pelanggan),
		'tanggal_selesai' => set_value('tanggal_selesai', $row->tanggal_selesai),
		'kurir' => set_value('kurir', $row->kurir),
		'potongan' => set_value('potongan', $row->potongan),
		'jumlah_potongan' => set_value('jumlah_potongan', $row->jumlah_potongan),
		'jenis_pembayaran' => set_value('jenis_pembayaran', $row->jenis_pembayaran),
		'metode_pembayaran' => set_value('metode_pembayaran', $row->metode_pembayaran),
		'jml_pembayaran' => set_value('jml_pembayaran', $row->jml_pembayaran),
		'status' => set_value('status', $row->status),
        'total' => set_value('total', $row->total),
	    );
            $this->template->load('template','transaksi_pemesanan/transaksi_pemesanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_pemesanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi_pemesanan', TRUE));
        } else {
            $data = array(
		'tanggal_transaksi' => $this->input->post('tanggal_transaksi',TRUE),
		'id_pelanggan' => $this->input->post('id_pelanggan',TRUE),
		'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
		'kurir' => $this->input->post('kurir',TRUE),
		'potongan' => $this->input->post('potongan',TRUE),
		'jumlah_potongan' => $this->input->post('jumlah_potongan',TRUE),
		'jenis_pembayaran' => $this->input->post('jenis_pembayaran',TRUE),
		'metode_pembayaran' => $this->input->post('metode_pembayaran',TRUE),
		'jml_pembayaran' => $this->input->post('jml_pembayaran',TRUE),
		'status' => $this->input->post('status',TRUE),
        'total' => $this->input->post('total',TRUE),
	    );

            $this->Transaksi_pemesanan_model->update($this->input->post('id_transaksi_pemesanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_pemesanan'));
        }
    }

    public function update_status($status,$id_transaksi_pemesanan) 
    {
        $row = $this->Transaksi_pemesanan_model->get_by_id($id_transaksi_pemesanan);
        switch ($status) {
            case 1:
                $status = "pesanan selesai";
                $data = array('status' => $status,);
                break;
            case 2:
                $status = "siap dikirim";
                $data = array('status' => $status,);
                break;
            case 3:
                $status = "transaksi selesai";
                $data = array('status' => $status, 'jml_pembayaran' =>$row->total, 'jenis_pembayaran'=>'lunas');
                break;
        }

        if (!empty($id_transaksi_pemesanan) && !empty($status)) {
            

            $this->Transaksi_pemesanan_model->update($id_transaksi_pemesanan, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_pemesanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_pemesanan_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_pemesanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi_pemesanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_pemesanan'));
        }
    }

    public function panggil(){
        $id = $this->input->post('product_code',TRUE);
        $data = $this->Transaksi_pemesanan_model->get_by_id_table("jenis_barang_pesanan","id_barang_pesanan",$id);
        echo json_encode($data->row());
    }

    public function panggil2(){
        $id = $this->input->post('product_code',TRUE);
        $data = $this->Transaksi_pemesanan_model->get_by_id_table("jenis_barang_pesanan_model","id_barang_pesanan",$id);
        $row = $data->result();
        echo "<option value='0'>Pilih</option>";
        if ($row) {
            foreach ($row as $key => $value) {
                echo "<option value='".$value->id."'>".$value->model."</option>";
            }
        }
    }
    public function angka()
    {
        $a = $this->input->post('value',TRUE);
        echo json_encode($this->cart->contents()[$a]);
    }
    public function tabel(){
        $a = $this->input->post('a',TRUE);
        $this->deklar($a);
        foreach($this->cart->contents() as $key) { 
            if ($key['id']==$a) {
                $rowid = $key['rowid'];
            }
        }
        ?>
        <td>
            <input type="text" class="form-control" name="nama_barang[]" id="nama_barang<?= $a?>" placeholder="barang" onclick="angka('<?= $rowid?>',<?= $a?>)" data-toggle="modal" data-target="#modal-lg"/>
        </td>
        <td>
            <input type="number" class="form-control" name="qtys[]" id="qtys<?= $a?>" placeholder="Qty" value="0" min="0" onchange="plus(this.value,<?= $a?>)" mk<?= $a?>="<?= $a?>" />
        </td>
        <td>
            <input type="number" class="form-control" name="harga_jual[]" id="harga_jual<?= $a?>" readonly>
        </td>
        <td>
            <input type="number" class="form-control" name="subtototal[]" id="subtototal<?= $a?>" readonly>
        </td>
        <td><a href="#" onclick="hapus2(this,'<?= $rowid?>')">Hapus</a></td>
    <?php
    }

    public function tabel2(){
        $a = $this->input->post('a',TRUE);?>
            <td>
              <input type="text" class="form-control" name="nama_kain[]" id="nama_kain<?= $a?>" placeholder="Nama Kain" />
            </td>
            <td>
              <select class="form-control" name="bidang[]" id="bidang<?= $a?>" >
                <option value="">Pilih Bidang</option>
                <option value="bidang kecil">bidang kecil</option>
                <option value="bidang besar">bidang besar</option>
            </select>
            </td>
            <td>
              <input type="number" class="form-control"  name="ukuran[]" id="ukuran<?= $a?>" placeholder="Ukuran" min="1">
            </td>
            <td>
              <input type="text" class="form-control" name="pemakaian[]" id="pemakainn<?= $a?>" placeholder="Pemakaian" />
            </td>
            <td><input type="number" class="form-control"  name="hrga[]" id="hrga<?= $a?>" placeholder="Harga" min="1"></td>
            <td><button type="button" class="btn btn-block btn-danger" onclick="hapus(this)"><i class="fas fa-times"></i></button></td>
    <?php
    }

    public function save_str()
    {
        $datas= array(
            'rowid' => $this->input->post('acak'),
            'id' => $this->input->post('id'),
            'name' => $this->input->post('produk1'),
            'price' => $this->input->post('harga1'),
            'qty' => $this->input->post('qty1'), 
            'names' => $this->input->post('produk1'),
            'unit' => $this->input->post('unit1'), 
            'id_barang_pesanan' => $this->input->post('id_barang_pesanan'), 
            'value' => $this->input->post('value'), 
            'jenis_barang_pesanan_model' => $this->input->post('jenis_barang_pesanan_model'), 
            'nama_kain' => $this->input->post('nama_kain'), 
            'bidang' => $this->input->post('bidang'), 
            'ukuran' => $this->input->post('ukuran'), 
            'pemakaian' => $this->input->post('pemakaian'), 
            'hrga' => $this->input->post('hrga'), 
        );
        $this->cart->update($datas);
        echo(json_encode($this->cart->contents()[$this->input->post('acak')]));
    }

    public function deklar($id)
    {
        $datas= array(
            'id' => $id,
            'name' => "_",
            'price' => 0,
            'qty' => 1,
            'names' => "", 
            'unit' => "", 
            'id_barang_pesanan' => 0, 
            'value' => "", 
            'jenis_barang_pesanan_model' => 0, 
            'nama_kain' => "", 
            'bidang' => "", 
            'ukuran' => 0, 
            'pemakaian' => "", 
            'hrga' => 0, 
        );
        $this->cart->insert($datas);
    }

    function hapus_cart(){ //fungsi untuk menghapus item cart
        $row_id = $this->input->post('row_id',TRUE);
        $this->cart->remove($row_id);
        echo "string";
    }  

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal_transaksi', 'tanggal transaksi', 'trim|required');
	$this->form_validation->set_rules('id_pelanggan', 'id pelanggan', 'trim|required');
	$this->form_validation->set_rules('tanggal_selesai', 'tanggal selesai', 'trim|required');
	$this->form_validation->set_rules('kurir', 'kurir', 'trim|required');
	$this->form_validation->set_rules('potongan', 'potongan', 'trim|required');
	$this->form_validation->set_rules('jumlah_potongan', 'jumlah potongan', 'trim|required');
	$this->form_validation->set_rules('jenis_pembayaran', 'jenis pembayaran', 'trim|required');
	$this->form_validation->set_rules('metode_pembayaran', 'metode pembayaran', 'trim|required');
	$this->form_validation->set_rules('jml_pembayaran', 'jml pembayaran', 'trim|required');
	// $this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_transaksi_pemesanan', 'id_transaksi_pemesanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Transaksi_pemesanan.php */
/* Location: ./application/controllers/Transaksi_pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-24 08:01:38 */
/* http://harviacode.com */