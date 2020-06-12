<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        parent::__construct();
        $this->load->model('m_api');
        $this->load->model('m_notify');
        $this->response = array();
        //$this->output->set_header('Authorization: 272cee7490ddfdf72b9ce9a989efcdd0',true);
        if (isset($_REQUEST) && $_REQUEST) {
            log_message('error', $this->uri->uri_string() . ' /// request ---> ' . json_encode($_REQUEST));
        }
        if (isset($_FILES) && $_FILES) {
            log_message('error', $this->uri->uri_string() . ' /// files ---> ' . json_encode($_FILES));
        }
        $headers = $this->input->request_headers();
        //print_r($headers); die;
        if (isset($headers['Authorization']) && $headers['Authorization']) {
            log_message('error', $this->uri->uri_string() . ' /// header token ---> ' . json_encode($headers['Authorization']));
        }
    }

    public function index() {
        echo 'It\'s working...';
        //$this->m_api->send_mail("s", "s", "s");
        $userdata = [];
        // $this->load->view('mail_tmp_new/header');
        // $this->load->view('mail_tmp_new/welcome');
        // $this->load->view('mail_tmp_new/footer');
    }

    public function check_auth() {
        $headers = $this->input->request_headers();

       // if (!isset($headers['Authorization']) || $headers['Authorization'] == null) {
        if (!isset($_POST['token']) || $_POST['token'] == null) {
            //header token not set
            $this->response[] = array(
                'status' => 'false',
                'response_msg' => 'User authentication failed. Token not set.',
            );
            echo json_encode(array('response' => $this->response));
            return false;
        } else {
            return $_POST['token'];
        }
    }

    public function check_auth_user_id() {
        if (!isset($_POST['user_id']) || $_POST['user_id'] == null) {
            //header token not set
            $this->response[] = array(
                'status' => 'false',
                'response_msg' => 'User authentication failed. User ID not set.',
            );
            echo json_encode(array('response' => $this->response));
            return false;
        } else {
            return $_POST['user_id'];
        }
    }

    public function validate_token($user_id, $token) {
        $userdata = $this->m_api->get_user_by_user_id_token($user_id, $token);
        if ($userdata) {
            return $userdata;
        } else {
            $this->response[] = array(
                'status' => 'false',
                'screen_code' => '1001',
                'response_msg' => 'User authentication failed. Token mismatch.',
            );
            echo json_encode(array('response' => $this->response));
            return false;
        }
    }

    public function auth() {
        $token = $this->check_auth();
        if ($token) {
            $user_id = $this->check_auth_user_id();
            if ($user_id) {
                $userdata = $this->validate_token($user_id, $token);
                if ($userdata) {
                    return $userdata;
                }
            }
        }
    }

    public function check_parameters($paras = array()) {
        $return = TRUE;
        $not_set = '';
        foreach ($paras as $para) {
            if (!isset($_POST[$para]) || $_POST[$para] == NULL) {
                $return = FALSE;
                if ($not_set != '') {
                    $not_set .= ', ';
                }
                $not_set .= $para;
            }
        }
        if (!$return) {
            log_message('error', 'Parameters not set. ---> ' . $not_set);
            $this->response[] = array(
                'status' => 'false',
                'response_msg' => 'Please fill required fields'
                    //'response_msg' => 'Parameters not set. ---> ' . $not_set,
            );
            echo json_encode(array('response' => $this->response));
        }
        return $return;
    }

    public function display_system_error() {
        $this->response[] = array(
            'status' => 'false',
            'response_msg' => 'Server error. Something went wrong.',
        );
        echo json_encode(array('response' => $this->response));
        die;
    }

    public function signin() {


        header('Content-Type: application/json');
        $post = $_REQUEST;

        if (isset($post['username']) && $post['username'] != null &&
                isset($post['password']) && $post['password'] != null) {
            $userdata = $this->m_api->signin($post);
           /* if ($userdata && $userdata['email_verified'] == '0') {
                $this->response[] = array(
                    'status' => 'false',
                    'response_msg' => 'Your email verification is pending. Kindly verify your email to log in.',
                    'screen_code' => '333', //verification email
                );
                echo json_encode(array('response' => $this->response));
            } else */if ($userdata) {
                $post['user_id'] = $userdata['user_id'];
//                if ($userdata['token'] != '') {
//                    $token = $userdata['token'];
//                } else {
//                    $token = md5(rand() . rand());
//                }
                if($post['user_id'] != '7') { // For testing only
                     $token = md5(rand() . rand());
                    
                } else {
                     //$token = $userdata['token'];

                     $token = md5(rand() . rand());
                }
               $this->m_api->update_login_token($post['user_id'], $token);
                //token is valid
                //$this->m_api->check_update_device_token($post);

                $screen_code = $this->m_api->check_profile_complition_and_get_screen_code($post['user_id']);
                if ($userdata['password_updated'] == 0) {
                    //111 display update password screen
                    $screen_code = '111';
                }
                if($userdata['profile_pic']) {
                    $profile_pic = $this->m_api->pic_url($userdata['profile_pic']);
                } else {
                    $profile_pic = '';
                }
                $this->response[] = array(
                    'status' => 'true',
                    'response_msg' => 'Signin successful',
                    'token' => $token,
                    'screen_code' => $screen_code,
                    'user_id' => $userdata['user_id'],
                    'username' => $userdata['username'],
                    'city'=>$userdata['city'],
                    'city_id'=>$userdata['city_id'],
                    'is_default'=>$userdata['is_default'],
                    'first_name'=>$userdata['first_name']
                    
                );
                header('Content-Type: application/json');
                // $this->response[] = $this->response;
                echo json_encode(array('response' => $this->response));
            } else {
                //invalid user
                $this->response[] = array(
                    'status' => 'false',
                    'response_msg' => 'Invalid username or password',
                );
                header('Content-Type: application/json');
                echo json_encode(array('response' => $this->response));
            }
        } else {
            header('Content-Type: application/json');
            //enter username and password
            $this->response[] = array(
                'status' => 'false',
                'response_msg' => 'Please enter username and password',
            );
            echo json_encode(array('response' => $this->response));
        }
    }

    public function city_list()
    {
        header('Content-Type: application/json');
        $post = $_POST;
        $userdata = true;
        if ($userdata) {
            $required = [];
            if ($this->check_parameters($required)) {
                
                $city_list = $this->m_api->city_list($post);
                //$res = $this->db->get('gujjus')->result_array();
                
                if ($city_list) {
                    $this->response[] = array(
                        'status' => 'true',
                        'response_msg' => 'Data get successfully.',
                        'list' => $city_list,
                    );
                    echo json_encode(array('response' => $this->response));
                } else {
                    $this->response[] = array(
                        'status' => 'false',
                        'response_msg' => 'No data found.',
                    );
                    echo json_encode(array('response' => $this->response));
                }
            }
        }
    }
    public function blank_list()
    {
        header('Content-Type: application/json');
        $post = $_POST;
        $userdata = true;
        if ($userdata) {
            $required = [];
            if ($this->check_parameters($required)) {
                
                $blank_list = $this->m_api->blank_list($post);
                //$res = $this->db->get('gujjus')->result_array();
                
                if ($blank_list) {
                    $this->response[] = array(
                        'status' => 'true',
                        'response_msg' => 'Data get successfully.',
                        'list' => $blank_list,
                    );
                    echo json_encode(array('response' => $this->response));
                } else {
                    $this->response[] = array(
                        'status' => 'false',
                        'response_msg' => 'No data found.',
                    );
                    echo json_encode(array('response' => $this->response));
                }
            }
        }
    }

    public function addData()
    {
        header('Content-Type: application/json');
        $post = $_POST;
        $userdata = $this->auth();
        if ($userdata) {
            $required = ['name'];
            // $required = [];
            if ($this->check_parameters($required)) {
                
                //$res = $this->m_api->users_list($post);
                //$res = $this->db->get('gujjus')->result_array();
                unset($post['token']);
                
                $data=array(
                        "bottom"=>$post['bottom_size'],
                        "name"=>$post['name'],
                        "city"=>$post['city_id'],
                        "blank"=>$post['blank_id'],
                        "image"=>$post['image'],
                        "reel_size"=>$post['reel_size'],
                        "weight"=>$post['weight'],
                        "remark"=>$post['remark']
                    
                    );
                // $post['created_at'] = date('Y-m-d H:i:s');
                $this->db->insert('Orderall', $data);
                
                
                    // // $this->response[] = array(
                    //     'status' => 'true',
                    //     'response_msg' => 'no data',
                    //     'list' => $post,
                    // );
                
                
                $id = $this->db->insert_id();
                if ($id) {

                    $this->db->where('id', $id);
                    $inserted = $this->db->get('Orderall')->row_array();
                    $this->response[] = array(
                        'status' => 'true',
                        'response_msg' => 'Data Inserted',
                        'list' => $inserted,
                    );
                    echo json_encode(array('response' => $this->response));
                       
                } else {
                    $this->response[] = array(
                        'status' => 'false',
                        'response_msg' => 'No data found.',
                    );
                    echo json_encode(array('response' => $this->response));
                }
            }
        }
    }


