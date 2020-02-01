<?php
class top_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //fetch department details from database
    function get_department_list($limit, $start)
    {
        $sql = 'select id,Username,Level,Money,Bank from accounts order by Money DESC limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	function get_top()
	{
		$sql = "select id,Username,Level,Money,Bank from accounts order by Money DESC limit 10";
        $query = $this->db->query($sql);
        return $query->result();
	}
}
?>