<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cloudnausor Technologies</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=base_url();?>images/logo.png" rel="icon">
  <link href="<?=base_url();?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- vendor1 CSS Files -->
  <link href="<?=base_url();?>assets/vendor1/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/vendor1/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/vendor1/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/vendor1/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/vendor1/venobox/venobox.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/vendor1/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/vendor1/aos/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Template Main CSS File -->
  <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet">
</head>
<style>
#cart-count{
	font-weight: bold;
    border-radius: 50%;
    margin-top: -20px;
    margin-left: -195px;
}
</style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-scrolled">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html"><img src="<?=base_url();?>images/logo.png"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?=base_url();?>">Cloudnausor Products</a></li>
          
        </ul>
      </nav><!-- .nav-menu -->
		<?php
		if($this->session->userdata('logged_in')==TRUE) {
		?>
	 <a href="#" onclick="userlogout()" class="get-started-btn scrollto"><?=$this->session->userdata('u_name');?></a>
	 <a href="<?=base_url();?>Products/ViewCart" class="get-started-btn scrollto"><i class="fa fa-shopping-cart"></i></a>
	 <a href="<?=base_url();?>Products/ViewCart"><span class="btn btn-danger" id="cart-count"><?=$c_count;?></span></a>
	 <a href="<?=base_url();?>Products/Myorders" class="get-started-btn scrollto">My Orders</a>
		<?php } else { ?>
      <a href="<?=base_url();?>Products/Userlogin" target="_blank" class="get-started-btn scrollto">User Login</a>
		<?php } ?>
    </div>
  </header><!-- End Header -->
<script>
function userlogout()
{
	var data = 'logout';
	var confirmation = confirm("Are you sure want to Logout?");
	if(confirmation)
	{
		$.ajax({
				type: 'post',
				url: '<?=base_url();?>Products/Userlogout',
				data: {data:data},
				success: function (result) 
				{
					location.reload();
				}
			  });
	}
}
</script>