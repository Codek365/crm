<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');
class Email_reader_inbox {
    function inbox(){
        $cn = array(
            'no'		=> '1',
            'label' 	=> 'Inbox Email 1',
            'host' 		=> '{webmail.vietfuntravel.com.vn:143/notls}INBOX',
            'username' 	=> 'minhnhut@vietfuntravel.com.vn',
            'password' 	=> 'minhnhut0079@'
        );

        $imap = imap_open($cn['host'],$cn['username'],$cn['password']) or die('<div class="alert alert-danger alert-dismissable">Cannot connect to yourdomain.com: ' . imap_last_error().'</div>');
        $message_count = imap_num_msg($imap);
        $data = array();

        for ($m = 1; $m <= $message_count; ++$m){
            $header = imap_header($imap, $m);
            $sendFrom =  $header->from[0]->host;
            if($sendFrom == 'gmail.com'){
                $body = imap_fetchbody($imap, $m,2);
            }else{
                $body = imap_fetchbody($imap, $m,1);

            }

            $email[$m]['from'] = $header->from[0]->mailbox.'@'.$header->from[0]->host;
            $email[$m]['fromaddress'] = isset($header->from[0]->personal) ? $header->from[0]->personal : '';
            $email[$m]['to'] = $header->to[0]->mailbox.'@'.$header->to[0]->host;
            $email[$m]['subject'] = $header->subject;
            $email[$m]['message_id'] = $header->message_id;
            $email[$m]['date'] = $header->date;

            $email[$m]['reply_to'] = $header->reply_to[0]->mailbox."@".$header->reply_to[0]->host;

            $date = $email[$m]['date'];
            $from = $email[$m]['fromaddress'];
            $from_email = $email[$m]['from'];
            $to = isset($email[$m]['to']) ? $email[$m]['to'] : '';
            $subject = $email[$m]['subject'];

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $data[$m]['date'] =  date('Y-m-d H:i:s',strtotime($header->date));
            $data[$m]['from_email'] = $from_email;
            $data[$m]['to'] = $to;
            $data[$m]['subject'] = $subject;

            $data[$m]['body'] = $body;
            $structure = imap_fetchstructure($imap, $m);

            imap_mail_move($imap, $m, 'INBOX.Trash');
            $attachments = array();
            if(isset($structure->parts) && count($structure->parts)) {
                for($i = 0; $i < count($structure->parts); $i++) {
                    $attachments[$i] = array(
                        'is_attachment' => false,
                        'filename' => '',
                        'name' => '',
                        'attachment' => ''
                    );

                    if($structure->parts[$i]->ifdparameters) {
                        foreach($structure->parts[$i]->dparameters as $object) {
                            if(strtolower($object->attribute) == 'filename') {
                                $attachments[$i]['is_attachment'] = true;
                                $attachments[$i]['filename'] = $object->value;
                                $data[$m]['attachment'][$i] = $object->value;
                            }
                        }
                    }

                    if($structure->parts[$i]->ifparameters) {
                        foreach($structure->parts[$i]->parameters as $object) {
                            if(strtolower($object->attribute) == 'name') {
                                $attachments[$i]['is_attachment'] = true;
                                $attachments[$i]['name'] = $object->value;
                                $data[$m]['attachment'][$i] = $object->value;
                            }
                        }
                    }

                    if($attachments[$i]['is_attachment']) {
                        $attachments[$i]['attachment'] = imap_fetchbody($imap, $m, $i+1);
                        if($structure->parts[$i]->encoding == 3) { // 3 = BASE64
                            $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);

                        }
                        elseif($structure->parts[$i]->encoding == 4) { // 4 = QUOTED-PRINTABLE
                            $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                        }
                    }
                }
            }

            foreach ($attachments as $key => $attachment) {

                $name = $_SERVER['DOCUMENT_ROOT'].'/attach_file/'.$attachment['name'];
                $contents = $attachment['attachment'];
                if(!empty($name) && !empty($contents)){
                    file_put_contents($name, $contents);
                }

            }

        }

        imap_expunge ($imap);
        return $data;
        imap_close($imap);
    }
}
?>