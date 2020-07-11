<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Status_pemesanan extends CI_Controller
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
        $data = $this->Transaksi_pemesanan_model->get_all_p2();
        $bp = $this->Transaksi_pemesanan_model->get_pesananditerima();
        $sd = $this->Transaksi_pemesanan_model->get_pesanandiproses();
        $ps = $this->Transaksi_pemesanan_model->get_pesananselesai();
        // $bp = $this->Transaksi_pemesanan_model->get_pesanandikirim();
        $data = array(
            'title'=>'Status Pemesanan',
            'data'=>$data,
            'bp'=>$bp,
            'sd'=>$sd,
            'ps'=>$ps,
        );
        $this->template->load('template','transaksi_pemesanan/status_pemesanan_list', $data);
    } 

    public function update_action($status,$id_transaksi_pemesanan) 
    {
        switch ($status) {
            case 1:
                $status = "pesanan diterima";
                $status2 = "diterima";
                break;
            case 2:
                $status = "sudah dipotong";
                $status2 = "sudah dipotong";
                break;
            case 3:
                $status = "dijahit";
                $status2 = "dijahit";
                break;
            case 4:
                $status = "finishing";
                $status2 = "finishing";
                break;
            case 5:
                $status = "pesanan selesai";
                $status2 = "selesai";
                break;
        }

        if (!empty($id_transaksi_pemesanan) && !empty($status)) {
            $data = array('status' => $status,);
            $this->Transaksi_pemesanan_model->update($id_transaksi_pemesanan, $data);
            $data = array(
                'date' => date("Y-m-d"),
                'time' => date("H:i:s"),
                'id_user' => $this->session->userdata("id"),
                'status' => $status2,
                'id_transaksi_pemesanan' => $id_transaksi_pemesanan,
            );

            $this->Transaksi_pemesanan_model->insert("log_pemasanan",$data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('status_pemesanan'));
        }
    }

    public function json() {
        // header('Content-Type: application/json');
        // echo $this->Transaksi_pemesanan_model->json();
        $data = $this->Transaksi_pemesanan_model->get_all_p2();
        $i=1; foreach ($data as $key => $value)  {
            $logs =  $this->Transaksi_pemesanan_model->get_by_id_table_join("log_pemasanan","id_transaksi_pemesanan",$value->id_transaksi_pemesanan)->result();
            $item = array();
            $pd = ($value->status=="pesanan diterima") ? "selected" : "" ;
            $sd = ($value->status=="sudah dipotong") ? "selected" : "" ;
            $dj = ($value->status=="dijahit") ? "selected" : "" ;
            $fs = ($value->status=="finishing") ? "selected" :  "" ;
            $ps = ($value->status=="pesanan selesai") ? "selected" : "" ;

            $item["i"] = $i;
            $item["tanggal_transaksi"] = $value->tanggal_transaksi;
            $item["id_transaksi_pemesanan"] = $value->id_transaksi_pemesanan;
            $item["nama_pelanggan"] = $value->nama_pelanggan;
            $item["tanggal_selesai"] = $value->tanggal_selesai;
            $item["total"] = "Rp ".rupiah($value->total);
            $item["metode_pembayaran"] = $value->metode_pembayaran." ".$value->jenis_pembayaran;
            $item["jml_pembayaran"] = "Rp ".rupiah($value->jml_pembayaran);
            $item["kembali"] = "Rp ".rupiah($value->total-$value->jml_pembayaran);
            $item["id_user"] = $value->first_name;
            $item["tanggal_transaksi"] = $value->tanggal_transaksi;
            $item["log"] = [];
            $i=0;foreach ($logs as $key => $val)  {
                $item["log"][$i]["date"] = $val->date;
                $item["log"][$i]["time"] = $val->time;
                $item["log"][$i]["idser"] = $val->first_name;
                $item["log"][$i]["status"] = $val->status;
                $i++;
            }
            $item["status"] = '<td>
                      <select class="form-control select2" onchange="reload(this.value,'.$value->id_transaksi_pemesanan.')">
                        <option value="1">Ubah Status</option>
                        <option value="1" '.$pd.'>pesanan diterima</option>
                        <option value="2" '.$sd.'>sudah dipotong</option>
                        <option value="3" '.$dj.'>dijahit</option>
                        <option value="4" '.$fs.'>finishing</option>
                        <option value="5" '.$ps.'>pesanan selesai</option>
                      </select>
                    </td>';
            $item["action"] = anchor(site_url('transaksi_pemesanan/read/'.$value->id_transaksi_pemesanan),'Read');            
            $output[] = $item;
        }
        if ($data) {
            $out = array('data' => $output);
        } else {
            $out = array('data' => '');
        }        
        // print_r($out['data']);exit();
        echo json_encode($out);
    }

}

/* End of file Transaksi_pemesanan.php */
/* Location: ./application/controllers/Transaksi_pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-24 08:01:38 */
/* http://harviacode.com */