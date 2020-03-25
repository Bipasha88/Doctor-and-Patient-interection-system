<?php
class Profile extends CI_Controller{
public function show(){

    if(!$this->session->userdata('logged_in')){
        $this->session->set_flashdata('set_session', 'login first ');
        redirect('login');

    }


    $data['profiles'] = $this->Profile_model->get_profile();
    
    $this->load->view('header');
    $this->load->view('home/menu');
    $this->load->view('users/profile', $data);
    $this->load->view('footer');
}

public function create(){
    //check logged in or not

    if(!$this->session->userdata('logged_in')|| !$this->session->userdata('doctor_logged_in')){
        $this->session->set_flashdata('set_session', 'login first ');
        redirect('login');

    }
 
    $data['title'] = 'Create Post';
    $this->load->library('form_validation');

    if(isset($_POST['login_user'])){
        
           $this->Profile_model->create_profile();
            redirect('uprofile');

    }

    $this->load->view('header');
    $this->load->view('home/menu');
    $this->load->view('users/profile', $data);
    $this->load->view('footer');

}


}