<?php
class Mlogin extends CI_Model
{
    public $table = 'users';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    
    public function validate($username,$password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $query = $this->db->get('users')->row();     
    }

    public function validatelvl($username,$password)
    {
        $this->db->select('id,username,first_name,Foto,active,item_name');
        $this->db->from('users');
        $this->db->join('auth_assignment', 'users.id = auth_assignment.user_id');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $query = $this->db->get()->row();     
    }

    public function validateusername($username,$password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $query = $this->db->get('users')->row();     
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function insert2($data)
    {
        $this->db->insert('users_detail', $data);
    }

    function get_by_id($id)
    {
        // $this->db->select('username');
        $this->db->where('username', $id);
        return $this->db->get($this->table)->row();
    }    
    function get_by_email($id)
    {
        // $this->db->select('username');
        $this->db->where('email', $id);
        return $this->db->get($this->table)->row();
    }

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update('users_detail', $data);
    }

    function updatepass($id, $data)
    {
        $this->db->where('username', $id);
        $this->db->update('users', $data);
    }
}
