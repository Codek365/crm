<?php
class MuserGroup extends CI_Model{
	protected $_table = "usergroup";
	public function getall($start,$limit,$filter){
		if($limit != 0){
			$this->db->limit($limit, $start);
		}
		if(isset($filter['namegroup'])){
			$this->db->like('namegroup',$filter['namegroup']);
		}
		$this->db->order_by('id','DESC');
        $query = $this->db->get($this->_table); 
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
	}
	public function getTotalUserGroup($filter){
		if(isset($filter['namegroup'])){
			$this->db->like('namegroup',$filter['namegroup']);
		}
		return $this->db->count_all_results($this->_table);
	}
	public function getSearchUserGroup($search){
		$this->db->like('namegroup',$search);
		$this->db->order_by('id','DESC');
        $query = $this->db->get($this->_table); 
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
	}
	public function getgroupbyId($id){
		$this->db->where("id",$id);
		return $this->db->get($this->_table)->result_array();
	}
	public function insertgroup($data_insert){
		$this->db->insert($this->_table,$data_insert);
		return $this->db->insert_id();
	}
	public function deletegroup($id){
		$this->db->where("id",$id);
		$this->db->delete($this->_table);
	}
	public function checkname($groupname,$id=""){
		if($id != ""){
			$this->db->where("id !=",$id);
		}
		$this->db->where("namegroup",$groupname);
		$query=$this->db->get($this->_table);
		if($query->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}
}