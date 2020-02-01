<?php
class house_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_house($limit, $start)
	{
        $sql = 'select * from houses order by id ASC limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
	}
}
?>