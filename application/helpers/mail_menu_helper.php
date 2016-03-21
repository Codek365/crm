<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    if ( ! function_exists('email_menu'))
    {
        function email_menu()
        {
            $html = '<div class="col-sm-3" style="width: 20%">';
            $html .= '<h3><i class="glyphicon glyphicon-briefcase"></i> Toolbox</h3>';
            $html .= '<hr>';
            $html .= '<ul class="nav nav-stacked">';
            $html .= '<li><a href="'.base_url('emailpermission').'" class="inbox_number"><i class="glyphicon glyphicon-inbox"></i> Hộp thư </a></li>';
            $html .= '<li><a href="'.base_url('emailpermission/draft').'"><i class="glyphicon glyphicon-credit-card"></i> Thư rác</a></li>';
            $html .= '<li><a href="'.base_url().'emailpermission/outbound"><i class="glyphicon glyphicon-list-alt"></i> Email outbound</a></li>';
            $html .= '<li><a href="'.base_url().'emailpermission/userlist'.'"><i class="glyphicon glyphicon-user "></i> User list</a></li>';
            $html .= '</ul>';
            $html .= '<hr>';
            $html .= '</div>';
            return $html;
        }
    }
    if( ! function_exists('tranferTable($email)')){
        function tranferTable($email){
            $table = str_replace('@','_',$email);
            $table = str_replace('.','_',$table);
            return 'email_'.$table;
        }
    }
?>