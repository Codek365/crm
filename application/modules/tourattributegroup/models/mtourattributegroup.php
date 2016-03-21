<?php
class Mtourattributegroup extends CI_Model{
	protected $_attribute_group = "attribute_group";
	protected $_attribute_group_description = "attribute_group_description";

	public function __construct() {
        parent::__construct();
    }
    public function getTourAttributeGroup($start,$limit,$filter) {
    	$this->db->select($this->_attribute_group.'.attribute_group_id,name,sort_order');
    	if($limit != 0){
			$this->db->limit($limit, $start);
		}
		if(isset($filter['name'])){
			$this->db->like($this->_attribute_group_description.'.name',$filter['name']);
		}
		$this->db->join($this->_attribute_group_description,$this->_attribute_group.'.attribute_group_id='.$this->_attribute_group_description.'.attribute_group_id');
		$this->db->order_by($this->_attribute_group.'.attribute_group_id','DESC');
		$query = $this->db->get($this->_attribute_group);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
    }
    public function getTotalTourAttributeGroup($filter){
		if(isset($filter['name'])){
			$this->db->like($this->_attribute_group_description.'.name',$filter['name']);
		}
		$this->db->join($this->_attribute_group_description,$this->_attribute_group.'.attribute_group_id='.$this->_attribute_group_description.'.attribute_group_id');
		return $this->db->count_all_results($this->_attribute_group);
	}
	public function insertTourAttributeGroup($data){
		$this->db->insert($this->_attribute_group,$data);
		return $this->db->insert_id();
	}
	public function insertTourAttributeGroupDescription($data){
		$this->db->insert($this->_attribute_group_description,$data);
		return $this->db->insert_id();
	}
	public function deleteTourAttributeGroup($id){
		/*xóa tour trong bảng tour Attribute Group*/
		$this->db->where('attribute_group_id', $id);
		$this->db->delete($this->_attribute_group);
		/*xóa giá tour liên quan*/
		$this->db->where('attribute_group_id',$id);
		$this->db->delete($this->_attribute_group_description);
	}
	public function getTourAttributeGroupByID($id){
		$this->db->where($this->_attribute_group.'.attribute_group_id',$id);
		$this->db->join($this->_attribute_group_description,$this->_attribute_group.'.attribute_group_id='.$this->_attribute_group_description.'.attribute_group_id');
		$query = $this->db->get($this->_attribute_group);
		if ($query->num_rows() > 0) {
            return $query->result_array()[0];
        }
        return false;
	}
	public function updateTourAttributeGroup($id,$data_update){
		$this->db->where("attribute_group_id",$id);
		$this->db->update($this->_attribute_group,$data_update);
	}
	public function updateTourAttributeGroupDescription($id,$data_update){
		$this->db->where("attribute_group_id",$id);
		$this->db->update($this->_attribute_group_description,$data_update);
	}
	public function getTourSearch($search_name){
		$this->db->like('name',$search_name);
		$this->db->join($this->_attribute_group_description,$this->_attribute_group.'.attribute_group_id='.$this->_attribute_group_description.'.attribute_group_id');
		$this->db->order_by($this->_attribute_group.'.attribute_group_id','DESC');
		$query = $this->db->get($this->_attribute_group);
		if($query->num_rows() > 0){
			return $query->result_array();
		}
        return false;
	}
}
?>