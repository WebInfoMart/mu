<!DOCTYPE html>
<html lang="en">
	<!---<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />--->
   <head>
      <title><?php echo $title?></title>
		<?php if(!empty($individualCollege)){?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php } ?>
		<meta name="description" content="<?php echo $description?>" />
		<?php if(!empty($canonical)){ ?>
		<link rel="canonical" href="<?php echo $canonical ?>" />
		<?php }else{ ?>
		<link rel="canonical" href="http://meetuniv.com" />
		<?php } ?>
		<meta name="DC.title" content="study abroad scholarships" />
		<meta name="geo.region" content="IN-DL" />
		<meta name="geo.placename" content="New Delhi" />
		<meta name="geo.position" content="28.635308;77.22496" />
		<meta name="ICBM" content="28.635308, 77.22496" />
		<meta name="copyright" content=" copyright © 2014 - meetuniv.com" />
		<meta name="author" content="meetuniv.com" />
		<meta name="subject" content="study abroad scholarships" />
		<meta name="rating" content="general" />
		<meta name="GOOGLEBOT" content="Index, Follow" />
		<meta name="robots" content="all" />
		<meta name="robots" content="index, follow" />
      <!-- Bootstrap -->
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png" />
      <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link href="<?php echo base_url();?>assets/css/univ_style.css" rel="stylesheet" media="screen">
      <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet" media="screen">
	  <link href="<?php echo base_url();?>assets/css/bootstrap_calendar.css" rel="stylesheet" media="screen">
      <link href="<?php echo base_url();?>assets/css/select2.css" rel="stylesheet" media="screen">
      <link href="<?php echo base_url();?>assets/css/univ-slider.css" rel="stylesheet" media="screen">
	  <link href="<?php echo base_url();?>assets/css/bootstrap-tour.css" rel="stylesheet" media="screen">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Ledger' rel='stylesheet' type='text/css'>
	  
	  
	  
	  
      <script src="<?php echo base_url();?>assets/js/modernizr-2.6.2.min.js"></script>
   </head>
   <body>
   <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40054769-1', 'meetuniv.com');
  ga('send', 'pageview');

</script>
      <!--code by webinfomart-->
      <!--header-->
      <div id="gap"></div>
      <header role="banner">
         <div class="row container">
            <h1>Meet Univ</h1>
            <a href="<?php echo base_url()?>" id="logo"><img src="<?php echo base_url();?>assets/img/new_logo.png" alt="Meet Univ"></a>
            <nav role="navigation" id="top_menu">
               <ul>
                  <li <?php if($active=='college'){ ?>class="active"<?php } ?>><a href="<?php echo base_url('college-study-in-abroad');?>">Colleges</a></li>
                  <li <?php if($active=='connect'){ ?>class="active"<?php } ?>><a href="<?php echo base_url('connect');?>">Connect</a></li>
                  <!--<li><a href="#">Courses</a></li>
                  <li><a href="#">Councel</a></li>-->
                  <li><a href="<?php echo base_url('learn/edurator');?>">Learn</a></li>
                  <li <?php if($active=='ielts-preparation'){ ?>class="active"<?php } ?>><a href="<?php echo base_url('ielts-preparation');?>">TestPrep</a></li>
                  <li <?php if($active=='gifted'){ ?>class="active"<?php } ?>><a href="<?php echo base_url('gifted-intro');?>">Gifted</a></li>
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