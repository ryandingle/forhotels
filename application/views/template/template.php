<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="<?php echo base_url();?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $title;?></title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-3.1.1/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-3.1.1/css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="assets/datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/additional.css" />
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.0.3/css/font-awesome.css" />
    <script type="text/javascript" src="assets/js/core.js"></script>
    <script type="text/javascript" src="assets/js/global.js"></script>
	<script type="text/javascript" src="assets/datepicker/js/bootstrap-datepicker.js"></script>
</head>
<body style="background-color: #F9F9F9;">
<?php $this->load->view('includes/nav');?>
<?php $this->load->view('includes/box');?>
	<div class="container">
    <div style="margin-top: 5%;" class="container mainpage">
    <?php $this->load->view($content);?>
    </div>
</div>
<div>
	<?php $this->load->view('includes/footer');?>
</div>
<script type="text/javascript" src="assets/js/auto.js"></script>
<script type="text/javascript" src="assets/js/date.js"></script>
<script type="text/javascript" src="assets/js/scroll.js"></script>
<script type="text/javascript" src="assets/bootstrap-3.1.1/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/act_proto.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
<script type="text/javascript" src="assets/js/editor.js"></script>
</body>
</html>