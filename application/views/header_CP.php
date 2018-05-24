<?php
/**
 * @author Tuan Anh <htc.hoangtuananh@gmail.com>
 */
  defined('BASEPATH') OR exit('No direct script access allowed');
  
?>

<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?= $this->lang->line('Content Management System');?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().'assets/wp-content/uploads/2015/10/fav.png'?>">
    <meta name="keywords" content=""/>
    <meta name="language" content="vi"/>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->

    <link rel='stylesheet' id='boostrap-css' href='<?php echo base_url()."assets/css/bootstrap.min.css"?>'/>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.min.css'?>">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/datatables.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-toggle.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/_all-skins.min.css'?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery.Jcrop.css'?>" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-colorpicker.min.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/imgareaselect-default.css'?>" />
    <script  type='text/javascript' src="<?php echo base_url().'assets/js/jQuery.min.js'?>"></script>
	
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
	 <script src="<?php echo base_url().'assets/js/jquery.validate.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/datatables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/custom.js'?>"></script>
	
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'assets/js/adminlte.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-colorpicker.min.js'?>"></script>
	
	<script src="<?php echo base_url().'assets/js/jquery.Jcrop.js'?>"></script>
</head>
<script>
    $(function () {
        $('#color-picker').colorpicker();
    });
</script>
<script type="text/javascript">
    function changeFunc() {
        var selectBox = document.getElementById("lang-dropdown");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var csrf = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrf_token = '<?php echo $this->security->get_csrf_hash(); ?>';
        
        $.ajax({
            data: {'lang': selectedValue, '<?php echo $this->security->get_csrf_token_name(); ?>' : csrf_token},
            type: "POST",
            url: '<?= base_url()."ChangeLang/change"?>',
        }).success(function (result) {
            location.reload();
        });
    }
</script>

<?php if($this->session->site_lang == 'vie'):?>
<script>

	$.extend(jQuery.validator.messages, {
		required: "Không được để trống trường này",
		//remote: "Please fix this field.",
		email: "Email chưa hợp lệ",
		//url: "Please enter a valid URL.",
		//date: "Please enter a valid date.",
		//dateISO: "Please enter a valid date (ISO).",
		number: "Chỉ nhập số vào đây",
		digits: "Không nhập số vào đây",
		//creditcard: "Please enter a valid credit card number.",
		//equalTo: "Please enter the same value again.",
		//accept: "Please enter a value with a valid extension.",
		//maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
		//minlength: jQuery.validator.format("Please enter at least {0} characters."),
		//rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
		//range: jQuery.validator.format("Please enter a value between {0} and {1}."),
		min: jQuery.validator.format("Nhập một số lớn hơn hoặc bằng {1}.")
	});
</script>
<?php endif;?>

<body class="skin-red-light sidebar-mini" style="height: auto; min-height: 100%;">
    <header class="main-header">
              <!-- Logo -->
            <a class="logo"  href="<?php echo base_url()?>">
                 <span class="logo-lg">Admin control panel</span>
                 <span class="logo-mini"><b>A</b>LT</span>
            </a>

            <div class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="changeLang">
                            <a id="changeLang-link"><i class="fa fa-globe fa-fw"></i> <?= $this->session->site_lang?></a>

                                <select id="lang-dropdown" class="hidden form-control" onchange="changeFunc();">
                                    <option value="eng">--</option>
                                    <option value="eng">English</option>
                                    <option value="vie">Tiếng Việt</option>
                                </select>

                        </li>
                   <?php if($this->session->admin_logged_in == TRUE):?>
                    <li>
                        <a class="title" href="<?php echo base_url().'index.php/AdminCP'?>"><?php echo $this->session->username ?></a>
                    </li>
                    <li>
                        <a class="title" href="<?php echo base_url().'index.php/logout'?>"><?= $this->lang->line('Log out');?></a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a class="title"><?= $this->lang->line('Havent logged in yet');?></a>
                    </li>
                <?php endif;?>
                    </ul>
                </div>
            </div>
    </header>
    <div class="row">
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">






		