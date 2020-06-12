<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bottom extends CI_Controller {

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
        $xcrud->table('bottom');
        $xcrud->button('bottom/machine/{id}','machine');
        $xcrud->table_name('Rishabh Bottom');
        $xcrud->unset_pagination();
        $xcrud->unset_limitlist();
       // $xcrud->unset_add();
        //$xcrud->change_type('created', 'datetime');
       /* 
        
        $xcrud->column_callback('status', 'active_inactive_status');
        $xcrud->change_type('status', 'select', '1', ['1' => 'Active', '0' => 'Inactive']);*/
       // $xcrud->columns('category,status');
        //$xcrud->fields('category,status');
      /* $xcrud->change_type('banner','image');
        $xcrud->modal('banner');
        $xcrud->validation_required('banner');*/
        $xcrud->validation_required('city');
        $data['content'] = $xcrud->render();
        // $xcrud->unset_limitlist();
          

        $this->load->view('header', $data, FALSE);
        $this->load->view('bottom', $data, FALSE);
        $this->load->view('footer', $data, FALSE);
	}
	
	public function machine($id){
	     $data['mname']=$this->m_user->get_machine($id);
	     $data['bottom']=$this->db->where('id',$id)->get('bottom')->result_array();
	     $this->load->view('header', $data, FALSE);
	     $this->load->view('machine',$data,FALSE);
	     $this->load->view('footer', $data, FALSE);
	     
	   // print_r($data);
	}
	
	public function importcsv(){
	     if(is_uploaded_file($_FILES['empimport']['tmp_name'])){
                  $fileName=$_FILES["empimport"]["tmp_name"];
                  $file = fopen($fileName, "r");
                  $flag = true;
                  while (($column = fgetcsv($file,10000,","))!== FALSE) {
                      if($flag) { $flag = false; continue; }
                      
                      $dat=array(
                            'bottom_size'=>$column[0],
                           
                            'stock'=>$column[1],
                           
                          );
                          
                          $this->db->set('bottom_size', $column[0]);
                            $this->db->set('stock', $column[1]);
                            $this->db->where('bottom_size',$column[0]);
                            
                            $this->db->update('bottom');
                        //   $this->m_user->uploadCsv($dat);
                    //   print_r($dat);echo "<br>";
                  }
                  
                   
                    
	    }
	    
	    redirect('bottom/');
	}

}

/* End of file city.php */
/* Location: ./application/controllers/city.php */