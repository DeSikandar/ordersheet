<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	
 function login($post = array()) {
        $this->db->select('admin_id');
        $this->db->from('admin');
        $this->db->where('email', $post['email']);
        $this->db->where('password', sha1($post['password']));
        $this->db->where('status', 1);
        $this->db->limit(1);
        $query = $this->db->get();

        //echo $this->db->last_query(); die;

        if ($query->num_rows() == 1) {
            $userdata = $query->row_array();
            $this->session->set_userdata(array(
                'admin_id' => $userdata['admin_id'],                
                'loged_in' => true
            ));

            return true;
        } else {
            return false;
        }
    }

    function check_session($is_index = '') {
        if (!$this->session->userdata("loged_in") && !$is_index) {
            redirect(base_url());
        } else if ($this->session->userdata("loged_in") && $is_index) {
            redirect(base_url('users'));
        }
    }

    public function getCategory()
    {
        $this->db->where('status', 1);
        $category = $this->db->get('category')->result_array();

        return $category;
    }
    public function getBrand()
    {
        $this->db->where('status', 1);
        $brand = $this->db->get('brand')->result_array();

        return $brand;
    }
    
    public function sign_up($post=array()){
        
        
        $data = array(
        'first_name' => $post['fname'],
        'last_name' => $post['lname'],
        'email'=>$post['email'],
        'password'=>$post['password'],
        
        );

    $this->db->insert('admin', $data);
    }
    
    public function get_city(){
        return $this->db->get('city')->result_array();
    }
    
     public function get_blank(){
         
        return $this->db->order_by('title', 'ASC')->get('blank')->result_array();
    }
    
    public function get_bottom(){
        return $this->db->order_by('bottom_size', 'ASC')->get('bottom')->result_array();
    }
    
    public function Insert_user($post=array()){
        
         $this->db->insert('user', $post);
         return $this->db->insert_id();
    }
    
    public function Insert_mrelation($post=array(),$id){
        $this->db->insert('mrelation',$post);
        $count=$this->db->query("SELECT COUNT(blank_id) as blank_co FROM `mrelation` WHERE user_id=".$id);
        return $count->result_array();
        
        
    }
    public function User_update($count,$id){
        $data=array(
            'no_of_machine'=>$count
            );
        
        $this->db->set($data);
        $this->db->where('user_id', $id);
        $this->db->update('user');
        // $this->db->update('')
       
        
    }
    
    public function get_mcount($id){
        $count=$this->db->query("SELECT COUNT(blank_id) as blank_co FROM `mrelation` WHERE user_id=".$id);
        return $count->result_array();
        
    }
    
    public function get_machine($id){
        $query=$this->db->query("SELECT COUNT(user.first_name) as blank_co,user.first_name FROM `mrelation` join user on mrelation.user_id=user.user_id  WHERE mrelation.bottom_id=".$id." GROUP BY user.first_name HAVING COUNT(user.first_name) > 0");
        return $query->result_array();
    }
    
    public function get_blank_bottom($id){
        // $this->db->select('*');
        // $this->db->from('mrelation');
        
        // $this->db->join('blank', 'blank.blank_id = mrelation.blank_id');
        // $this->db->where('mrelation.user_id',$id);
        // $query = $this->db->get()->result_array();
        // return $query;
        
        $query=$this->db->query("SELECT COUNT(blank.title) as blank_co,mrelation.id,blank.title,COUNT(bottom.bottom_size) as bottom_Co,bottom.bottom_size FROM `mrelation` join blank on mrelation.blank_id=blank.blank_id JOIN bottom on mrelation.bottom_id=bottom.id WHERE user_id=".$id." GROUP BY blank.title HAVING COUNT(blank.title) > 0");
        return $query->result_array();
    

// $this->db->select('*');
// $this->db->from('blogs');
// $this->db->join('comments', 'comments.id = blogs.id');
// $query = $this->db->get();



    }
    
    public function uploadCsv($data=array()){
        $this->db->replace('blank', $data);
    }
    
    public function get_user($id){
        
        $query=$this->db->query('SELECT count(blank_id) as m,user.first_name FROM `mrelation` join user on mrelation.user_id=user.user_id WHERE mrelation.blank_id='.$id.' GROUP BY user.first_name');
        return $query->result_array();
    }
    
    
    public function check_username($post=array()){
         $this->db->select('email');
        $this->db->from('admin');
        $this->db->where('email', $post['email']);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            // $userdata = $query->row_array();
            // $this->session->set_userdata(array(
                // 'admin_id' => $userdata['admin_id'],                
                // 'loged_in' => true
            // ));

            return true;
        } else {
            return false;
        }
    }
}

/* End of file user.php */
/* Location: ./application/models/user.php */