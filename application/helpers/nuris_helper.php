<?php
function cmb_dinamis($name,$table,$field,$pk,$selected,$select2="",$onchange=""){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control ".$select2."' id='$name' onchange='".$onchange."' required>";
    $cmb .= "<option value='0'>Pilih</option>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function cmb_dinamis_user($name,$table,$field,$pk,$where,$whereval,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    $cmb .= "<option value='0'>pilih</option>";
    $ci->db->where($where, $whereval);
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function cmb_menu($name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field.'/'.$d->tipe.'['.$d->link.']')."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function cmb_dinamis2($name,$table,$field,$pk,$selected,$no){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    $ci->db->where('tipe', $no);
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function cmb_rekening($name,$table,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    $ci->db->where('id', $selected);
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .=">".  strtoupper($d->nama_bank.' / '.$d->atas_nama.' / '.$d->no_rekening)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function get_name($table,$field,$pk,$show){
    $ci = get_instance();
    $ci->db->select($show);
    $ci->db->where($field, $pk);
    $data = $ci->db->get($table)->row();
    return $data; 
}
?>