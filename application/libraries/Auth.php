<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth {

	var $CI = null;

	function Auth()
	{
		$this->CI =& get_instance();

		$this->CI->load->library('session');
		$this->CI->load->database();
		$this->CI->load->helper('url');
	}

function process_login($login = NULL, $group, $table = false)
{

	// A few safety checks
	// Our array has to be set
	if(!isset($login))
		return FALSE;

	//Our array has to have 2 values
	//No more, no less!
	if(count($login) != 2)
		return FALSE;

 	if($table == '') {
 		$table = 'users';
 	}

	$username = $login[0];
	$password = md5($login[1]);

	// Query time
	$this->CI->db->where('username', $username);
	$this->CI->db->where('password', $password);
	$this->CI->db->where('blokir', 'N');
	$query = $this->CI->db->get($table);
	
	if ($query->num_rows() == 1)
	{

		// Our user exists, lets check their group
		if($this->in_group($query->row()->users_id, $group)) 
		{
			// Our user exists, set session.
			$this->CI->session->set_userdata('logged_user', $username);
			$this->CI->session->set_userdata('nama_lengkap', $query->row()->nama_lengkap);
	        $this->CI->session->set_userdata('level_user', $query->row()->level);
	        $this->CI->session->set_userdata('users_id', $query->row()->users_id);
			$this->CI->session->set_userdata('avatar', $query->row()->gambar);

			$this->CI->session->set_userdata('group_location', $group);

			$this->set_session_user_groups($query->row()->users_id);

	       	$this->CI->db->where('username', $username);
	        $this->CI->db->where('password', $password);
	        $this->CI->db->set("session_id", $this->CI->session->userdata('session_id'));
	        $this->CI->db->update($table);
	        
	        //if($this->CI->db->affected_rows() == 1)
			return TRUE;
    	}
    	else
    	{
    		return FALSE;
    	}
	}
	else
	{
		// No existing user.
		return FALSE;
	}
}

/**
 * in_group
 * 
 * @return boolean
 * @author Fitra Kacamarga
 */

function in_group($users_id, $group_name) {

	if($this->CI->session->userdata('groups'))
	{
		$groups = $this->CI->session->userdata('groups');
		foreach($groups as $value)
		{
			if($value == $group_name) {
				return TRUE;
			}
		}

	}
	else 
	{
		//get user group(s);
		$groups = $this->get_users_groups($users_id);

		//check user group(s)
		foreach($groups as $value)
		{
			if($value->name == $group_name) {
				return TRUE;
			}
		}

		return FALSE;
	}
}

/**
 * set_session_user_groups
 * 
 * @return void
 * @author Fitra Kacamarga
 */

function set_session_user_groups($users_id)
{

	$groups = $this->get_users_groups($users_id);
	foreach($groups as $value)
	{
		$data[] = $value->name;
	}

	$this->CI->session->set_userdata('groups', $data);
}

/**
 * get_users_groups
 * 
 * @return array
 * @author Fitra Kacamarga
 */

function get_users_groups($users_id) {

	$q = $this->CI->db->select('name')
	                ->join('users_groups', 'groups.groups_id = users_groups.groups_id')
	                ->where('users_groups.users_id = '.$users_id)
	                ->get('groups');
	return $q->result();
}

function user_data($item) {
    return $this->CI->session->userdata($item);
}

function process_logout()
{
	$this->CI->session->sess_destroy();

	return TRUE;
}

/**
 *
 * This function restricts users from certain pages.
 * use restrict(TRUE) if a user can't access a page when logged in
 *
 * @access	public
 * @param	boolean	wether the page is viewable when logged in
 * @return	void
 */
function restrict($group = FALSE)
{

	// If the user isn' logged in and he's trying to access a page
	// he's not allowed to see when logged out,
	// redirect him to the login page!
	if ( ! $this->logged_in())
	{
		$this->CI->session->set_userdata('redirected_from', $this->CI->uri->uri_string()); // We'll use this in our redirect method.
		redirect('/main/login');
	}

	// If the user is logged in and he's trying to access a page that not in its group
	// he's not allowed to see when logged in,
	// redirect him to the login page!
	if ($this->logged_in())
	{
		
		if(!empty($group))
		{
			if( ! $this->in_group($this->CI->session->userdata('users_id'), $group))
			{
				$this->CI->session->set_userdata('redirected_from', $this->CI->uri->uri_string()); // We'll use this in our redirect method.
				redirect('/main/login');
			}
		}
		else
		{
			if( ! $this->in_group($this->CI->session->userdata('users_id'), $this->CI->session->userdata('group_location')))
			{
				$this->CI->session->set_userdata('redirected_from', $this->CI->uri->uri_string()); // We'll use this in our redirect method.
				redirect('/main/login');
			}
		}

	}
}

function restrictAdmin($logged_out = FALSE)
{
	if(!$this->isAdmin())
	{
        //level akses ngga cukup                
		$this->CI->session->set_userdata('redirected_from', $this->CI->uri->uri_string()); // We'll use this in our redirect method.
		redirect('/main/');
	}
}

/**
 *
 * Checks if a user is logged in
 *
 * @access	public
 * @return	boolean
 */
function logged_in()
{
	if ($this->CI->session->userdata('logged_user') == FALSE)
	{
		return FALSE;
	}
	else
	{
		return TRUE;
	}
}

function isAdmin()
{
    if($this->logged_in() && $this->CI->session->userdata('level_user') == '10')
        return TRUE;
    else
        return FALSE;
}

function getCurrentUser()
{
    return $this->CI->session->userdata('logged_user');
}

function redirect()
{
	if ($this->CI->session->userdata('redirected_from') == FALSE)
	{
		redirect('/');
	} 
	else 
	{
		redirect($this->CI->session->userdata('redirected_from'));
	}

}

}
// End of library class
// Location: application/libraries/auth.php
