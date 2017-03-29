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
                redirect(site_url('member'));
            }
            else
            {
                // if the login was un-successful redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('member/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
            }            
        }
        else
        {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        }

        $this->data['register'] = anchor(site_url('member/register'), 'Register', array('class'=>'pull-right'));
        $this->data['action']   = site_url('member/login');
        $this->load->view('auth/auth_v', $this->data);
    }
    
    public function logout()
    {
        $this->ion_auth->logout();
        redirect(site_url('member/login')); 
    }

    public function register()
    {
        if (isset($_POST['submit']))
        {
            $rule = array (array ('field' => 'username', 'label' => 'Username', 'rules' => 'alpha_numeric|required|min_length[5]|max_length[20]'),
                           array ('field' => 'password', 'label' => 'Password', 'rules' => 'alpha_numeric|required'),
                           array ('field' => 'repassword', 'label' => 'Retype Password', 'rules' => 'alpha_numeric|required|matches[password]'),
                           array ('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'));
                            
            $this->form_validation->set_rules($rule);
            
            if ($this->form_validation->run() == TRUE) 
            {
                $identity_column = $this->config->item('identity','ion_auth');

                $email    = strtolower($this->input->post('email'));
                $identity = ($identity_column==='email') ? $email : $this->input->post('username');
                $password = $this->input->post('password');
                $groups   = array('2');
                //$group    = is_array($group) ? $group : array($group);

                $additional_data = array(
                    'name' => $this->input->post('name'),
                    'company'    => $this->input->post('company'),
                    'phone'      => $this->input->post('phone'),
                    'active'     => NULL
                );
                
                $result = $this->ion_auth->register($identity, $password, $email, $additional_data, $groups);
                if($result)
                {
                    $this->ion_auth->set_message_delimiters('<p><strong>','</strong></p>');
                    $this->session->set_flashdata('success', $this->ion_auth->messages().' Registrasi Berhasil Silahkan Menunggu Konfirmasi Aktivasi Akun');
                    redirect('member/register');
                }
                else
                {
                    $this->ion_auth->set_error_delimiters('<p><strong>','</strong></p>');
                    $this->session->set_flashdata('error', $this->ion_auth->errors().' Registrasi Gagal');
                }
            }
            else
            {
                $data['username'] = $this->input->post('username');
                $data['name']     = $this->input->post('name'); 
                $data['email']    = $this->input->post('email');
                $data['company']  = $this->input->post('company');
                $data['phone']    = $this->input->post('phone');
            }
          
        }

        $data['action']   = site_url('member/register');
        $this->load->view('auth/register_v', $data);
    }

    // activate the user
    function activate($id, $code=false)
    {
        if ($code !== false)
        {
            $activation = $this->ion_auth->activate($id, $code);
        }

        if ($activation)
        {
            // redirect them to the auth page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("member/login", 'refresh');
        }
        else
        {
            // redirect them to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("member/register", 'refresh');
        }
    }
}

/* End of file auth.php */
/* Location: ./application/controllers/backend/member/auth.php */