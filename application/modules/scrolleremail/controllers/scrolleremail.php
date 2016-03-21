<?php
    class Scrolleremail extends AdminController{
        public function __construct(){
            parent::__construct();
            $this->load->model('meals_model');
            $this->load->helper('scroll_email');
        }
        public function index(){
            $data = $this->meals_model->getEmailOutbound();
            if(!empty($data)){
                foreach($data as $_data){
                    $email = process_email($_data,'INBOX');
                    if(!empty($email)){
                        $ct_table = '_receive_inbox';
                        $transfer = 'inbox';
                        $this->getEmail($email,$_data,$transfer,$ct_table);
                    }

                    $spam = process_email($_data,'INBOX.Spam');
                    if(!empty($spam)){
                        $ct_table = '_receive_spam';
                        $transfer = 'spam';
                        $this->getEmail($spam,$_data,$transfer,$ct_table);
                    }

                }
            }



        }
        public function getEmail($email,$ct_table,$transfer,$ct_table){
                foreach($email as $items){
//                    print_r($items);exit;
                    $data = array(
                        'date' => $items['date'],
                        'from_email' => $items['from_email'],
                        'to' => $items['to'],
                        'subject' => $items['subject'],
                        'body' => html_entity_decode($items['body'],ENT_QUOTES,'UTF-8'),
                        'attach' => isset($items['attachment']) ? json_encode($items['attachment']) :'',
                        'read' => 1,
                        'transfer' =>$transfer,
                        'start' =>1,
                        'status' => 1
                    );
                    if(!empty($items['attachment'])){
                        $data['attach'] = isset($items['attachment']) ? json_encode($items['attachment']) :'';
                    }else{
                        $data['attach'] = '';
                    }

                    $filter = $this->meals_model->getEmailSend($data['from_email']);
//                    $table = $filter->

                    $all_table = $this->meals_model->getAllTable();
                    if(!empty($all_table)){
                        $str_email = array();
                        $i = 0;
                        // kiem tra email da gui
                        foreach($all_table as $_table){
                            $check_table = $this->db->table_exists($_table->table.'_send_email');
                            if(!empty($check_table)){
                                $email_history = $this->meals_model->getEmailHistory($_table->table.'_send_email',$items['from_email']);
                                if(!empty($email_history)){
                                    $str_email[$i]['table'] = $_table->table.'_send_email';
                                    $str_email[$i]['email_to'] = $email_history->email_to;
                                    $str_email[$i]['date'] = $email_history->date;
                                    $i++;
                                }
                            }

                        }
                        // chon ra duoc table gui email lan cuoi cung
                        for($i=0; $i < count($str_email);$i++){
                            if(isset($str_email[$i-1]) && !empty($str_email[$i-1])){
                                if($str_email[$i]['date'] > $str_email[$i-1]['date']){
                                    unset ($str_email[$i-1]);
                                }else{
                                    unset($str_email[$i]);
                                }
                            }
                        }
                    }
                    // get email outbound
                    $query = $this->meals_model->getEmailOutbound();
                    $email_system = $this->meals_model->getEmailSytem($query->smtp_user);
                    foreach($str_email as $_fe_email){
                        $ct_f_table = $_fe_email['table'];
                    }
                    if(!empty($ct_f_table)){
                        $exp_table = str_replace('_send_email','',$ct_f_table);
                    }else{
                        // neu la email gui lan dau tien se luu vao email outbound;

                        $exp_table = $email_system->table;
                    }

                    $table_system = $this->meals_model->getEmailSystem($exp_table);
                    $check_assign = $this->meals_model->CheckAssignTo($table_system->email);
                    if(!empty($check_assign)){
                        $getTable = $this->meals_model->getTableSystem($check_assign->email_to);
                        $table = $getTable->table;
                        $this->meals_model->insertData($table.$ct_table,$data);
                    }else{
                        if(!empty($ct_f_table)){
                            $table = str_replace('_send_email',$ct_table,$ct_f_table);
                        }else{
                            $table = $email_system->table.$ct_table;
//                            echo $table;exit;
                        }
//                    print_r($table);exit;
                        $this->meals_model->insertData($table,$data);
                    }
                }


        }
    }
?>