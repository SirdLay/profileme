<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //check auth
        if (!is_admin()) {
            redirect(base_url());
        }
    }

    
    public function index()
    {
        $data = array();
        $data['page_title'] = 'Settings';
        $data['settings'] = $this->admin_model->get('settings');
        $data['main_content'] = $this->load->view('admin/settings', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    
    //update settings
    public function update(){

        if ($_POST) {
            
            $data = array(
                'site_name' => $this->input->post('site_name', true),
                'site_title' => $this->input->post('site_title', true),
                'keywords' => $this->input->post('keywords', true),
                'description' => $this->input->post('description', true),
                'footer_about' => $this->input->post('footer_about', true),
                'admin_email' => $this->input->post('admin_email', true),
                'copyright' => $this->input->post('copyright', true),
                'pagination_limit' => $this->input->post('pagination_limit', true),
                'facebook' => $this->input->post('facebook', true),
                'twitter' => $this->input->post('twitter', true),
                'instagram' => $this->input->post('instagram', true),
                'linkedin' => $this->input->post('linkedin', true),
                'enable_registration' => $this->input->post('enable_registration', true),
                'enable_captcha' => $this->input->post('enable_captcha', true),
                'google_analytics' => base64_encode($this->input->post('google_analytics')),
                'site_color' => $this->input->post('site_color', true),
                'site_font' => $this->input->post('site_font', true),
                'layout' => $this->input->post('layout', true),
                'paypal_email' => $this->input->post('paypal_email', true),
                'captcha_site_key' => $this->input->post('captcha_site_key', true),
                'captcha_secret_key' => $this->input->post('captcha_secret_key', true),
            );
            
            // upload favicon image
            $data_img = $this->admin_model->do_upload('photo1');
            if($data_img){

                $data_img = array(
                    'favicon' => $data_img['thumb']
                );
                $this->admin_model->edit_option($data_img, 1, 'settings'); 
             }

             // upload logo
            $data_img2 = $this->admin_model->do_upload('photo2');
            if($data_img2){
                $data_img = array(
                    'logo' => $data_img2['medium']
                );            
                $this->admin_model->edit_option($data_img, 1, 'settings');
            }

            $data = $this->security->xss_clean($data);
            $this->admin_model->edit_option($data, 1, 'settings');
            $this->session->set_flashdata('msg', 'Information Updated Successfully'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


}