<?php

class Core extends MY_Model
{

	 private $upload_path = '';

	 function __construct()
    {
        parent::__construct('berita'); //table name
        $this->load->library('images_upload'); 
		    $this->load->library('image_lib');
    }

    function setUploadPath($upload_path)
    {
      $this->upload_path = $upload_path;
    }

    /**
     * doUploadImage
     * 
     * @param = $resize = array(
     *                      'width' => '640',
     *                      'height' => '320'
     *                    );
     * @param = $createThumbnail = array(
     *                                'width' => '300',
     *                                'height' => '320'
     *                             );
     * 
     * @return boolean
     */

    function doUploadImage($doResize = array(), $createThumbnail = array())
    {
       //create config for upload
       $uploadConfig =  array(
       'upload_path' => $this->upload_path  
       
       );
       
      return $this->images_upload->doUpload($uploadConfig, $doResize, $createThumbnail);
            
    } 

    /**
     * getGambar
     * 
     * @return string
     */

    function getGambar()
    {
      return $this->images_upload->getGambar();
    }

    /**
     * getGambarFull
     * 
     * @return string
     */

    function getGambarFull()
    {
      return $this->images_upload->getGambarFull();
    }


}

?>