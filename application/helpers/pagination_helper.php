<?php

function pagingConfig($url, $total_records, $limit_per_page) {
    $config['base_url'] = $url;
	$config['total_rows'] = $total_records;
	$config['per_page'] = $limit_per_page;
	$config["uri_segment"] = 3;
	$config['use_page_numbers'] = TRUE;
	$config['full_tag_open'] = '<div class="pagination">';
	$config['full_tag_close'] = '</div>';
	 
	$config['first_link'] = '<i class="fa fa-angle-double-left"> </i>';
	$config['first_tag_open'] = '<span class="btn btn-outline-secondary">';
	$config['first_tag_close'] = '</span>';
	 
	$config['last_link'] = '<i class="fa fa-angle-double-right"> </i>';
	$config['last_tag_open'] = '<span class="btn btn-outline-secondary">';
	$config['last_tag_close'] = '</span>';
	 
	$config['next_link'] = '<i class="fa fa-chevron-right"> </i>';
	$config['next_tag_open'] = '<span class="btn btn-outline-secondary">';
	$config['next_tag_close'] = '</span>';

	$config['prev_link'] = '<i class="fa fa-chevron-left"> </i>';
	$config['prev_tag_open'] = '<span class="btn btn-outline-secondary">';
	$config['prev_tag_close'] = '</span>';
	
	$config['cur_tag_open'] = '<span class="btn btn-outline-secondary">';
	$config['cur_tag_close'] = '</span>';

	$config['num_tag_open'] = '<span class="btn btn-outline-secondary">';
	$config['num_tag_close'] = '</span>';

    return $config;
}