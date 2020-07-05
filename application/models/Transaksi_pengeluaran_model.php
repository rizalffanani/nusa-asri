<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_pengeluaran_model extends CI_Model
{

    public $table = 'transaksi_pengeluaran';
    public $id = 'id_transaksi_pengeluaran';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_transaksi_pengeluaran,tanggal,rincian,nominal,sumber_dana');
        $this->datatables->from('transaksi_pengeluaran');
        $this->datatables->where('DATE(`tanggal`) = DATE(NOW())');
        // $this->datatables->where('MONTH(`tanggal`) = MONTH(CURRENT_DATE()) AND YEAR(`tanggal`) = YEAR(CURRENT_DATE())');
        //add this line for join
        //$this->datatables->join('table2', 'transaksi_pengeluaran.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('transaksi_pengeluaran/read/$1'),'Read')." | ".anchor(site_url('transaksi_pengeluaran/update/$1'),'Update')." | ".anchor(site_url('transaksi_pengeluaran/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_transaksi_pengeluaran');
        return $this->datatables->generate();
    }
    function jsonharian($i="") {
        $this->db->select('transaksi_penjualan.id_transaksi,tanggal_transaksi,potongan,jumlah_potongan,jml_pembayaran,total,jenis_pembayaran, pelanggan.nama_pelanggan');
        $this->db->from('transaksi_penjualan');
        $this->db->join('pelanggan', 'transaksi_penjualan.id_pelanggan = pelanggan.id_pelanggan');
        if ($i=="bulan") {
            $this->datatables->where('MONTH(`tanggal_transaksi`) = MONTH(CURRENT_DATE()) AND YEAR(`tanggal_transaksi`) = YEAR(CURRENT_DATE())');
        } else {
            $this->db->where('DATE(tanggal_transaksi)', date('Y-m-d'));
        }
        return $this->db->get()->result();
    }
    function jsonharian2($i="") {
        $this->db->select('id_transaksi_pemesanan,tanggal_transaksi,id_pelanggan,tanggal_selesai,kurir,potongan,jumlah_potongan,jenis_pembayaran,metode_pembayaran,jml_pembayaran,status,total');
        $this->db->from('transaksi_pemesanan');
        if ($i=="bulan") {
            $this->datatables->where('MONTH(`tanggal_transaksi`) = MONTH(CURRENT_DATE()) AND YEAR(`tanggal_transaksi`) = YEAR(CURRENT_DATE())');
        } else {
            $this->db->where('tanggal_transaksi', date('Y-m-d'));
        }        
        return $this->db->get()->result();
    }

    // get all
    function get_all($table,$tgl,$i="")
    {
        if ($i=="bulan") {
            $this->datatables->where('MONTH('.$tgl.') = MONTH(CURRENT_DATE()) AND YEAR('.$tgl.') = YEAR(CURRENT_DATE())');
        } else {
            $this->db->where($tgl, date('Y-m-d'));
        }
        
        return $this->db->get($table)->result();
         // print_r($this->db->last_query()); exit();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_transaksi_pengeluaran', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('rincian', $q);
	$this->db->or_like('nominal', $q);
	$this->db->or_like('sumber_dana', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_transaksi_pengeluaran', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('rincian', $q);
	$this->db->or_like('nominal', $q);
	$this->db->or_like('sumber_dana', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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

}

/* End of file Transaksi_pengeluaran_model.php */
/* Location: ./application/models/Transaksi_pengeluaran_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-28 09:23:14 */
/* http://harviacode.com */