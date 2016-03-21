<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Checkemail extends AdminController{
    public function __construct(){
        parent::__construct();
        $this->db = $this->load->database("db3", TRUE);
        $this->load->model('m_checkemail');
    }
    public function index(){
        $user_group = $this->session->userdata('permission');
        $data['signed'] = $this->m_checkemail->getSigned($this->session->userdata('user_id'));

        $default_email = $data['default_email']= $this->m_checkemail->getUser($this->session->userdata('user_id'));
        $data['email_first'] = $default_email->email;

        $data['signed'] = $this->m_checkemail->getSigned($this->session->userdata('user_id'));

        $permission = (json_decode($user_group)) ;
        if(!empty($permission->emailpermission)){
            $data['list_email'] = $this->m_checkemail->getListEmailSystem();
        }else{
            $data['list_email'] = $this->m_checkemail->getListEmailSystemUser();
        }
        if(empty($data['list_email'])){
            $this->session->set_flashdata('error','Error: cần tạo email trước khi vào danh mục quản lý !');
            redirect('checkemail/emaillist');
        }
        $data['email_out'] = $this->m_checkemail->getEmailoutbound();
        $gettable = $this->m_checkemail->getTableUser($default_email->email);

        if(!empty($gettable)){
            $table = $gettable->table.'_send_email';
            $query = $this->m_checkemail->getEmailListAuto($table);
            $i = 0;
            $arr = array();
            foreach($query as $_query){
                $arr[$i] = $_query->email_to;
                $i++;
            }

            $arr = array_unique($arr);
            $email = '[';
            foreach($arr as $arr_items){
                $email .= "'".$arr_items."',";
            }
            $email .= ']';
            $data['items'] = $email;
        }
        $this->template->load_view('checkemail/index',$data);
    }

    public function geFolder(){
        $email = $_POST['email'];
//        $email = 'minhnhut@vietfuntravel.com';
        $folder = $this->m_checkemail->getFolderEmail($email);
        if(!empty($folder)){
            $i = 0;
            foreach($folder as $_folder){
                $segment = $this->m_checkemail->getFolderSegment($_folder->id);
                if(!empty($segment)){
                    $j = 0;
                    foreach($segment as $item){
                        $folder[$i]->segment[$j] = (object)$item;
                        $j++;
                    }
                }

                $folder_child = $this->m_checkemail->getFolderChild($_folder->id);
                if(!empty($folder_child)){
                    $v = 0;
                    foreach($folder_child as $items_child){
                        $folder[$i]->folder_child[$v] = $items_child;
                        if(!empty($items_child)){
                            $segment_child = $this->m_checkemail->getSegmentChild($items_child->id);
                            if(!empty($segment_child)){
                               $folder[$i]->folder_child[$v]->child = $segment_child;
                            }
                        }
                        $v++;
                    }
                }
                $i++;
            }
        }
        echo json_encode($folder);
    }

    public function getListEmail(){
        echo '[ { "id": "Netta rufina", "label": "Red-crested Pochard", "value": "Red-crested Pochard" } ]';
    }
    public function getEmailList(){
//        $from = 1;
//        if($from == 1){
//            $from = 0;
//        }
//        $to = 50;
//        $table = 'email_admintop_vietfuntravel_com_vn';
//        $value = 'inbox';

        $from = $_POST['from'];
        if($from == 1){
            $from = 0;
        }
        $to = $_POST['to'];
        $table = $_POST['table'];
        $value = $_POST['value'];

        $email = array();
        // get email in inbox
        $inbox = $this->m_checkemail->getListEmail($table.'_receive_inbox',$from,$to,$value);
        if(!empty($inbox)){
            $i = 0;
            foreach($inbox as $_inbox){
                $email[$i]['id'] = $_inbox->id;
                $email[$i]['date'] = date('Y/m/d H:i:s',strtotime($_inbox->date));
                $email[$i]['emailfrom'] = $_inbox->from_email;
                $email[$i]['emailto'] = $_inbox->to;
                $email[$i]['subject'] = $_inbox->subject;
                if(!empty($_inbox->attach)){
                    $email[$i]['attach'] = 1;
                }
                $email[$i]['type'] = 'inbox';
                $email[$i]['start'] = $_inbox->start;
                $email[$i]['read'] = $_inbox->read;
                $email[$i]['transfer'] = $value;
                $i++;
            }
        }
        // get email span
        $spam = $this->m_checkemail->getListEmail($table.'_receive_spam',$from,$to,$value);
        if(!empty($spam)){
            $j = count($email);
            foreach($spam as $_spam){
                $email[$j]['id'] = $_spam->id;
                $email[$j]['date'] = date('Y/m/d H:i:s',strtotime($_spam->date));
                $email[$j]['emailfrom'] = $_spam->from_email;
                $email[$j]['emailto'] = $_spam->to;
                $email[$j]['subject'] = $_spam->subject;
                if(!empty($_spam->attach)){
                    $email[$j]['attach'] = 1;
                }
                $email[$j]['type'] = 'spam';
                $email[$j]['read'] = $_spam->read;
                $email[$j]['start'] = $_spam->start;
                $email[$j]['transfer'] = $value;
                $j++;
            }
        }

        // get email send
        $send = $this->m_checkemail->getListEmail($table.'_send_email',$from,$to,$value);
        if(!empty($send)){
            $v = count($email);
            foreach($send as $_send){
                $email[$v]['id'] = $_send->id;
                $email[$v]['date'] = date('Y/m/d H:i:s',strtotime($_send->date));
                $email[$v]['to'] = $_send->email_to;
                $email[$v]['subject'] = $_send->subject;
                if(!empty($_send->attach_file)){
                    $file = json_decode($_send->attach_file);
                }
                if(!empty($_send->attach) || !empty($file)){
                    $email[$v]['attach'] = 1;
                }
                $email[$v]['type'] = 'send';
                $email[$v]['start'] = $_send->start;
                $email[$v]['transfer'] = $value;
                $v++;
            }
        }

        // get email draft
        $draft = $this->m_checkemail->getListEmailDraft($table,$from,$to,$value);
        if(!empty($draft)){
            $k = count($email);
            foreach($draft as $_draft){
                $email[$k]['id'] = $_draft->id;
                $email[$k]['row_id'] = $_draft->row_id;
                $email[$k]['date'] = date('Y/m/d H:i:s',strtotime($_draft->date));
                $email[$k]['to'] = $_draft->email;
                $email[$k]['subject'] = $_draft->subject;
                if(!empty($_draft->file)){
                    $email[$k]['attach'] = 1;
                }
                $email[$k]['type'] = 'draft';
                $email[$k]['start'] = $_draft->start;
                $email[$k]['transfer'] = $value;
                $k++;
            }
        }
        $inbox = $this->m_checkemail->countEmail($table.'_receive_inbox',$value);
        $spam = $this->m_checkemail->countEmail($table.'_receive_spam',$value);
        $draft = $this->m_checkemail->countEmail('email_draft',$value);
        $send = $this->m_checkemail->countEmail($table.'_send_email',$value);
        $count = count($inbox) +  count($spam) + count($draft) + count($send);
        $email['total'] = $count;
//        print_r($email);exit;

        echo json_encode($email);
    }
    public function EmailDescription(){
//        $id = 1;
//        $type = 'inbox';
//        $table = 'email_admintop_vietfuntravel_com_vn';
//        $tail = 'spam';

        $id = $_POST['id'];
        $type = $_POST['type'];
        $table = $_POST['table'];
        $tail = $_POST['tail'];
        switch ($type){
            case('inbox'):
                $table = $table.'_receive_inbox';
                $read = array('read'=>0);
                $this->m_checkemail->updateReadEmail($id,$table,$read);
                break;
            case('draft'):
                $table = 'email_draft';
                break;
            case('send'):
                $table = $table.'_send_email';
                break;
            case('spam'):
                $table = $table.'_receive_spam';
                $read = array('read'=>0);
                $this->m_checkemail->updateReadEmail($id,$table,$read);
                break;
        }
        $des = $this->m_checkemail->getEmailDescription($id, $tail,$table);
        if(isset($des->body)){
//            $des->body = str_replace('2015','<br>2015',$des->body);
            $des->body = str_replace('=','',html_entity_decode($des->body,ENT_QUOTES,'UTF-8'));
        }

        if(!empty($des)){

//            $des->date = date('d/m/Y H:i:s',strtotime($des->date));
            if(isset($des->attach)){
                $des->attach = json_decode($des->attach);
            }
            if(!empty($des->attach)){
                $i = 1;
                foreach($des->attach as $items){
                    $des->file[$i] = $this->checkFiletail($items);
                    $i++;
                }
                $des->file = (object)$des->file;
            }
            if(isset($des->email_cc)){
                $cc =  $des->email_cc;
                $exp = explode('[',$cc);
                if(count($exp) == 2){
                    $exp = explode(']',$exp[1]);
                    $des->email_cc = $exp[0];
                }else{
                    $des->email_cc = 'Không';
                }

            }
            if(isset($des->attach_file)){
                $file_attach = json_decode($des->attach_file);
            }elseif(isset($des->attach)){
                $file_attach = $des->attach;
            }
            if(!empty($file_attach)){
                $i = 1;
                foreach($file_attach as $_items_attach){
                    if(isset($_items_attach->name) && !empty($_items_attach->name)){
                        $des->attach[$i] = $_items_attach->name;
                        $des->file[$i] = $this->checkFiletail($_items_attach->name);
                    }else{
                        $des->attach->$i = $_items_attach;
                    }
                    $i++;
                }
            }
        }
        echo json_encode($des);
    }
    function checkFiletail($file){
        $first = $file;
        $file = explode('.',$file);
        if(count($file) == 2){
           $file_img = $this->checkTail($first,$file[1]);
        }elseif(count($file) > 2){
            $tail = $file[count($file)-1];
            $file_img = $this->checkTail($first,$tail);
        }
        return $file_img;

    }
    public function checkTail($first,$tail){
        $export = '';
        switch($tail) {
            case ('jpg'):
            case ('png'):
            case ('gif'):
            case ('jpeg'):
            case ('JPG'):
                $file_path = base_url() . 'attach_file/' .$first;
                $file_headers = @get_headers($file_path);
                if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
                    $export = '<img width="60px" class=" imgborder" alt="" src="' . base_url() . 'upload/' .$first. '">';
                } else {
                    $export = '<img width="60px" class=" imgborder" alt="" src="' . base_url() . 'attach_file/' .$first. '">';
                }
                break;
            case ('zip'):
            case ('7zip'):
            case ('rar'):
            case ('tag'):
                $export = '<img src="'.base_url() . 'assets/img/rar.png">';
                break;
            case ('pdf'):
                $export = '<img src="'.base_url().'assets/img/pdf.png">';
                break;
            case ('xlsx'):  case ('xls'):
            $export = '<img src="'.base_url().'assets/img/excel.png">';
            break;
            case ('doc'): case ('docx'):
            $export = '<img src="'.base_url().'assets/img/doc.png">';
            break;
            default:
                $export = '<img src="'.base_url().'assets/img/file.png">';
                break;
        }
        return $export;
    }
    public function getRowDraft(){
        $id = $this->m_checkemail->getRowIdDraft();
        if(!empty($id)){
            $value = $id->id + 1;
        }else{
            $value = 1;
        }
        echo $value;

    }
    public function downlad(){
        $this->load->helper('download');

        if( $this->uri->segment(4) == 'send'){
            $data =  file_get_contents(base_url() . 'upload/'.$this->uri->segment(3));
        }else{
            $data =  file_get_contents(base_url() . 'attach_file/'.$this->uri->segment(3));
        }
        $name = $this->uri->segment(3);
        force_download($name, $data);
    }
    public function getEmail(){
//        $this->load->model('m_mail');
        $email = $this->m_checkemail->getEmailUser($this->session->userdata('user_id'));
        $table = $this->m_checkemail->getTableUser($email->email);
        $getTable = $table->table.'_send_email';
        $data = $this->m_checkemail->getListEmail($getTable);
        $i = 0;
        $str = array();
        foreach($data as $_data){
            $str[$i] = $_data->email_to;
            $i++;
        }
        $data = array_unique($str);
        if(!empty($data)){
            $arr = array();
            for($i = 0;$i < count( $data); $i++){
                $arr[$i]['country'] = $data[$i];
            }
        }else{
            $arr = array();
        }

        echo json_encode($arr);
    }
    public function processDraft(){
        if(isset($_POST['file'])){
            $file = (array)$_POST['file'];
            $size = (array)$_POST['size'];
            $filename = array();
            for($i = 0; $i < count($file); $i++){
                $filename[$i]['name'] = $file[$i];
                $filename[$i]['size'] = $size[$i];
            }

        }
        $data = array(
            'row_id' => isset($_POST['row_id']) ? $_POST['row_id'] : '',
            'table' => $_POST['table'],
            'date' => date('Y-m-d H:i:s'),
            'email' => isset($_POST['email_to']) ? $_POST['email_to'] : '',
            'mail_cc' => isset($_POST['mail_cc']) ? $_POST['mail_cc'] : '',
            'subject' => isset($_POST['subject']) ? $_POST['subject'] : '',
            'file' => !empty($filename) ? json_encode($filename) : '',
            'content' => isset($_POST['content']) ? $_POST['content'] : '',
            'transfer' => isset($_POST['transfer']) ? $_POST['transfer'] : 'draft',
            'status' => 1
        );
//        print_r($data);exit;

        if(isset($_POST['row_id'])){
            $row_id = $_POST['row_id'];
            $this->m_checkemail->deleteDraft($row_id);
            $this->m_checkemail->InsertDraft($data);
        }

    }
    public function uloadFile(){
        $this->load->library('Uploadhandler');
        $upload_handler = new UploadHandler();
    }
    public function deleteFileUpload(){
        $name = $_POST['name'];
        $url = $this->config->item('server_root').'files/'.$name;
        if(file_exists($url)){
            unlink($url);
        }
    }
    public function sendEmail(){
        $row_id = $this->input->post('row_id');
        $this->m_checkemail->deleteDraftSend($row_id);
        $data = $this->request->post;
        $data['content'] =  html_entity_decode($data['content'],ENT_QUOTES,'UTF-8');
        unset($data['row_id']);

        if(empty($data['email_to']) || empty($data['subject']) || empty($data['content'])){
            $this->session->set_flashdata('data',$data);
            $this->session->set_flashdata('error','Không gửi được email. Vui lòng kiểm tra nội dung email !');
            redirect('checkemail');
        }else{
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d H:i:s');
            $table = $data['table_send'].'_send_email';

            if(isset($data['filename']) && count($data['filename']) > 0){
                $_file = array();
                $url_old = $this->config->item('server_root').'files/';
                $url_new = $this->config->item('server_root').'upload/';
                for($i = 0; $i < count($data['filename']); $i++){
                    $_file[$i]['size'] = $data['size'][$i];
                    if(file_exists($url_old.$data['filename'][$i])){

                        $str_file = explode('.',$data['filename'][$i]);
                        $convert_file = '';
                        if(count($str_file) > 2){
                            for($v = 0;$v < count($str_file); $v++){
                                if($v == count($str_file) - 2){
                                    $str_file[$v] = $str_file[$v].'_'.strtotime(date('Y-m-d H:i'));
                                }
                                if($v == count($str_file) - 1){
                                    $convert_file .= $str_file[$v];
                                }else{
                                    $convert_file .= $str_file[$v].'.';
                                }

                            }
                        }elseif(count($str_file) == 2){
                            $convert_file = $str_file[0].'_'.strtotime(date('Y-m-d H:i')).'.'.$str_file[1];
                        }
                        $_file[$i]['name'] = $convert_file;
                        copy($url_old.$data['filename'][$i], $url_new.$convert_file);
                        unlink($url_old.$data['filename'][$i]);
                    }

                }
            }else{
                $_file = '';
            }
            $file_attach = json_encode($_file);
            // luu lich su gui mail
            $arr = array(
                'user_id' => $this->session->userdata('user_id'),
                'date' => $date,
                'to' => $data['email_to'],
                'cc' => $data['mail_cc'],
                'subject' => $data['subject'],
                'content' => $data['content'],
                'attach' => $file_attach,
                'date' => date('Y-m-d H:i:s'),
                'transfer' => 'send',
                'status' => 1,
            );

            $this->m_checkemail->deleteEmailFilter($data['email_to']);
            $filter_data = array('from'=>$data['email_send'],'to'=>$data['email_to'],'date'=>date('Y-m-d H:i:s'));
            $this->m_checkemail->inserEmailfilter($filter_data);

            $emal_send_info = $this->m_checkemail->getEmailSendInfo($data['email_out']);
            $user_info = $this->m_checkemail->getUserInfo($this->session->userdata('user_id'));
            if(!empty($table)){
                $this->m_checkemail->insertEmailHistory($table,$arr);
                $this->processEmail($emal_send_info,$data,$_file,$user_info);
            }else{
                $this->session->set_flashdata('error','Không tìm thấy email gửi đi !');
                redirect('checkemail');
            }

        }
    }
    public function processEmail($emal_send_info,$data,$_file,$user_info){
//        print_r($emal_send_info);exit;
        $config = array(
            'protocol' => $emal_send_info->protocol,
            'smtp_host' => $emal_send_info->smtp_host,
            'smtp_port' => $emal_send_info->smtp_port,
            'smtp_user' => $emal_send_info->smtp_user,
            'smtp_pass' => $emal_send_info->password
        );
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from($emal_send_info->smtp_user, $user_info->name_display);
        $this->email->to($data['email_to']);
        if(!empty($data['mail_cc'])) {
            $exp = explode("',]", $data['mail_cc']);
            $exp = explode("['", $exp[0]);
            if(isset($exp[1]) && !empty($exp[1])){
                $exp = explode("','", $exp[1]);
                $arr = array();
                $list = array();
                foreach ($exp as $_items) {
                    $string = explode("&quot", $_items);
                    $arr[] = $string[0];
                }
                for ($i = 0; $i < count($arr); $i++) {
                    $list[] = $arr[$i];
                }
                $this->email->cc($list);
            }

        }

        $this->email->subject($data['subject']);
        $this->email->message($data['content']);
        if(isset($data['filename']) && count($data['filename']) > 0){
            $link = $this->config->item('server_root');
//            $link = base_url();
            foreach($_file as $file){
                if(isset($data['folder'])){
                    $path = $link.$data['folder'].'/'.$file['name'];
                }else{
                    $path = $link.'/upload/'.$file['name'];
                }
                $this->email->attach($path);
            }
        }
//        exit;
        if($this->email->send()){
            $this->session->set_flashdata('success','Bạn đã gửi mail thành công');
            redirect(base_url().'checkemail');
        }
        else
        {
//            print_r($this->email->print_debugger());exit;
            $this->session->set_flashdata('error','Đã xảy ra lỗi trong qua trình gửi mail, vui lòng kiểm tra lại nội dung');
            redirect(base_url().'mail');
        }

    }
    public function getEmailDraft(){
        $email = $this->m_checkemail->getListDraft($_POST['table']);
        echo json_encode($email);
    }
    public function getDescriptionDraft(){
//        $row_id = 483;
        $row_id = $_POST['row_id'];
        $description = $this->m_checkemail->getDescriptionDraft($row_id);
        $description->cc = $description->mail_cc;
        if(!empty($description->mail_cc)){
            $mail_cc = explode('[',$description->mail_cc);
            $mail_cc = explode(']',$mail_cc[1]);
            $mail_cc = explode(',',$mail_cc[0]);
            $mail_cc = str_replace("'",'',$mail_cc);
            $description->mail_cc = (object)$mail_cc;
        }
        if(!empty($description->file)){
            $file = json_decode($description->file);
            $description->file = (object)$file;
        }

        echo json_encode($description);
    }
    public function getEmailRecycle(){
        $table = $_POST['table'];
        $data = $this->m_checkemail->getListRecyle($table);
        echo json_encode($data);
    }
    public function getEmailRecyle(){
        $inbox = $this->m_admin->getInboxRecycle();
    }
    public function moveEmail(){
        $move = $_POST['move'];
        $table = $_POST['table'];
        $arr = (array)$_POST['arr'];
        $db = $_POST['db'];
        foreach($arr as $items){
            $str = explode(':',$items);
            $id = $str[0];
            $data = array('transfer'=>$move);
            $table = $this->switchFunction($db,$str[1]);
            $this->m_checkemail->moveEmailUpdate($id, $table,$data);
        }

    }
    public function moveEmailView(){
        $id = $_POST['id'];
        $db = $_POST['db'];
        $move = $_POST['move'];
        $table = $this->switchFunction($db,$_POST['tail']);
        $data = array('transfer'=>$move);
        $this->m_checkemail->moveEmailUpdate($id, $table,$data);
    }
    public function removeEmail(){
        $db = $_POST['db'];
        $arr = (array)$_POST['arr'];
        foreach($arr as $items){
            $str = explode(':',$items);
            $id = $str[0];
            $table = $this->switchFunction($db,$str[1]);
            if($this->m_checkemail->deleteEmail($id,$table)){
                echo"ok";
            }else{
                echo"can't remove";
            }
        }

    }
    public function switchFunction($db,$stail){
        switch($stail){
            case('inbox'):
                $table = $db.'_receive_inbox';
                break;
            case('draft'):
                $table = 'email_draft';
                break;
            case('send'):
                $table = $db.'_send_email';
                break;
            case('spam'):
                $table = $db.'_receive_spam';
                break;
        }
        return $table;
    }
    public function getDescriptionEmail(){
//        $db = 'email_admintop_vietfuntravel_com_vn';
//        $tail = 'inbox';
//        $id = 80;

        $db = $_POST['db'];
        $tail = $_POST['type'];
        $id = $_POST['id'];

        $table = $this-> switchFunction($db,$tail);
        $query = $this->m_checkemail->getEmailDescription($id,$tail,$table);
        if(isset($query->attach) && !empty($query->attach)){
            $img = json_decode($query->attach);
            $i = 0;
            foreach($img as $items){
                $query->filename[$i] = $items;
                $query->file[$i] = $this->checkFiletail($items);

                $i++;
            }
        }elseif(isset($query->attach_file)){
            $img = json_decode($query->attach_file);
            $i = 0;
            foreach($img as $items){
                $query->file[$i] = $this->checkFiletail($items->name);
                $query->filename[$i] = $items->name;
                $i++;
            }
        }
        if(isset($query->email_cc)){
            $cc =  $query->email_cc;
            $exp = explode('[',$cc);
            if(count($exp) == 2){
                $exp = explode(']',$exp[1]);
                $query->email_cc = $exp[0];
            }else{
                $query->email_cc = '';
            }

        }
        if(isset($query->body)){
            $query->body = str_replace('2015','<br>2015',$query->body);
        }
        if(isset($query->email_cc)){
            $cc = explode(',',$query->email_cc);
            $i = 0;
            $mail_cc = array();
            foreach($cc as $_cc){
                if(!empty($cc[$i])){
                    $cc[$i] = explode("'",$_cc);
                    for($v = 0; $v <= count($cc[$i]); $v++){
                        if(empty($cc[$i][$v])){
                            unset($cc[$i][$v]);
                        }else{
                            $mail_cc[] = $cc[$i][$v];
                        }
                    }
                }else{
                    unset($cc[$i]);
                }
                $i++;
            }
            $query->email_cc = $mail_cc;
            $query->path_file = 'attach_file';

        }else{
            $query->path_file = 'upload';
        }
        echo json_encode($query);
    }
    public function processSigned(){
        $user_id = $this->session->userdata('user_id');
        $check = $this->m_checkemail->getSigned($user_id);
        $sign = $this->input->post('input_signed');
        if(empty($check)){
            $this->m_checkemail->insertSigned(array('user_id'=>$user_id,'signed'=>$sign,'status'=>1));
            $this->session->set_flashdata('success','Success: Thêm chữ ký thành công');
            redirect('checkemail');
        }else{
            $this->session->set_flashdata('success','Success: Sửa chữ ký thành công');
            $this->m_checkemail->updateSigned($user_id,array('signed'=>$sign));
            redirect('checkemail');
        }

    }
    public function emaillist(){
        $email = $this->m_checkemail->getListEmailUser($this->session->userdata('user_id'));
        if(!empty($email)){
            $i = 0;
            foreach($email as $_email){
                $email[$i]->inbox_number = $this->m_checkemail->countEmailinbox($_email->table.'_receive_inbox');
                $email[$i]->send_number = $this->m_checkemail->countEmailinbox($_email->table.'_send_email');
                $i++;
            }
        }
        $data['email'] = $email;
        $this->template->load_view('checkemail/email_list.php',$data);
    }
    public function processEmailUser(){
        $data = $this->input->post();
        if(empty($data['email']) || empty($data['email']) || empty($data['email']) != empty($data['conpass'])){
            $this->session->set_flashdata('error','Error: Xảy ra lỗi, vui lòng kiểm tra lại thông tin');
            redirect('checkemail/emaillist');
        }else{
            $query = $this->m_checkemail->getEmailDes($data['email']);
            if(!empty($query)){
                $this->session->set_flashdata('error','Error: Xảy ra lỗi, email đã được sử dụng');
                redirect('checkemail/emaillist');
            }else{
                $data['user_id'] = $this->session->userdata('user_id');
                unset($data['conpass']);
                $str = str_replace('@','_',$data['email']);
                $str = str_replace('.','_',$str);
                $data['password'] = md5($data['password']);
                $data['status'] = 1;
                $data['table'] = 'email_'.$str;

                $this->load->dbforge();

                $this->TableEmailSend('email_'.$str.'_send_email');
                $this->TableEmailReceive('email_'.$str.'_receive_inbox');
                $this->TableEmailReceive('email_'.$str.'_receive_spam');

                $this->m_checkemail->insertEmailUser($data);
                $this->session->set_flashdata('Success','Success: Thêm email mới thành công');
                redirect('checkemail/emaillist');
            }
        }
    }
    public function TableEmailReceive($arr_table){
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
                'cc' => array(
                    'type' => 'TEXT',
                    'constraint' => TRUE
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
                'transfer' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'null' => TRUE
                ),
                'start' => array(
                    'type' => 'INT',
                    'constraint' => '1',
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
            $this->dbforge->create_table($arr_table, TRUE);

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
            'date' => array(
                'type' => 'datetime',
            ),
            'to' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'cc' => array(
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
            'attach' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'transfer' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ),
            'start' => array(
                'type' => 'INT',
                'constraint' => '1',
                'null' => TRUE
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
    public function deleteEmail(){
        $id = $this->uri->segment(3);
        $this->m_checkemail->updateUserSystem($id,array('status'=>0));
        $this->session->set_flashdata('success','Success: Xóa email thành công');
        redirect('checkemail/emaillist');
    }
    public function addFolder(){
        $data = $this->input->post();
//        print_r($data);exit;
        // data['folder_type'] == 1 -> folder khong tu dong load email
        // data['folder_type'] == 2 -> folder tu dong load email
        // data['folder_type'] == 2 -> folder tu dong load email

        // segment = 1->inbox
        // segment = 2->send
        // segment = 3->draft

//        print_r($data);exit;
        if(!empty($data)){

            $folder_type = $data['folder_type'];
            $folder_email = $data['folder_email'];

            unset($data['folder_type']);
            unset($data['folder_email']);
            foreach($data as $key => $value){
                $_value = array(
                    'type' => $folder_type,
                    'email' => $folder_email,
                    'code' => $key,
                    'name' => $value['name']
                );
                $folder_id = $this->m_checkemail->insertFolder($_value);
                unset($value['name']);
                if(!empty($value)){
                    foreach($value as $key => $items){
                        $arr_segment = array(
                            'folder_id'=>$folder_id,
                            'type'=>$folder_type,
                            'name'=>$items,
                        );
                        $this->m_checkemail->insertSegment($arr_segment);
                    }

                }

            }
            $this->session->set_flashdata('success','Success: Thêm folder thành công');
            redirect('checkemail');
        }
    }
    public function deleteFolder(){
        $id = $_POST['id'];
        $email = $_POST['email'];
        $folder_child = $this->m_checkemail->getFolderChild($id);
        if(!empty($folder_child)){
            foreach($folder_child as $items){
                $this->m_checkemail->deleteSegmentChild($items->id);
            }
        }
        $this->m_checkemail->deleteFolderChild($id);
        $this->m_checkemail->deleteFolder($id,$email);
        $this->m_checkemail->deleteSegment($id);
    }
    public function deleteFolderChild(){
        $id = $_POST['id'];
        $this->m_checkemail->deleteFolderChild($id);
        $this->m_checkemail->deleteSegmentChild($id);
    }
    public function insertFolderChild(){
        $data = $this->input->post();
        $folder_id = $data['folder_id'];
        unset($data['folder_id']);
        foreach($data as $key => $value){
            $code = $key;
            $name = $value['folder'];
            $folder_child_id = $this->m_checkemail->InserFolderChild(array('folder_id'=>$folder_id, 'code'=>$code, 'name'=>$name));
            unset($value['folder']);
            if(!empty($value)){
                foreach($value as $_value){
                    $this->m_checkemail->insertFolderChildSegment(array('folder_child_id'=>$folder_child_id, 'name'=>$_value));
                }
            }

        }
        $this->session->set_flashdata('success','Success: Thêm folder con thành công');
        redirect('checkemail');
    }
    public function getEmailTranfer(){
        $id = $_POST['id'];
        $level = $_POST['level'];
        $email = $_POST['email'];
        $parent = $_POST['parent'];
        if($level == 1){
            $query = $this->m_checkemail->getListEmailTranfer($id,$email);
        }elseif($level == 2){
            $query = $this->m_checkemail->EmailTranferLevel2($email,$parent);
        }
        echo json_encode($query);

    }
}
?>
