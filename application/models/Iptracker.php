<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*********************************************************************
 * Description: Tracks the number of website visits everyday. 
 * Version: 1.0.0
 * Date Created: January 09, 2015
 * Author: Glenn Tan Gevero
 * Website: http://app-arsenal.com
 * File: IP Tracker Library File
**********************************************************************/

class Iptracker extends CI_Model{
		
	private $sys = null;
	
	public function __construct(){
		$this->sys	=& get_instance();
        $this->sys->load->library('user_agent');
        $this->load->helper('url');
	}
	
	private static function get_ip_address(){		
		$ip = getenv('HTTP_CLIENT_IP')?:
			getenv('HTTP_X_FORWARDED_FOR')?:
			getenv('HTTP_X_FORWARDED')?:
			getenv('HTTP_FORWARDED_FOR')?:
			getenv('HTTP_FORWARDED')?:
			getenv('REMOTE_ADDR');		
		return $ip;
	}
	
	private function get_page_visit(){
		return current_url();
	}
    
    private function get_user_agent(){        
        if ($this->sys->agent->is_browser()){
            $agent = $this->sys->agent->browser().' '.$this->sys->agent->version();
        }
        elseif ($this->sys->agent->is_robot()){
            $agent = $this->sys->agent->robot();
        }
        elseif ($this->sys->agent->is_mobile()){
            $agent = $this->sys->agent->mobile();
        }
        else{
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
	private function get_page_id($id){
		// return explode('/', uri_string());;
	}
	public function save_site_visit(){
		// get IP Public
		$ip_public = (array_key_exists('ip', $getIP = $this->GetIPPublic() )) ? $getIP['ip'] : '';
		$id =$this->uri->segment(2);
		$ip_local 	= self::get_ip_address();
		$page	= self::get_page_visit();
        $agent  = self::get_user_agent();
		$seg    = explode("-", $page);
		// $id_article = $this->uri->segment('3');;		
        //Uncomment the IF Statement if you do not want your own admin pages to be tracked. Change the value of the needle ('admin) to the segments (URI) found in your admin pages.
		//if(!in_array('admin', $seg)){			
			$data = array(
				'ip_local'            => $ip_local,
				'ip_public'            => $ip_public,
				'page_view'     => $page,
                'user_agent'    => $agent,
				// 'date'          => time(),
				'date'          => date('Y-m-d H:i:s'),
				'id_article'    => $id,
			);
			
			$this->sys->db->insert('db_blogs.site_visits', $data);			
		//}
	}

	public function GetIPPublic($url='https://api.ipify.org/?format=json')
	{
	    $rs = array();
	   
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_URL,$url);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $pr = curl_exec($ch);
	    $rs = (array) json_decode($pr,true);
	    curl_close ($ch);
	    return $rs;
	}
}

$tracker = new Iptracker();
$tracker->save_site_visit();
