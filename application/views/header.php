<div class="page-header navbar navbar-fixed-top" style="background:#000">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <div class="navbar-header hidden-xs hidden-sm">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">VietFunTravel</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                <?php if($this->session->userdata('permission')) {
                    $permission = json_decode($this->session->userdata('permission'),true);
                    $no_menu = array('tour','tourattribute','tourattributegroup','tourattributemeal','option','optionclass','optioncategory','migrate','tourattributetype','timeline','mail','scrolleremail','emailpermission','checkemail');
                    foreach ($permission as $key => $value) {
                        if(isset($value['chkReady'])){
                            if($key == 'tour'){ ?>
                            <li class="dropdown active" <?php if($this->uri->segment(1) == "tour"){echo 'style=""';} ?>>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tour <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>tourattribute">Thuộc Tính</a></li>
                                <li><a href="<?php echo base_url(); ?>tourattributegroup">Nhóm Thuộc Tính</a></li>
                                <li><a href="<?php echo base_url(); ?>tourattributemeal">Bữa Ăn</a></li>
                                <li><a href="<?php echo base_url(); ?>tourattributetype">Kiểu Thuộc Tính</a></li>
                                <li><a href="<?php echo base_url().$key; ?>">Sản Phẩm</a></li>
                                <li class="divider" style="background-color: #e5e5e5;"></li>
                                <li class="dropdown-submenu">
                                <a href="#">Option</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>option">Tùy Chọn</a></li>
                                        <li><a href="<?php echo base_url(); ?>optionclass">Lớp Tùy Chọn</a></li>
                                        <li><a href="<?php echo base_url(); ?>optioncategory">Danh Mục Tùy Chọn</a></li>
                                    </ul>
                                </li>
                              </ul>
                              </li>
                            <?php }elseif($key == 'mail') { ?>
                                <li class="dropdown active" <?php if($this->uri->segment(1) == "mail"){echo 'style=""';} ?>>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mail <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>checkemail">Kiểm Tra Email</a></li>
                                <li><a href="<?php echo base_url(); ?>emailpermission">Phân Quyền Email</a></li>
                                <li><a href="<?php echo base_url(); ?>checkemail/emaillist">Danh Sách Email</a></li>
                                <li><a href="<?php echo base_url(); ?>mail">Gửi Email</a></li>
                              </ul>
                              </li>
                            <?php }elseif(in_array($key,$no_menu) == false){ ?>
                                <li class="dropdown text-capitalize" <?php if($this->uri->segment(1) == $key){echo 'style=""';} ?>><a href="<?php echo base_url().$key; ?>"><?php echo $key;?></a></li>
                            <?php }} ?>
                <?php }} ?>
            </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-bell"></i>
                    <span class="badge badge-default">
                    7 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3><span class="bold">12 pending</span> notifications</h3>
                            <a href="extra_profile.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">just now</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-success">
                                    <i class="fa fa-plus"></i>
                                    </span>
                                    New user registered. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">3 mins</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                    </span>
                                    Server #12 overloaded. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">10 mins</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-warning">
                                    <i class="fa fa-bell-o"></i>
                                    </span>
                                    Server #2 not responding. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">14 hrs</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-info">
                                    <i class="fa fa-bullhorn"></i>
                                    </span>
                                    Application error. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">2 days</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                    </span>
                                    Database overloaded 68%. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">3 days</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                    </span>
                                    A user IP blocked. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">4 days</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-warning">
                                    <i class="fa fa-bell-o"></i>
                                    </span>
                                    Storage Server #4 not responding dfdfdfd. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">5 days</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-info">
                                    <i class="fa fa-bullhorn"></i>
                                    </span>
                                    System Error. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">9 days</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                    </span>
                                    Storage server failed. </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-envelope-open"></i>
                    <span class="badge badge-default">
                    4 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>You have <span class="bold">7 New</span> Messages</h3>
                            <a href="page_inbox.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/img/avatar2.jpg" class="img-circle" alt="">
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Lisa Wong </span>
                                    <span class="time">Just Now </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/img/avatar3.jpg" class="img-circle" alt="">
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Richard Doe </span>
                                    <span class="time">16 mins </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/img/avatar1.jpg" class="img-circle" alt="">
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Bob Nilson </span>
                                    <span class="time">2 hrs </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/img/avatar2.jpg" class="img-circle" alt="">
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Lisa Wong </span>
                                    <span class="time">40 mins </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed auctor 40% nibh congue nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/img/avatar3.jpg" class="img-circle" alt="">
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Richard Doe </span>
                                    <span class="time">46 mins </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-calendar"></i>
                    <span class="badge badge-default">
                    3 </span>
                    </a>
                    <ul class="dropdown-menu extended tasks">
                        <li class="external">
                            <h3>You have <span class="bold">12 pending</span> tasks</h3>
                            <a href="page_todo.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                    <span class="task">
                                    <span class="desc">New release v1.2 </span>
                                    <span class="percent">30%</span>
                                    </span>
                                    <span class="progress">
                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">40% Complete</span></span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="task">
                                    <span class="desc">Application deployment</span>
                                    <span class="percent">65%</span>
                                    </span>
                                    <span class="progress">
                                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">65% Complete</span></span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="task">
                                    <span class="desc">Mobile app release</span>
                                    <span class="percent">98%</span>
                                    </span>
                                    <span class="progress">
                                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">98% Complete</span></span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="task">
                                    <span class="desc">Database migration</span>
                                    <span class="percent">10%</span>
                                    </span>
                                    <span class="progress">
                                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">10% Complete</span></span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="task">
                                    <span class="desc">Web server upgrade</span>
                                    <span class="percent">58%</span>
                                    </span>
                                    <span class="progress">
                                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">58% Complete</span></span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="task">
                                    <span class="desc">Mobile development</span>
                                    <span class="percent">85%</span>
                                    </span>
                                    <span class="progress">
                                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">85% Complete</span></span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                    <span class="task">
                                    <span class="desc">New UI release</span>
                                    <span class="percent">38%</span>
                                    </span>
                                    <span class="progress progress-striped">
                                    <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">38% Complete</span></span>
                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" class="img-circle" src="<?php echo base_url(); ?>assets/admin/layout/img/photo2.jpg"/>
                    <span class="username username-hide-on-mobile">
                    Nick </span>
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="extra_profile.html">
                            <i class="icon-user"></i> My Profile </a>
                        </li>
                        <li>
                            <a href="page_calendar.html">
                            <i class="icon-calendar"></i> My Calendar </a>
                        </li>
                        <li>
                            <a href="inbox.html">
                            <i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
                            3 </span>
                            </a>
                        </li>
                        <li>
                            <a href="page_todo.html">
                            <i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
                            7 </span>
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="extra_lock.html">
                            <i class="icon-lock"></i> Lock Screen </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>login/logout">
                            <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle">
                    <i class="icon-logout"></i>
                    </a>
                </li>
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>