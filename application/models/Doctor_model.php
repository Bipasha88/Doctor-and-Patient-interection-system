<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
 
class Doctor_model extends CI_Model
{

    public function register($enc_password){
        
        $ln = $this->input->post('licence');
        if($this->licence_check($ln)==true){
            $this->session->set_flashdata('ln_exist','Licence Number exist.');
            redirect(base_url().'users/register');
        }

        $em = $this->input->post('email');
        if($this->email_check($em)==true){
            $this->session->set_flashdata('em_exist','Email address exist.');
            redirect(base_url().'users/register');
        }

        

        $data = array(
            'name' => $this->input->post('name'),
            'licence' => $this->input->post('licence'),
            'designation' => $this->input->post('designation'),
            'email' => $this->input->post('email'),
            
            'password' => $enc_password,
            'gender' => $this->input->post('gender')
        );

        return $this->db->insert('doctor_info',$data);
    }

    public function licence_check($licence){
        $this->db->where('licence',$licence);
 
        $result = $this->db->get('doctor_info');
 
        if($result->num_rows()>0){
            //return $result->row(0)->id;
            return true;
        }
        else{
            return false;
        }
 
    }

    public function email_check($email){
        $this->db->where('email',$email);
 
        $result = $this->db->get('doctor_info');
 
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
 
        $result = $this->db->get('doctor_info');
 
        if($result->num_rows()>0){
            //return $result->row(0)->id;
            return true;
        }
        else{
            return false;
        }
 
    }

    // create profile

    public function get_user($email){
        $this->db->where('email', $email);
        $query = $this->db->get('doctor_info');
        return $query->row();
    }

    // upload profile photo
    public function update($email,$user_data){
        $this->db->where('email', $email);
        $this->db->update('doctor_info', $user_data);
    }
    
    // search doctors

    public function get_doctor($designation){
        $this->db->where('designation', $designation);
        $query = $this->db->get('doctor_info');
        return $query->result_array();
    }

    public function get_search($licence = FALSE){



         if($licence == FALSE){
             $query = $this->db->get('doctor_info');
             return $query->result_array();

         }

         $query = $this->db->get_where('doctor_info', array('licence' => $licence));
         return $query->row_array();
     }
}