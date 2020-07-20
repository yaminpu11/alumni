<?php defined("BASEPATH") OR exit("No direct script access allowed");

  class C_dashboard extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        // header('Content-Type: application/json');
        $this->load->model('m_branda');
    }
    function index(){

        $page = '';
        $data["pageTitle"] = "Dashboard";
        $data['record']=$this->m_branda->list_trending();
        $data['getslider']=$this->m_branda->count_slider();

        $content = $this->load->view('template/V_home',$data,true);
        parent::template($content);
    }

    function page_404(){
          $content = $this->load->view("template/404",'',false);
        }

    function category()
    {
      $content = $this->load->view('template/V_category','',true);
      parent::template($content);
    }

    function details()
    {
      $this->load->model('iptracker');
      $content = $this->load->view('template/V_details','',true);
      parent::template($content);
    }
    
    function about()
    {
      $content = $this->load->view('template/V_about','',true);
      parent::template($content);
    }

    function contact()
    {
      $content = $this->load->view('template/V_contact','',true);
      parent::template($content);
    }

    public function search(){
      $data['search'] = $this->input->get('value');
      $content = $this->load->view('template/V_search',$data,true);
      parent::template($content);
    }

}

?>