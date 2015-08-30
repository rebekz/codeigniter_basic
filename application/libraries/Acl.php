<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ACL
 *
 *
 * @package			CodeIgniter
 * @category		Libraries
 * @author			Fitra Kacamarga
 */

class Acl {

	private $_CI;
	private $acl;

	function __construct() 
	{
		$this->_CI = & get_instance();
		$this->_CI->load->library('session');
		$this->_CI->load->library('auth');
		$this->_CI->load->config('acl');
		$this->acl = $this->_CI->config->item('modules');
	}
	/**
	 * 
	 */
	function getMenu()
	{
		return $this->_CI->config->item('menu_order');
	}

	/**
	 * function that send out all the functions and names that module had
	 *
	 * @param string
	 * @return array
	 */

	function getLinksAndNames($module)
	{
	 if(isset($this->acl[$module]))
		return $this->acl[$module]['meta'];	
	}

	/**
	 * 
	 */
	function getParentName($module)
	{
		if(isset($this->acl[$module]))
			return $this->acl[$module]['parent'];
	}
	
	/**
	 * 
	 */

	function menuVisible($module)
	{
		$permission = $this->_getPermissions($module);
		$has_permission = false;
		foreach($permission as $value)
		{
			if($value <= $this->_CI->session->userdata('level_user')) 
			{
				$has_permission = true;
			}
		}

		if($has_permission == true)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	/**
	 * function that check out functions permission level
	 *
	 * @param string
	 * @return integer
	 */
	 	
	function _getPermissions($module)
	{
	$level = array();
	$haystacks = array();
	
	 if(isset($this->acl[$module])) {
	 $haystacks = $this->acl[$module]['permission'];
		  foreach ($this->acl[$module]['meta']['perms'] as $neddle)
		  {
			if(array_key_exists($neddle, $haystacks))
			{
				$level[] = $this->acl[$module]['permission'][$neddle][0];
			}
		  }
 		return $level;
	 }
	}

	/**
	 * function that checks that the user has the required permissions
	 *
	 * @param string
	 * @return void
	 */

	function hasPermission($module, $permission, $redirect = true)
	{
		$arr = explode('/', $module);
		$module = $arr[0];

		$check = $this->_checkPermission($module, 'empty', $permission);
		if($check == false)
		{
			if($redirect)
			{
				redirect('/main/');
			}
			else 
			{
				return false;
			}
		}

		return true;
	}

	function link_has_permission($module, $link)
	{
		$arr = explode('/', $module);
		$module = $arr[0];

		$check = $this->_checkPermission($module, $link);
		if($check)
			return true;
		else
			return false;

	}

	/**
	 * function that checks that the user has the required permissions
	 *
	 * @param string
	 * @return boolean
	 */
	
	function _checkPermission($module, $function, $permission = false)
	{
	  if(isset($this->acl[$module])) {
		
		if($permission)	{
			
			$actionLevel = $this->acl[$module]['permission'][$permission][0];
		
			if($actionLevel <= $this->_CI->session->userdata('level_user')) {
				return true;
			}
			else {
				return false;
			}
		
		} else {

			$haystacks = $this->acl[$module]['meta']['links'];
			$key = array_search($function, $haystacks);	
			$action = $this->acl[$module]['meta']['perms'][$key];
			
			$actionLevel = $this->acl[$module]['permission'][$action][0];
			
			if($actionLevel <= $this->_CI->session->userdata('level_user')) {
				return true;
			} else { 
				return false;
			}
		}
	  } else {
		  $this->_CI->auth->restrict();
		  return true;
	  }
	}
}

/* End of application/libraries/acl.php */