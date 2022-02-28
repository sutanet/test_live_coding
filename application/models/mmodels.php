<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmodels extends CI_Model {
	
	function cek_login($table,$where){                              
        return $this->db->get_where($table,$where);
    }

	function fetch(){
	    $this->db->select("*", false);
	    $this->db->from('users');

	    $totalFilter = 0;
	    //FILTER BY COLUMN
	    $search = $this->input->get('columns');
	    foreach($search as $val){
	    	if($val['search']['value']){
	    		if($val['data'] == 'userid' || $val['data'] == 'status'){
	    			$this->db->where($val['data'], $val['search']['value']);
	    		}else{
	    			$this->db->like($val['data'], $val['search']['value']);
	    		}
	    		$totalFilter = 1;
	    	}
	    }

	    //FILTER BY GLOBAL
	    $searchAll = $this->input->get('search')['value'];

	    if($searchAll){
	        $this->db->like('nama', $searchAll);
	        $this->db->or_like('email', $searchAll);
	    }


	    //ORDER BY
	    if($this->input->get('dir')){
	        $this->db->order_by($this->input->get('dir'), $this->input->get('sort'));
	    }
	    
	    //PAGINATION
	    $start= $this->input->get('start') != '' ? (int)$this->input->get('start') : 1;
	    $length= $this->input->get('length') != '' ? (int)$this->input->get('length') : 2;
	    if($this->input->get('length') >= 0) $this->db->limit($length, $start);

	    $data = $this->db->get();    
	    // Total all data
	    $totalAll =  $this->db->from('users')->get()->num_rows();
	    // Total with filtering
	    $totalFiltered = $totalFilter == 0 ? $totalAll : $data->num_rows();


	    if($totalAll){
	        $grid = $data->result();

	        
	        return array('status' => true, 
	        			 'message' => 'data berhasil ditampilkan !', 
	        			 'total' => $totalAll, 
	        			 'total_filtered' => $totalFiltered,
	        			 'data' => $grid);
	    }
	    return array('status' => true, 'message' => 'data kosong', 'total' => 0, 'data' =>array());
	}
}