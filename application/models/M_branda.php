<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_branda extends CI_Model{

	public function __construct()
    {
        parent::__construct();
        // Load database prodi
        $this->load->library('JWT');
        
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



    public function getNameUpdateBY($whereField = 'a.UpdateBY',$asfield = 'UpdateBY'){
        $str = 'if( 
                     (select count(*) as total from db_employees.employees where NIP = '.$whereField.' limit 1 ) = 1,
                        #True
                        (select Name from db_employees.employees where NIP = '.$whereField.' limit 1 ),
                        #False
                        (select Name from db_academic.auth_students where NPM = '.$whereField.' limit 1)  
                  ) as '.$asfield.' ';
        return $str;
    }

    // ===== Connect Data ===== //
    
    function load_about(){// about
		$hasil= $this->db->query('select a.ID_AboutUS,a.Title,a.Description,a.CreateAT,b.Name as UpdateBY from db_blogs.about as a join db_employees.employees as b on a.UpdateBY = b.NIP');
		return $hasil->result();
		
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

    function list_data1(){// top 1
		// $hasil= $this->db->query('select * from db_blogs.article where Status="Published" order by ID_title desc limit 0,1');
		$hasil= $this->db->query('select a.*,b.Name as Category,'.$this->getNameUpdateBY().' from db_blogs.article as a
								 join db_blogs.category as b on a.ID_category = b.ID_category
		 						 where Status="Published" order by ID_title desc limit 0,1')->result();
		for ($i=0; $i < count($hasil); $i++) { 
			$url=url_blog_admin.'upload/'.$hasil[$i]->Images;
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[$i]->Images='default.png';
			}
		}

		return $hasil;
		
	}

	function list_data2(){// top 2
		// $hasil= $this->db->query('select * from db_blogs.article where Status="Published" order by ID_title desc limit 1,1');
		$hasil= $this->db->query('select a.*,b.Name as Category,'.$this->getNameUpdateBY().' from db_blogs.article as a
								 join db_blogs.category as b on a.ID_category = b.ID_category
		 						 where Status="Published" order by ID_title desc limit 1,1')->result_array();
		for ($i=0; $i < count($hasil); $i++) { 
			$url=url_blog_admin.'upload/'.$hasil[0]['Images'];
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[0]['Images']='default.png';
			}
		}

		return $hasil;
		
	}

	function list_data3(){// top 3
		$hasil= $this->db->query('select a.*,b.Name as Category,'.$this->getNameUpdateBY().' from db_blogs.article as a
								 join db_blogs.category as b on a.ID_category = b.ID_category
		 						 where Status="Published" order by ID_title desc limit 2,1')->result_array();
		for ($i=0; $i < count($hasil); $i++) { 
			$url=url_blog_admin.'upload/'.$hasil[0]['Images'];
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[0]['Images']='default.png';
			}
		}

		return $hasil;
		
	}

	function list_data4(){// top 4
		$hasil= $this->db->query('select a.*,b.Name as Category,'.$this->getNameUpdateBY().' from db_blogs.article as a
								 join db_blogs.category as b on a.ID_category = b.ID_category
		 						 where Status="Published" order by ID_title desc limit 3,1')->result_array();
		for ($i=0; $i < count($hasil); $i++) { 
			$url=url_blog_admin.'upload/'.$hasil[0]['Images'];
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[0]['Images']='default.png';
			}
		}

		return $hasil;
		
	}

	function list_data5(){// top 5
		$hasil= $this->db->query('select a.*,b.Name as Category,'.$this->getNameUpdateBY().' from db_blogs.article as a
								 join db_blogs.category as b on a.ID_category = b.ID_category
		 						 where Status="Published" order by ID_title desc limit 4,1')->result_array();
		for ($i=0; $i < count($hasil); $i++) { 
			$url=url_blog_admin.'upload/'.$hasil[0]['Images'];
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[0]['Images']='default.png';
			}
		}

		return $hasil;
		
	}

	function list_data6(){// top 6
		$hasil= $this->db->query('select a.*,b.Name as Category, '.$this->getNameUpdateBY().' from db_blogs.article as a
								 join db_blogs.category as b on a.ID_category = b.ID_category
		 						 where Status="Published" order by ID_title desc limit 5,1')->result();
		for ($i=0; $i < count($hasil); $i++) { 
			$url=url_blog_admin.'upload/'.$hasil[$i]->Images;
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[$i]->Images='default.png';
			}
		}
		return $hasil;
		
	}
	function list_category(){
		$hasil= $this->db->query('select a.*,'.$this->getNameUpdateBY().' from db_blogs.category as a order by ID_category desc limit 10');
		return $hasil->result();
	}
	function list_categorytop(){// 
		$hasil= $this->db->query('SELECT art.ID_title, art.ID_category, art.Title, art.Content,art.Images, art.CreateAT, '.$this->getNameUpdateBY('art.UpdateBY').', cat.Name FROM db_blogs.article art LEFT JOIN db_blogs.category cat ON art.ID_category = cat.ID_category WHERE art.Status="Published" ORDER BY RAND() LIMIT 1')->result();
		
		for ($i=0; $i < count($hasil); $i++) { 
			$url=url_blog_admin.'upload/'.$hasil[$i]->Images;
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[$i]->Images='default.png';
			}
		}
		return $hasil;
		
	}
	function list_categorytop1(){//
		$hasil= $this->db->query('SELECT art.ID_title, art.ID_category, art.Title, art.Content,art.Images, art.CreateAT, '.$this->getNameUpdateBY('art.UpdateBY').', cat.Name FROM db_blogs.article art LEFT JOIN db_blogs.category cat ON art.ID_category = cat.ID_category WHERE art.Status="Published" ORDER BY RAND() LIMIT 2,3')->result();

		for ($i=0; $i < count($hasil); $i++) { 
			$url=url_blog_admin.'upload/'.$hasil[$i]->Images;
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[$i]->Images='default.png';
			}
		}
		return $hasil;
		
	}
	function list_recent_post(){//
		$hasil= $this->db->query('SELECT art.ID_title, art.ID_category, art.Title, art.Content,art.Images, art.CreateAT, '.$this->getNameUpdateBY('art.UpdateBY').', cat.Name FROM db_blogs.article art LEFT JOIN db_blogs.category cat ON art.ID_category = cat.ID_category WHERE art.Status="Published" ORDER BY ID_title LIMIT 1');
		return $hasil->result();
		
	}
	function list_recent_post1(){//
		$hasil= $this->db->query('SELECT art.ID_title, art.ID_category, art.Title, art.Content,art.Images, art.CreateAT, '.$this->getNameUpdateBY('art.UpdateBY').', cat.Name FROM db_blogs.article art LEFT JOIN db_blogs.category cat ON art.ID_category = cat.ID_category WHERE art.Status="Published" ORDER BY RAND() LIMIT 1,3')->result();
		for ($i=0; $i < count($hasil); $i++) { 
			$url=url_blog_admin.'upload/'.$hasil[$i]->Images;
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[$i]->Images='default.png';
			}
		}
		return $hasil;
		
	}
	function list_recommend(){//
		$hasil= $this->db->query('SELECT art.ID_title, art.ID_category, art.Title, art.Content,art.Images, art.CreateAT, '.$this->getNameUpdateBY('art.UpdateBY').', cat.Name as Category, tp.Name_topic FROM db_blogs.article art 
			LEFT JOIN db_blogs.category cat ON art.ID_category = cat.ID_category 
			LEFT JOIN db_blogs.show_topic sh ON art.ID_title = sh.ID_article
			LEFT JOIN	db_blogs.topic tp ON sh.ID_topic = tp.ID_topic
			WHERE art.Status="Published" AND tp.ID_topic = 1   ORDER BY RAND() LIMIT 1')->result();
		for ($i=0; $i < count($hasil); $i++) { 
			$url=url_blog_admin.'upload/'.$hasil[$i]->Images;
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[$i]->Images='default.png';
			}
		}
		return $hasil;
		
	}
	function list_recommend1(){//
		$hasil= $this->db->query('SELECT art.ID_title, art.ID_category, art.Title, art.Content,art.Images, art.CreateAT, '.$this->getNameUpdateBY('art.UpdateBY').', cat.Name as Category, tp.Name_topic FROM db_blogs.article art 
			LEFT JOIN db_blogs.category cat ON art.ID_category = cat.ID_category 
			LEFT JOIN db_blogs.show_topic sh ON art.ID_title = sh.ID_article
			LEFT JOIN	db_blogs.topic tp ON sh.ID_topic = tp.ID_topic
			WHERE art.Status="Published" AND tp.ID_topic = 1 ORDER BY RAND() LIMIT 0,6')->result();
		for ($i=0; $i < count($hasil); $i++) { 
			$url=url_blog_admin.'upload/'.$hasil[$i]->Images;
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[$i]->Images='default.png';
			}
		}
		return $hasil;
		
	}
	function list_trending(){//
		$hasil= $this->db->query('SELECT art.ID_title, art.ID_category, art.Title, art.Content,art.Images, art.CreateAT, '.$this->getNameUpdateBY('art.UpdateBY').', cat.Name as Category, tp.Name_topic FROM db_blogs.article art 
			LEFT JOIN db_blogs.category cat ON art.ID_category = cat.ID_category 
			LEFT JOIN db_blogs.show_topic sh ON art.ID_title = sh.ID_article
			LEFT JOIN	db_blogs.topic tp ON sh.ID_topic = tp.ID_topic
			WHERE art.Status="Published" AND tp.ID_topic = 2   ORDER BY RAND() LIMIT 6');
		return $hasil->result();
		
	}

	function count_slider(){// about
		$hasil= $this->db->query('select a.*,b.Name as Category,'.$this->getNameUpdateBY().' from db_blogs.article as a
								 join db_blogs.category as b on a.ID_category = b.ID_category
		 						 where Status="Published" order by ID_title desc limit 6');
		return $hasil->result();		
	}
	
 	public function get_by_id($id_article)
    {
         // $hasil= $this->db->get_where('db_blogs.article', array('ID_title' => $id_article))->row();
         $hasil = $this->db->query('select a.*,b.Name,'.$this->getNameUpdateBY().',c.GroupName from db_blogs.article as a  join db_blogs.category as b on a.ID_category = b.ID_category 
         	 join db_blogs.set_group as c on a.ID_set_group = c.ID_set_group
         	 where a.ID_title = '.$id_article.' 
         	 order by a.ID_title desc limit 200')->result_array();
         for ($i=0; $i < count($hasil); $i++) { 
         $hasil[$i]['CreateAT']=date("M d, Y", strtotime($hasil[$i]['CreateAT']));
         $hasil[$i]['Title']=$hasil[$i]['Title'];
         // $hasil[$i]['Images']=$hasil[$i]['Images;
         $hasil[$i]['Content']=$hasil[$i]['Content'];
         $hasil[$i]['UpdateBY']=$hasil[$i]['UpdateBY'];
         $hasil[$i]['Status']=$hasil[$i]['Status'];
         $hasil[$i]['Category']=$hasil[$i]['Name'];
         $hasil[$i]['ID_title']=$hasil[$i]['ID_title'];
         $hasil[$i]['ID_category']=$hasil[$i]['ID_category'];
         $hasil[$i]['GroupName']=$hasil[$i]['GroupName'];

         
			$url=url_blog_admin.'upload/'.$hasil[$i]['Images'];
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[$i]['Images']='default.png';
			}
		}
		return $hasil;
	}

	public function get_by_search($search){
         $hasil = $this->db->query('select a.*,b.Name,'.$this->getNameUpdateBY().',c.GroupName from db_blogs.article as a  join db_blogs.category as b on a.ID_category = b.ID_category
         	join db_blogs.set_group as c on a.ID_set_group = c.ID_set_group
         							where a.Title like "'.$search.'%" or b.Name like "'.$search.'%"
         							order by a.ID_title desc
         							limit 200
         							')->result_array();
         for ($i=0; $i < count($hasil); $i++) { 
         	$hasil[$i]['CreateAT']=date("M d, Y", strtotime($hasil[$i]['CreateAT']));
         	$hasil[$i]['Title']=$hasil[$i]['Title'];
         	// $hasil[$i]['Images']=$hasil[$i]['Images'];
         	$hasil[$i]['Content']=$hasil[$i]['Content'];
         	$hasil[$i]['UpdateBY']=$hasil[$i]['UpdateBY'];
         	$hasil[$i]['Status']=$hasil[$i]['Status'];
         	$hasil[$i]['Category']=$hasil[$i]['Name'];
         	$hasil[$i]['ID_title']=$hasil[$i]['ID_title'];
         	$hasil[$i]['dt_comment'] = $this->list_comment($hasil[$i]['ID_title']);
         	$hasil[$i]['GroupName']=$hasil[$i]['GroupName'];

         	$url=url_blog_admin.'upload/'.$hasil[$i]['Images'];
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[$i]['Images']='default.png';
			}
         }
         
		return $hasil;
	}

	function save_comment($data){
		$this->db->insert('db_blogs.comment', $data);
        return $this->db->insert_id();
    }

    function save_childcomment($data){
		$this->db->insert('db_blogs.child_comment', $data);
        return $this->db->insert_id();
    }

     function save_contact($data){
		$this->db->insert('db_blogs.contact', $data);
        return $this->db->insert_id();
    }

    function load_bycategory($idcategory){
		$getCategory=$this->db->query('select a.*,'.$this->getNameUpdateBY().' from db_blogs.category as a  where ID_category="'.$idcategory.'"');
		$query = $getCategory->result_array();
		// var_dump($query);
		for ($i=0; $i < count($query); $i++) {
			// $name = $query[$i]['Name']; 
			$hasil2= $this->db->query('SELECT * FROM db_blogs.article a inner join db_blogs.category c on a.ID_category=c.ID_category WHERE a.ID_category = "'.$idcategory.'" AND a.Status="Published" order by a.ID_title desc ')->result_array();
			for ($j=0; $j < count($hasil2); $j++) { 
				$hasil2[$j]['CreateAT']=date('d M Y', strtotime($hasil2[$j]['CreateAT']));
				$url=url_blog_admin.'upload/'.$hasil2[$j]['Images'];
				
				$cek=$this->is_url_exist($url);
				if(!$cek){
					$hasil2[$j]['Images']='default.png';
				}
			}
			$query[$i]['list_category'] = $hasil2;

			
		}
		return $query;
	}

    function list_comment($id){

		$hasil= $this->db->query('select a.*,'.$this->getNameUpdateBY('a.Name','Name').' from db_blogs.comment as a where ID_title="'.$id.'" order by ID_comment desc');
		$query = $hasil->result_array();
		for ($i=0; $i < count($query); $i++) {
			$id_comment = $query[$i]['ID_comment']; 
			$hasil2= $this->db->query('select *,'.$this->getNameUpdateBY('cc.Name','Name').' from db_blogs.comment co inner join db_blogs.child_comment cc on co.ID_comment=cc.ID_comment where co.ID_title="'.$id.'" and cc.ID_comment="'.$id_comment.'" order by co.ID_comment desc')->result_array();
			$query[$i]['list_childcomment'] = $hasil2;
		}
		return $query;

	}

	function list_childcomment($id,$id_comment){
		$hasil= $this->db->query('select a.*,'.$this->getNameUpdateBY('cc.Name','Name').' from db_blogs.comment co inner join db_blogs.child_comment cc on co.ID_comment=cc.ID_comment where co.ID_title="'.$id.'" and cc.ID_comment="'.$id_comment.'" order by co.ID_comment desc');
		return $hasil->result();
	}

	function save_rating($getdata){
		$this->db->insert('db_blogs.rating', $getdata);
        return $this->db->insert_id();
	}

	function show_rating($idpost){
		$hasil= $this->db->query('SELECT ROUND(AVG(Rating),1) as Rating FROM db_blogs.rating WHERE ID_article="'.$idpost.'"')->row();
		
		return $hasil;
	}

}

?>