<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	function __construct() {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        parent::__construct();
         $this->load->model('m_user');
        $this->m_user->check_session();
        include('xcrud/xcrud.php');
    }
    
    public function add_mobile_link($value, $fieldname, $primary_key, $row, $xcrud){
        return '<a href="#">' . $value.'</a>';
    }
	public function index()
	{
		$data = [];
        $xcrud = Xcrud::get_instance();
        //$xcrud = xcrud_get_instance();
        $xcrud->table('user');
        $xcrud->table_name('Rishabh Users');
        $xcrud->relation('city_id','city','city_id','city');
        // $xcrud->unset_add();

        $xcrud->columns('first_name,Division,username, password,city_id,is_default,Mobile1,Mobile2,no_of_machine');
        $xcrud->fields('first_name,Division,username, password,city_id,is_default,Mobile1,Mobile2');
        // $xcrud->change_type('avatar', 'remote_image', '', array('link'=>'http://my-img-host.net/my-folder/'));
        // $xcrud->change_type('Mobile1', 'button', '', array('link'=>'http://my-img-host.net/my-folder/'));
        // $xcrud->column_callback('Mobile1','add_mobile_link');
        // $xcrud->button('http://example.com/{Mobile1}/');
        // $xcrud->button('{Mobile1}','userlink','Mobile1','','',array('Mobile1','!=',''));
        $xcrud->links_label('Mobile1 url');
$xcrud->links_label('<i class="icon-home"></i>');
        $xcrud->button('https://api.WhatsApp.com/send?phone=+91{Mobile1}','Whatsapp1','ionicons ion-social-whatsapp','',array('target'=>'_blank'));
        $xcrud->button('https://api.WhatsApp.com/send?phone=+91{Mobile2}','Whatsapp2','ionicons ion-social-whatsapp','',array('target'=>'_blank'));
        
        $xcrud->button('employee/get_blank/{user_id}','Machine','ionicons ion-eye','');
        $xcrud->button('employee/order/{user_id}','Order','ionicons ion-eye','');
        

        $xcrud->validation_required('username');
        $xcrud->validation_required('password');
        $xcrud->validation_pattern('username','email')->validation_pattern('extension','alpha_numeric')->validation_pattern('officeCode','natural');
        $xcrud->unset_pagination();
        $xcrud->unset_limitlist();
        
        $xcrud->label('city_id', 'City');
        $xcrud->label('username','Email');
        $xcrud->label('user','All user');
        $xcrud->order_by('Division','asc');
        $xcrud->unset_limitlist();
        $xcrud->unset_add();
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
        $data['city']= $this->m_user->get_city();
        $data['blank']=$this->m_user->get_blank();
        $data['bottom']=$this->m_user->get_bottom();

        $this->load->view('header', $data, FALSE);
        $this->load->view('employee', $data, FALSE);
        $this->load->view('footer', $data, FALSE);
	}

 public function index1($value='')
    {
         echo "index1";
    }
    
    public function add()
    {
        // $data['p_title'] = 'Add Data';

        // $this->db->where('status', 1);
        // $data['city'] =  $this->db->get('city')->result_array();

        // $this->db->where('status', 1);
        // $data['blank'] =  $this->db->get('blank')->result_array();


        $this->load->view('header', $data, FALSE);
        $this->load->view('employee', $data, FALSE);
        $this->load->view('footer', $data, FALSE);
    }

    public function save_data()
    {
       $post = $_POST;
    //   print_r($post);
    //   $post['password']=sh1($post['password']);
           
    //   $post['created_at'] = date('Y-m-d H:i:s');
    
      return $this->db->insert('user', $post);
    }
    
    public function get_blank($id){
        $data['cname']=$this->m_user->get_blank_bottom($id);
        $data['blank']=$this->m_user->get_blank();
        $data['bottom']=$this->m_user->get_bottom();
        $data['user']=$this->db->select('*')->from('user')->join('city','city.city_id=user.city_id')->where('user_id',$id)->get()->result_array();
        $data['id']=$id;
        
        $this->load->view('header',$data,FALSE);
        $this->load->view('blank_view',$data,FALSE);
        $this->load->view('footer',$data,FALSE);
        // print_r($data);
    }
    
    public function deletm($id,$user_id){
        $this->db->where('id', $id);
        $this->db->delete('mrelation');
        //Count the machine
       $count= $this->m_user->get_mcount($user_id);
     
       $fs=$count[0]['blank_co'];
      $this->m_user->User_update($fs,$user_id);
       
      redirect('employee/get_blank/'.$user_id);
        
        
        
        
        
    }
    
    public function insert_add(){
        $id=$this->input->post('user');
        $i=0;
        foreach($this->input->post('blank') as $blanck){
            $data=array(
                    'blank_id'=>$blanck,
                    'user_id'=>$id,
                    'bottom_id'=>$this->input->post('bottom')[$i]
                );
                $count=$this->m_user->Insert_mrelation($data,$id);
            // print_r($data);
            $i++;
        }
        
        $f=end($count);
        $fin=$f['blank_co'];
        
        $this->m_user->User_update($fin,$id);
        // print_r();
        redirect('employee/get_blank/'.$id);
        
    }
    
    public function user_get($id){
        $data['uname']=$this->m_user->get_user($id);
        $data['blank']=$this->db->where('blank_id',$id)->get('blank')->result_array();
        $this->load->view('header',$data,FALSE);
        $this->load->view('user_view',$data,FALSE);
        $this->load->view('footer',$data,FALSE);
        // print_r($data);
    }
    
    public function order($id){
        
        $this->db->where('status', 1);
        $data['city'] =  $this->db->get('city')->result_array();

        $this->db->where('status', 1);
        $data['blank'] =  $this->db->order_by("title", "asc")->get('blank')->result_array();
        $data['ottom']=$this->db->order_by("bottom_size", "asc")->get('bottom')->result_array();
        $data['user']=$this->db->where('user_id',$id)->get('user')->result_array();
        $data['p_title'] = 'Add Data';
        
        
        $this->load->view('header', $data, FALSE);
        $this->load->view('add_order',$data,FALSE);
        $this->load->view('footer', $data, FALSE);
        // print_r($data['user']);
    }
    
    public function insert(){
        
        $da1=array(
                'first_name'=>$this->input->post('fname'),
                'Division'=>$this->input->post('division'),
                'username'=>$this->input->post('email'),
                'password'=>$this->input->post('password'),
                'is_default'=>$this->input->post('check'),
                'Mobile1'=>$this->input->post('mobile1'),
                'Mobile2'=>$this->input->post('mobile2'),
                'no_of_machine'=>$this->input->post('noofmachine'),
                'city_id'=>$this->input->post('city')
            );
        
        $id=$this->m_user->Insert_user($da1);
        $count=$this->input->post('noofmachine');
        // $id='1';
        $i=0;
        foreach($this->input->post('blank') as $blanck){
            $data=array(
                    'blank_id'=>$blanck,
                    'user_id'=>$id,
                    'bottom_id'=>$this->input->post('bottom')[$i]
                );
                $this->m_user->Insert_mrelation($data);
            // print_r($data);
            $i++;
        }
        
        redirect('employee/');
        // print_r($id);
    }
    
    
    
}

/* End of file employee.php */
/* Location: ./application/controllers/employee.php */