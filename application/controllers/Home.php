<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {   
        $data = array();
        $data['page_title'] = 'Home';
        $data['services'] = $this->common_model->select('product_services');
        $data['main_content'] = $this->load->view('home', $data, TRUE);
        $this->load->view('index', $data);
    }

    //features
    public function features()
    {   
        $data = array();
        $data['page_title'] = 'Features';
        $data['features'] = $this->common_model->select('features');
        $data['main_content'] = $this->load->view('features', $data, TRUE);
        $this->load->view('index', $data);
    }

    //pricing
    public function pricing()
    {   
        $data = array();
        $data['page_title'] = 'Pricing';
        $data['packages'] = $this->common_model->get_pricing();
        $data['main_content'] = $this->load->view('price', $data, TRUE);
        $this->load->view('index', $data);
    }

    //purchase page
    public function purchase($payment_id)
    {   
        $data = array();
        $data['payment'] = $this->common_model->get_payment($payment_id);
        $data['payment_id'] = $payment_id;
        $data['package'] = $this->common_model->get_package_by_slug($data['payment']->package);
        $this->load->view('purchase', $data);
    }


    //payment success
    public function payment_success($payment_id)
    {   
        $payment = $this->common_model->get_payment($payment_id);
        $data = array(
            'status' => 'verified'
        );
        $data = $this->security->xss_clean($data);

        $user_data = array(
            'status' => 1
        );
        $user_data = $this->security->xss_clean($user_data);

        if (!empty($payment)) {
            $this->common_model->edit_option($user_data, $payment->user_id,'users');
            $this->common_model->edit_option($data, $payment->id,'payment');
        }
        $data['success_msg'] = 'Success';
        $this->load->view('purchase', $data);

    }

    //payment cancel
    public function payment_cancel($payment_id)
    {   
        $payment = $this->common_model->get_payment($payment_id);
        $data = array(
            'status' => 'pending'
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->edit_option($data, $payment->id,'payment');
        $data['error_msg'] = 'Error';
        $this->load->view('purchase', $data);
    }


    //create profile
    public function create_profile($package = '')
    {   
        $data = array();
        $data['page_title'] = 'Create Profile';
        $data['package'] = $package;
        $data['main_content'] = $this->load->view('create_profile', $data, TRUE);
        $this->load->view('index', $data);
    }


    //check username using ajax
    public function check_username($value)
    {   
        $result = $this->common_model->check_username($value);
        if (!empty($result)) {
            echo json_encode(array('st' => 2));
        } else {
            echo json_encode(array('st' => 1));
        }
    }



    //send contact message
    public function send_message()
    {     
        if ($_POST) {
            $data = array(
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'message' => $this->input->post('message', true),
                'created_at' => my_date_now()
            );
            $data = $this->security->xss_clean($data);
            
            //check reCAPTCHA status
            if (!$this->recaptcha_verify_request()) {
                $this->session->set_flashdata('error', 'Recaptcha is required'); 
            } else {
                $this->common_model->insert($data, 'site_contacts');
                $this->session->set_flashdata('msg', 'Message send Successfully');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

  
    public function contact()
    {   
        $data = array();
        $data['page_title'] = 'Contact';
        $data['settings'] = $this->common_model->get('settings');
        $data['main_content'] = $this->load->view('contact', $data, TRUE);
        $this->load->view('index', $data);
    }

    //show pages
    public function page($slug)
    {   
        $data = array();
        $data['page_title'] = 'Page';
        $data['page'] = $this->common_model->get_single_page($slug);
        $data['page_name'] = $data['page']->title;
        $data['main_content'] = $this->load->view('page', $data, TRUE);
        $this->load->view('index', $data);
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