<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

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
        $xcrud->table('task');
        $xcrud->table_name('Rishabh Task');

        $xcrud->change_type('status', 'select', '1', ['0' => 'Pending', '1' => 'Approved']);
        $xcrud->columns(' date, category, remark, created_by_name, related_to');
        $xcrud->fields('date, category, remark, created_by_name, related_to');
        //$xcrud->unset_csv();
        $xcrud->unset_print();

        $xcrud->unset_limitlist();
        $xcrud->change_type('remark','textarea');
        //$xcrud->unset_add();
        //$xcrud->unset_search();
        //$xcrud->change_type('created', 'datetime');
       /* 
        
        $xcrud->column_callback('status', 'active_inactive_status');
        $xcrud->change_type('status', 'select', '1', ['1' => 'Active', '0' => 'Inactive']);*/
       // $xcrud->columns('category,status');
        //$xcrud->fields('category,status');
      /* $xcrud->change_type('banner','image');
        $xcrud->modal('banner');
        $xcrud->validation_required('banner');*/

        $xcrud->label('task_id','Id');
        $data['content'] = $xcrud->render();
        $xcrud->unset_pagination();
        $xcrud->unset_limitlist();

        $this->load->view('header', $data, FALSE);
        $this->load->view('task', $data, FALSE);
        $this->load->view('footer', $data, FALSE);
    }
    public function index1($value='')
    {
         echo "index1";
    }

	

}

/* End of file orders.php */
/* Location: ./application/controllers/orders.php */