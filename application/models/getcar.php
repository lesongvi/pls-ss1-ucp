<?php
class getcar extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //fetch department details from database
    function getmemcar($userid)
    {
        $sql = 'select sqlID,pvModelID from vehicles inner join accounts on vehicles.sqlID = accounts.id where vehicles.sqlID = ' . $userid . '';
        $query = $this->db->query($sql);
        return $query->result();
    }
}
?>