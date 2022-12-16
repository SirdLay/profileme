<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

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
        $this->all_users('all');
    }


    //all users list
    public function all_users($type)
    {
        $data = array();
        $data['page_title'] = 'Users';
        $data['users'] = $this->admin_model->get_all_users($type);
        $data['main_content'] = $this->load->view('admin/user/admin_users', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //all pro users list
    public function pro($type = 'pro')
    {
        $data = array();
        $data['page_title'] = 'Users';
        $data['users'] = $this->admin_model->get_all_users($type);
        $data['main_content'] = $this->load->view('admin/user/admin_users', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //active or deactive post
    public function status_action($type, $id) 
    {
        $data = array(
            'status' => $type
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'users');

        if($type ==1):
            $this->session->set_flashdata('msg', 'Activate Successfully'); 
        else:
            $this->session->set_flashdata('msg', 'Deactivate Successfully'); 
        endif;
        redirect(base_url('admin/users'));
    }


    public function delete($id)
    {
        $this->admin_model->delete($id,'users'); 
        echo json_encode(array('st' => 1));
        
    }


}