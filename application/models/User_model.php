<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
 
class User_model extends CI_Model
{

    public function register($enc_password){

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $enc_password,
            'gender' => $this->input->post('gender')
        );

        return $this->db->insert('info',$data);
    }

   public function login($email, $password){
       $this->db->where('email',$email);
       $this->db->where('password',$password);

       $result = $this->db->get('info');

       if($result->num_rows()==1){
           return $result->row(0)->id;
       }
       else{
           return false;
       }

   }
}

?>