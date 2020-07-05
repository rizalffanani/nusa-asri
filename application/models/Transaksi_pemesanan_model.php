<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_pemesanan_model extends CI_Model
{

    public $table = 'transaksi_pemesanan';
    public $id = 'id_transaksi_pemesanan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_transaksi_pemesanan,tanggal_transaksi,id_pelanggan,tanggal_selesai,kurir,potongan,jumlah_potongan,jenis_pembayaran,metode_pembayaran,jml_pembayaran,status,total');
        $this->datatables->from('transaksi_pemesanan');
        //add this line for join
        //$this->datatables->join('table2', 'transaksi_pemesanan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('transaksi_pemesanan/read/$1'),'Read')." | ".anchor(site_url('transaksi_pemesanan/update/$1'),'Update')." | ".anchor(site_url('transaksi_pemesanan/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_transaksi_pemesanan');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_p1()
    {
        $this->db->select('id_transaksi_pemesanan,tanggal_transaksi,transaksi_pemesanan.id_pelanggan,tanggal_selesai,kurir,potongan,jumlah_potongan,jenis_pembayaran,metode_pembayaran,jml_pembayaran,status,total,pelanggan.nama_pelanggan');
        $this->db->from($this->table);
        $this->db->join('pelanggan', 'transaksi_pemesanan.id_pelanggan = pelanggan.id_pelanggan'); 
        $this->db->or_where("status","pesanan selesai"); 
        $this->db->or_where("status","siap dikirim"); 
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    function get_all_p2()
    {
        $this->db->select('id_transaksi_pemesanan,tanggal_transaksi,transaksi_pemesanan.id_pelanggan,tanggal_selesai,kurir,potongan,jumlah_potongan,jenis_pembayaran,metode_pembayaran,jml_pembayaran,status,total,pelanggan.nama_pelanggan');
        $this->db->from($this->table);
        $this->db->join('pelanggan', 'transaksi_pemesanan.id_pelanggan = pelanggan.id_pelanggan'); 
        $this->db->or_where("status","pesanan diterima"); 
        $this->db->or_where("status","sudah dipotong"); 
        $this->db->or_where("status","dijahit"); 
        $this->db->or_where("status","finishing"); 
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    function get_by_id($id){
        $this->db->select('id_transaksi_pemesanan,tanggal_transaksi,transaksi_pemesanan.id_pelanggan,tanggal_selesai,kurir,potongan,jumlah_potongan,jenis_pembayaran,metode_pembayaran,jml_pembayaran,status,total,pelanggan.nama_pelanggan');
        $this->db->from($this->table);
        $this->db->join('pelanggan', 'transaksi_pemesanan.id_pelanggan = pelanggan.id_pelanggan');
        $this->db->where($this->id, $id);

        return $this->db->get()->row();
    }
    // get data by id
    function get_by_id_table($tbl,$whr,$id)
    {
        $this->db->where($whr, $id);
        return $this->db->get($tbl);
    }
    function get_pesananditerima()
    {
        $this->db->where("status","pesanan diterima"); 
        return $this->db->get($this->table)->num_rows();
    }
    function get_pesanandiproses()
    {
        $this->db->or_where("status","sudah dipotong"); 
        $this->db->or_where("status","dijahit"); 
        $this->db->or_where("status","finishing"); 
        return $this->db->get($this->table)->num_rows();
    }
    function get_pesananselesai()
    {
        $this->db->where("status","pesanan selesai"); 
        return $this->db->get($this->table)->num_rows();
    }
    function get_pesanandikirim()
    {
        $this->db->where("status","siap dikirim"); 
        return $this->db->get($this->table)->num_rows();
    }
    function get_transaksiselesai()
    {
        $this->db->where("status","transaksi selesai"); 
        return $this->db->get($this->table)->num_rows();
    }
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_transaksi_pemesanan', $q);
	$this->db->or_like('tanggal_transaksi', $q);
	$this->db->or_like('id_pelanggan', $q);
	$this->db->or_like('tanggal_selesai', $q);
	$this->db->or_like('kurir', $q);
	$this->db->or_like('potongan', $q);
	$this->db->or_like('jumlah_potongan', $q);
	$this->db->or_like('jenis_pembayaran', $q);
	$this->db->or_like('metode_pembayaran', $q);
	$this->db->or_like('jml_pembayaran', $q);
	$this->db->or_like('status', $q);
    $this->db->or_like('total', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_transaksi_pemesanan', $q);
	$this->db->or_like('tanggal_transaksi', $q);
	$this->db->or_like('id_pelanggan', $q);
	$this->db->or_like('tanggal_selesai', $q);
	$this->db->or_like('kurir', $q);
	$this->db->or_like('potongan', $q);
	$this->db->or_like('jumlah_potongan', $q);
	$this->db->or_like('jenis_pembayaran', $q);
	$this->db->or_like('metode_pembayaran', $q);
	$this->db->or_like('jml_pembayaran', $q);
	$this->db->or_like('status', $q);
    $this->db->or_like('total', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($table,$data)
    {
        $this->db->insert($table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    
    function get_max()
    {
        $this->db->select_max($this->id);
        return $this->db->get($this->table)->row();
    }
}

/* End of file Transaksi_pemesanan_model.php */
/* Location: ./application/models/Transaksi_pemesanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-24 08:01:38 */
/* http://harviacode.com */