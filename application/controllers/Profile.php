<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index($slug){
        $this->user($slug);
    }


    public function user($slug)
    {   
        $data = array();
        $slug = $this->security->xss_clean($slug);
        $data['user'] = $this->common_model->get_user_by_slug($slug);
        $user_id =  $data['user']->id;
        $data['page_title'] = 'Home';
        $data['services'] = $this->common_model->get_services($user_id);
        $data['skills'] = $this->common_model->get_home_skills($user_id);
        if ($data['user']->account_type == 'free') {
            $data['main_content'] = $this->load->view('user/home_free', $data, TRUE);
        } else {
            $data['main_content'] = $this->load->view('user/home', $data, TRUE);
        }

        $this->load->view('user/index', $data);
    }


    public function about_me($slug)
    {   
        $data = array();
        $slug = $this->security->xss_clean($slug);
        $data['user'] = $this->common_model->get_user_by_slug($slug);
        $user_id =  $data['user']->id;
        $data['page_title'] = 'About me';
        $data['services'] = $this->common_model->get_services($user_id);
        $data['skills'] = $this->common_model->get_home_skills($user_id);
        $data['main_content'] = $this->load->view('user/about_me', $data, TRUE);
        $this->load->view('user/index', $data);
    }


    public function resume($slug)
    {   
        $data = array();
        $data['page_title'] = 'Resume';
        $slug = $this->security->xss_clean($slug);
        $data['user'] = $this->common_model->get_user_by_slug($slug);
        $user_id =  $data['user']->id;
        $data['experiences'] = $this->common_model->get_home_experiences($user_id);
        $data['testimonials'] = $this->common_model->get_testimonials($user_id);
        $data['main_content'] = $this->load->view('user/resume', $data, TRUE);
        $this->load->view('user/index', $data);
    }


    public function portfolio($slug)
    {   
        $data = array();
        $data['page_title'] = 'Portfolio';
        $slug = $this->security->xss_clean($slug);
        $data['user'] = $this->common_model->get_user_by_slug($slug);
        $user_id =  $data['user']->id;
        $data['categories'] = $this->common_model->get_portfolio_category($user_id);
        $data['portfolios'] = $this->common_model->get_home_portfolio($user_id);
        $data['main_content'] = $this->load->view('user/portfolio', $data, TRUE);
        $this->load->view('user/index', $data);
    }


    public function portfolio_details($slug, $id)
    {   
        $data = array();
        $data['page_title'] = 'Portfolio Details';
        $slug = $this->security->xss_clean($slug);
        $data['user'] = $this->common_model->get_user_by_slug($slug);
        $user_id =  $data['user']->id;
        $data['post'] = $this->common_model->get_by_id($id, 'portfolio');
        $data['main_content'] = $this->load->view('user/portfolio_details', $data, TRUE);
        $this->load->view('user/index', $data);
    }

    public function blog($slug)
    {   
        $data = array();
        $slug = $this->security->xss_clean($slug);
        $data['user'] = $this->common_model->get_user_by_slug($slug);
        $user_id =  $data['user']->id;
        //initialize pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url('home/blog');
        $total_row = $this->common_model->get_blog_posts(1 , 0, 0, $user_id);
        $config['total_rows'] = $total_row;
        $config['per_page'] = 9;
        $this->pagination->initialize($config);
        $page = $this->security->xss_clean($this->input->get('page'));
        if (empty($page)) {
            $page = 0;
        }
        if ($page != 0) {
            $page = $page - 1;
        }
        
        $data['page_title'] = 'Blog Posts';
        $data['blog_posts'] = $this->common_model->get_blog_posts(0 , $config['per_page'], $page * $config['per_page'], $user_id);
        $data['main_content'] = $this->load->view('user/blog', $data, TRUE);
        $this->load->view('user/index', $data);
    }


    public function category($slug, $cat_slug)
    {   
        $data = array();
        $slug = $this->security->xss_clean($slug);
        $cat_slug = $this->security->xss_clean($cat_slug);
        $data['user'] = $this->common_model->get_user_by_slug($slug);
        $user_id =  $data['user']->id;

        $cat_slug = $this->security->xss_clean($cat_slug);
        $category = $this->common_model->get_category_by_slug($cat_slug);
        
        if (empty($category)) {
            redirect(base_url());
        }

        //initialize pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url('category/'.$slug.'/'.$category->slug);
        $total_row = $this->common_model->get_category_posts(1 , 0, 0, $category->id, $user_id);
        $config['total_rows'] = $total_row;
        $config['per_page'] = 9;
        $this->pagination->initialize($config);
        $page = $this->security->xss_clean($this->input->get('page'));
        if (empty($page)) {
            $page = 0;
        }
        if ($page != 0) {
            $page = $page - 1;
        }
        
        $data['page_title'] = 'Category Posts';
        $data['blog_posts'] = $this->common_model->get_category_posts(0, $config['per_page'], $page * $config['per_page'], $category->id, $user_id);
        $data['main_content'] = $this->load->view('user/blog', $data, TRUE);
        $this->load->view('user/index', $data);
    }


    public function details($slug, $post_slug)
    {   

        $data = array();
        $slug = $this->security->xss_clean($slug);
        $post_slug = $this->security->xss_clean($post_slug);

        $data['user'] = $this->common_model->get_user_by_slug($slug);
        $user_id =  $data['user']->id;

        $data['page_title'] = 'Post details';
        $data['page'] = 'Post';
        $data['post'] = $this->common_model->get_post_details($post_slug);

        if (empty($data['post'])) {
            redirect(base_url());
        }
        $category_id = $data['post']->category_id;
        $post_id = $data['post']->id;
        $data['post_id'] = $post_id;

        $data['comments'] = $this->common_model->get_comments_by_post($data['post']->id);
        $data['total_comment'] = count($data['comments']);

        $data['related_posts'] = $this->common_model->get_related_post($category_id, $post_id, $user_id);
        $data['categories'] = $this->common_model->get_blog_category($user_id);
        $data['tags'] = $this->common_model->get_random_tags($user_id);
        $data['tags'] = $this->common_model->get_post_tags($post_id);
        //echo"<pre>"; print_r($data['tags']); exit();
        $data['main_content'] = $this->load->view('user/blog_post', $data, TRUE);
        $this->load->view('user/index', $data);
    }


    //send comment
    public function send_comment($post_id)
    {     
        if ($_POST) {
            $data = array(
                'post_id' => $post_id,
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'message' => $this->input->post('message', true),
                'created_at' => my_date_now()
            );
            $data = $this->security->xss_clean($data);
            $this->common_model->insert($data, 'comments');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function contact($slug)
    {   
        $data = array();
        $slug = $this->security->xss_clean($slug);
        $data['user'] = $this->common_model->get_user_by_slug($slug);
        $user_id =  $data['user']->id;
        $data['page_title'] = 'Contact';
        $data['main_content'] = $this->load->view('user/contact', $data, TRUE);
        $this->load->view('user/index', $data);
    }


    //send contact message
    public function send_message()
    {   
        if ($_POST) {
            $data = array(
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'message' => $this->input->post('message', true),
                'user_id' => $this->input->post('user_id', true),
                'created_at' => my_date_now()
            );
            $data = $this->security->xss_clean($data);
            $this->common_model->insert($data, 'contacts');
            $this->session->set_flashdata('msg', 'Message send Successfully'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function appointment($slug)
    {   
        $data = array();
        $data['page_title'] = 'Appointment';
        $slug = $this->security->xss_clean($slug);
        $data['user'] = $this->common_model->get_user_by_slug($slug);
        $user_id =  $data['user']->id;
        if (!empty($data['user']->available_days)) {
            $data['my_days'] = explode(",", $data['user']->available_days);
        }else{
            $data['my_days'] = '';
        }
        
        $data['appointments'] = $this->common_model->get_home_experiences($user_id);
        $data['main_content'] = $this->load->view('user/appointment', $data, TRUE);
        $this->load->view('user/index', $data);
    }

    //send comment
    public function book_appointment($slug)
    {     

        $slug = $this->security->xss_clean($slug);
        $user = $this->common_model->get_user_by_slug($slug);

        if ($_POST) {
            $data = array(
                'user_id' => $user->id,
                'title' => $this->input->post('title', true),
                'book_time' => $this->input->post('book_time', true),
                'email' => $this->input->post('email', true),
                'created_at' => my_date_now()
            );
            $data = $this->security->xss_clean($data);
            $this->common_model->insert($data, 'appointments');
            $this->session->set_flashdata('msg', 'Message send Successfully'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function download($id)
    {
        $this->load->helper('download');
        $file = $this->common_model->get_by_id($id, 'users');

        $file_name = basename($file->cv);
        $data = file_get_contents($file->cv);
        $name = $file_name;

        force_download($name, $data); 
        $this->session->set_flashdata('msg', $file.' Downloaded Successfully');
    }


    // not found page
    public function error_404()
    {
        $data['page_title'] = "Error 404";
        $data['description'] = "Error 404";
        $data['keywords'] = "error,404";
        $this->load->view('error_404');
    }


}