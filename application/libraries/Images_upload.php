<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * Images_upload
 *
 * upload picture, resize, create thumbnails
 *
 * @package			CodeIgniter
 * @category		Libraries
 * @author			Fitra Kacamarga
 */

class Images_upload {
	
	public $gambar = '';
    public $gambar_full = '';
	public $file_path = '';
	public $error = '';
	
    function __construct()
    {
		
		$this->CI =& get_instance();
	
		$this->CI->load->library('image_lib');
		$this->CI->load->library('upload'); 
    }
	
	// --------------------------------------------------------------------

	/**
	 * upload picture
	 *
	 * @access	public
	 * @param	array
	 * @return	boolean
	 */
	 
	function doUpload($config = array(), $doResize = array(), $createThumbnail = array())
	{

		$userArray = array();
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2000';
		$config['encrypt_name'] = TRUE;
		

		$this->CI->upload->initialize($config);


	
		if ( ! $this->CI->upload->do_upload())
		{
			$error = $this->CI->upload->display_errors();
						
			$this->error = $error;
			
			return false;
		}
		else
		{
			$data = array('upload_data' => $this->CI->upload->data());
			
			if($doResize)
			{
				$this->doResize($doResize, $data['upload_data']['file_path'], $data['upload_data']['full_path'], $data['upload_data']['file_ext']);

			}
			
            if($createThumbnail)
            {
                $this->createThumbnail($createThumbnail, $data['upload_data']['file_path'], $data['upload_data']['full_path']);
            }
			
			if($this->gambar == "")
            {	
			     $this->gambar = $data['upload_data']['file_name'];
			     $this->gambar_full = $data['upload_data']['full_path'];
				 $this->file_path = $data['upload_data']['file_path'];
                 return true;
			}
            
           @unlink($data['upload_data']['full_path']);
			return true;
			
		}
	
	}

	// --------------------------------------------------------------------

	/**
	 * resize picture
	 *
	 * @access	public
	 * @param	mixed
	 * @return	mixed
	 */
	
	function doResize($config = array(), $source, $source_full, $file_ext)
	{
		$newName = $this->generateRandChar();
		$newfile = $source.$newName.$file_ext;
		$config['source_image'] = $source_full;
		$config['image_library'] = 'gd2';
		$config['maintain_ratio'] = TRUE;
		$config['new_image'] = $newfile;
		$this->CI->image_lib->initialize($config);
		 
        if (!$this->CI->image_lib->resize()) {
            echo $this->CI->image_lib->display_errors();
        }
		$this->CI->image_lib->clear();
		
		$this->gambar = $newName.$file_ext;
		$this->gambar_full = $newfile;
		$this->file_path = $source;
		
	}

	// --------------------------------------------------------------------

	/**
	 * create thumbnail of picture
	 *
	 * @access	public
	 * @param	mixed
	 * @return	void
	 */
    
   	function createThumbnail($config = array(), $source, $source_full)
	{

	    $config['source_image'] = $source_full;            
		$config['image_library'] = 'gd2';
		
		if($this->gambar == "")
			$config['new_image'] = $source.'thumbs/';
		else
			$config['new_image'] = $source.'thumbs/'.$this->gambar;

		$this->CI->image_lib->initialize($config); 
        if (!$this->CI->image_lib->resize()) {
            echo $this->CI->image_lib->display_errors();
        }
		
		$this->CI->image_lib->clear();
		
		
	}
	
	// --------------------------------------------------------------------

	/**
	 * generate random char
	 *
	 * @access	public
	 * @return	string
	 */
	 	
	function generateRandChar()
	{
		$rand = substr(md5(microtime()),rand(0,26),10);
		return $rand;
	}

	// --------------------------------------------------------------------

	/**
	 * get picture name
	 *
	 * @access	public
	 * @return	string
	 */
	 
	function getGambar()
	{
		return $this->gambar;	
	}

	// --------------------------------------------------------------------

	/**
	 * get picture full path (including the filename)
	 *
	 * @access	public
	 * @return	string
	 */
	
	function getGambarFull()
	{
		return $this->gambar_full;	
	}
	
	/**
	 * get picture path
	 *
	 * @access	public
	 * @return	string
	 */
	 
	function getPathGambar()
	{
		return $this->file_path;
	}

}

/* End of file Images_upload.php */