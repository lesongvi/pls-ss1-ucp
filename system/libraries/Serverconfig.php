<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Dbvars Library
* Simplifies storing variables in database, for example configuration variables.
* 
* You must create table first.
**/
/*

CREATE TABLE IF NOT EXISTS `config` (
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY  (`key`)
)

*/
/**
* Use:
*     $this->load->database();
*     $this->load->library('dbvars');
*     
* To set value: $this->dbvars->key = 'value';
* To get value:    $this->dbvars->key
* To check if the variable isset: $this->dbvars->__isset($key);
* To unset variable use: $this->dbvars->__unset($key);
* As of PHP 5.1.0 You can use isset($this->dbvars->key), unset($this->dbvars->key);
*
* @version: 0.1 (c) _andrew 27-03-2008
**/
class Serverconfig {
    const TABLE = 'config_server';
    //Table where variables will be stored.

    private $data;
    private $ci;

    function __construct()
    {
        $this->ci =& get_instance();

        $q = $this->ci->db->get(self::TABLE);
        foreach ($q->result() as $row)
           {
               $this->data[$row->server_ip] = unserialize($row->port);
           }
           $q->free_result();

    }

    function __get($server_ip){
        return $this->data[$server_ip];
    }

    function __set($server_ip, $port){
        if (isset($this->data[$server_ip])){
            $this->ci->db->where('server_ip', $server_ip);
            $this->ci->db->update(self::TABLE, array('port' => serialize($port)));
        } else {
            $this->ci->db->insert(self::TABLE, array('server_ip' => $server_ip, 'port' => serialize($port)));
        }
        $this->data[$server_ip] = $port;
    }

    /**  As of PHP 5.1.0  */
    function __isset($server_ip) {
        return isset($this->data[$server_ip]);
    }

    /**  As of PHP 5.1.0  */
    function __unset($server_ip) {
        $this->ci->db->delete(self::TABLE, array('server_ip' => $server_ip));    
        unset($this->data[$server_ip]);
    }    
}
?>