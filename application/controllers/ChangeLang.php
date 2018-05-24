<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 3/22/2018
 * Time: 3:34 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class ChangeLang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('AdminModel');
    }

    public function change()
    {
        $post = $this->input->post();
        $lang = $post['lang'];

        if ($this->session->admin_logged_in) {
            $user_id = $this->session->id;
            $this->AdminModel->prefer_lang_admin($user_id,$lang);
        }

        $this->session->set_userdata('site_lang',$lang);
    }
}