<?php
class violate_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //fetch department details from database
    function get_department_list($limit, $start)
    {
        $sql = 'select *,DATE_FORMAT(date_added,"%d-%m-%Y") as bandate,DATE_FORMAT(date_unban,"%d-%m-%Y") as unbandate from bans inner join accounts on bans.user_id = accounts.id order by date_added DESC limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }
}
?>