<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Users extends CI_Controller{

    //register

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

    //user login

    public function login(){

        if(isset($_POST['login_user']))
        {
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            

            if($this->form_validation->run()===TRUE){


              $email = $this->input->post('email');

              $password = md5($this->input->post('password'));
                
             $user_id= $this->User_model->login($email,$password);


              if($user_id==true){
              
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

    //logout

    public function user_logout(){
      $this->session->unset_userdata('logged_in');
      $this->session->unset_userdata('email');
      $this->session->unset_userdata( 'user_id');

      $this->session->set_flashdata('userlogged_out', 'You are now logged out ');
      redirect('login');
    }

    // create profile

    public function dashboard(){

      if($this->session->userdata('logged_in')){

        $user_email = $this->session->userdata('email');

        $data['user'] = $this->User_model->get_user($user_email);


        $this->load->view('header');
        $this->load->view('home/menu');
        $this->load->view('dashboard', $data);
        $this->load->view('footer');
      }
      else{
        $this->session->set_flashdata('set_session', 'login first ');
        redirect('login');
      }

    }
    public function menu(){
      $this->load->view('header');
        $this->load->view('home/menu');
        $this->load->view('footer');
    }

    // upload profile photo

    public function upload(){

      if($this->session->userdata('logged_in')){

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
                        $this->load->view('users/upload', $data);
                        $this->load->view('footer');
                }
                else
                {

                  $email = $this->session->userdata('email');


                  $user = $this->User_model->get_user($email);

                  if($user->photo && file_exists('uploads/'.$user->photo)){

                    unlink('uploads/'.$user->photo);
                  }
                        $uploaddata = $this->upload->data();

                        $filename = $uploaddata['file_name'];

                        $user_data = array(
                          'photo' => $filename
                        );

                        $this->User_model->update($email,$user_data);

                        $this->session->set_flashdata('upload_message', 'Upload Successfully');

                        redirect('dashboard');
                } 
      }
      else{
        $this->session->set_flashdata('set_session', 'login first ');
        redirect('login');
      }


    }

    // change password

    public function changepassword(){

      if($this->session->userdata('logged_in')){

        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('oldpass', 'Old Password', 'callback_password_check');
        $this->form_validation->set_rules('newpass', 'New Password', 'required');
        $this->form_validation->set_rules('confpass', 'Confirm Password', 'required|matches[newpass]');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run()== false){

                        $this->load->view('header');
                        $this->load->view('home/menu');
                        $this->load->view('users/change_password', $data);
                        $this->load->view('footer');

        }
        else{
          $email = $this->session->userdata('email');

          $newpass = $this->input->post('newpass');

          $this->User_model->update($email, array('password' => md5($newpass)));

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
      $user = $this->User_model->get_user($email);

      if($user->password != md5($oldpass)){
        $this->form_validation->set_message('password_check', 'The {field} does not match');
        return false;
      }

      return true;

    }
}
?>