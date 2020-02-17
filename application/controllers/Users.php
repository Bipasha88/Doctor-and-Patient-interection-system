<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Users extends CI_Controller{

    

    public function register()
    { 
        

        if(isset($_POST['register']))
        {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            

            if($this->form_validation->run()===TRUE){

                

               $enc_password = md5($this->input->post('password'));

               $this->User_model->register($enc_password);

               $this->session->set_flashdata('user_registered', 'You are now registered and log in');

               redirect('login');


            }
            
        }

        $this->load->view('header');
        $this->load->view('users/register');
        $this->load->view('footer');
        
       
    }

    public function login(){

        if(isset($_POST['login_user']))
        {
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            

            if($this->form_validation->run()===TRUE){


              $email = $this->input->post('email');

              $password = md5($this->input->post('password'));
                
             $user_id= $this->User_model->login($email,$password);


              if($user_id){
              
                $user_data = array(
                   'user_id' => $user_id,
                   'email' => $email,
                   'logged_in' => true
                );

                $this->session->set_userdata($user_data);


                $this->session->set_flashdata('user_loggedin', 'You are now log in');

                redirect('dashboard');
              }
              else{
                $this->session->set_flashdata('userlogin_failed', 'Worng email or password');

                redirect('login');
 
              }

               

            }
            
        }
        $this->load->view('header');
        $this->load->view('users/login');
        $this->load->view('footer');
    }

    public function dashboard(){
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('footer');

    }
}
?>