<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
                          
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->lang->load('auth');
    }
    
	public function index()
	{
        $this->login();
	}
    
    public function login()
    {
        $rule = array(array('field' => 'username', 'label' => 'Username', 'rules' => 'trim|required|strip_tags'),
                      array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required|strip_tags'));
        
        $this->form_validation->set_rules($rule);
        if ($this->form_validation->run() == TRUE)
        {
            // check to see if the user is logging in
            // check for "remember me"
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'), $remember))
            {
                //if the login is successful redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect(site_url('adminweb'), 'refresh');
            }
            else
            {
                // if the login was un-successful redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect(site_url('adminweb/login'), 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
            }            
        }
        else
        {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        }
        $this->data['action'] = site_url('adminweb/login');
        $this->load->view('auth/auth_admin_v', $this->data);
    }
    
    public function logout()
    {
        $this->ion_auth->logout();
        redirect(site_url('adminweb/login')); 
    }
}

/* End of file auth.php */
/* Location: ./application/controllers/administrator/auth.php */