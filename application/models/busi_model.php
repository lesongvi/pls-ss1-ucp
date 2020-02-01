<?php
class busi_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_busi($limit, $start)
	{
        $sql = 'select * from businesses order by id ASC limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
	}
}
?>