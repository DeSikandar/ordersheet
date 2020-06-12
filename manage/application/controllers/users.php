<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        parent::__construct();
         $this->load->model('m_user');
        $this->m_user->check_session();
        include('xcrud/xcrud.php');
    }
    
    
	public function index()
    {
        $data = [];
        $xcrud = Xcrud::get_instance();
        //$xcrud = xcrud_get_instance();
        $xcrud->table('Orderall');
        $xcrud->table_name('Rishabh Orders');

        $xcrud->relation('blank','blank','blank_id','title');
        
        $xcrud->relation('city','city','city_id','city');
        $xcrud->relation('bottom','bottom','bottom_size','bottom_size');

        $xcrud->columns('name, city, blank, image,  bottom, reel_size,weight, remark');
        // $xcrud->fields('name,city_id,blank_id,image1, bottom,  reel_size,weight, remark');
        // $xcrud->fields('image1,image2,image3,image4,image5', false, false, 'view');

        // //$xcrud->unset_csv();
        // $xcrud->unset_print();
        $xcrud->unset_add();
        $xcrud->change_type('remark','textarea');
        $xcrud->change_type('image','image');
        // $xcrud->unset_limitlist();
          $xcrud->unset_pagination();
        $xcrud->unset_limitlist();

        //$xcrud->change_type('created', 'datetime');
       /* 
        
        $xcrud->column_callback('status', 'active_inactive_status');
        $xcrud->change_type('status', 'select', '1', ['1' => 'Active', '0' => 'Inactive']);*/
       // $xcrud->columns('category,status');
        //$xcrud->fields('category,status');
      /* $xcrud->change_type('banner','image');
        $xcrud->modal('banner');
        $xcrud->validation_required('banner');*/

        $xcrud->label('dd', 'DD');
        $xcrud->label('city_id', 'City');
        $xcrud->label('blank_id', 'Blank');
        $data['content'] = $xcrud->render();
        
        $this->load->view('header', $data, FALSE);
        $this->load->view('banner', $data, FALSE);
        $this->load->view('footer', $data, FALSE);
    }
    
    public function index1($value='')
    {
         echo "index1";
    }
    
    public function add()
    {
        $data['p_title'] = 'Add Data';

        $this->db->where('status', 1);
        $data['city'] =  $this->db->get('city')->result_array();

        $this->db->where('status', 1);
        $data['blank'] =  $this->db->order_by("title", "asc")->get('blank')->result_array();
        $data['ottom']=$this->db->order_by("bottom_size", "asc")->get('bottom')->result_array();


        $this->load->view('header', $data, FALSE);
        $this->load->view('add_order', $data, FALSE);
        $this->load->view('footer', $data, FALSE);
    }

    public function save_data()
    {
       $post = $_POST;
       print_r($post);
       $img="";
       $data=array(
            "blank"=>$post['blank_id'],
            "name"=>$post['name'],
            "city"=>$post['city_id'],
            "bottom"=>$post['bottom'],
            "reel_size"=>$post['reel_size'],
            "weight"=>$post['weight'],
            "remark"=>$post['remark']
           
           );
           if($post['image1']){
               $img=$post['image1'];
           }else if($post['image2']){
               $img=$post['image2'];
           }else if($post['image3']){
               $img=$post['image3'];
           }
           $data['image']=$img;
    //   $post['created_at'] = date('Y-m-d H:i:s');
      return $this->db->insert('Orderall', $data);
    }

	

}

/* End of file orders.php */
/* Location: ./application/controllers/orders.php */