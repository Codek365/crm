<?php
class Moptioncategory extends CI_Model{
	protected $_option_category = "option_category";

	public function __construct() {
        parent::__construct();
    }
    public function getOptionCategory($start,$limit,$filter) {
    	if($limit != 0){
			$this->db->limit($limit, $start);
		}
		if(isset($filter['name'])){
			$this->db->like('name',$filter['name']);
		}
		if(isset($filter['date_start'])){
			$this->db->like('date_start',$filter['date_start']);
		}
		if(isset($filter['date_end'])){
			$this->db->like('date_end',$filter['date_end']);
		}
		if(isset($filter['status'])){
			$this->db->like('status',$filter['status']);
		}
		$this->db->order_by('option_category_id','DESC');
		$query = $this->db->get($this->_option_category);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
    }
    public function getTotalOptionCategory($filter){
		if(isset($filter['name'])){
			$this->db->like('name',$filter['name']);
		}
		if(isset($filter['date_start'])){
			$this->db->like('date_start',$filter['date_start']);
		}
		if(isset($filter['date_end'])){
			$this->db->like('date_end',$filter['date_end']);
		}
		if(isset($filter['status'])){
			$this->db->like('status',$filter['status']);
		}
		return $this->db->count_all_results($this->_option_category);
	}
	public function insertOptionCategory($data){
		$this->db->insert($this->_option_category,$data);
		return $this->db->insert_id();
	}
	public function deleteOptionCategory($id){
		$this->db->where('option_category_id', $id);
		$this->db->delete($this->_option_category);
	}
	public function getOptionCategoryByID($id){
		$this->db->where('option_category_id',$id);
		$query = $this->db->get($this->_option_category);
		if ($query->num_rows() > 0) {
            return $query->result_array()[0];
        }
        return false;
	}
	public function updateOptionCategory($id,$data_update){
		$this->db->where("option_category_id",$id);
		$this->db->update($this->_option_category,$data_update);
	}
	public function getSearchOptionCategory($search_name){
		$this->db->like('name',$search_name);
		$this->db->order_by('option_category_id','DESC');
		$query = $this->db->get($this->_option_category);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
	}
}
?>