<?php
class gettoy extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //fetch department details from database
    function getmemtoy($userid)
    {
        $sql = 'select player,modelid from toys inner join accounts on toys.player = accounts.id where toys.player = ' . $userid . '';
        $query = $this->db->query($sql);
        return $query->result();
    }
}
?>