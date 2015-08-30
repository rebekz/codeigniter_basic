<?php

class MY_Model extends MX_Controller
{
    private $tablename = '';
    
    function __construct($tablename = false)
    {
        parent::__construct();
        $this->load->database();               
        $this->load->library('session');
        
        if($tablename)
            $this->tablename = $tablename;
    }

    function setTableName($tablename) {
        $this->tablename = $tablename;
    }
    
    function getTableName() {
        return $this->tablename;
    }
    
    protected function getSomethingBySomething($column, $something, $orderby = false)
    {
        $this->db->where($column, $something);

        if($orderby)
            $this->db->order_by($orderby['key'], $orderby['val']);
            
        return $this->db->get($this->tablename);
    }
    
    protected function getMoreSomethingBySomething($something = array(), $orderby = false)
    {
        foreach($something as $key => $val) {
            $this->db->where($key, $val);
        }
        
        if($orderby)
            $this->db->order_by($orderby['key'], $orderby['val']);
            
        return $this->db->get($this->tablename);
    }
    
    protected function getMoreSomethingByNotSomething($include = array(), $exclude = array(), $orderby = false)
    {
 
        foreach($include as $key => $val) {
            $this->db->where($key, $val);            
        }

        foreach($exclude as $key => $val) {
            $this->db->or_where_not_in($key, $val);
        }
        
        if($orderby)
            $this->db->order_by($orderby['key'], $orderby['val']);
            
        return $this->db->get($this->tablename);
    }
    
    protected function getSomethingByNotSomethingButSomething($col1, $include, $col2, $exclude, $orderby = false)
    {
            $this->db->where($col1, $include);
            $this->db->or_where_not_in($col2, $exclude);
        
        if($orderby)
            $this->db->order_by($orderby['key'], $orderby['val']);
            
        return $this->db->get($this->tablename);
    }

    protected function getSomethingBySomethingWithLimit($column, $something, $orderby = false, $limit, $offset)
    {
        $this->db->where($column, $something);

        if($orderby)
            $this->db->order_by($orderby['key'], $orderby['val']);
            
        return $this->db->get($this->tablename, $limit, $offset);
    }    

    
    protected function getSomethingWithLimit($limit, $offset, $orderby = false)
    {
        if($orderby)
            $this->db->order_by($orderby['key'], $orderby['val']);
                    
        return $this->db->get($this->tablename, $limit, $offset);
    }
    
    protected function getAll($orderby = false)
    {
        if($orderby)
            $this->db->order_by($orderby['key'], $orderby['val']);

        return $this->db->get($this->tablename);
    }

    protected function addSomething($data = array())
    {
        $this->db->insert($this->tablename, $data);

        if ($this->db->affected_rows() == 1)
            return true;

        return false;
    }

    protected function editSomething($data, $where)
    {
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update($this->tablename);

        if ($this->db->affected_rows() == 1)
            return true;

        return false;
    }

    protected function deleteSomething($column, $something)
    {
        $this->db->where($column, $something);
        $query = $this->db->delete($this->tablename);

        if ($this->db->affected_rows() == 1)
            return true;

        return false;
    }
    
    protected function getCurrentLoggedUser()
    {
        return $this->session->userdata('logged_user');
    }

    protected function generateJudulSeoFromString($judul)
    {
        $c = array(' ');
        $d = array('-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{',
            '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+');
        $judul = str_replace($d, '', $judul);
        $judul = strtolower(str_replace($c, '-', $judul));

        return $judul;
    }
    
    function generateRandChar($length = 8)
    {
        $code = md5(uniqid(rand(), true));
        if ($length != "") return substr($code, 0, $length);
        else return $code;
    }

    function generateHari()
    {
        $seminggu = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        $hari = date("w");
        return $seminggu[$hari];
    }
    
    function generateJam()
    {

        return date("H:i:s");
    }

    function generateTanggal()
    {

        return date("Ymd");
    }    
}

/* End of file pages_model.php */
/* Location: ./system/application/models/admin/modules/core/pages_model.php */
