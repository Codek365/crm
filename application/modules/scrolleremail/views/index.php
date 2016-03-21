<?php
$user = 'minhnhut@vietfuntravel.com.vn';
$pass = 'minhnhut0079@';
$host = '128.199.159.150';

// Connect to the pop3 email inbox belonging to $user
// If you need SSL remove the novalidate-cert section
$con = imap_open("{".$host."/pop3/novalidate-cert}INBOX", $user, $pass);

$MC = imap_check($con);

// Retrieve the email header data
// message count $i starts from 1
for ($i=1; $i<=$MC->Nmsgs; $i++) {
    $header = imap_header($con, $i);
    $body = imap_body($con, $i);
    $footer = imap_fetchbody($con,$i,$i);
//    $body = imap_body()
    // imap_fetachheader() retrieves the raw header
    //$header = imap_fetchheader($con, $i);
    echo '<pre>';
    print_r($body);
    echo '</pre><br>-----------------------------------------------------<br>';
}
exit;
?>