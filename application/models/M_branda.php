<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_branda extends CI_Model{

	public function __construct()
    {
        parent::__construct();
        // Load database prodi
        $this->load->library('JWT');
        
    }
	
	public function is_url_exist($url){
	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_NOBODY, true);
	    curl_exec($ch);
	    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	    if($code == 200){
	        $status = true;
	    }else{
	        $status = false;
	    }
	    curl_close($ch);
	    return $status;
	}

	public function getTestimonial(){
		$hasil= $this->db->query('select tes.Testimony,tes.NPM ,auns.Name 
			from db_alumni.testimony tes
			INNER JOIN db_academic.auth_students as auns 
			on auns.npm=tes.NPM order by tes.ID desc limit 28')->result_array();
		return $hasil;	
	}

    public function getNewsBloglimit (){
    	$hasil= $this->db->query('select * from db_blogs.article order by ID_title desc limit 28')->result();

		// return $hasil->result();

		for ($i=0; $i < count($hasil); $i++) { 
			$hasil[$i]->CreateAT=date("d M, Y", strtotime($hasil[$i]->CreateAT));
			$string=$hasil[$i]->Title;
	        $replace = '-';         
	        $string = strtolower($string);     
	        //replace / and . with white space     
	        $string = preg_replace("/[\/\.]/", " ", $string);     
	        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     
	        //remove multiple dashes or whitespaces     
	        $string = preg_replace("/[\s-]+/", " ", $string);     
	        //convert whitespaces and underscore to $replace     
	        $string = preg_replace("/[\s_]/", $replace, $string);

	        $slug=$string;
	        $hasil[$i]->SEO_title=$slug;
			$url=url_blog_admin.'upload/'.$hasil[$i]->Images;
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[$i]->Images='default.png';
			}

		}

		return $hasil;	
    }

    
}

?>