<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends MY_Model
{
    public $table = 'categories';
    public $primary_key = 'id';
    
    public function __construct()
	{
		parent::__construct();
        //$this->has_many['posts'] = array('Posts_model','category_id','id');
	}

    public $rules = array ('insert'=>array('title' => array ('field' => 'title', 'label' => 'title', 'rules' => 'trim|required')),
                        'update'=>array('title' => array ('field' => 'title', 'label' => 'title', 'rules' => 'trim|required')));
}