<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
 
class User_model extends CI_Model
{

    public function register($enc_password){
        

        $em = $this->input->post('email');
        if($this->email_check($em)==true){
            $this->session->set_flashdata('em_exist','Email address exist.');
            redirect(base_url().'users/register');
        }


        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $enc_password,
            'gender' => $this->input->post('gender')
        );

        return $this->db->insert('info',$data);
    }


    public function email_check($email){
        $this->db->where('email',$email);
 
        $result = $this->db->get('info');
 
        if($result->num_rows()>0){
            //return $result->row(0)->id;
            return true;
        }
        else{
            return false;
        }
 
    }


   public function login($email, $password){
       $this->db->where('email',$email);
       $this->db->where('password',$password);

       $result = $this->db->get('info');

       if($result->num_rows()>0){
           //return $result->row(0)->id;
           return true;
       }
       else{
           return false;
       }

   }
}

?>