<?php
class Comment extends CI_Controller{
    public function create($post_id){
        $slug= $this->input->post('slug');
        $data['post'] = $this->Posts_model->get_posts($slug);
        
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('home/menu');
            $this->load->view('posts/view_posts', $data);
            $this->load->view('footer');

        }
        else{
            $this->Comment_model->create_comment($post_id);
            redirect('posts/'.$slug);

        }

    }
}
?>