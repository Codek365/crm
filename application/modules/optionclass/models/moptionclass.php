<?php
class Moptionclass extends CI_Model{
	protected $_option_class = "option_class";

	public function __construct() {
        parent::__construct();
    }
    public function getOptionClass($start,$limit,$filter) {
    	if($limit != 0){
			$this->db->limit($limit, $start);
		}
		if(isset($filter['name'])){
			$this->db->like('name',$filter['name']);
		}
		$this->db->order_by('option_class_id','DESC');
		$query = $this->db->get($this->_option_class);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
    }
    public function getTotalOptionClass($filter){
		if(isset($filter['name'])){
			$this->db->like('name',$filter['name']);
		}
		return $this->db->count_all_results($this->_option_class);
	}
	public function insertOptionClass($data){
		$this->db->insert($this->_option_class,$data);
		return $this->db->insert_id();
	}
	public function deleteOptionClass($id){
		$this->db->where('option_class_id', $id);
		$this->db->delete($this->_option_class);
	}
	public function getOptionClassByID($id){
		$this->db->where('option_class_id',$id);
		$query = $this->db->get($this->_option_class);
		if ($query->num_rows() > 0) {
            return $query->result_array()[0];
        }
        return false;
	}
	public function updateOptionClass($id,$data_update){
		$this->db->where("option_class_id",$id);
		$this->db->update($this->_option_class,$data_update);
	}
	public function getSearchOptionClass($search_name){
		$this->db->like('name',$search_name);
		$this->db->order_by('option_class_id','DESC');
		$query = $this->db->get($this->_option_class);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
	}
}
?>