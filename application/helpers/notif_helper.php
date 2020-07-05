<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function warn_msg($data)
{
	return "<div class='alert alert-block'><button data-dismiss='alert' class='close'></button><h4 class='alert-heading'>Perhatian !</h4>".$data."</div>";
}

function succ_msg($data)
{
	return '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>'.$data.'</div>';
}

function err_msg($data)
{
	return '<div class="alert alert-error alert-block"><button data-dismiss="alert" class="close"></button><h4 class="alert-heading">Maaf, data sudah ada!</h4>'.$data.'</div>';
}
