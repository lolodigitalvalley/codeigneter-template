<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
                          
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->lang->load('auth');
    }
    
	public function index()
	{
        if (isset($_POST['submit']))
        {
            $rule = array (array ('field' => 'username', 'label' => 'Username', 'rules' => 'required|min_length[5]|max_length[20]'), //alpha_numeric|required|min_length[5]|max_length[20]
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
                    'company' => $this->input->post('company'),
                    'phone'   => $this->input->post('phone'),
                    'active'  => NULL
                );
                
                $result = $this->ion_auth->register($identity, $password, $email, $additional_data, $groups);
                if($result)
                {
                    $this->session->set_flashdata('success', 'Registrasi Berhasil Silahkan Menunggu Konfirmasi Aktivasi Akun');
                    redirect('register');
                }
                else{
                    $this->session->set_flashdata('error', 'Registrasi Gagal : '.$this->ion_auth->errors());
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
        else if ($this->ion_auth->is_admin())
        {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation)
        {
            // redirect them to the auth page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("adminweb/login", 'refresh');
        }
        else
        {
            // redirect them to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }
    
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */