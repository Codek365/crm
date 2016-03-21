<?php
    class M_Checkemail extends CI_Model{
        public function __construct(){
            parent::__construct();
            $CI = &get_instance();
            $this->db = $CI->load->database('db3', TRUE);
        }
        public function getUser($user_id){
            $this->db->select('email');
            $this->db->where('user_id',$user_id);
            $results = $this->db->get('users');
            return $results->row();
        }
        public function getListEmailSystem(){
            $this->db->select('*');
            $this->db->where('status',1);
            $this->db->order_by('email','DASC');
            $results = $this->db->get('email_system');
            return $results->result();
        }
        public function getListEmailSystemUser(){
            $this->db->select('*');
            $this->db->where('status',1);
            $this->db->where('user_id',$this->session->userdata('user_id'));
            $this->db->order_by('email','DASC');
            $results = $this->db->get('email_system');
            return $results->result();
        }
        public function getEmailoutbound(){
            $this->db->select('*');
            $this->db->where('status',1);
            $results = $this->db->get('email_outbound');
            return $results->result();
        }
        public function getListEmail($table,$from,$to,$value){
            $this->db->select('*');
            $this->db->where('status',1);
            $this->db->where('transfer',$value);
            $this->db->order_by('date','DESC');
            $this->db->limit($to,$from);
            $results = $this->db->get($table);
            return $results->result();
        }
        public function getListEmailDraft($table,$from,$to,$value){
            $this->db->select('*');
            $this->db->where('status',1);
            $this->db->where('table',$table);
            $this->db->where('transfer',$value);
            $this->db->order_by('date','DESC');
            $this->db->limit($to,$from);
            $results = $this->db->get('email_draft');
            return $results->result();
        }
        public function getEmailUser($user_id){
            $this->db->select('email');
            $this->db->where('user_id',$user_id);
            $results = $this->db->get('users');
            return $results->row();
        }
//        public function getDescriptionEmail($id,$table){
//            $this->db->select('*');
//            $this->db->where('id',$id);
//            $results = $this->db->get($table);
//            return $results->row();
//        }
        public function updateEmail($id,$value,$table){
            $this->db->where('id',$id);
            $this->db->update($table,$value);
        }
        public function getTableUser($email){
            $this->db->select('table');
            $this->db->where('email',$email);
            $results = $this->db->get('email_system');
            return $results->row();
        }
        public function getEmailListAuto($table){
            $this->db->select('email_to');
            $results = $this->db->get($table);
            return $results->result();
        }
        public function getRowIdDraft(){
            $this->db->select('id');
            $this->db->order_by('id','DESC');
            $this->db->limit(1);
            $results = $this->db->get('email_draft');
            return $results->row();
        }
        public function deleteDraftSend($row_id){
            $this->db->where('row_id',$row_id);
            $this->db->delete('email_draft');
        }
        public function getEmailSendInfo($email){
            $this->db->select('*');
            $this->db->where('smtp_user',$email);
            $this->db->where('status',1);
            $results = $this->db->get('email_outbound');
            return $results->row();
        }
        public function deleteEmailFilter($email){
            $this->db->where('to',$email);
            $this->db->delete('email_filter');
        }
        public function inserEmailfilter($filter_data){
            $this->db->insert('email_filter',$filter_data);
        }
        public function getUserInfo($user_id){
            $this->db->select('*');
            $this->db->where('user_id',$user_id);
            $results = $this->db->get('users');
            return $results->row();
        }
        public function insertEmailHistory($table,$arr){
            $this->db->insert($table,$arr);
        }
        public function getRowDraft($row_id){
            $this->db->select('*');
            $this->db->where('row_id',$row_id);
            $results = $this->db->get('email_draft');
            return $results->row();
        }
        public function deleteDraft($row_id){
            $this->db->where('row_id',$row_id);
            $this->db->delete('email_draft');
        }
        public function InsertDraft($arr){
            $this->db->insert('email_draft',$arr);
        }
        public function getListDraft($table){
            $this->db->select('*');
            $this->db->where('table',$table);
            $this->db->order_by('id','DESC');
            $results = $this->db->get('email_draft');
            return $results->result();
        }
        public function getDescriptionDraft($row_id){
//            echo $row_id;exit;
            $this->db->select('*');
            $this->db->where('row_id',$row_id);
            $results = $this->db->get('email_draft');
            return $results->row();
        }
        public function getListRecycle($table){
            $this->db->select('*');
            $this->db->where('table',$table);
            $results = $this->db->get('email_recycle');
            return $results->result();
        }
        public function getInboxRecycle(){
            $table = $_POST['table'].'_receive_inbox';
            $this->db->select('*');
            $this->db->where('status',1);
            $results = $this->db->get($table);
            return $results->result();
        }
        public function getEmailDescription($id,$tail,$table){
            $this->db->select('*');
            $this->db->where('id', $id);
            $this->db->where('transfer',$tail);
            $results = $this->db->get($table);
            return $results->row();
        }
        public function updateReadEmail($id,$table,$read){
            $this->db->where('id', $id);
            $this->db->update($table,$read);
        }
        public function moveEmailUpdate($id, $table,$data){
            $this->db->where('id',$id);
            $this->db->update($table,$data);
        }
        public function deleteEmail($id,$table){
            $this->db->where('id',$id);
            $this->db->delete($table);
        }
        public function countEmail($table,$value){
            $this->db->select('id');
            $this->db->where('transfer',$value);
            $results = $this->db->get($table);
            return $results->result();
        }
        public function getSigned($user_id){
            $this->db->select('*');
            $this->db->where('user_id',$user_id);
            $results = $this->db->get('email_signed');
            return $results->row();
        }
        public function updateSigned($user_id,$data){
            $this->db->where('user_id',$user_id);
            $this->db->update('email_signed',$data);
        }
        public function insertSigned($data){
            $this->db->insert('email_signed',$data);
        }
        public function getListEmailUser($user_id){
            $this->db->select('*');
            $this->db->where('status',1);
            $this->db->where('user_id',$user_id);
            $results = $this->db->get('email_system');
            return $results->result();
        }
        public function countEmailinbox($table){
            return $this->db->count_all_results($table);
        }
        public function getEmailDes($email){
            $this->db->select('*');
            $this->db->where('email',$email);
            $results = $this->db->get('email_system');
            return $results->row();
        }
        public function insertEmailUser($data){
            $this->db->insert('email_system',$data);
        }
        public function updateUserSystem($id,$data){
            $this->db->where('id',$id);
            $this->db->update('email_system',$data);
        }
        public function insertFolder($_value){
            $this->db->insert('email_folder',$_value);
            return  $this->db->insert_id();
        }
        public function insertSegment($arr_segment){
            $this->db->insert('email_folder_segment',$arr_segment);
        }
        public function getFolderEmail($email){
            $this->db->select('*');
            $this->db->where('type',1);
            $this->db->where('email',$email);
            $results = $this->db->get('email_folder');
            return $results->result();
        }
        public function getFolderSegment($_folder_id){
            $this->db->select('*');
            $this->db->where('type',1);
            $this->db->where('folder_id',$_folder_id);
            $results = $this->db->get('email_folder_segment');
            return $results->result();
        }
        public function getFolderChild($folder_id){
            $this->db->select('*');
            $this->db->where('folder_id',$folder_id);
            $results = $this->db->get('email_folder_child');
            return $results->result();
        }
        public function getSegmentChild($folder_child_id){
            $this->db->select('*');
            $this->db->where('folder_child_id',$folder_child_id);
            $results = $this->db->get('email_folder_child_segment');
            return $results->result();
        }
        public function deleteFolder($id,$email){
            $this->db->where('id',$id);
            $this->db->where('email',$email);
            $this->db->delete('email_folder');
        }
        public function deleteSegment($id){
            $this->db->where('folder_id',$id);
            $this->db->delete('email_folder_segment');
        }
        public function deleteFolderChild($id){
            $this->db->where('id',$id);
            $this->db->delete('email_folder_child');
        }
        public function deleteSegmentChild($id){
            $this->db->where('folder_child_id',$id);
            $this->db->delete('email_folder_child_segment');
        }
        public function InserFolderChild($data){
            $this->db->insert('email_folder_child',$data);
            return  $this->db->insert_id();
        }
        public function insertFolderChildSegment($data){
            $this->db->insert('email_folder_child_segment',$data);
        }
        public function getListEmailTranfer($id,$email){
            $this->db->select('*');
            $this->db->where('id !=',$id);
            $this->db->where('email',$email);
            $results = $this->db->get('email_folder');
            return $results->result();
        }
        public function EmailTranferLevel2($email,$parent){
            $this->db->select('*');
            $this->db->where('email',$email);
            $this->db->where('id !=', $parent);
            $results = $this->db->get('email_folder');
            return $results->result();
        }


    }
?>