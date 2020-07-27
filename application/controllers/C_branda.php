<?php defined("BASEPATH") OR exit("No direct script access allowed");

  class C_branda extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        // header('Content-Type: application/json');
        $this->load->model('m_branda');
       
        $this->load->helper('url');
    }

    // Testimonial
    function load_testimonial(){
        // print_r('ok');die();
        $data=$this->m_branda->getTestimonial();
        echo json_encode($data);
    }
    // News BY Blog

    function load_newsbyblog(){
        // print_r('ok');die();
        $data=$this->m_branda->getNewsBloglimit();
        echo json_encode($data);
    }


   

}

