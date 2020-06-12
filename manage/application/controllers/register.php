

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct() {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        parent::__construct();
         $this->load->model('m_user');
        $this->m_user->check_session();
        include('xcrud/xcrud.php');
    }
    
 // function in functions.php
function hash_password($postdata, $xcrud){
    $postdata->set('password', sha1( $postdata->get('password') ));
}
    
	public function index()
    {
        $data = [];
        $xcrud = Xcrud::get_instance();
        //$xcrud = xcrud_get_instance();
        $xcrud->table('admin');
        $xcrud->table_name('Rishabh Admin');
        $xcrud->unset_limitlist();

        // $xcrud->relation('blank_id','blank','blank_id','title');
        // $xcrud->relation('city_id','city','city_id','city');

        $xcrud->columns('admin_id,first_name,last_name,email,password,admin_type,status,date');
        $xcrud->fields('first_name, last_name,  email, password,admin_type,status');
          $xcrud->unset_pagination();
        $xcrud->unset_limitlist();
    
        
        
        $xcrud->change_type('password','password','sha1');
        $xcrud->change_type('admin_type','select','email2@ex.com','super_admin,admin');
        $xcrud->change_type('status','select','email2@ex.com','0,1');
       
        $data['content'] = $xcrud->render();

        $this->load->view('header', $data, FALSE);
        $this->load->view('register_banner', $data, FALSE);
        $this->load->view('footer', $data, FALSE);
    }
    
    // function encrypt_password_callback($post_array, $primary_key = null)
    //     {
            
    //         $$post_array->set('password', sha1( $post_array->get('password') ));
    //     // $this->load->library('encrypt');
        
    //     // $key = 'super-secret-key';
    //     // $post_array['password_field'] = sha1($post_array['password_field']);
    //     return $post_array;
    //     }
    
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
        $this->load->view('register_banner', $data, FALSE);
        $this->load->view('footer', $data, FALSE);
    }

    public function save_data()
    {
       $post = $_POST;
    //   print_r($post);
    //   $post['password']=sh1($post['password']);
           
    //   $post['created_at'] = date('Y-m-d H:i:s');
    
      return $this->db->insert('admin', $post);
    }

	

}

/* End of file orders.php */
/* Location: ./application/controllers/orders.php */
