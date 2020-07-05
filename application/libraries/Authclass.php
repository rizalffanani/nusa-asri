<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authclass
{
    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
    }
	function check_isvalidated($path)
	{
		if(! $this->CI->session->userdata('validated')){ 
			redirect($path);
		}else{
			$url = explode("/",uri_string());
			$like = $url[0];
			$curl = count($url);
			$username = $this->CI->session->userdata('user_id');
			$this->CI->db->where('username', $username);
			$this->CI->db->where('is_active', '1');
			$this->CI->db->like('link', $like);
			$data = $this->CI->db->get('view_akses')->result();
			if (empty($data)) {
				redirect($path.'error');
			}
			else{
				$b="";$c="0";
				for ($i=0; $i < $curl; $i++) { 
					$b.=$url[$i];
					foreach ($data as $ke) {
						if ($b==$ke->link) {
							$c="1";
						}
					}
					$b.='/';
				}
				if ($c==0) {
					redirect($path.'error');
				}
			}
		}
	}
}