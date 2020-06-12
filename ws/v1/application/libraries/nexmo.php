<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nexmo extends CI_Controller {

    public $api_key = '';
    public $api_secret = '';
    public $from = '';

    public function __construct($config = array()) {
        $ci = & get_instance();

        $global_config = $ci->load->config('nexmo', true);

        $this->api_key = $global_config['api_key'];
        $this->api_secret = $global_config['api_secret'];
        $this->from = $global_config['from'];

        if ($config) {
            if (isset($config['api_key']) && $config['api_key']) {
                $this->api_key = $config['api_key'];
            }
            if (isset($config['api_secret']) && $config['api_secret']) {
                $this->api_secret = $config['api_secret'];
            }
            if (isset($config['from']) && $config['from']) {
                $this->from = $config['from'];
            }
        }


        if (!$this->api_key) {
            show_error('NEXMO: Needed API Key');
        } else if (!$this->api_secret) {
            show_error('NEXMO: Needed API Secret');
        }
    }

    public function sms($to, $sms) {
        if (!$this->from) {
            show_error('NEXMO: Needed From');
        }
        $ci = & get_instance();
        $user = $ci->db
                        ->where('phone', $to)
                        ->get('user')->row_array();
        if ($user) {
            $to = $user['country_code'] . $to;
        } else {
            $to = '91' . $to;
        }


        $ci->db->select('count(*) as total');
        $ci->db->where('phone', $to);
        $ci->db->where('date >= ', date('Y-m-d').' 00:00:00');
        $ci->db->where('date <= ', date('Y-m-d').' 23:59:59');
        $check_limit = $ci->db->get('delivery_receipt')->row_array();
        if($check_limit & $check_limit['total'] > DAILY_SMS_LIMIT) {

            //return 'limit_reached'; exit();
            $this->response[] = array(
                    'status' => 'false',
                    'response_msg' => 'Your daily SMS limit reached.',
                );
                echo json_encode(array('response' => $this->response));
                exit();
        }

        // Testing Only & Other SMS API


       // $resp ='http://sms6.routesms.com:8080/bulksms/bulksms?username=innowrap&password=ino64wrp&type=0&dlr=1&destination='.$to.'&source=INOWRP&message='.urlencode($sms);

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://sms6.routesms.com:8080/bulksms/bulksms?username=innowrap&password=ino64wrp&type=0&dlr=1&destination=$to&source=FRBEES&message=".urlencode($sms),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "",
        ));

        $resp = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if( $resp) {

            $resp = json_decode($resp, true);
            $delivery_status = [
                    'message_id' => rand(),
                    'delivery_status' => 'pending',
                    'phone' => $to
                ];
            if (strpos($sms, 'verification code is') !== FALSE) {
                        $delivery_status['otp'] = (int) preg_replace('/[^\-\d]*(\-?\d*).*/', '$1', $sms);
                    }
             $ci->db
                        ->insert('delivery_receipt', $delivery_status);
            return $ci->db->insert_id(); exit;
        } else {
           return false; exit;
        }

        
        //Testing End
        //$to = '035045340503405340503405';
      /*  $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://rest.nexmo.com/sms/json");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "api_key=" . $this->api_key . "&api_secret=" . $this->api_secret . "&from=" . $this->from . "&to=$to&text=$sms");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($ch);
        curl_close($ch);*/
        //print_r($resp); die;



        if ($resp) {
            $resp = json_decode($resp, true);

            if ($resp && $resp['messages'][0]['status'] == '0') {
                $delivery_status = [
                    'message_id' => $resp['messages'][0]['message-id'],
                    'delivery_status' => 'pending',
                    'phone' => $to
                ];
                if (strpos($sms, 'verification code is') !== FALSE) {
                    $delivery_status['otp'] = (int) preg_replace('/[^\-\d]*(\-?\d*).*/', '$1', $sms);
                }
                $ci->db
                        ->insert('delivery_receipt', $delivery_status);
                return $ci->db->insert_id();
            }
        }
    }


    public function plain_sms($to, $sms) {
        if (!$this->from) {
            show_error('NEXMO: Needed From');
        }
        $ci = & get_instance();
        $user = $ci->db
                        ->where('phone', $to)
                        ->get('user')->row_array();
        $len = strlen($to);
        if($len > 10) {

        } else {

            if ($user) {
                $to = $user['country_code'] . $to;
            } else {
                $to = '91' . $to;
            }
        }

        $to = str_replace(' ','',$to);
        // Testing Only & Other SMS API

        //print_r($to); die;

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => "http://sms6.routesms.com:8080/bulksms/bulksms?username=innowrap&password=ino64wrp&type=0&dlr=1&destination=$to&source=FRBEES&message=".urlencode($sms),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "",
        ));

        $resp = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        //print_r($resp); die;

        
    }

    public function call($to, $otp) {
        $ci = & get_instance();
        $user = $ci->db
                        ->where('phone', $to)
                        ->get('user')->row_array();
        if ($user) {
            $to = $user['country_code'] . $to;
        }

        $voice_txt = '<break time="1s"/>Your verification code is ';
        $len = strlen($otp);
        for ($i = 0; $i < $len; $i++) {
            $voice_txt.= '<break time="500ms"/>' . substr($otp, $i, 1);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.nexmo.com/tts/json");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "api_key=" . $this->api_key . "&api_secret=" . $this->api_secret . "&to=$to&text=$voice_txt");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($ch);
        curl_close($ch);
        if ($resp) {
            $resp = json_decode($resp, TRUE);
            if (isset($resp['status']) && $resp['status'] == '0') {
                $delivery_status = [
                    'message_id' => $resp['call_id'],
                    'delivery_status' => $resp['error_text'],
                    'phone' => $resp['to'],
                    'otp' => $otp
                ];
                $ci->db
                        ->insert('delivery_receipt', $delivery_status);
                return $ci->db->insert_id();
            }
        }
    }

    public function confirm_otp($delivery_receipt_id, $otp) {
        $ci = & get_instance();
        $valid = $ci->db
                        ->where('delivery_receipt_id', $delivery_receipt_id)
                        ->where('otp', trim($otp))
                        ->get('delivery_receipt')->row_array();
        if ($valid) {
                $ci->db
                        ->where('delivery_receipt_id', $delivery_receipt_id)
                        ->where('otp', trim($otp))
                        ->delete('delivery_receipt');
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

