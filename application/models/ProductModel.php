<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 9/5/2017
 * Time: 3:45 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class productModel extends CI_Model
{
	 public function __construct()
    {
        parent::__construct();
    }
	
	

/*****************************************COLOR*********************************************/
	
	public function get_color_list(){
        $query = $this->db->select('*')
            ->from('product_color')
            ->get()
            ->result_array();

        return $query;
    }
	
	public function add_color($name, $color_id, $created_date, $created_by, $color){
        $data = [
            'name' => $name,
            'product_color_id' => $color_id,
            'created_date' => $created_date,
			'created_by' => $created_by,
			'color' => $color
        ];
        if($this->db->insert('product_color',$data)){

            return true;
        }else{

            return false;
        }
    }
	
	public function update_color($name, $color_id, $updated_date, $updated_by, $color){
        $data = [
            'name' => $name,
            'product_color_id' => $color_id,
            'updated_date' => $updated_date,
			'updated_by' => $updated_by,
			'color' => $color
        ];
        if($this->db->insert('product_color',$data)){

            return true;
        }else{

            return false;
        }
    }
	
	
/*****************************************CATEGORY*********************************************/
	
	public function get_category_list(){
        $query = $this->db->select('*')
            ->from('product_category')
            ->get()
            ->result_array();

        return $query;
    }
	
	public function add_category($name, $category_id, $created_date, $created_by){
        $data = [
            'name' => $name,
            'product_category_id' => $category_id,
            'created_date' => $created_date,
			'created_by' => $created_by
        ];
        if($this->db->insert('product_category',$data)){

            return true;
        }else{

            return false;
        }
    }
	
	public function updated_category($name, $category_id, $updated_date, $updated_by){
        $data = [
            'name' => $name,
            'product_category_id' => $category_id,
            'updated_date' => $updated_date,
			'updated_by' => $updated_by
        ];
        if($this->db->insert('product_category',$data)){

            return true;
        }else{

            return false;
        }
    }
	
	
/*****************************************TYPE*********************************************/
	
	public function get_type_list(){
        $query = $this->db->select('*')
            ->from('product_type')
            ->get()
            ->result_array();

        return $query;
    }
	
	public function add_type($name, $type_id, $created_date, $created_by){
        $data = [
            'name' => $name,
            'product_type_id' => $type_id,
            'created_date' => $created_date,
			'created_by' => $created_by
        ];
        if($this->db->insert('product_type',$data)){

            return true;
        }else{

            return false;
        }
    }
	
	public function updated_type($name, $type_id, $updated_date, $updated_by){
        $data = [
            'name' => $name,
            'product_type_id' => $type_id,
            'updated_date' => $updated_date,
			'updated_by' => $updated_by
        ];
        if($this->db->insert('product_type',$data)){

            return true;
        }else{

            return false;
        }
    }	
	
/*****************************************GENDER*********************************************/
	
	public function get_gender_list(){
        $query = $this->db->select('*')
            ->from('product_gender')
            ->get()
            ->result_array();

        return $query;
    }
	
	public function add_gender($name, $gender_id, $created_date, $created_by){
        $data = [
            'name' => $name,
            'product_gender_id' => $gender_id,
            'created_date' => $created_date,
			'created_by' => $created_by
        ];
        if($this->db->insert('product_gender',$data)){

            return true;
        }else{

            return false;
        }
    }
	
	public function updated_gender($name, $gender_id, $updated_date, $updated_by){
        $data = [
            'name' => $name,
            'product_gender_id' => $gender_id,
            'updated_date' => $updated_date,
			'updated_by' => $updated_by
        ];
        if($this->db->insert('product_gender',$data)){

            return true;
        }else{

            return false;
        }
    }	
}