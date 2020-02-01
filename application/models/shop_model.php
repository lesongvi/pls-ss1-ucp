<?php
class Shop_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //fetch department details from database
    function get_vehicles_list($limit, $start)
    {
        $sql = 'select * from cuahang_vehicles order by id DESC limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	function get_plane_list()
    {
        $sql = 'select * from cuahang_plane order by id DESC ';
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	function get_ship_list()
    {
        $sql = 'select * from cuahang_ship order by id DESC ';
        $query = $this->db->query($sql);
        return $query->result();
    }
	
	function get_toy_list()
	{
		$sql = 'select * from cuahang_toys order by id DESC ';
        $query = $this->db->query($sql);
        return $query->result();
	}
	
	function buy($vatpham,$creditsthat,$gia,$id)
	{
		if ($gia >= 500 && $creditsthat >=500)
		{
		$data=array(
		'sqlID'=>$id,
		'pvModelID'=>$vatpham,
		'pvFuel'=>100
		);
		$this->db->insert('vehicles',$data);
		$sql = "update accounts set Money = Money - '$gia' where id='$id' and Money > 0";
		$query = $this->db->query($sql);
		return true;
		}
	}
	
	function buytoy($vatpham,$gia,$creditsthat,$id)
	{
		if ($gia >= 500 && $creditsthat >=500)
		{
		$data=array(
		'player'=>$id,
		'modelid'=>$vatpham
		);
		$this->db->insert('toys',$data);
		$sql = "update accounts set Money = Money - '$gia' where id='$id' and Money > 0";
		$query = $this->db->query($sql);
		return true;
		}
	}
	
	function trutien($gia,$id)
	{
	}
}
?>