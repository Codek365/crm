<?php
class M_Timeline extends CI_Model{
    protected $_table = "schedule_new";
    public function __construct() {
        parent::__construct();
    }
    public function getSchedule(){
        $data = $this->_table.'.id,'.$this->_table.'.full_name_tour,time_line_new.call_time';
        $this->db->select($data);
        $this->db->join('time_line_new', 'time_line_new.schedule_id = '.$this->_table.'.id');
        $this->db->where('status',0);
        $this->db->order_by('call_time','ASC');
        $results = $this->db->get($this->_table);
        return $results->result();
    }
    public function getCountUser(){
        $this->db->select("id,name");
        $results = $this->db->get("users");
        return $results->result();
    }
    public function getCountById($user){
        $this->db->select("*");
        $this->db->group_by("user_process");
        $this->db->where('status',1);
        $this->db->where('user_process', $user);
        $this->db->from('schedule');
        return $this->db->count_all_results();
    }
    public function getTourNameById($id){
        $this->db->select("full_tour_name");
        $this->db->where('id',$id);
        $results = $this->db->get("schedule");
        return $results->result_array();
    }
    public function updateTourSchedule($id,$tour){
       $data = array(
               'user_process' => $id,
            );
        $this->db->where('id', $tour);
        $this->db->update($this->_table, $data);

    }
    public function insertLog($id,$content,$current){
        $data = array(
               'content' => $content,
               'date'   =>$current,
               'user_init' =>$this->session->userdata('user_id'),
               'user_process' =>$id,
            );
        $this->db->insert("log", $data);
    }
}
?>