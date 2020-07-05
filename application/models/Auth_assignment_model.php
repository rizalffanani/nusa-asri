<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_assignment_model extends CI_Model
{

    public $table = 'auth_assignment';
    public $id = 'id_assignment';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('item_name,user_id,created_at,id_assignment,username');
        $this->db->from($this->table);
        $this->db->join('users', 'auth_assignment.user_id = users.id'); 
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_assignment', $q);
	$this->db->or_like('item_name', $q);
	$this->db->or_like('user_id', $q);
	$this->db->or_like('created_at', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_assignment', $q);
	$this->db->or_like('item_name', $q);
	$this->db->or_like('user_id', $q);
	$this->db->or_like('created_at', $q);
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

/* End of file Auth_assignment_model.php */
/* Location: ./application/models/Auth_assignment_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-03-13 17:11:13 */
/* http://harviacode.com */