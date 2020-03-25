<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Doctors extends CI_Controller{

    //create profile

    public function dashboard(){

        if($this->session->userdata('doctor_logged_in')){
  
          $user_email = $this->session->userdata('email');
  
          $data['user'] = $this->Doctor_model->get_user($user_email);
  
  
          $this->load->view('header');
          $this->load->view('home/menu');
          $this->load->view('doctor/dashboard', $data);
          $this->load->view('footer');
        }
        else{
          $this->session->set_flashdata('set_session', 'login first ');
          redirect('login');
        }
    }

        // upload profile photo

        public function upload(){

          if($this->session->userdata('doctor_logged_in')){
    
            $data['title'] = 'Upload Profile Picture';
    
                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|jpeg|png';
                    $config['max_size']             = 11000;
                    
    
                    $this->load->library('upload', $config);
    
                    $data['error'] ="";
    
                    if ( ! $this->upload->do_upload('userfile'))
                    {
    
                      if(isset($_FILES['userfile'])){
                           $data['error'] =$this->upload->display_errors();
                      }
    
                            $this->load->view('header');
                            $this->load->view('home/menu');
                            $this->load->view('doctor/upload', $data);
                            $this->load->view('footer');
                    }
                    else
                    {
    
                      $email = $this->session->userdata('email');
    
    
                      $user = $this->Doctor_model->get_user($email);
    
                      if($user->photo && file_exists('uploads/'.$user->photo)){
    
                        unlink('uploads/'.$user->photo);
                      }
                            $uploaddata = $this->upload->data();
    
                            $filename = $uploaddata['file_name'];
    
                            $user_data = array(
                              'photo' => $filename
                            );
    
                            $this->Doctor_model->update($email,$user_data);
    
                            $this->session->set_flashdata('upload_message', 'Upload Successfully');
    
                            redirect('dashboard2');
                    } 
          }
          else{
            $this->session->set_flashdata('set_session', 'login first ');
            redirect('login');
          }
    
    
        }

        // change password

    public function changepassword(){

      if($this->session->userdata('doctor_logged_in')){

        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('oldpass', 'Old Password', 'callback_password_check');
        $this->form_validation->set_rules('newpass', 'New Password', 'required');
        $this->form_validation->set_rules('confpass', 'Confirm Password', 'required|matches[newpass]');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run()== false){

                        $this->load->view('header');
                        $this->load->view('home/menu');
                        $this->load->view('doctor/change_password', $data);
                        $this->load->view('footer');

        }
        else{
          $email = $this->session->userdata('email');

          $newpass = $this->input->post('newpass');

          $this->Doctor_model->update($email, array('password' => md5($newpass)));

          redirect('user_logout');


        }

      }
      else{
        $this->session->set_flashdata('set_session', 'login first ');
        redirect('login');
      }
    }

    public function password_check($oldpass){
      $email = $this->session->userdata('email');
      $user = $this->Doctor_model->get_user($email);

      if($user->password != md5($oldpass)){
        $this->form_validation->set_message('password_check', 'The {field} does not match');
        return false;
      }

      return true;

    }


        // edit profile

        public function editprofile(){

          if($this->session->userdata('doctor_logged_in')){
    
            $data['title'] = 'Edit Profile';
    
            $this->form_validation->set_rules('name', 'User Name', 'required');
            
    
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
            if($this->form_validation->run()== false){
    
                            $this->load->view('header');
                            $this->load->view('home/menu');
                            $this->load->view('doctor/edit_profile', $data);
                            $this->load->view('footer');
    
            }
            else{
              $email = $this->session->userdata('email');
    
              $name = $this->input->post('name');
              $home = $this->input->post('home');
              $num = $this->input->post('num');
              $education = $this->input->post('education');
    
              $this->Doctor_model->update($email, array('name' => $name, 'home' => $home, 'num' => $num, 'education' => $education ));
    
              redirect('dashboard2');
            }
    
          }
    
          else{
            $this->session->set_flashdata('set_session', 'login first ');
            redirect('login');
          }
    
          
    
    
        }

        // search profile

        public function eyedoctor(){

          if($this->session->userdata('logged_in') ){

          $dr_designation = "Eye Specialist";
  
          $data['doctors'] = $this->Doctor_model->get_doctor($dr_designation);
        
  
          $this->load->view('header');
          $this->load->view('home/menu');
          $this->load->view('doctor/profile', $data);
          $this->load->view('footer');
          }

          else{
            $this->session->set_flashdata('set_session', 'login first ');
            redirect('login');
          }
        
       
      }

      public function heartdoctor(){

        if($this->session->userdata('logged_in') ){

        $dr_designation = "Heart Specialist";

        $data['doctors'] = $this->Doctor_model->get_doctor($dr_designation);
      

        $this->load->view('header');
        $this->load->view('home/menu');
        $this->load->view('doctor/profile', $data);
        $this->load->view('footer');
        }

        else{
          $this->session->set_flashdata('set_session', 'login first ');
          redirect('login');
        }
      
   
  }
  

  public function medicindoctor(){

    if($this->session->userdata('logged_in') ){

    $dr_designation = "Medicine Specialist";

    $data['doctors'] = $this->Doctor_model->get_doctor($dr_designation);
  

    $this->load->view('header');
    $this->load->view('home/menu');
    $this->load->view('doctor/profile', $data);
    $this->load->view('footer');
    }

    else{
      $this->session->set_flashdata('set_session', 'login first ');
      redirect('login');
    }

}

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