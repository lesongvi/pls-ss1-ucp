<?php
class AppConfigModel extends CI_Model {
 
        protected $table;
 
        public function __construct()
        {
                $this->table = 'config_server';
        }
 
        public function get_configurations()
        {
            $query = $this->db->get($this->table);
            return $query->result();
        }
}