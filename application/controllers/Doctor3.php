<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Doctor3 extends CI_Controller{
    //upload image
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
}