<?php

class Kosong extends MX_Controller {

	var $active = 'kosong/view';  

	function __construct()
	{	
		parent::__construct();
		$this->load->library('Auth');
		$this->load->library('form_validation');      
		$this->base_uri = $this->config->item('base_url'); 

	}

  	// --------------------------------------------------------------------
	/*
	 * authentication logic
	 */		
	 
	private function _check($method = false)
	{
		
		//$this->acl->haspermission($this->active, $method);
		$this->auth->restrict();
	}
	
   	// --------------------------------------------------------------------
	/*
	 * page dashboard logic
	 */	
	 	
	function index()
	{
		
		//authentication
		$this->_check(__FUNCTION__);	

		//send to dashboard view
		$this->show();
			
		
	}

   	// -------------------------------------------------------------------- 
	/*
	 * page dashboard view element setup
	 */

	
	function show($data = array())
	{
 	
	$this->_check(__FUNCTION__);	
		
  
	   $data['base_uri'] = $this->base_uri;
	   $data['v_title'] = '';
	   
	   $menu['active'] = $this->active;
	   $data['pagetitle'] = ''; 

	   $data['breadcrumb'] = array('' => '');  
	
	   //define assets
	   $this->setAssets();
	   $data['styles'] = $this->styles;
	   $data['scripts'] = $this->scripts;
	   $data['v_script'] = $this->v_script;		

  	$this->template->title($data['v_title'])
  		->set_theme('admin')
		->set_layout('index.php')
        ->set_partial('header', 'header', $data)
		->set_partial('menu', 'menu', $menu)
		->set_partial('breadcrumb', 'breadcrumb', $data)
		->set_partial('footer', 'footer', $data)
        ->build('');	
			
	}
	
		
   	// --------------------------------------------------------------------
	/*
	 * define assets
	 */	


	function setAssets() {
		//for assets in folder plugins
		$this->styles = '
		';

		$this->scripts = '
		';

		//for assets in folder js and css
	   	$assets = array(
		);

		add_assets($assets);

		//javascript code
		$this->v_script = '
		';

	}

}

?>