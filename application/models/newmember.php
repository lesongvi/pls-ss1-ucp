<?php
class newmember extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //fetch department details from database
    function getmember()
    {
        $sql = 'select Username,DATE_FORMAT(RegiDate,"%d-%m-%Y") as newdate from accounts order by newdate DESC limit 7 ';
        $query = $this->db->query($sql);
        return $query->result();
    }
}
?>