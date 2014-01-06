<?php /* Smarty version 2.6.20, created on 2014-01-04 05:03:17
         compiled from header.tpl */ ?>
﻿<!DOCTYPE html>
<!--[if IE 7 | IE 8]>
<html class="ie" dir="ltr" lang="en">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html dir="ltr" lang="en">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=1024,maximum-scale=1.0">
<title><?php echo $this->_tpl_vars['meta_title']; ?>
</title>
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge,chrome=1">  
<?php if ($this->_tpl_vars['no_index'] == '1'): ?>
<meta name="robots" content="noindex,nofollow">
<META NAME="GOOGLEBOT" CONTENT="NOINDEX, NOFOLLOW">
<?php endif; ?>
<meta name="title" content="<?php echo $this->_tpl_vars['meta_title']; ?>
" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['meta_keywords']; ?>
" />
<meta name="description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
" />
<link rel="shortcut icon" href="<?php echo @_URL; ?>
/<?php echo @_UPFOLDER; ?>
/favicon.ico">
<?php if ($this->_tpl_vars['rss'] == "video-category"): ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->_tpl_vars['meta_title']; ?>
" href="<?php echo @_URL; ?>
/rss.php?c=<?php echo $this->_tpl_vars['cat_id']; ?>
" />
<?php elseif ($this->_tpl_vars['rss'] == "article-category"): ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->_tpl_vars['meta_title']; ?>
" href="<?php echo @_URL; ?>
/rss.php?c=<?php echo $this->_tpl_vars['cat_id']; ?>
&feed=articles" />
<?php endif; ?>

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/bootstrap-responsive.min.css">
<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/new-style.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/uniform.default.min.css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" rel="stylesheet" type="text/css">
<!--[if IE]>
<?php echo '
<link rel="stylesheet" type="text/css" media="screen" href="'; ?>
<?php echo @_URL; ?>
<?php echo '/templates/'; ?>
<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/css/new-style-ie.css">
'; ?>


<!-- CSS Tabes -->

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/css-tabs/bootstrap.css">

<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:700italic" rel="stylesheet" type="text/css">
<![endif]-->

<!--MAIN-->
      <link rel="shortcut icon" href="http://meetuniv.com/assets/img/favicon.png">
      <link href="http://meetuniv.com/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link href="http://meetuniv.com/assets/css/univ_style.css" rel="stylesheet" media="screen">
      <link href="http://meetuniv.com/assets/css/font-awesome.css" rel="stylesheet" media="screen">
	  <link href="http://meetuniv.com/assets/css/bootstrap_calendar.css" rel="stylesheet" media="screen">
      <link href="http://meetuniv.com/assets/css/select2.css" rel="stylesheet" media="screen">
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic" rel="stylesheet" type="text/css">
      <link href="http://fonts.googleapis.com/css?family=Ledger" rel="stylesheet" type="text/css">
	  <link rel="stylesheet" type="text/css" href="http://meetuniv.com/assets/css/demo.css">
<!--ENDS HERE MAIN-->

<script type="text/javascript">
 var MELODYURL = "<?php echo @_URL; ?>
";
 var MELODYURL2 = "<?php echo @_URL2; ?>
";
 var TemplateP = "<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
";
 var _LOGGEDIN_ = <?php if ($this->_tpl_vars['logged_in']): ?> true <?php else: ?> false <?php endif; ?>;
</script>
<?php echo '
<script type="text/javascript">
 var pm_lang = {
	lights_off: "'; ?>
<?php echo $this->_tpl_vars['lang']['lights_off']; ?>
<?php echo '",
	lights_on: "'; ?>
<?php echo $this->_tpl_vars['lang']['lights_on']; ?>
<?php echo '",
	validate_name: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_name']; ?>
<?php echo '",
	validate_username: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_username']; ?>
<?php echo '",
	validate_pass: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_pass']; ?>
<?php echo '",
	validate_captcha: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_captcha']; ?>
<?php echo '",
	validate_email: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_email']; ?>
<?php echo '",
	validate_agree: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_agree']; ?>
<?php echo '",
	validate_name_long: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_name_long']; ?>
<?php echo '",
	validate_username_long: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_username_long']; ?>
<?php echo '",
	validate_pass_long: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_pass_long']; ?>
<?php echo '",
	validate_confirm_pass_long: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_confirm_pass_long']; ?>
<?php echo '",
	choose_category: "'; ?>
<?php echo $this->_tpl_vars['lang']['choose_category']; ?>
<?php echo '",
 	validate_select_file: "'; ?>
<?php echo $this->_tpl_vars['lang']['upload_errmsg10']; ?>
<?php echo '",
 	validate_video_title: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_video_title']; ?>
<?php echo '",
	onpage_delete_favorite_confirm: "'; ?>
<?php echo $this->_tpl_vars['lang']['myfavorites_delete_alert_confirm']; ?>
<?php echo '",
	please_wait: "'; ?>
<?php echo $this->_tpl_vars['lang']['please_wait']; ?>
<?php echo '",
 }
</script>
'; ?>


<script type="text/javascript" src="<?php echo @_URL; ?>
/js/swfobject.js"></script>
<script type="text/javascript" src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/js/js-tabs/jquery.js"></script>
<script type="text/javascript" src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/js/js-tabs/bootstrap-tab.js"></script>

<?php if ($this->_tpl_vars['facebook_image_src'] != ''): ?>
<link rel="image_src" href="<?php echo $this->_tpl_vars['facebook_image_src']; ?>
" />
<?php if ($this->_tpl_vars['video_data']['source_id'] == 3): ?>
	<link rel="video_src" href="<?php echo $this->_tpl_vars['video_data']['direct']; ?>
"/>
<?php else: ?>
	<link rel="video_src" href="<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
"/>
<?php endif; ?>
<meta property="og:image" content="<?php echo $this->_tpl_vars['facebook_image_src']; ?>
" />
<?php endif; ?>
<style type="text/css"><?php echo $this->_tpl_vars['theme_customizations']; ?>
</style>
<?php if (isset ( $this->_tpl_vars['mm_header_inject'] )): ?><?php echo $this->_tpl_vars['mm_header_inject']; ?>
<?php endif; ?>
</head>
<body>
<?php if ($this->_tpl_vars['maintenance_mode']): ?>
	<div class="alert alert-danger" align="center"><strong>Currently running in maintenance mode.</strong></div>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['mm_body_top_inject'] )): ?><?php echo $this->_tpl_vars['mm_body_top_inject']; ?>
<?php endif; ?>

   <div id="gap"></div>
   <header role="banner">
         <div class="row container">
            <h1>Meet Univ</h1>
            <a href="http://meetuniv.com/" id="logo"><img src="http://meetuniv.com/assets/img/new_logo.png" alt="Meet Univ"></a>
            <nav role="navigation" id="top_menu">
               <ul>
                  <li><a href="http://meetuniv.com/college">Colleges</a></li>
                  <li><a href="http://meetuniv.com/connect">Connect</a></li>
                  <!--<li><a href="#">Courses</a></li>
                  <li><a href="#">Councel</a></li>-->
                  <li><a href="http://meetuniv.com/learn/edurator">Learn</a></li>
                  <!--<li><a href="#">Blog</a></li>-->
               </ul>
            </nav>			
         </div>
      </header>

<a id="top"></a>
<?php if ($this->_tpl_vars['ad_1'] != ''): ?>
<div class="pm-ad-zone" align="center"><?php echo $this->_tpl_vars['ad_1']; ?>
</div>
<?php endif; ?>