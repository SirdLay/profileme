<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends Home_Controller 
{

    public function __construct()
    {
        parent::__construct();
    }

    // load Login view Page
    public function login()
    {
        $data = array();
        $data['page_title'] = 'Login';
        $data['page'] = 'Auth';
        $this->load->view('login', $data);
    }


    // login User using ajax
    public function log()
    {

        if($_POST){ 

            // check valid user 
            $user = $this->auth_model->validate_user();

            if (empty($user)) {
                echo json_encode(array('st'=>0));
                exit();
            }
            if (!empty($user) && $user->status == 0) {
                // account pending
                echo json_encode(array('st'=>2));
                exit();
            }
            if (!empty($user) && $user->status == 2) {
                // account suspend
                echo json_encode(array('st'=>3));
                exit();
            }

            // if valid
            if(password_verify($this->input->post('password'), $user->password)){
               
                $data = array(
                    'id' => $user->id,
                    'name' => $user->name,
                    'slug' => $user->slug,
                    'thumb' => $user->thumb,
                    'email' =>$user->email,
                    'role' =>$user->role,
                    'logged_in' => TRUE
                );
                $data = $this->security->xss_clean($data);
                $this->session->set_userdata($data); 
        

                // success notification 
                if ($user->role == 'user') {
                    $url = base_url('admin/profile');
                } else {
                    $url = base_url('admin/dashboard');
                }
                
                
                echo json_encode(array('st'=>1,'url'=> $url));
            }else{ 
                //-- if not valid user send st => 0 for error notification
                echo json_encode(array('st'=>0));
            }
            
        }else{
            $this->load->view('auth',$data);
        }
    }

    // load register view Page
    public function setup()
    {
        $data = array();
        $data['page_title'] = 'Register';
        $this->load->view('setup');
    }


    // Register new user
    public function register()
    {
        if($_POST){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', "Password", 'trim|required|min_length[4]|alpha_numeric');

            // If validation false show error message using ajax
            if($this->form_validation->run() == FALSE){
                $data = array();
                $data['errors'] = validation_errors();
                $str = $data['errors'];
                echo json_encode(array('st'=>0,'msg'=>$str));
                exit();
            }else{

                $mail =  strtolower(trim($this->input->post('email', true)));
                $email = $this->auth_model->check_email($mail);
                
                // if email already exist
                if ($email){
                    echo json_encode(array('st'=>2));
                    exit();
                } else {

                    //check reCAPTCHA status
                    if (!$this->recaptcha_verify_request()) {
                        echo json_encode(array('st'=>3));
                        exit();
                    } else {

                        $package = $this->input->post('package', true);

                        if ($package == 'free') {
                            $status = 1;
                        } else {
                            $status = 0;
                        }
                        
                        $data=array(
                            'name' => $this->input->post('name', true),
                            'user_name' => $this->input->post('user_name', true),
                            'slug' => str_slug($this->input->post('user_name', true)),
                            'email' => $this->input->post('email', true),
                            'thumb' => 'assets/front/images/avatar.png',
                            'password' => hash_password($this->input->post('password', true)),
                            'role' => 'user',
                            'layout' => 1,
                            'status' => $status,
                            'account_type' => $package,
                            'created_at' => my_date_now()
                        );
                        $data = $this->security->xss_clean($data);
                        $id = $this->common_model->insert($data, 'users');

                        $uid = random_string('numeric',4);
                        //create payment
                        $pay_data=array(
                            'user_id' => $id,
                            'puid' => $uid,
                            'package' => $package,
                            'status' => 'pending',
                            'created_at' => my_date_now()
                        );
                        $pay_data = $this->security->xss_clean($pay_data);
                        $payment_id = $this->common_model->insert($pay_data, 'payment');

                        $query = $this->auth_model->validate_id(md5($id));
                        foreach ($query as $row) {
                            $data = array(
                                'id' => $row->id,
                                'name' => $row->name,
                                'role' => $row->role,
                                'thumb' =>$row->thumb,
                                'email' => $row->email,
                                'logged_in' => true
                            );
                            $this->session->set_userdata($data);
                        }

                        //redirect to the payment page
                        if ($this->input->post('package', true) == 'free'):
                            $url = base_url('admin/profile');
                            $text = 'Continue';
                        else:
                            $url = base_url('purchase-plan/'.$uid);
                            $text = 'Pay Now';
                        endif;
                        
                        echo json_encode(array('st'=>1, 'url' => $url, 'btn' => $text));
                        exit();
                    }
                }

            }
        }

    }

    
    // Recover forgot password 
    public function forgot_password()
    {
        
        $mail =  strtolower(trim($this->input->post('email', true))); 

        // generate random 4 digit password
        $random_pw = random_string('numeric',4);
        //-- check email is exist or not
        $valid = $this->auth_model->check_email($mail);

        // if valid
        if ($valid) {
           
           foreach($valid as $row){
                $data['email'] = $row->email;
                $data['name'] = $row->name;
                $data['password'] = $random_pw;
                $user_id = $row->id;
                
                // reset old password
                $users = array('password'=>md5($random_pw));
                $this->common_model->edit_option($users,$user_id,'user');

                $data = array(
                    'id' => $row->id,
                    'name' => $row->name,
                    'email' =>$row->email,
                    'user_type' =>$row->user_type,
                    'password' => $random_pw,
                    'is_login' => TRUE
                );

                $data = $this->security->xss_clean($data);
                // store data in session
                $this->session->set_userdata($data);

                //-- redirect change password page
                $url = base_url('dashboard/change_password');
                echo json_encode(array('st'=>1, 'url' => $url));
            }
        // if not valid
        } else {
            echo json_encode(array('st'=>2));
        }
        
    }

    
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('msg', 'Logout Successfully');
        redirect(base_url('auth/login'));
    }

}