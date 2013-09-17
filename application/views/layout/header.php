<!DOCTYPE html>
<html lang="en">
   <head>
      <title>University Connect - Education Fairs,  Spot Admission, University Visits, Universities, Courses, Test Prepration - MeetUniv.Com</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap -->
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png" />
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link href="<?php echo base_url();?>assets/css/univ_style.css" rel="stylesheet" media="screen">
      <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" media="screen">
	  <link href="<?php echo base_url();?>assets/css/bootstrap_calendar.css" rel="stylesheet" media="screen">
      <link href="<?php echo base_url();?>assets/css/select2.css" rel="stylesheet" media="screen">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Ledger' rel='stylesheet' type='text/css'>
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/crousel-css/demo.css" />
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/crousel-css/style.css" />
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/crousel-css/jquery.jscrollpane.css" media="all" />
	  
	  
	  
	  
      <script src="<?php echo base_url();?>assets/js/modernizr-2.6.2.min.js"></script>
   </head>
   <body>
      <!--code by webinfomart-->
      <!--header-->
      <div id="gap"></div>
      <header role="banner">
         <div class="row container">
            <h1>Meet Univ</h1>
            <a href="<?php echo base_url()?>" id="logo"><img src="<?php echo base_url();?>assets/img/logo_temp.png" alt="Meet Univ"></a>
            <nav role="navigation" id="top_menu">
               <ul>
                  <li><a href="<?php echo base_url('college');?>">Colleges</a></li>
                  <li><a href="<?php echo base_url('connect');?>">Connect</a></li>
                  <!--<li><a href="#">Courses</a></li>
                  <li><a href="#">Councel</a></li>-->
                  <li><a href="<?php echo base_url('learn');?>">Learn</a></li>
                  <!--<li><a href="#">Blog</a></li>-->
               </ul>
            </nav>
			<?php if(isset($userId)){?>
			<div class="btn-group pull-right" style="margin-top:13px">
				<a class="btn btn-small" href="<?php echo base_url('auth/profileDashboard')?>" style="background: #0073d1;color: white;"><?php echo($userData['fullname'])?></a>
				<a class="btn btn-small" href="<?php echo base_url('auth/logout')?>">LOG OUT</a>	
       		</div>
			<?php }else{?>
			<div class="btn-group pull-right" style="margin-top:13px">
				<a class="btn btn-small" href="<?php echo base_url('login')?>">LOG IN</a>
				<a class="btn btn-small" href="<?php echo base_url('register')?>">SIGN UP</a>	
       		</div>
			<?php }?>
            <!--<aside id="login"  class="btn-group">
               <button class="btn" onclick="location.href='<?php echo base_url('register')?>'">SignUp</button>
               <button class="btn btn-small dropdown-toggle" >SignIn <i class="icon-chevron-down icon-white"></i></button>
            </aside>-->
			
         </div>
      </header>
      <!--end header-->