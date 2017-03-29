<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Categories extends Admin_Controller
{

    protected $page_header = 'Categories';
    protected $status      = array(0 => 'Draft', 1 => 'Published');
    protected $module      = '';
    protected $url         = array();

    public function __construct()
    {
        parent::__construct();

        $this->module = 'adminweb/categories/';
        $this->url    = array(
            'view'   => $this->module . 'view/',
            'add'    => $this->module . 'add/',
            'update' => $this->module . 'update/',
            'delete' => $this->module . 'delete/',
            'status' => $this->module . 'status/',
            'print'  => $this->module . 'print/',
        );

        $this->load->model('categories_model', 'categories');
    }

    public function index()
    {
        $query = $this->categories->get_all();

        set_table(false);

        $this->table->set_heading('Action', 'Title',
            array('data' => 'Created By', 'width' => '150px', 'class' => 'text-center'),
            array('data' => 'Created At', 'width' => '120px', 'class' => 'text-center'));

        if ($query) {
            foreach ($query as $row) {
                $action = array('data' => button_circle('view', site_url($this->url['view'] . $row->id)) . '&nbsp; ' .
                    button_circle('edit', site_url($this->url['update'] . $row->id)) . '&nbsp; ' .
                    button_circle('delete', site_url($this->url['delete'] . $row->id)),
                    'width'                => '155px',
                    'align'                => 'center',
                );

                $user = $this->ion_auth->select('name')->user((int) $row->user_id)->row();
                $user = !empty($user) ? $user->name : '';

                $this->table->add_row($action, $row->title,
                    array('data' => $user, 'class' => 'text-center'),
                    array('data' => $this->date_lib->tgl_indo($row->created_at, 'd/m/Y') . br(1) . anchor(site_url($this->url['status'] . $row->id), $this->status[$row->status], array('class' => 'btn btn-warning btn-xs', 'title' => 'Status')),
                        'class'      => 'text-center')
                );
            }
        }
        $data['table'] = $this->table->generate();

        $data['page_header']   = $this->page_header;
        $data['panel_heading'] = button_square('add', site_url($this->url['add']), 'Add Category') . '&nbsp; ';
        $data['page']          = 'list';
        $this->backend->view('categories_v', $data);
    }

    public function view($id = null)
    {
        $query = $this->categories->where('id', $id)->get();
        if ($query) {
            $data['title']       = $query->title;
            $data['description'] = $query->description;
            $data['status']      = $this->status[$query->status];
            $data['created_at']  = $this->date_lib->tgl_indo($query->created_at);
            $data['updated_at']  = $this->date_lib->tgl_indo($query->updated_at);
        }

        $data['page_header']   = $this->page_header;
        $data['panel_heading'] = anchor(site_url($this->module), 'Categories') . ' / Category View';
        $this->backend->view('categories_v', $data);
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            $rule = array(array('field' => 'title', 'label' => 'Title', 'rules' => 'trim|required|max_length[100]|is_unique[categories.title]'));

            $this->form_validation->set_rules($rule);
            if ($this->form_validation->run() == true) {
                $row = array('title' => $this->input->post('title'),
                    'permalink'          => strtolower(url_title($this->input->post('title'))),
                    'description'        => $this->input->post('description'),
                    'user_id'            => $this->session->userdata('user_id'),
                    'status'             => $this->input->post('status'));

                $result = $this->categories->insert($row);
                if ($result) {
                    $this->session->set_flashdata('success', 'Success Insert Data');
                    redirect(site_url($this->module));
                }
            }
            $data = array('title' => $this->input->post('title'), 'description' => $this->input->post('description'), 'status' => $this->input->post('status'));
        }

        $data['statuses']      = $this->status;
        $data['action']        = $this->url['add'];
        $data['page_header']   = $this->page_header;
        $data['panel_heading'] = anchor(site_url($this->module), 'Categories') . ' / Category Add';
        $this->backend->view('categories_v', $data);
    }

    public function update($id = null)
    {
        if (isset($_POST['submit'])) {
            $rule = array(array('field' => 'id', 'label' => 'Primary Key', 'rules' => 'trim|required|max_length[100]'),
                array('field' => 'title', 'label' => 'Title', 'rules' => 'trim|required|max_length[100]'));

            $this->form_validation->set_rules($rule);
            if ($this->form_validation->run() == true) {
                $id  = $this->input->post('id');
                $row = array('title' => $this->input->post('title'),
                    'permalink'          => strtolower(url_title($this->input->post('title'))),
                    'description'        => $this->input->post('description'),
                    'user_id'            => $this->session->userdata('user_id'),
                    'status'             => $this->input->post('status'));

                $result = $this->categories->update($row, $id);
                if ($result) {
                    $this->session->set_flashdata('success', 'Success Update Data');
                    redirect(site_url($this->module));
                }
            }
        }

        $query = $this->categories->where('id', $id)->get();
        if ($query) {
            $data['id']          = $query->id;
            $data['title']       = $query->title;
            $data['description'] = $query->description;
            $data['status']      = $query->status;
        }
        $data['statuses']      = $this->status;
        $data['action']        = $this->url['update'];
        $data['page_header']   = $this->page_header;
        $data['panel_heading'] = anchor(site_url($this->module), 'Categories') . ' / Category Update';
        $this->backend->view('categories_v', $data);
    }

    public function status($id = null)
    {
        if ($id != null) {
            $query  = $this->categories->fields('status')->where('id', $id)->get();
            $row    = ($query->status == 0) ? array('status' => 1) : array('status' => 0);
            $result = $this->categories->update($row, $id);
            if ($result) {
                $this->session->set_flashdata('success', 'Success Update Data');
                redirect(site_url($this->module));
            }
        }
        $this->session->set_flashdata('error', 'Error Update Data');
        redirect(site_url($this->module));
    }

    public function delete($id = null)
    {
        if ($id != null) {
            $this->load->model('posts_model', 'posts');
            $query = $this->collections->fields('id')->where('category_id', $id)->get();
            if ($query) {
                $this->collections->where('category_id', $id)->update(array('category_id' => 1));
            }

            $result = $this->categories->delete($id);
            if ($result) {
                $this->session->set_flashdata('success', 'Success Delete Data');
                redirect(site_url($this->module));
            }
        }
        $this->session->set_flashdata('error', 'Error Delete Data');
        redirect(site_url($this->module));
    }
}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */
