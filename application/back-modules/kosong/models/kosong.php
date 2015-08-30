<?php

class Kosong extends MY_Model
{

	 function __construct()
    {
        parent::__construct(''); //table name
        $this->load->library('images_upload'); 
		$this->load->library('image_lib');
    }

}

?>