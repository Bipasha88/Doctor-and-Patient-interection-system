<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Doctor2 extends CI_Controller{
    //doctors view
    public function view($licence = NULL){

        $data['doctors'] = $this->Doctor_model->get_search($licence);
       
      
        if(empty($data['doctors'])){
            show_404();
        }
      
        
      
        $this->load->view('header');
        $this->load->view('home/menu');
        $this->load->view('doctor/view', $data);
        $this->load->view('footer');
      
        
      
      }
}
