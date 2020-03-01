<?php
class Posts extends CI_Controller{
    public function index($offset = 0){
       //pagination config
        $config['base_url'] = base_url() . 'posts/index/';
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 2;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'pagination-link');

        //pagination initialization

       $this->pagination->initialize($config);


        $data['title'] = 'Latest Post';

        $data['posts'] = $this->Posts_model->get_posts(FALSE, $config['per_page'], $offset);

        $this->load->view('header');
        $this->load->view('home/menu');
        $this->load->view('posts/index', $data);
        $this->load->view('footer');

    }

    public function view_post($slug = NULL){

        $data['post'] = $this->Posts_model->get_posts($slug);
        $post_id = $data['post']['id'];
        $data['comment'] = $this->Comment_model->get_comment($post_id);

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
        //check logged in or not

        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('set_session', 'login first ');
            redirect('login');

        }
     
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
        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('set_session', 'login first ');
            redirect('login');

        }
        
        $this->Posts_model->delete_post($id);
        redirect('posts');    
        

    }

    public function edit($slug){

        if(!$this->session->userdata('logged_in')){
            $this->session->set_flashdata('set_session', 'login first ');
            redirect('login');

        }
        
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