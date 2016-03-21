<?php
class Msms extends CI_Model{
	protected $_tablecontent = "smscontent";
	protected $_tablesetting = "smssetting";

	public function __construct() {
        parent::__construct();
    }
	public function getSMS($start,$limit,$filter) {
		if($limit != 0){
			$this->db->limit($limit, $start);
		}
		if(isset($filter['namekh'])){
			$this->db->like('namekh',$filter['namekh']);
		}
		if(isset($filter['contentsms'])){
			$this->db->like('contentsms',$filter['contentsms']);
		}
		if(isset($filter['sendtime'])){
			$this->db->like('sendtime',$filter['sendtime']);
		}
		if(isset($filter['viewtime'])){
			$this->db->like('clicktime',$filter['viewtime']);
		}
		if(isset($filter['click'])){
			$this->db->like('view',$filter['click']);
		}
		$this->db->order_by('smsid','DESC');
        $query = $this->db->get($this->_tablecontent); 
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
	}
	public function getTotalSMS($filter){
		if(isset($filter['namekh'])){
			$this->db->like('namekh',$filter['namekh']);
		}
		if(isset($filter['contentsms'])){
			$this->db->like('contentsms',$filter['contentsms']);
		}
		if(isset($filter['sendtime'])){
			$this->db->like('sendtime',$filter['sendtime']);
		}
		if(isset($filter['viewtime'])){
			$this->db->like('clicktime',$filter['viewtime']);
		}
		if(isset($filter['click'])){
			$this->db->like('view',$filter['click']);
		}
		return $this->db->count_all_results($this->_tablecontent);
	}
	public function getSearchSMS($search){
		$this->db->like('namekh',$search);
		$this->db->or_like('contentsms',$search);
		$this->db->order_by('smsid','DESC');
        $query = $this->db->get($this->_tablecontent); 
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
	}
	public function deleteSms($smss_id) {
		$this->db->where('smsid', $smss_id);
		$this->db->delete($this->_tablecontent);
	}
	public function getSMSSetting(){
		$query = $this->db->get($this->_tablesetting);
		if($query->num_rows() > 0){
			return $query->result_array()[0];
		}
		return false;
	}
	public function insertSMSSetting($data){
		$this->db->empty_table($this->_tablesetting);
		$this->db->insert($this->_tablesetting, $data); 
	}
}