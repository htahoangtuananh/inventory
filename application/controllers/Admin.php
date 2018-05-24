<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 8/30/2017
 * Time: 4:24 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property adminModel $adminModel
 */

class Admin extends CI_Controller {

    public $section = "";
    public $user_id = "";
	public $epsilon = 0.01;
	public $permission = array(); 
	public $destination = '';
	
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('string');
        $this->load->helper('log');
		$this->load->helper('permission');
        $this->load->model('adminModel');
		date_default_timezone_set("Asia/Ho_Chi_Minh");
        if ($this->session->admin_logged_in) {
            $this->user_id = $this->session->id;
            $this->permission = $this->session->permission;
            if($this->session->is_sysAdmin == 0){
                $this->section = 'Admin';
                
            }else if($this->session->is_sysAdmin == 1){
                $this->section = 'SysAdmin';
            }
        }
        else{

            redirect('Authentication');
        }
		
    }

    public function index()
    {
        $lang = $this->session->site_lang;
        $dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
        $dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
        $this->load->view('header_CP');
        $this->load->view($this->section.'/CP',$dataLayout);
        $this->load->view('Admin/CP_index');
    }
	
	
    /**********************************************PRODUCT COLOR************************************************************/

	public function listProductColor(){
		$lang = $this->session->site_lang;
		$dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
		$dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
		$this->load->model('productModel');
        $data['color'] = $this->productModel->get_color_list();
        $this->load->view('header_CP');
        $this->load->view($this->section.'/CP', $dataLayout);
        $this->load->view('Admin/CP_listProductColor',$data);
	}
	
	public function addProductColor(){
		$post = $this->input->post();
		
		if(empty($post) || !is_array($post)){
				redirect('Admin/listProductColor');
		}
		
		$config = array(
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'color_id',
				'label' => 'color_id',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'color',
				'label' => 'color',
				'rules' => 'trim|required'
			),
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('danger',$this->lang->line('Error input please check your input before submitting'));
			redirect('Admin/listProductColor/');
		}
		
		$this->load->model('productModel');

		if ($this->productModel->add_color($post['name'], $post['color_id'], time(), $this->user_id, $post['color'])) {

			$this->session->set_flashdata('message', $this->lang->line('Successfully add new color'));
			logging($post, 'add', $this->session->username, 'product_color');
			redirect('Admin/listProductColor');
		} 
	}
	
	/**********************************************PRODUCT TYPE************************************************************/

	public function listProductType(){
		$lang = $this->session->site_lang;
		$dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
		$dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
		$this->load->model('productModel');
        $data['type'] = $this->productModel->get_type_list();
        $this->load->view('header_CP');
        $this->load->view($this->section.'/CP', $dataLayout);
        $this->load->view('Admin/CP_listProductType',$data);
	}
	
	public function addProductType(){
		$post = $this->input->post();
		
		if(empty($post) || !is_array($post)){
				redirect('Admin/listProductType');
		}
		
		$config = array(
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'type_id',
				'label' => 'type_id',
				'rules' => 'trim|required'
			),
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('danger',$this->lang->line('Error input please check your input before submitting'));
			redirect('Admin/listProductType/');
		}
		
		$this->load->model('productModel');

		if ($this->productModel->add_type($post['name'], $post['type_id'], time(), $this->user_id)) {

			$this->session->set_flashdata('message', $this->lang->line('Successfully add new type'));
			logging($post, 'add', $this->session->username, 'product_type');
			
			redirect('Admin/listProductType');
		} 
	}
	
	/**********************************************PRODUCT CATEGORY************************************************************/

	public function listProductCategory(){
		$lang = $this->session->site_lang;
		$dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
		$dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
		$this->load->model('productModel');
        $data['category'] = $this->productModel->get_category_list();
        $this->load->view('header_CP');
        $this->load->view($this->section.'/CP', $dataLayout);
        $this->load->view('Admin/CP_listProductCategory',$data);
	}
	
	public function addProductCategory(){
		$post = $this->input->post();
		
		if(empty($post) || !is_array($post)){
				redirect('Admin/listProductCategory');
		}
		
		$config = array(
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'category_id',
				'label' => 'category_id',
				'rules' => 'trim|required'
			),
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('danger',$this->lang->line('Error input please check your input before submitting'));
			redirect('Admin/listProductCategory/');
		}
		$this->load->model('productModel');
		
		if ($this->productModel->add_category($post['name'], $post['category_id'], time(), $this->user_id)) {

			$this->session->set_flashdata('message', $this->lang->line('Successfully add new category'));
			logging($post, 'add', $this->session->username, 'product_category');
			
			redirect('Admin/listProductCategory');
		} 
	}
	
	/**********************************************PRODUCT GENDER************************************************************/

	public function listProductGender(){
		$lang = $this->session->site_lang;
		$dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
		$dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
		$this->load->model('productModel');
        $data['gender'] = $this->productModel->get_gender_list();
        $this->load->view('header_CP');
        $this->load->view($this->section.'/CP', $dataLayout);
        $this->load->view('Admin/CP_listProductGender',$data);
	}
	
	public function addProductGender(){
		$post = $this->input->post();
		
		if(empty($post) || !is_array($post)){
				redirect('Admin/listProductGender');
		}
		
		$config = array(
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'gender_id',
				'label' => 'gender_id',
				'rules' => 'trim|required'
			),
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('danger',$this->lang->line('Error input please check your input before submitting'));
			redirect('Admin/listProductGender/');
		}
		$this->load->model('productModel');

		if ($this->productModel->add_gender($post['name'], $post['gender_id'], time(), $this->user_id)) {

			$this->session->set_flashdata('message', $this->lang->line('Successfully add new gender'));
			logging($post, 'add', $this->session->username, 'product_gender');
			
			redirect('Admin/listProductGender');
		} 
	}
    
	
	/*************************************************PRODUCT***************************************************************/

	public function listProduct(){
		$lang = $this->session->site_lang;
		$dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
		$dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
		$this->load->model('productModel');
        $data['product'] = $this->productModel->get_product_list();
        $this->load->view('header_CP');
        $this->load->view($this->section.'/CP', $dataLayout);
        $this->load->view('Admin/CP_listProduct',$data);
	}
	
	public function addProduct(){
		$post = $this->input->post();
		
		if(empty($post) || !is_array($post)){
				redirect('Admin/listProduct');
		}
		
		$config = array(
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'category_id',
				'label' => 'category_id',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'sheet_code',
				'label' => 'sheet_code',
				'rules' => 'trim'
			),
			array(
				'field' => 'type_id',
				'label' => 'type_id',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'gender_id',
				'label' => 'gender_id',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'size',
				'label' => 'size',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'price',
				'label' => 'price',
				'rules' => 'trim'
			)
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('danger',$this->lang->line('Error input please check your input before submitting'));
			redirect('Admin/listProduct/');
		}
		$this->load->model('productModel');

		if ($this->productModel->add_gender($post['name'], $post['gender_id'], time(), $this->user_id)) {

			$this->session->set_flashdata('message', $this->lang->line('Successfully add new gender'));
			logging($post, 'add', $this->session->username, 'product_gender');
			
			redirect('Admin/listProduct');
		} 
	}
	/*************************************************THEME***************************************************************/
	
	
	 public function listTheme(){
        $lang = $this->session->site_lang;
		$dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
		$dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
        $data['theme'] = $this->adminModel->get_theme_list();
        $this->load->view('header_CP');
        $this->load->view($this->section.'/CP', $dataLayout);
        $this->load->view('Admin/CP_listTheme',$data);
    }
	
	public function addTheme()
    {
		$post = $this->input->post();
			
		$config = array(
			array(
				'field' => 'name',
				'label' => 'name',
				'rules' => 'trim'
			),
			array(
				'field' => 'element',
				'label' => 'element',
				'rules' => 'trim|required'
			),
			array(
				'field' => 'color',
				'label' => 'color',
				'rules' => 'trim'
			),
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('danger',$this->lang->line('Error input please check your input before submitting'));
			redirect('Admin/listTheme/');
		}

		if ($this->adminModel->add_theme($post['name'], $post['element'], time(), $this->user_id, $post['color'], $post['custom_css'])) {

			$this->session->set_flashdata('message', $this->lang->line('Successfully add theme'));
			redirect('Admin/listTheme');
		}  
    }
	

	public function viewTheme($id)
    {
		if(!($this->input->post())) {
			$lang = $this->session->site_lang;
			$dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
			$dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
			$data['theme'] = $this->adminModel->get_theme_detail($id);
			$this->load->view('header_CP');
			$this->load->view($this->section.'/CP', $dataLayout);
			$this->load->view('Admin/CP_detailTheme', $data);
		}
		else{
			$post = $this->input->post();

			if(empty($post) || !is_array($post)){
				redirect('Admin/viewTheme/'.$id);
			}
			else{
				$config = array(
					array(
						'field' => 'name',
						'label' => 'name',
						'rules' => 'trim'
						),
						array(
						'field' => 'element',
						'label' => 'element',
						'rules' => 'trim|required'
					),
					array(
						'field' => 'color',
						'label' => 'color',
						'rules' => 'trim'
						),
				);
				$this->form_validation->set_rules($config);

				if ($this->form_validation->run() == FALSE)
				{
					$this->session->set_flashdata('danger',$this->lang->line('Error input please check your input before submitting'));
					redirect('Admin/viewTheme/'.$id);
				}

				if($this->adminModel->update_theme($id, $post['name'], $post['color'], $this->user_id, time(), $post['element'], $post['custom_css'])){

					$this->session->set_flashdata('message',$this->lang->line('Successfully update theme'));
					redirect('Admin/listTheme/');
				}
			}
		}
    }
	

    /*************************************************COMMON SECTION******************************************************/
    public function handleAjax(){
		
        $post = $this->input->post();
		
        $this->adminModel->handleAjax($post['id'],$post['table'],$post['enable']);
			
		$this->session->set_flashdata('message',$this->lang->line('Successfully enable'));
    }
	
	public function resizeImage($filename, $path){
		$lang = $this->session->site_lang;
		$dataLayout['branch'] = $this->adminModel->get_branch_list($lang);
		$dataLayout['node'] = $this->adminModel->get_enable_node_list($lang);
		$data['lang'] = $this->adminModel->get_lang_list();
		$data['filename'] = $filename;
		
		if(preg_match('/\.(png)$/i', $filename) != 0){
			$data['type'] = 'png';
		}else{
			$data['type'] = 'jpg';
		}
		$data['image'] = $path.'/'.$filename;
		
		$this->load->view('header_CP');
		$this->load->view($this->section.'/CP', $dataLayout);
		$this->load->view('Admin/CP_imageCrop',$data);
	}
	
	public function cropImage(){
		$post = $this->input->post();
		$targ_w = $post['w'];
		$targ_h = $post['h'];
		$type = $post['type'];
		$src = base_url().'assets/uploads/'.$post['image'];
		
		if($type == 'png'){
			$img_r = imagecreatefrompng($src);
		}else if($type == 'jpg'){
			$img_r = imagecreatefromjpeg($src); 
		}

		$dst_r = imagecrop($img_r, ['x' => $post['x'], 'y' => $post['y'], 'width' => $post['w'], 'height' => $post['h']]);
		
		if($dst_r){
			unlink('assets/uploads/'.$post['image']);
			if($type == 'png'){
				imagepng($dst_r, 'assets/uploads/'.$post['image'], 90);
			}
			else if($type == 'jpg'){
				imagejpeg($dst_r, 'assets/uploads/'.$post['image'], 90);
			}
			$this->session->set_flashdata('message',$this->lang->line('Successfully crop image'));
			
			redirect('Admin');
			
		}
		
		return false;	
	}
	
	public function noPermission(){
		$message_403 = $this->lang->line("You don't have access to the url you where trying to reach");
		show_error($message_403 , 403 );
	}
	
    /**
     * @return object
     */

}