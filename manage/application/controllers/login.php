<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
        $this->m_user->check_session(1);
	}
	public function index()
	{
		//echo "test"; die;
		$data = [];
		if (isset($_POST['submit'])) {
            unset($_POST['submit']);
           
            $login = $this->m_user->login($_POST);
            if ($login) {
                //session                  
                redirect(base_url('users/'));
            } else {
                $data['msg'] = 'Invalid login.';
            }
        }
		$this->load->view('login', $data, FALSE);
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */