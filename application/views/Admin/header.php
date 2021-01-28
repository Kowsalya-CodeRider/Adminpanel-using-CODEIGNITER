<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Cloudnausor Technologies</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS --> 
	<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url();?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url();?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url();?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url();?>images/logo.jpg">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.3/css/colReorder.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>	
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>	
<script src="https://cdn.datatables.net/scroller/2.0.3/js/dataTables.scroller.min.js"></script>	
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>	
<script>
$(document).ready(function() {
	 $.noConflict();
    var table = $('#example').dataTable( {
        colReorder: true,
        responsive: true
    } );
	$('.copyright').css('display','none');
} );
</script>
</head>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">