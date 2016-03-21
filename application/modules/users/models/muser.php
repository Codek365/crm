<?php
class Muser extends CI_Model{
	protected $_table = "users";

	public function getall($start,$limit,$filter){
		$this->db->select($this->_table.'.user_id,username,namegroup');
		$this->db->join('usergroup','users.group_id=usergroup.id','left');
		if($limit != 0){
			$this->db->limit($limit, $start);
		}
		if(isset($filter['name'])){
			$this->db->like('username',$filter['name']);
		}
		if(isset($filter['group'])){
			$this->db->like('namegroup',$filter['group']);
		}
		$this->db->order_by($this->_table.'.user_id','DESC');
		$query = $this->db->get($this->_table); 
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
	}
	public function getTotalUsers($filter){
		if(isset($filter['name'])){
			$this->db->like('username',$filter['name']);
		}
		if(isset($filter['group'])){
			$this->db->like('namegroup',$filter['group']);
		}
		$this->db->join('usergroup','users.group_id=usergroup.id','left');
		return $this->db->count_all_results($this->_table);
	}
	public function getUserbyId($id){
		$this->db->where("user_id",$id);
		return $this->db->get($this->_table)->result_array();
	}
	public function insertUser($data_insert){
		$this->db->insert($this->_table,$data_insert);
		return $this->db->insert_id();
	}
	public function deleteUser($id){
		$this->db->where("user_id",$id);
		$this->db->delete($this->_table);
	}
	public function updateUser($id,$data_update){
		$this->db->where("user_id",$id);
		$this->db->update($this->_table,$data_update);
	}
	public function UpdateUserGroup($group_id,$data_update){
		$this->db->where("group_id",$group_id);
		$this->db->update($this->_table,$data_update);
	}
	public function checkUsername($user,$id=""){
		if($id != ""){
			$this->db->where("user_id !=",$id);
		}
		$this->db->where("username",$user);
		$query=$this->db->get($this->_table);
		if($query->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function getSearchUsers($search){
		$this->db->select($this->_table.'.user_id,username,namegroup');
		$this->db->like('username',$search);
		$this->db->order_by('user_id','DESC');
		$this->db->join('usergroup','users.group_id=usergroup.id','left');
        $query = $this->db->get($this->_table); 
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
	}
    public function insertEmailSystem($value){
        $this->db->insert('email_system',$value);
    }
}