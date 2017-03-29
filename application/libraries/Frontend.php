<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Frontend
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        //$this->ci->load->model(array('categories_model' => 'categories', 'collections_model' => 'collections', 'departments_model' => 'departments', 'subjects_model' => 'subjects'));
    }

    public function view($pages = 'dashboard_v', $data = null)
    {
        $folder = 'frontend/';

        $data['content'] = $this->ci->load->view($folder . 'contents/' . $pages, $data, true);
        $data['topnav']  = $this->ci->load->view($folder . 'topnav', $data, true);
        $data['sidebar'] = $this->ci->load->view($folder . 'sidebar', $data, true);
        $data['footer']  = $this->ci->load->view($folder . 'footer', $data, true);

        $this->ci->load->view($folder . 'templates', $data);
    }

}

/* End of file frontend.php */
/* Location: ./application/libraries/frontend.php */
