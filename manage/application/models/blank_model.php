<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blank_model extends CI_Model {
    
    function blank_insert($post=array()){
        
        $this->db->insert('blank', $post);
        return $this->db->insert_id();
        // print_r($post);
    }
    
    function reel_insert($data=array()){
        $this->db->insert('dreal', $data);
       
    }
    public function get_user($id){
        $query=$this->db->query('SELECT * FROM `mrelation` join user on mrelation.user_id=user.user_id WHERE mrelation.blank_id=6 GROUP BY user.first_name');
        return $query->result_array();
    }
}

?>