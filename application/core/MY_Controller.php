<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_Controller extends CI_Controller {

	function __construct()
    {
        parent::__construct();   
        $this->load->library('ion_auth');    
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('members'))        
        {
            redirect(site_url('member/login'), 'refresh');
        }
    }
}


class Admin_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();   
        $this->load->library('ion_auth');    
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())        
        {
           redirect(site_url('adminweb/login'), 'refresh');
        }
    }
}



class MY_Controller extends CI_Controller {

	function __construct()
    {
        parent::__construct();        
    }
}
/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */