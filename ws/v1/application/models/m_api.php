<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_api extends CI_Model {

    public function send_mail($to, $subject, $msg) {
        $ci = get_instance();
        $config = array();
        $config_data = $this->db->where_in('key', array('smtp_user', 'smtp_pass', 'smtp_host', 'smtp_port', 'smtp_from', 'smtp_reply_to'))->get('setting')->result_array();
        foreach($config_data as $key=>$val){
            $config[$val['key']] = $val['value'];
        }
        $config['smtp_crypto'] = 'tls';
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        //print_r($config); die;
        $ci->email->initialize($config);

        $ci->email->from($config['smtp_user'], APP_NAME);
        $ci->email->to($to);
        $this->email->reply_to($config['smtp_user'], APP_NAME);
        $ci->email->subject($subject);
        $ci->email->message($msg);
        $ci->email->send();
       // echo $this->email->print_debugger();
    }

    

    public function pic_url($pic, $thumb = '') {
        if ($thumb) {
            if ($pic) {
                return str_replace('/ws/v1', '', site_url('upload/thumb/' . $pic));
            }
        } else {
            if ($pic) {
                return str_replace('/ws/v1', '', site_url('upload/' . $pic));
            }
        }
        return '';
    }

    public function notnull($ary = []) {
        return $this->filter_me($ary);
    }

    function filter_me(&$array) {
        foreach ($array as $key => $item) {
            if (!is_array($item) && $array [$key] == null) {
                $array [$key] = "";
            } else {
                is_array($item) && $array [$key] = $this->filter_me($item);
            }
        }
        return $array;
    }

    public function thumbCreate($img_uploadpath, $thumb_uploadpath, $source) {
        $fullPath = $img_uploadpath . $source;
        $thumbSize = 200;
        $thumbPath = $thumb_uploadpath;
        $thumbQuality = 99;

        $extension = pathinfo($img_uploadpath . $source, PATHINFO_EXTENSION);

        if ($extension == 'jpg' || $extension == 'jpeg')
            $full = imagecreatefromjpeg($fullPath);
        if ($extension == 'gif')
            $full = imagecreatefromgif($fullPath);
        if ($extension == 'png')
            $full = imagecreatefrompng($fullPath);


//$full = imagecreatefromjpeg($fullPath);
        $name = $source;

        $width = imagesx($full);
        $height = imagesy($full);

        /* work out the smaller version, setting the shortest
          side to the size of the thumb, constraining height/wight
         */

        if ($height > $width) {
            $divisor = $width / $thumbSize;
        } else {
            $divisor = $height / $thumbSize;
        }

        $resizedWidth = ceil($width / $divisor);
        $resizedHeight = ceil($height / $divisor);

        /* work out center point */
        $thumbx = floor(($resizedWidth - $thumbSize) / 2);
        $thumby = floor(($resizedHeight - $thumbSize) / 2);

        /* create the small smaller version, then crop it centrally
          to create the thumbnail */
        $resized = imagecreatetruecolor($resizedWidth, $resizedHeight);
        $thumb = imagecreatetruecolor($thumbSize, $thumbSize);
        imagecopyresized($resized, $full, 0, 0, 0, 0, $resizedWidth, $resizedHeight, $width, $height);
        imagecopyresized($thumb, $resized, 0, 0, $thumbx, $thumby, $thumbSize, $thumbSize, $thumbSize, $thumbSize);

        if ($extension == 'jpg' || $extension == 'jpeg')
            $status = imagejpeg($thumb, $thumbPath . $name, $thumbQuality);
        if ($extension == 'gif')
            $status = imagegif($thumb, $thumbPath . $name, $thumbQuality);
        if ($extension == 'png')
            $status = imagepng($thumb, $thumbPath . $name, 9);
    }
    public function check_social_id($post = []) {
        $userdata = $this->db
                        ->where($post['media_type'] . '_id', $post['media_id'])
                        ->get('user')->row_array();
        return $userdata;
    }

    /* @device
     * ios - check device token and update/insert
     * android - check device id and update/insert
     */

//$user_id, $device_type, $device_token, $device_id = '', $device_name = ''
    public function check_update_device_token($post = []) {
        $post['device_type'] = (isset($post['device_type']) && $post['device_type'] != null) ? $post['device_type'] : '';
        $post['device_token'] = (isset($post['device_token']) && $post['device_token'] != null) ? $post['device_token'] : '';
        $post['device_id'] = (isset($post['device_id']) && $post['device_id'] != null) ? $post['device_id'] : '';
        $post['device_name'] = (isset($post['device_name']) && $post['device_name'] != null) ? $post['device_name'] : '';
        if ($post['device_type'] == '' || $post['device_token'] == '') {
            return false;
        } else if ($post['device_type'] == 'android' && $post['device_id'] == '') {
            //return false;
        }


        if ($post['device_type'] == 'ios') {
//check device token exist or not
            $this->db->where(array(
                'user_id' => $post['user_id'],
                'status' => 1
            ));
            $row = $this->db->from('device_token')->get()->row_array();
            if ($row) {
//device token already exist update new user id and device
                $this->db->where(array(
                    'user_id' => $post['user_id'],
                    'status' => 1
                ));
                $this->db->set(array(
                    'device_token' => $post['device_token'],
                    'device_type' => $post['device_type'],
                    'date' => date('Y-m-d h:i:s'),
                ));
                $this->db->update('device_token');
            } else {
//device token not exist insert new token
                $this->db->insert('device_token', array(
                    'user_id' => $post['user_id'],
                    'device_token' => $post['device_token'],
                    'device_type' => $post['device_type'],
                    'date' => date('Y-m-d h:i:s'),
                    'status' => 1,
                ));
            }
        } else if ($post['device_type'] == 'android') {
//check device id exist or not
            $this->db->where(array(
                'user_id' => $post['user_id'],
                'status' => 1
            ));
            $row = $this->db->from('device_token')->get()->row_array();
            if ($row) {
//device token already exist update new user id and device
                $this->db->where(array(
                    'user_id' => $post['user_id'],
                    'status' => 1
                ));
                $this->db->set(array(
                    'device_id' => $post['device_id'],
                    'device_token' => $post['device_token'],
                    'device_type' => $post['device_type'],
                    'device_name' => $post['device_name'],
                    'date' => date('Y-m-d h:i:s'),
                ));
                $this->db->update('device_token');
            } else {
//device token not exist insert new token
                $this->db->insert('device_token', array(
                    'user_id' => $post['user_id'],
                    'device_token' => $post['device_token'],
                    'device_type' => $post['device_type'],
                    'device_id' => $post['device_id'],
                    'device_name' => $post['device_name'],
                    'date' => date('Y-m-d h:i:s'),
                    'status' => 1,
                ));
            }
        } else {
            return false;
        }
    }

    public function get_user_by_user_id_token($user_id, $token) {
        $this->db->where(array(
            'user_id' => $user_id,
            //'status' => 1,
            'token' => $token,
        ));
        $userdata = $this->db->from('user')->get()->row_array();
//echo $this->db->last_query();
        if ($userdata) {
            return $userdata;
        } else {
            return false;
        }
    }

    public function get_user_by_email($email) {
        $user = $this->db
                        ->where('email', $email)
                        ->where('is_deleted', 0)
                        ->get('user')->row_array();
        return $user;
    }

    public function get_user_by_id($user_id) {
        $user = $this->db
                        ->where('user_id', $user_id)
                        ->get('user')->row_array();
        return $user;
    }

    public function signin($post = []) {
        $userdata = $this->db
                        ->from('user')
                        ->join('city','user.city_id=city.city_id')
                          ->where('username', $post['username'])
                       // ->where('password', sha1($post['password']))
                        ->where('password', $post['password'])->get()->row_array();
        return $userdata;
    }

    public function check_token($user_id = '') {
        $token = $this->db->where('user_id', $user_id)
                        ->get('user')->row_array();
        return $token;
    }

    public function update_login_token($user_id, $token) {
        $this->db->set('token', $token);
        $this->db->where('user_id', $user_id);
        if ($this->db->update('user')) {
            return true;
        } else {
            return false;
        }
    }

    public function check_profile_complition_and_get_screen_code($user_id) {
        $this->db->where('user_id', $user_id);
        $row = $this->db->from('user')->get()->row_array();
        if ($row) {
            return '000';
        } else {
            return '333';
        }
    }

    public function verify($sha1_user_id) {
        $this->db->select('email_verified');
        $this->db->where('sha1(user_id)', $sha1_user_id);
        $row = $this->db->get('user')->row();
       // echo $this->db->last_query(); die;
        if ($row) {
//user found
            if (!$row->email_verified) {
//not verified - do verification
                $this->db->where('sha1(user_id)', $sha1_user_id);
                $this->db->set('email_verified', 1);
                $this->db->set('status', 1);
                $this->db->update('user');
                return '1';
            } else {
//verified -
                return '2';
            }
        } else {
//user not found
            return false;
        }
    }

    public function generate_random_password($user_id, $password) {
        $this->db->where(array(
            'user_id' => $user_id,
            'status' => 1
        ));
        $this->db->set('password', sha1($password));
        $this->db->set('password_updated', 0);
        if ($this->db->update('user')) {
            return true;
        } else {
            return false;
        }
    }
    public function check_current_password($post = []) {
        $check = $this->db
                        ->where('user_id', $post['user_id'])
                        ->where('password', sha1($post['current_password']))
                        ->get('user')->row_array();
        if (!$check) {
            return true;
        } else {
            return false;
        }
    }
    public function city_list()
    {
        $this->db->where('status', 1);
        return $this->db->get('city')->result_array();
    }
    public function blank_list()
    {
        $this->db->where('status', 1);
        $data = $this->db->get('blank')->result_array();

        if($data){
            foreach ($data as $key => $value) {
                $data[$key]['image1_url'] = $this->pic_url($data[$key]['image1']);
                $data[$key]['image2_url'] = $this->pic_url($data[$key]['image2']);
                $data[$key]['image3_url'] = $this->pic_url($data[$key]['image3']);
                $data[$key]['image4_url'] = $this->pic_url($data[$key]['image4']);
                $data[$key]['image5_url'] = $this->pic_url($data[$key]['image5']);
                # code...
            }
        }

        return $data;
    }
}
