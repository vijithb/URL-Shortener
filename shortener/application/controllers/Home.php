<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


    public function __construct()
    {
        parent::__construct();        
        // load models
        $this->load->model('Url_model');        
    }

    public function index()
    {
        $data = array(
            'error' => false,
            'show_details' => false,
        );
        $post = $this->input->post(NULL, TRUE);

        // check if request method was 'post' - if yes, then try to create short url
        if($post){
            $url = $post['url'];
            
            // validate url
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $id = $this->Url_model->add_url( $url );                
                $url_data = $this->Url_model->get_url_by_id( $id );                
                $data['show_details'] = true;
                $data['url_data'] = $url_data;                            
            } else {
                $data['error'] = "Invalid URL!";
            }
            
        }
        
        // load view and assign data array
        $this->load->view('home', $data);
    }
    public function redirect()
    {       
        $alias=$this->uri->segment(1);       
        $url_data = $this->Url_model->get_url( $alias );        
        // check if there's an url with this alias
        if(!$url_data){
            header("HTTP/1.0 404 Not Found");
            $this->load->view('not_found');
        }else{                    
            header('Location: ' . $url_data->url, true, 302);
            exit();
        }
        
    }    
} 