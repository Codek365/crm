<?php
    class EmailPermission extends MX_Controller{
        public function __construct(){
            parent:: __construct();

//            $this->db = $this->load->database("db3", TRUE);
            $this->load->helper('Mail_menu');
            $this->load->model('m_permission');
        }
        public function index(){
            $title = 'Danh Sách Email Mới';
            $none = 'Không có thư mới';
            $after = '_receive_inbox';
            $email = 'Tổng email mới';
            $action = 'show';
            $this->showEmail($after,$title,$none,$email,$action);
        }
        public function draft(){
            $title = 'Danh Sách Email Rác';
            $none = 'Không có thư rác';
            $after = '_receive_spam';
            $email = 'Tổng email rác';
            $action = 'draft_show';
            $this->showEmail($after,$title,$none,$email,$action);
        }
        public function showEmail($after,$title,$none,$email,$action){
            $data['menu'] = email_menu();
            $data['title'] = $title;
            $data['none'] = $none;
            $data['email'] = $email;
            $data['action'] = $action;
            // tim table cua user
            $get_table = $this->m_permission->getAllTableSystem();
            $mail_inbox = array();

            if(!empty($get_table)){
                $i = 0;
                foreach($get_table as $_table){
                    $table = $_table->table.$after;
                    $mail_inbox[$i]['email'] = $_table->email;
                    $mail_inbox[$i]['table'] = $_table->table;
                    $mail_inbox[$i]['mail'] = $this->m_permission->getInboxNew($table);
                    $i++;
                }
            }
            if(!empty($mail_inbox)){
                $m = 0;
                foreach($mail_inbox as $items_mail){
                    if(!empty($items_mail)){
                        foreach($items_mail['mail'] as $items){
                            $count = count($items);
                            if(!empty($items)){
                                $m = $m + $count;
                            }
                        }
                    }
                }
                if($m > 0){
                    $data['new_email'] = $m;
                }
            }


            $data['mail_box'] = $mail_inbox;
//            exit;

            $this->template->load_view('index.php',$data);
        }
        public function outbound(){
            $data['menu'] = email_menu();
            $data['outbound'] = $this->m_permission->getListEmailOuntBound();
            $this->template->load_view('outbout.php',$data);
        }
        public function show(){
            $data['menu'] = email_menu();
            $table = $this->uri->segment(3).'_receive_inbox';
            $id = $this->uri->segment(4);
            $data['path'] = $this->config->item('server_root');
            $data['email'] = $this->m_permission->getDetail($id,$table);
            $this->template->load_view('view_email.php',$data);
        }
        public function draft_show(){
            $data['menu'] = email_menu();
            $table = $this->uri->segment(3).'_receive_spam';
            $id = $this->uri->segment(4);
            $data['path'] = $this->config->item('server_root');
            $data['email'] = $this->m_permission->getDetail($id,$table);
            $this->template->load_view('view_email.php',$data);
        }

        public function downlad(){
            $this->load->helper('download');
            $data =  file_get_contents(base_url() . 'attach_file/'.$this->uri->segment(3)); // Read the file's contents
            $name = $this->uri->segment(3);
            force_download($name, $data);
        }
        public function process_outbound(){
            $id = $this->input->post('id');
            $data = $this->input->post();

            $email = $data['smtp_user'];
            $table = str_replace('@','_',$email);
            $table = str_replace('.','_',$table);
            $table_send = 'email_'.$table.'_send_email';

//                $table_receive = $email.'_receive';
            $arr_table = array();
            $arr_table[0]['table'] =  'email_'.$table.'_receive_inbox';
            $arr_table[1]['table'] =  'email_'.$table.'_receive_spam';

            $this->load->dbforge();
            $this->TableEmailSend($table_send);
            $this->TableEmailReceive($arr_table);

            if(empty($id)){
                $value = array(
                    'email'=>$email,
                    'table' => 'email_'.$table,
                    'status' => $this->input->post('status')
                );
                $this->m_permission->insertEmailSystem($value);
                $this->m_permission->insertEmailOutbound($data);
                $this->session->set_flashdata('success','Thêm email outbound mới thành công !');
                redirect('emailpermission/outbound');
            }else{
                $this->m_permission->updateEmailSystem('email_'.$table,$data);
                $this->m_permission->updateEmailOutbound($id,$data);
                $this->session->set_flashdata('success','Sửa email outbound thành công !');
                redirect('emailpermission/outbound');
            }

        }

        public function TableEmailReceive($arr_table){
            foreach($arr_table as $items){
                $fields = array(
                    'id' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                    ),
                    'date' => array(
                        'type' => 'datetime',
                        'null' => TRUE,
                    ),
                    'from_email' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100'
                    ),
                    'to' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100'
                    ),
                    'subject' => array(
                        'type' => 'TEXT',
                        'null' => TRUE
                    ),
                    'body' => array(
                        'type' => 'TEXT',
                        'null' => TRUE
                    ),
                    'attach' => array(
                        'type' => 'TEXT',
                        'null' => TRUE
                    ),
                    'read' => array(
                        'type' => 'INT',
                        'null' => TRUE
                    ),
                    'status' => array(
                        'type' => 'INT',
                        'constraint' => 2,
                        'null' => TRUE
                    ),
                );

                $this->dbforge->add_field($fields);
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table($items['table'], TRUE);
            }

        }
        public function TableEmailSend($table_send){
            $fields = array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'user_id' => array(
                    'type' => 'int',
                    'constraint' => 11,
                ),
                'email_to' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'email_cc' => array(
                    'type' =>'TEXT',
                    'null' => TRUE
                ),
                'subject' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'content' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'time_init' => array(
                    'type' => 'datetime',
                    'null' => TRUE,
                ),
                'attach_file' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'status' => array(
                    'type' => 'int',
                    'constraint' => 1,
                )
            );

            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table($table_send, TRUE);
        }

        public function getEmailOutbound(){
            $id = $_POST['id'];
            echo json_encode($this->m_permission->getDescriptionEmail($id));
        }
        public function deleteEmailOutbound(){
            $this->load->dbforge();

            $id = $_POST['id'];
            $out_bound = $this->m_permission->getEmailOutbound($id);
            $table = str_replace('@','_',$out_bound->smtp_user);
            $table = str_replace('.','_',$table);

            $this->m_permission->deleteEmailOutbound($id);
            $this->m_permission->deleteTableoutbound($table);

            $this->dbforge->drop_table('email_'.$table.'_receive_inbox',TRUE);
            $this->dbforge->drop_table('email_'.$table.'_receive_spam',TRUE);
            $this->dbforge->drop_table('email_'.$table.'_send_email',TRUE);
        }
        public function userlist(){
            $data['menu'] = email_menu();
            $email_sys = $this->m_permission->getEmailSystem();
            if(!empty($email_sys)){
                $i = 1;
                $arr = array();
                foreach($email_sys as $items){
                    $getuser = $this->m_permission->getUser($items->email);
                    $asign_form = $this->m_permission->getAsignFrom($items->email);
                    $asign_to = $this->m_permission->getAsignTo($items->email);
                    if(!empty($asign_form)){
                        $arr[$i]['asign_from'] = 1;
                        $arr[$i]['assign_from_number'] = count($asign_form);
                    }else{
                        $arr[$i]['asign_from'] = 1;
                        $arr[$i]['assign_from_number'] = 0;
                    }

                    if(!empty($asign_to)){
                        $arr[$i]['asign_to'] = 1;
                        $arr[$i]['assign_to_number'] = count($asign_to);
                    }else{
                        $arr[$i]['asign_to'] = 1;
                        $arr[$i]['assign_to_number'] = 0;
                    }

                    $arr[$i]['email'] = $items->email;
                    $arr[$i]['name'] = !empty($getuser) ? $getuser->firstname.' '.$getuser->lastname : '';
                    $arr[$i]['status'] = $items->status;
                    $i++;
                }
                $data['user'] = $arr;
            }

            $this->template->load_view('user_list.php',$data);
        }
        public function getUserDescription(){
//            $email = 'minhnhut@vietfuntravel.com.vn';
            $email = $_POST['email'];
            $user = $this->m_permission->getUser($email);
            $data = array();
            if(empty($user)){
                $data['name'] = 'Does not exist';
                $data['email'] = $email;
            }else{
                $data['name'] = !empty($user) ? $user->firstname.' '.$user->lastname : 'User outbound';
                $data['email'] = $email;
            }
            $table = tranferTable($email);
            $asign_from = $this->m_permission->getAsignFrom($email);
            if(!empty($asign_from)){
                $i = 0;
                foreach($asign_from as $_from){
                    $data['asign_from'][$i] = $_from->email_from;
                    $i++;
                }
                $data['asign_from_number'] = count($asign_from);
                $data['asign_from'] = (object)$data['asign_from'];
            }else{
                $data['asign_from_number'] = 0;
            }

            $asign_to = $this->m_permission->getAsignTo($email);
//            print_r($asign_to);exit;
            if(!empty($asign_to)){
                $i = 0;
                foreach($asign_to as $_to){
                    $data['asign_to'][$i] = $_to->email_to;
                    $i++;
                }
                $data['asign_to'] = (object)$data['asign_to'];
                $data['asign_to_number'] = count($asign_to);
            }else{
                $data['asign_to_number'] = 0;
            }
            echo json_encode($data);

        }
        public function getEmailAsign(){
            $email = $_POST['email'];
            $email[] = $_POST['user_email'];
//            print_r($email) ;exit;
            $data = $this->m_permission->getEmailFrom($email);
            echo json_encode($data);
        }
        public function process_email(){

            $email_assign_user = $this->input->post('email_assign_user');
            if(empty($email_assign_user)){
                redirect('emailpermission/userlist');
            }else{
                $all_email_assign_from_draft = $this->input->post('all_email_assign_from_draft');
//                echo $all_email_assign_from_draft;exit;
                if(!empty($all_email_assign_from_draft)){
                    $str = explode(',',$all_email_assign_from_draft);
                    foreach($str as $email_items){
                        $this->m_permission->deleteAsignFrom($email_assign_user,$email_items);
                    }
                }

                $all_email_assign_to_draft = $this->input->post('all_email_assign_to_draft');
                if(!empty($all_email_assign_to_draft)){
                    $arr = explode(',',$all_email_assign_to_draft);
                    foreach($arr as $_email){
                        $this->m_permission->deleteAsignTo($email_assign_user,$_email);
                    }
                }

                $all_email_assign_from = $this->input->post('all_email_assign_from');
                if(!empty($all_email_assign_from)){
                    $from = explode(',',$all_email_assign_from);
                    foreach($from as $_email_from){
                        $data = array(
                            'email_from' => $_email_from,
                            'email_to' => $email_assign_user,
                            'date' => date('Y-m-d H:i:s'),
                            'status' => 1
                        );
                        $check_email = $this->m_permission->checkEmailValid($_email_from,$email_assign_user);
                        if(empty( $check_email)){
                            $this->m_permission->insertEmailFrom($data);
                        }

                    }
                }

                $all_email_assign_to = $this->input->post('all_email_assign_to');
                if(!empty($all_email_assign_to)){
                    $exp_to = explode(',', $all_email_assign_to);
                    foreach($exp_to as $email_to){
                        $data = array(
                            'email_from' => $email_assign_user,
                            'email_to' => $email_to,
                            'date' => date('Y-m-d H:i:s'),
                            'status' => 1
                        );
                        $check_email = $this->m_permission->checkEmailValid( $email_assign_user,$email_to);
                        if(empty($check_email)){
                            $this->m_permission->insertEmailFrom($data);
                        }

                    }
                }
                redirect('emailpermission/userlist');
            }

        }
        public function deleteUser(){
            $email = $_POST['email'];
            $this->m_permission->deleteUserEmail($email);
            $this->m_permission->deleteUserAssign($email);
        }
    }
?>