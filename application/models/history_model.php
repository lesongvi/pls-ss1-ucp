<?php
class history_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //fetch department details from database
    function gethistory($user)
    {
        $sql = 'select id,username,name,type,status,amount,DATE_FORMAT(date,"%d-%m-%Y") as newdate from lichsu where username = "'.$user.'" order by newdate DESC';
        $query = $this->db->query($sql);
        return $query->result();
    }
}
?>