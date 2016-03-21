<?php
    class Meals_Model extends CI_Model{
        public function insertData($receive_email,$data){
            $this->db->insert($receive_email,$data);
        }
        public function insertAttach($arr){
            $this->db->insert('email_attach_file',$arr);
        }
        public function getAllTable(){
            $this->db->select('*');
            $this->db->where('status',1);
            $results = $this->db->get('email_system');
            return $results->result();
        }
        public function getEmailHistory($db_table,$email){
            $this->db->select('email_to,date');
            $this->db->where('email_to',$email);
            $this->db->limit(1);
            $this->db->order_by('date','DESC');
            $results = $this->db->get($db_table);
            return $results->row();
        }
        public function getEmailSystem($exp_table){
            $this->db->select('email');
            $this->db->where('status',1);
            $this->db->where('table',$exp_table);
            $results = $this->db->get('email_system');
            return $results->row();
        }
        public function CheckAssignTo($email){
            $this->db->select('*');
            $this->db->where('email_from',$email);
            $results = $this->db->get('email_asign_table');
            return $results->row();
        }
        public function getTableSystem($email){
            $this->db->select('*');
            $this->db->where('email',$email);
            $results = $this->db->get('email_system');
            return $results->row();
        }
        public function getEmailOutbound(){
            $this->db->select('*');
            $this->db->where('status',1);
            $results = $this->db->get('email_outbound');
            return $results->result();
        }
        public function getEmailSytem($email){
            $this->db->select('table');
            $this->db->where('email',$email);
            $results = $this->db->get('email_system');
            return $results->row();
        }
        public function getEmailSend($from_email){
            $this->db->where('to',$from_email);
            $result = $this->db->get('email_filter');
            return $result->row();
        }
    }
?>