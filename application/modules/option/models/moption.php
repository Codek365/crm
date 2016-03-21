<?php
class Moption extends CI_Model{
	protected $_option = "option";
	protected $_option_description = "option_description";
	protected $_option_value = "option_value";
	protected $_option_value_description = "option_value_description";
	protected $_option_category = "option_category";
	protected $_option_class = "option_class";

	public function __construct() {
        parent::__construct();
    }
    public function getOption($start,$limit,$filter) {
    	$this->db->select($this->_option.'.option_id,'.$this->_option_description.'.name,'.$this->_option_class.'.name as class,'.$this->_option_category.'.name as category,sort_order');
    	if($limit != 0){
			$this->db->limit($limit, $start);
		}
		if(isset($filter['name'])){
			$this->db->like($this->_option_description.'.name',$filter['name']);
		}
		if(isset($filter['category']) && $filter['category'] != '*'){
			$this->db->like('category',$filter['category']);
		}
		if(isset($filter['class']) && $filter['class'] != '*'){
			$this->db->like('class',$filter['class']);
		}
		$this->db->join($this->_option_description,$this->_option_description.'.option_id='.$this->_option.'.option_id');
		$this->db->join($this->_option_category,$this->_option_category.'.option_category_id='.$this->_option.'.category');
		$this->db->join($this->_option_class,$this->_option_class.'.option_class_id='.$this->_option.'.class');
		$this->db->order_by($this->_option.'.option_id','DESC');
		$query = $this->db->get($this->_option);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
    }
    public function getTotalOption($filter){
    	$this->db->select($this->_option.'.option_id,'.$this->_option_description.'.name,'.$this->_option_class.'.name as class,'.$this->_option_category.'.name as category,sort_order');
		if(isset($filter['name'])){
			$this->db->like($this->_option_description.'.name',$filter['name']);
		}
		if(isset($filter['category']) && $filter['category'] != '*'){
			$this->db->like('category',$filter['category']);
		}
		if(isset($filter['class']) && $filter['class'] != '*'){
			$this->db->like('class',$filter['class']);
		}
		$this->db->join($this->_option_description,$this->_option_description.'.option_id='.$this->_option.'.option_id');
		$this->db->join($this->_option_category,$this->_option_category.'.option_category_id='.$this->_option.'.category');
		$this->db->join($this->_option_class,$this->_option_class.'.option_class_id='.$this->_option.'.class');
		return $this->db->count_all_results($this->_option);
	}
	public function insertOption($data){
		$this->db->insert($this->_option,$data);
		return $this->db->insert_id();
	}
	public function insertDesOption($data){
		$this->db->insert($this->_option_description,$data);
	}
	public function insertOptionVal($data){
		$this->db->insert($this->_option_value,$data);
		return $this->db->insert_id();
	}
	public function insertDesOptionVal($data){
		$this->db->insert($this->_option_value_description,$data);
	}
	public function deleteOption($id){
		$this->db->where('option_id', $id);
		$this->db->delete($this->_option);
		$this->db->where('option_id', $id);
		$this->db->delete($this->_option_description);
		$this->db->where('option_id', $id);
		$this->db->delete($this->_option_value);
		$this->db->where('option_id', $id);
		$this->db->delete($this->_option_value_description);
	}
	
	public function getOptionByID($id){
		$this->db->select($this->_option.'.option_id,'.$this->_option_description.'.name,'.$this->_option_class.'.option_class_id as class,'.$this->_option_category.'.option_category_id as category,sort_order');
		$this->db->join($this->_option_description,$this->_option_description.'.option_id='.$this->_option.'.option_id');
		$this->db->join($this->_option_category,$this->_option_category.'.option_category_id='.$this->_option.'.category');
		$this->db->join($this->_option_class,$this->_option_class.'.option_class_id='.$this->_option.'.class');
		$this->db->where($this->_option.'.option_id',$id);
		$query = $this->db->get($this->_option);
		if ($query->num_rows() > 0) {
            return $query->result_array()[0];
        }
        return false;
	}
	public function getOptionValueByID($id){
		$this->db->select($this->_option_value.'.option_value_id,'.$this->_option_value.'.option_id,'.$this->_option_value_description.'.name,'.',sort_order');
		$this->db->join($this->_option_value_description,$this->_option_value_description.'.option_value_id='.$this->_option_value.'.option_value_id');
		$this->db->where($this->_option_value.'.option_id',$id);
		$this->db->order_by($this->_option_value.'.sort_order','ASC');
		$query = $this->db->get($this->_option_value);
		if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
	}
	public function updateOption($id,$data_update){
		$this->db->where("option_id",$id);
		$this->db->update($this->_option,$data_update);
	}
	public function updateOptionDes($id,$data_update){
		$this->db->where("option_id",$id);
		$this->db->update($this->_option_description,$data_update);
	}
	public function getSearchOption($search_name){
		$this->db->like($this->_option_description.'.name',$search_name);
		$this->db->or_like($this->_option_category.'.name',$search_name);
		$this->db->or_like($this->_option_class.'.name',$search_name);
		$this->db->join($this->_option_description,$this->_option_description.'.option_id='.$this->_option.'.option_id');
		$this->db->join($this->_option_category,$this->_option_category.'.option_category_id='.$this->_option.'.category');
		$this->db->join($this->_option_class,$this->_option_class.'.option_class_id='.$this->_option.'.class');
		$this->db->order_by($this->_option.'.option_id','DESC');
		$query = $this->db->get($this->_option);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
	}
}
?>