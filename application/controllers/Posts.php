<?php
class Posts extends CI_Controller{
    public function index(){
        $data['title'] = 'Latest Post';

        $data['posts'] = $this->Posts_model->get_posts();

        $this->load->view('header');
        $this->load->view('home/menu');
        $this->load->view('posts/index', $data);
        $this->load->view('footer');

    }

    public function view_post($slug = NULL){

        $data['post'] = $this->Posts_model->get_posts($slug);

        if(empty($data['post'])){
            show_404();
        }

        $data['title'] = $data['post']['title'];

        $this->load->view('header');
        $this->load->view('home/menu');
        $this->load->view('posts/view_posts', $data);
        $this->load->view('footer');

        

    }

    public function create(){
     
        $data['title'] = 'Create Post';
        $this->load->library('form_validation');

        if(isset($_POST['post_submit'])){
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run()===TRUE){
                $this->Posts_model->create_post();
                redirect('posts');
            }

            else{
                redirect('createposts');
            }
        }

        $this->load->view('header');
        $this->load->view('home/menu');
        $this->load->view('posts/create', $data);
        $this->load->view('footer');

    }

    public function delete($id){
        
        $this->Posts_model->delete_post($id);
        redirect('posts');    
        

    }

    public function edit($slug){
        $data['post'] = $this->Posts_model->get_posts($slug);

        if(empty($data['post'])){
            show_404();
        }

        $data['title'] = 'Edit Post';

        $this->load->view('header');
        $this->load->view('home/menu');
        $this->load->view('posts/edit', $data);
        $this->load->view('footer');
    }

    public function update(){
      $this->Posts_model->update_post();
      redirect('posts');
    }
}

?>