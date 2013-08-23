<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Meet Univ</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap -->
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link href="<?php echo base_url();?>assets/css/univ_style.css" rel="stylesheet" media="screen">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Ledger' rel='stylesheet' type='text/css'>
      <script src="<?php echo base_url();?>assets/js/modernizr-2.6.2.min.js"></script>
   </head>
   <body>
      <!--code by webinfomart-->
      <!--header-->
      <div id="gap"></div>
      <header role="banner">
         <div class="row container">
            <h1>Meet Univ</h1>
            <a href="<?php echo base_url()?>" id="logo"><img src="<?php echo base_url();?>assets/img/logo.png" alt="Meet Univ"></a>
            <nav role="navigation" id="top_menu">
               <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="college-listing.html">Colleges</a></li>
                  <li><a href="connect_listing.html">Events</a></li>
                  <li><a href="blog.html">Articles </a></li>
               </ul>
            </nav>
			<div class="btn-group pull-right" style="margin-top:13px">
				<button class="btn btn-small"><a href="/sign-in">LOG IN</a></button>
				<button class="btn btn-small"><a href="<?php echo base_url('register')?>">SIGN UP</a></button>	
       		</div>
            <!--<aside id="login"  class="btn-group">
               <button class="btn" onclick="location.href='<?php echo base_url('register')?>'">SignUp</button>
               <button class="btn btn-small dropdown-toggle" >SignIn <i class="icon-chevron-down icon-white"></i></button>
            </aside>-->
         </div>
      </header>
      <!--end header-->