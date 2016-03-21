<?php
    class M_Permission extends CI_Model{
        public function __construct(){
            parent::__construct();
//            $CI = &get_instance();
            $this->db = $this->load->database('db3', TRUE);
        }
        public function getEmail(){
            $this->db->select('email');
            $this->db->where('status',1);
            $results = $this->db->get('users');
            return $results->result();
        }
        public function getAllTableSystem(){
            $this->db->select('*');
            $this->db->where('status',1);
            $results = $this->db->get('email_system');
            return $results->result();
        }
        public function getInboxNew($table){
//            echo $_table;exit;
            $this->db->select('*');
            $this->db->where('read',1);
            $this->db->where('status',1);
            $results = $this->db->get($table);
            return $results->result();
        }
        public function getNameEmail($email){
            $this->db->select('name_display');
            $this->db->where('status',1);
            $this->db->where('email',$email);
            $results = $this->db->get('users');
            return $results->row();
        }
        public function getDetail($id,$table){
            $this->db->select('*');
            $this->db->where('id',$id);
            $results = $this->db->get($table);
            return $results->row();
        }
        public function getListEmailOuntBound(){
            $this->db->select('*');
            $results = $this->db->get('email_outbound');
            return $results->result();
        }
        public function insertEmailOutbound($data){
            $this->db->insert('email_outbound',$data);
        }
        public function getDescriptionEmail($id){
            $this->db->select('*');
            $this->db->where('id',$id);
            $results = $this->db->get('email_outbound');
            return $results->row();
        }
        public function updateEmailOutbound($id,$data){
            $this->db->where('id',$id);
            $this->db->update('email_outbound',$data);
        }
        public function deleteEmailOutbound($id){
            $this->db->where('id',$id);
            $this->db->delete('email_outbound');
        }
        public function getEmailSystem(){
            $this->db->select('*');
            $results = $this->db->get('email_system');
            return $results->result();

        }
        public function getUser($email){
            $this->db->select('*');
            $this->db->where('email',$email);
            $results = $this->db->get('users');
            return $results->row();
        }
        public function insertEmailSystem($value){
            $this->db->insert('email_system',$value);
        }
        public function updateEmailSystem($table,$data){
            $this->db->where('table',$table);
            $this->db->update('email_system',$data);
        }
        public function getEmailOutbound($id){
            $this->db->select('smtp_user');
            $this->db->where('id',$id);
            $results = $this->db->get('email_outbound');
            return $results->row();
        }
        public function deleteTableoutbound($table){
            $this->db->where('table','email_'.$table);
            $this->db->delete('email_system');
        }
        public function getAsignFrom($email){
            $this->db->select('*');
            $this->db->where('email_to',$email);
            $results = $this->db->get('email_asign_table');
            return $results->result();
        }
        public function getAsignTo($email){
            $this->db->select('*');
            $this->db->where('email_from',$email);
            $results = $this->db->get('email_asign_table');
            return $results->result();
        }
        public function getEmailFrom($email){
            $this->db->select('*');
            $this->db->or_where_not_in('email',$email);
            $results = $this->db->get('email_system');
            return $results->result();
        }
        public function deleteAsignFrom($email_assign_user,$email){

            $this->db->where('email_from',$email);
            $this->db->where('email_to',$email_assign_user);
            $this->db->delete('email_asign_table');
        }
        public function deleteAsignTo($email_assign_user,$_email){
//            echo $email_assign_user.'----'. $_email;exit;
            $this->db->where('email_to',$_email);
            $this->db->where('email_from',$email_assign_user);
            $this->db->delete('email_asign_table');
        }
        public function insertEmailFrom($data){
            $this->db->insert('email_asign_table',$data);
        }
        public function checkEmailValid($_email_from,$email_assign_user){
            $this->db->select('*');
            $this->db->where('email_from',$_email_from);
            $this->db->where('email_to',$email_assign_user);
            $returns = $this->db->get('email_asign_table');
            return $returns->row();
        }
        public function deleteUserEmail($email){
            $this->db->where('email',$email);
            $this->db->delete('email_system');
        }
        public function deleteUserAssign($email){
            $this->db->select('smtp_user');
            $this->db->where('email_form',$email);
            $this->db->or_where('email_form',$email);
            $this->db->delete('email_asign_table');
        }
    }
?>