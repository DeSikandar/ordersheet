<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blank extends CI_Controller {

	function __construct() {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        parent::__construct();
         $this->load->model('m_user');
         $this->load->model('blank_model');
        $this->m_user->check_session();
        include('xcrud/xcrud.php');
    }
	public function index()
	{
		$data = [];
        $xcrud = Xcrud::get_instance();
        //$xcrud = xcrud_get_instance();
        $xcrud->table('blank');
         $xcrud->table_name('Rishabh blank list');
        // $xcrud->join('blank_id','dreal','blank_id');

        $xcrud->columns('title, image1, image2,image3,blank_layout,stock,reel_size,reel_layout');
        $xcrud->fields('title, image1, image2,image3,blank_layout,stock,reel_size,reel_layout');
        // $xcrud->unset_csv();
        // $xcrud->unset_print();
        // $xcrud->unset_search();
        // $xcrud->uns/et_limitli/t();

        $xcrud->validation_required('title');
        $xcrud->change_type('image1','image');
        $xcrud->change_type('image2','image');
        $xcrud->change_type('image3','image');
        $xcrud->change_type('blank_layout','image');
        $xcrud->change_type('reel_layout','image');
        $xcrud->order_by('title','asc');
        // $xcrud->change_type('image5','image');
        // $xcrud->order_by('title','asc');
          $xcrud->unset_pagination();
        $xcrud->unset_limitlist();
        
        $xcrud->change_type('blank_layout','image');
        $xcrud->button('employee/user_get/{blank_id}','user view');
        // $xcrud->unset_add();
        
        // $xcrud->change_type('image2', 'remote_image', '', 'https://indiapaperexport.com/ordersheet/manage/');
        
        // $xcrud->change_type('image1', 'remote_image', '', 'https://indiapaperexport.com/ordersheet/manage/');
        // $xcrud->change_type('blank_layout', 'remote_image', '', 'https://indiapaperexport.com/ordersheet/manage/');
        
        // $xcrud->button('blank/real/{blank_id}','View Reel');
        
        //$xcrud->change_type('created', 'datetime');
       /* 
        
        $xcrud->column_callback('status', 'active_inactive_status');
        $xcrud->change_type('status', 'select', '1', ['1' => 'Active', '0' => 'Inactive']);*/
       // $xcrud->columns('category,status');
        //$xcrud->fields('category,status');
      /* $xcrud->change_type('banner','image');
        $xcrud->modal('banner');
        $xcrud->validation_required('banner');*/
        $data['content'] = $xcrud->render();
       
       

        $this->load->view('header', $data, FALSE);
        $this->load->view('blank', $data, FALSE);
        $this->load->view('footer', $data, FALSE);
	}
	
	public function real($id){
	    
	    	$data = [];
        $xcrud = Xcrud::get_instance();
        //$xcrud = xcrud_get_instance();
        $xcrud->table('dreal');
        // $xcrud->join('blank_id','dreal','blank_id');

        $xcrud->columns('real_size, real_layout');
        $xcrud->fields('real_size, real_layout');
        
        $xcrud->where('blank_id',$id);
        // $xcrud->unset_csv();
        // $xcrud->unset_print();
        // $xcrud->unset_search();

        // $xcrud->validation_required('title');
        $xcrud->change_type('real_layout','image');
        // $xcrud->change_type('image2','image');
        // $xcrud->change_type('image3','image');
        // $xcrud->change_type('image4','image');
        // $xcrud->change_type('image5','image');
        
        // $xcrud->change_type('blank_layout','image');
        $xcrud->unset_add();
        $xcrud->unset_edit();
        $xcrud->change_type('real_layout', 'remote_image', '', 'https://indiapaperexport.com/ordersheet/manage/');
        
        // $xcrud->change_type('image1', 'remote_image', '', 'https://indiapaperexport.com/ordersheet/manage/');
        // $xcrud->change_type('blank_layout', 'remote_image', '', 'https://indiapaperexport.com/ordersheet/manage/');
        
        // $xcrud->button('blank/real/{blank_id}','View Reel');
        
        //$xcrud->change_type('created', 'datetime');
       /* 
        
        $xcrud->column_callback('status', 'active_inactive_status');
        $xcrud->change_type('status', 'select', '1', ['1' => 'Active', '0' => 'Inactive']);*/
       // $xcrud->columns('category,status');
        //$xcrud->fields('category,status');
      /* $xcrud->change_type('banner','image');
        $xcrud->modal('banner');
        $xcrud->validation_required('banner');*/
        $data['content'] = $xcrud->render();

        $this->load->view('header', $data, FALSE);
        $this->load->view('reel', $data, FALSE);
        $this->load->view('footer', $data, FALSE);
	   // print_r($id);
	}
	
	public function importcsv(){
	    if(is_uploaded_file($_FILES['empimport']['tmp_name'])){
                  $fileName=$_FILES["empimport"]["tmp_name"];
                  $file = fopen($fileName, "r");
                  $flag = true;
                  while (($column = fgetcsv($file,10000,","))!== FALSE) {
                      if($flag) { $flag = false; continue; }
                      
                      $dat=array(
                            'title'=>$column[0],
                            'image1'=>$column[1],
                            'image2'=>$column[2],
                            'blank_layout'=>$column[3],
                            'stock'=>$column[4],
                            'reel_size'=>$column[5],
                            'reel_layout'=>$column[6]
                          );
                          
                          $this->db->set('title', $column[0]);
                            $this->db->set('image1', $column[1]);
                            $this->db->set('image2', $column[2]);
                            $this->db->set('stock',$column[4]);
                            $this->db->set('reel_size',$column[5]);
                            $this->db->where('title',$column[0]);
                            $this->db->set('reel_layout',$column[6]);
                            $this->db->update('blank');
                        //   $this->m_user->uploadCsv($dat);
                    //   print_r($dat);echo "<br>";
                  }
                  
                   
                    // Load CSV reader library
                    // $this->load->library('csvimport');
                    // $csvData = $this->csvimport->get_array($_FILES['empimport']['tmp_name']);
                    // foreach($csvData as $row){
                    //     print "<pre>";
                    //     print_r($row['title']);
                    //     // print_r($row["Title"]);
                    // }
                    
                    // $i=0;
                    // foreach($csvData as $row){
                        
                    //     print_r($row['title Image1 Image2 Blank Layout Stock Real Size Real Layout']);
                        
                    //     // $dat=array(
                    //     //         "title"=>$csv['Title'],
                    //     //         "image1"=>$csv['Image1'],
                    //     //         "image2"=>$csv['Image2'],
                    //     //         "blank_layout"=>$csv['Blank Layout'],
                    //     //         "stock"=>$csv['Stock'],
                    //     //         "reel_size"=>$csv['Real Size'],
                    //     //         "reel_layout"=>$csv['Real Layout']
                            
                    //     //     );
                        
                    //     // $this->m_user->uploadCsv($csv);
                    //     // print_r($row['title']);echo "<br>";
                    //     // // foreach($row as $row){
                    //     //     print_r($row['Title']);
                    //     // }
                    //     $i++;
                        
                    // }
	    }
	    
	    redirect('blank/');
	   // print_r($_POST);
	}
	
// 	public function user($id){
	    
// 	    $data['data']=$this->m_user->get_user($id);
	    
// 	    $this->load->view('header', $data, FALSE);
//         // $this->load->view('reel', $data, FALSE);
//         $this->load->view('footer', $data, FALSE);

// 	}
	
	//upload check
	public function insert(){
	   
	    
	    $image1 = time().'-'.$_FILES["image1"]['name'];
	           
	     if (move_uploaded_file($_FILES["image1"]["tmp_name"], "./uploads/".$image1)) {
                  $image1 = time().'-'.$_FILES["image1"]['name'];
	           
                    
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                
                sleep(1);
                
                   $image2 = time().'-'.$_FILES["image2"]['name'];
	           
	     if (move_uploaded_file($_FILES["image2"]["tmp_name"], "./uploads/".$image2)) {
                  $image2 = time().'-'.$_FILES["image1"]['name'];
	           
                    
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                
                sleep(1);
        
        $image3 = time().'-'.$_FILES["blank_layout"]['name'];
	           
	     if (move_uploaded_file($_FILES["blank_layout"]["tmp_name"], "./uploads/".$image3)) {
                  $image3 = time().'-'.$_FILES["blank_layout"]['name'];
	           
                    
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
	        
	       
	     $data1 = array(
                'title' => $this->input->post('title'),
                'stock' => $this->input->post('stock'),
                'blank_layout'=>'uploads/'.$image3,
                'image1'=>'uploads/'.$image1,
                'image2'=>'uploads/'.$image2
                
            );

	    $id=$this->blank_model->blank_insert($data1);
	    
	     
        
	    //reel data
	    $i=0;
	    foreach(array_combine($_FILES["real_layout"]["tmp_name"], $_POST['reelsize']) as $d1 => $d2) {
	        
	        
	        $nameimage = time().'-'.$_FILES["real_layout"]['name'][$i];
	       
	        if (move_uploaded_file($_FILES["real_layout"]["tmp_name"][$i], "./uploads/".$nameimage)) {
            
                    $dat=array(
	                    "real_size"=>$d2,
	                    "real_layout"=>'uploads/'.$nameimage,
	                    "blank_id"=>$id
	           
	           );
	           
	           $this->blank_model->reel_insert($dat);
	           
	           //print_r($d2);
	           
	                
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
	        
	       
	            sleep(1);
              $i++;
        }
        redirect('blank/');
	    
	    
	    
	    }

}

/* End of file city.php */
/* Location: ./application/controllers/city.php */