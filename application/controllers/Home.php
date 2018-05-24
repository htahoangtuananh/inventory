<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

	public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('pagination');
	   $this->load->library('form_validation');
	   $this->load->library('pagination');
	   $this->load->library('session');
	   $this->load->model('model');
    }

	public function index()
    {
		$news_config = $this->model->get_news_config();
        $limit_per_page = $news_config['limit_news'];
		
		$sidebar['theme'] = $this->model->get_theme();
		
		$sidebar['icon'] = $this->model->get_icon_top();
		$sidebar['nav'] = $this->model->get_nav();
		$sidebar['sub_nav'] = $this->model->get_sub_nav();
		
        $sidebar['sidebar'] = $this->model->get_sidebar();
		$data['primary'] = $this->model->get_news_school('primary_school');
		$data['secondary'] = $this->model->get_news_school('secondary_school');
		$data['highschool'] = $this->model->get_news_school('high_school');
		$data['news']= $this->model->get_news_home($limit_per_page);
		$data['notify']= $this->model->get_notify_home($limit_per_page);;
		$data['event']= $this->model->get_event_home($limit_per_page);;
		$data['program']= $this->model->get_program_home($limit_per_page);;
		$data['news_config'] = $news_config['overview_width'];
		
		$data['gallery'] = $this->model->get_gallery();
        $data['banner'] = $this->model->get_banner();
        $data['carousel'] = $this->model->get_carousel();
		$data['icon'] = $this->model->get_icon_top();
		$data['limit_news'] = $limit_per_page;
		
		$data['sponsor'] = $this->model->get_sponsor();
		$data['contact'] = $this->model->get_contact();
		$data['address'] = $this->model->get_contact_address();
		$data['facebook'] = $this->model->get_contact_facebook();
		$data['icon'] = $this->model->get_icon_footer();
        
        $this->load->view('header_new',$sidebar);
        $this->load->view('home_new',$data);
		
        $this->load->view('footer');
    }
	
	public function all()
    {
		$news_config = $this->model->get_news_config();
        $limit_per_page = $news_config['limit_news'];
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = count($this->model->get_total_news());
		$url = base_url().'home/all/';
		
        if ($total_records > 0) 
        {
            // get current page records
            $data["results"] = $this->model->get_all_current_page_records($limit_per_page, $start_index);
			
            $this->pagination->initialize(pagingConfig($url, $total_records, $limit_per_page));
             
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }

		$sidebar['icon'] = $this->model->get_icon_top();
		$sidebar['nav'] = $this->model->get_nav();
        $sidebar['sidebar'] = $this->model->get_sidebar(); 
		 
        $data['banner'] = $this->model->get_banner();
        $data['carousel'] = $this->model->get_carousel();
		$data['news_config'] = $news_config['overview_width'];
		$data['limit_news'] = $limit_per_page;
		$data['icon'] = $this->model->get_icon_top();
		
		$data['sponsor'] = $this->model->get_sponsor();
		$data['contact'] = $this->model->get_contact();
		$data['address'] = $this->model->get_contact_address();
		$data['facebook'] = $this->model->get_contact_facebook();
		$data['icon'] = $this->model->get_icon_footer();
        
        $this->load->view('header',$sidebar);
        $this->load->view('home_all',$data);
        $this->load->view('footer');
    }
}