<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Antclass {
    function __construct()
    {
        $this->CI =& get_instance();
    }

    function load_skin($view, $vars='')
    {
        $this->CI->load->library('session');

        $dadata['child'] = $this->CI->load->view($view, $vars, TRUE);
		return $this->CI->load->view('ap_view/v_ap_skin', $dadata);
    }

    function skin($view, $vars='')
    {
		$this->CI->load->model('mod_pageman');
		$this->CI->load->model('mod_news');
		$this->CI->load->model('mod_myid');

        $dadata['pageman'] = $this->CI->mod_pageman->get_page('', '1');
        $dadata['news'] = $this->CI->mod_news->get_news('1', '', '1', '1');
        $dadata['myid_left'] = $this->CI->mod_myid->get_myid('', '', '1');
        $dadata['child'] = $this->CI->load->view($view, $vars, TRUE);
		return $this->CI->load->view('v_skin', $dadata);
    }

    function go_log($query)
    {
    	$this->CI->load->library('session');
    	$this->CI->load->database();
    	$add_data = array('id_log'=>date('YmdHisu'), 'login_user'=>$this->CI->session->userdata('s_logname'), 'date_log'=>date('Y-m-d H:i:s'), 'query_log'=>$query, 'ip_log'=>$_SERVER['REMOTE_ADDR']);
		$this->CI->db->insert('tbl_log', $add_data);
    }

    function go_lang($lang_id)
    {
        $de_lang = $lang_id;
        //@redirect("index.php/".$de_lang, 'refresh');
    }

    function auth_user()
    {
        $this->CI->load->library('session');

        if($this->CI->session->userdata('s_logname') == ''): $this->CI->load->view('ap_view/v_ap_logback');endif;
    }

    function go_upload($dafile, $path, $allow, $overwrite=FALSE, $maxw='', $maxh='')
    {
        $config['upload_path'] = $path;
		$config['allowed_types'] = $allow;
        $config['max_size'] = '999999999999';
		$config['max_width']  = $maxw;
		$config['max_height']  = $maxh;
        $config['overwrite']  = $overwrite;
        //$config['encrypt_name']  = TRUE;
        $this->CI->load->library('upload', $config);
        $this->CI->upload->initialize($config);
		if (!$this->CI->upload->do_upload($dafile))
		{
			echo $this->CI->upload->display_errors();
			return FALSE;
		}else{return TRUE;}
    }

    function go_thumb($path, $newpath, $twidth='120', $theight='120')
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['new_image'] = $newpath;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['quality'] = 100;
        $config['width'] = $twidth;
        $config['height'] = $theight;

        $this->CI->load->library('image_lib', $config);
        if ( ! $this->CI->image_lib->resize())
        {
//            echo $this->CI->image_lib->display_errors();
            return FALSE;
        }else{return TRUE;}
    }

	function go_crop($path, $newpath)
    {
    	$this->CI->load->library('image_lib');
	    $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['new_image'] = $newpath;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = 100;
        $config['width'] = '370';
        $config['height'] = '135';
    	$info = getimagesize($path);
		$config['x_axis'] = $info[0]/4;
		$config['y_axis'] = $info[1]/4;

		$this->CI->image_lib->initialize($config);
		if ( ! $this->CI->image_lib->crop())
		{
//		    echo $this->CI->image_lib->display_errors();
		    return FALSE;
		}
		else{ return TRUE; }
    }

	function link_image($string)
	{
        $nustring = preg_replace('/<img(.*?)src="(.*?)\/thumb\/(.*?)\/>/', '<a href="$2/real/$3" class="lightbox"><img$1src="$2/thumb/$3 /></a>', $string);
        return $nustring;
	}

	function back_value($value, $name)
	{
		if(empty($value)){ return set_value($name); }else{ return form_prep($value); };
	}

    function remove_img($string)
    {
        $nustring = preg_replace('/<img*[^<>]*>/', '', $string);
        return $nustring;
    }

    function page_break($string, $id, $page, $next='[ More ... ]')
    {
        $nustring = preg_replace('/<!-- pagebreak -->[\S\s]+/', '<a href="'.base_url().$page.'/'.$id.'"> '.$next.' </a>', $string);
        return $nustring;
    }

    function remove_page_break($string)
    {
        $nustring = preg_replace('/<!-- pagebreak -->/', '', $string);
        return $nustring;
    }

    function remove_div($string)
    {
        $nustring = preg_replace('/<\/?div*[^<>]*>/', '', $string);
        return $nustring;
    }

    function remove_tag($string)
    {
        $nustring = preg_replace('/<\/?[a-z][a-z0-9]*[^<>]*>/', '', $string);
        return $nustring;
    }

    function fix_date($tglasal)
    {
        $tglasal=explode("-",$tglasal);
        $thn=$tglasal[0];
        $bln=$tglasal[1];
        $tgl=$tglasal[2];
        $tglasal=$tgl.'-'.$bln.'-'.$thn;
        return $tglasal;
    }

    function fix_datetime($tglwktasal)
    {
        //list($tgl, $wkt) = split(" ", $tglwktasal);
        $date = explode(" ", $tglwktasal);
        $tglwktasal=explode("-",$date[0]);
        $thn=$tglwktasal[0];
        $bln=$tglwktasal[1];
        $tgl=$tglwktasal[2];
        $tglwktasal=$tgl.'-'.$bln.'-'.$thn.' '.$date[1];
        return $tglwktasal;
    }

	function set_currency($currency,$decimal)
	{
	    $nu_currency = number_format($currency,$decimal,',','.');
	    return $nu_currency;
	}
}
?>
