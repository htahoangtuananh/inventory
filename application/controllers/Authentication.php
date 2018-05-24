<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 8/30/2017
 * Time: 3:10 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @property CI_Session $session
 * @property CI_Input $input
 */
class Authentication extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('authenticationModel');
        if ($this->session->admin_logged_in) {
            if($this->session->is_sysAdmin == 0){
                $this->section = 'Admin';
                redirect('Admin');
            }else if($this->session->is_sysAdmin == 1){
                $this->section = 'SysAdmin';
                redirect('SysAdmin');
            }
        }
    }

    public function index(){
        $this->load->view('header');
        $this->load->view('Authenticate/login');
    }

    public function login_admin()
    {
        if( $this->session->admin_logged_in == TRUE ){
            if($this->session->role=="admin"||$this->session->role=="gadmin"){
                $data['name']=$this->session->username;
                redirect('Admin');
            }
        }
        $post  = $this->input->post();

        if ( ! is_array($post) || empty($post))
        {
            redirect('Authenticate/index');
        }
        $config = array(
            array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'trim|required|min_length[5]',
                'errors' => array(
                    'min_length' => 'Password phai nhieu hon 5 kí tu'
                ))
        );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE)
        {
            redirect('Authenticate/index');
        }
        $username = $post['username'];
        $pass = $post['password'];
        $bool=$this->authenticationModel->validate_admin($username,$pass);
		$permission = array();
		
        if(isset($bool)){
            $session_data = array(
                'id' => $bool['admin_id'],
                'username' =>$bool['username'],
                'admin_logged_in'=>TRUE,
                'is_sysAdmin' => $bool['is_sysAdmin'],
                'site_lang' => empty($bool['prefer_lang'])? 'eng' : $bool['prefer_lang']
            );
            $this->session->set_userdata($session_data);
            $this->session->set_flashdata('success','login success');
			$result = $this->authenticationModel->get_admin_permission($bool['admin_id']);
			
			foreach($result as $results){
				$permission[] = $results['permission_id'];
			}
			
			$this->session->set_userdata('permission', array_merge($permission));
        }
		
        redirect('SysAdmin');
    }
}