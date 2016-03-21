<?php define('url', base_url()."assets/");
 base_url(); ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Hệ Thống Quản Lý Viet Fun TraVel</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="" name="description">
        <meta content="" name="author">
        <?php echo $css; ?>
        <link href="<?=url;?>css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?=url;?>css/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
        <link href="<?=url;?>js/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?=url;?>css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
        <link href="<?=url;?>css/plugins.css" rel="stylesheet" type="text/css">
        <link href="<?=url;?>css/tasks.css" rel="stylesheet" type="text/css"/>
<!--        <link href="--><?//=url;?><!--css/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css">-->
        <link href="<?=url;?>css/my_style.css" rel="stylesheet" type="text/css">
        <link href="<?=url;?>css/layout.css" rel="stylesheet" type="text/css">
        <link href="<?=url;?>css/custom.css" rel="stylesheet" type="text/css">
        <link href="<?=url;?>css/custom.css" rel="stylesheet" type="text/css">
        <link href="<?=url;?>css/tokens.css" rel="stylesheet" type="text/css">
        <link href="<?=url;?>css/summernote.css" rel="stylesheet" type="text/css">
        <link href="<?=url;?>css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link href="<?=url;?>css/themes/default.css" rel="stylesheet" type="text/css">
        <link href="<?=url;?>datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
        <link href="<?=url;?>datepicker/to/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
        <script src="<?=url;?>js/jquery.min.js" type="text/javascript"></script>
        <script src="<?=url;?>js/angular.min.js"></script>
        <script src="<?=url;?>js/demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>

    </head>
    <body >
        <?php echo $body; ?>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>

        <script src="<?=url;?>js/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?=url;?>js/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?=url;?>js/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=url;?>js/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?=url;?>js/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=url;?>js/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=url;?>js/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="<?=url;?>js/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?=url;?>js/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?=url;?>js/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?=url;?>js/moment.min.js" type="text/javascript" ></script>
        <script src="<?=url;?>js/components-pickers.js"></script>
        <script src="<?=url;?>js/metronic.js" type="text/javascript"></script>
        <script src="<?=url;?>js/layout.js" type="text/javascript"></script>
        <script src="<?=url;?>js/autocomplete.js" type="text/javascript"></script>
        <script src="<?=url;?>js/ui-bootstrap-tpls-0.9.0.js" type="text/javascript"></script>
        <script src="<?=url;?>js/main.js" type="text/javascript"></script>
        <script src="<?=url;?>js/tasks.js" type="text/javascript"></script>
        <script src="<?=url;?>js/autocomplete.js" type="text/javascript"></script>
        <script src="<?=url;?>js/ui-bootstrap-tpls-0.9.0.js" type="text/javascript"></script>

        <script src="<?=url;?>js/jquery-ui/jquery.ui.widget.js" type="text/javascript"></script>
        <script src="<?=url;?>js/jquery-ui/jquery.iframe-transport.js" type="text/javascript"></script>
        <script src="<?=url;?>js/jquery-ui/jquery.fileupload.js" type="text/javascript"></script>

<script type="text/javascript">
    $('#btnAlert').on('click',function(){
        popup('Bạn có muốn nhận Order này không??','viết cái gì thì viết!');
    });
    function popup(title,body){
        url = "<?php echo site_url('main/main_ajax/main_ajaxify'); ?>";
        CIS.Ajax.request(url, {
            type: 'POST',
            data:{title:title,body:body},
            context: this
        });
        return false;
    }
</script>
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
  /*Index.init();*/ // init index page
        Tasks.initDashboardWidget(); // init tash dashboard widget
       /*ComponentsEditors.init();*/
       /*QuickSidebar.init();*/ // init quick sidebar
        /*Demo.init();*/ // init demo features
        /*Index.initCalendar();*/ 
       ComponentsPickers.init();
    });
</script>
<!-- END JAVASCRIPTS -->
<?php echo $js; ?>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
<style type="text/css">
    html{background: #FFF}
</style>
</html>