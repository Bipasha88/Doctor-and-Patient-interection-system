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
}

?>