public function bottom_list(){
    
    header('Content-Type: application/json');
        $post = $_POST;
        $userdata = true;
        if ($userdata) {
            $required = [];
            if ($this->check_parameters($required)) {
                
                $this->db->select('bottom_size');
                $city_list = $this->db->get('bottom')->result_array();
                //$res = $this->db->get('gujjus')->result_array();
                
                if ($city_list) {
                    $this->response[] = array(
                        'status' => 'true',
                        'response_msg' => 'Data get successfully.',
                        'list' => $city_list,
                    );
                    echo json_encode(array('response' => $this->response));
                } else {
                    $this->response[] = array(
                        'status' => 'false',
                        'response_msg' => 'No data found.',
                    );
                    echo json_encode(array('response' => $this->response));
                }
            }
        }
    
}




    public function addTask()
    {
        header('Content-Type: application/json');
        $post = $_POST;
        $userdata = $this->auth();
        if ($userdata) {
             $required = [];
            //$required = ['name','category','remark','created_by_name','related_to','date'];
            if ($this->check_parameters($required)) {
                
                //$res = $this->m_api->users_list($post);
                //$res = $this->db->get('gujjus')->result_array();
                unset($post['token']);
                $post['created_at'] = date('Y-m-d H:i:s');
                $this->db->insert('task', $post);
                $id = $this->db->insert_id();
                if ($id) {

                    $this->db->where('task_id', $id);
                    $inserted = $this->db->get('task')->row_array();
                    $this->response[] = array(
                        'status' => 'true',
                        'response_msg' => 'Data added successfully.',
                        'list' => $inserted,
                    );
                    echo json_encode(array('response' => $this->response));
                } else {
                    $this->response[] = array(
                        'status' => 'false',
                        'response_msg' => 'No data found.',
                    );
                    echo json_encode(array('response' => $this->response));
                }
            }
        }
    }

    
}
