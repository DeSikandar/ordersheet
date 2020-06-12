<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {

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
        $xcrud->table('city');

        $xcrud->columns('city');
        $xcrud->fields('city');
        $xcrud->unset_csv();
        $xcrud->unset_print();
        $xcrud->unset_search();
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
          $xcrud->unset_pagination();
        $xcrud->unset_limitlist();

        $this->load->view('header', $data, FALSE);
        $this->load->view('city', $data, FALSE);
        $this->load->view('footer', $data, FALSE);
	}

}

/* End of file city.php */
/* Location: ./application/controllers/city.php */