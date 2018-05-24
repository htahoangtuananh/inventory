<?php
/**
 * Created by PhpStorm.
 * User: VCCORP
 * Date: 9/5/2017
 * Time: 3:45 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class adminModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function handleAjax($id, $table, $enable){
        $table_id = $table.'_id';
        $data = [
            'is_enable' => $enable
        ];
        $this->db->set($data)->where($table_id,$id)->update($table);
        return $this->db->insert_id();
    }
	
	public function can($permission){
        $query = $this->db->select('*')
				 ->from('branch')
				 ->where('permission_id',$permission)
				 ->get()
				 ->row_array();
				 
        if(count($query) > 0){
			
			return true;
		}
		else{
			
			return false;
		}
    }

    public function get_branch_list($lang){
        $query = $this->db->select('*')
            ->from('branch')
            ->where('branch.lang',$lang)
            ->get()
            ->result_array();

        return $query;
    }

    public function get_enable_node_list($lang){
        $query = $this->db->select('*')
            ->from('node')
            ->where('node.lang',$lang)
            ->where('node.is_enable',1)
            ->get()
            ->result_array();

        return $query;
    }

    public function get_lang_list(){
        $query = $this->db->select('*')
            ->from('language')
            ->get()
            ->result_array();

        return $query;
    }
	
	public function prefer_lang_admin($admin_id, $lang){
		$query = $this->db->select('*')
            ->from('admin')
			->where('admin_id', $admin_id)
			->where('prefer_lang', $lang)
            ->get()
            ->result_array();

        return $query;
	}
}
    