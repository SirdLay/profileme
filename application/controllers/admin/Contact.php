<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //check auth
        if (!is_admin() && !is_pro_user()) {
            redirect(base_url());
        }
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Contact';      
        $data['page'] = 'Contact';
        $data['contacts'] = $this->admin_model->select_by_user('contacts');
        $data['main_content'] = $this->load->view('admin/contact',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    public function delete($id)
    {
        $this->admin_model->delete($id,'contacts'); 
        echo json_encode(array('st' => 1));
    }

}
	

