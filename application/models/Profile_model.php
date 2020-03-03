<?php

 class Profile_model extends CI_Model{
 
    public function get_profile($slug = FALSE){



         if($slug == FALSE){
             $this->db->order_by('id', 'DESC');
             $query = $this->db->get('uprofile');
             return $query->result_array();

         }

         $query = $this->db->get_where('uprofile', array('slug' => $slug));
         return $query->row_array();
     }

     public function create_profile(){

        $slug = url_title( $this->session->userdata('name'));
    
        $data =array(
            
            
            'name' =>  $this->session->userdata('email'),
            'slug' => $slug,
        
            'email' => $this->session->userdata('email'),
            'gender'=>  $this->session->userdata('gender')
    
        );
    
        return $this->db->insert('uprofile', $data);
     }

}