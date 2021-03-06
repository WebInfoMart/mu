<?php
if ($_POST['action'] == 'testmail') // AJAX
{
	session_start();
	require_once('../config.php');
	include_once('functions.php');
	include_once( ABSPATH . 'include/user_functions.php');
	include_once( ABSPATH . 'include/islogged.php');
	
	$error = false;
	if ( ! $logged_in || ! is_admin())
	{
		$error = true;
		$ajax_msg = ($logged_in) ? 'Permission denied! You are not an administrator.' : 'Please log in.';
	}
	
	extract($_POST);
	
	if (empty($mail_server) || empty($mail_port) || empty($mail_user) || empty($mail_pass) || empty($contact_email))
	{
		$error = true;
		$ajax_msg = 'Please fill in all the required details.';
	}
	
	if ($error)
	{
		$ajax_msg = '<div class="alert alert-error">'. $ajax_msg .'</div>';
		echo json_encode(array('message' => $ajax_msg));
		exit();
	}
	
	require_once(ABSPATH .'include/class.phpmailer.php');
	 
	
	$mail = new PHPMailer();
	$mail->SetLanguage("en", "include/");
	
	if ($mail_smtp == '1') 
	{
		$mail->IsSMTP();
	}

	$mail->Subject = 'Test email from '. _SITENAME;
	$mail->Host 	= $mail_server;
	$mail->SMTPAuth = true;
	$mail->Port 	= $mail_port;
	$mail->Username = $mail_user;
	$mail->Password = $mail_pass;
	$mail->From 	= $contact_email;
	$mail->FromName = html_entity_decode(_SITENAME, ENT_QUOTES);
	$mail->CharSet = "UTF-8";
	$mail->AddAddress($contact_email); 
	$mail->IsHTML(false); 
	
	$mailcontent = "Hey!\n\n
This is a test mail sent from your site powered by PHP Melody.\n
If received this email you can rest assured. Your e-mail settings are OK and PHP Melody can send emails.\n Yey!:)";
	
	$mail->Body = $mailcontent;
	
	if ( ! @$mail->Send())
	{
		$ajax_msg = '<div class="alert alert-error">'. $mail->ErrorInfo .'</div>';
	}
	else 
	{
		$ajax_msg = '<div class="alert alert-success">Test mail delivered successfully to <strong>'. $contact_email .'</strong>. Check your Inbox (and/or the spam box) for the confirmation email. Remember to <strong>Save</strong> your settings if everything is fine.</div>'; 
	}
	
	echo json_encode(array('message' => $ajax_msg));
	
	exit();
}


$showm = '8';
/*
$load_uniform = 0;
$load_ibutton = 0;
$load_tinymce = 0;
$load_swfupload = 0;
$load_colorpicker = 0;
$load_prettypop = 0;
*/
$load_colorpicker = 1;
$load_scrolltofixed = 1;
include('header.php');

//$config	= get_config();

$inputs = array();
$info_msg = '';
$video_sources = a_fetch_video_sources();


if (_MOD_SOCIAL && ! array_key_exists('activity_options', $config))
{
	add_config('activity_options', serialize($default_activity_options));
}

if ($_POST['submit'] == "Save" && ( ! csrfguard_check_referer('_admin_settings')))
{
	$info_msg = 'Invalid token or session expired. Please load this page from the menu and try again.'; 
}
else if ($_POST['submit'] == "Save")
{
	$req_fields = array("contact_mail" => "Contact mail",
						"isnew_days" => "Mark video as 'new' for",
						"ispopular" => "Mark video as 'popular' for",
						"comments_page" => "Comments per page"
					);
	$num_fields = array('isnew_days', 'ispopular', 'comments_page', 'account_activation', 'issmtp', 'player_autoplay', 'player_autobuff', 'default_lang', 'player_w', 'player_h', 'player_w_index', 'player_h_index', 'player_w_favs', 'player_h_favs', 'player_w_embed', 'player_h_embed', 'mod_article', 'gzip', 'bin_rating_allow_anon_voting', 'maintenance_mode');
	foreach($_POST as $k => $v)
	{
		if($_POST[$k] == '' && in_array($k, $req_fields))
		{
			$info_msg .= "'".$req_fields[$k] . "' field cannot be left blank!";
		}
		if(in_array($k, $num_fields))
		{
			$v = (int) $v;
			$v = abs($v);
			$inputs[$k] = $v;
		}
		else if ( ! is_array($v))
			$inputs[$k] = $v;
	}
	
	if($inputs['videoads_delay'] == '')
		$inputs['videoads_delay'] = 0;
	switch($inputs['videoads_delay_timespan'])
	{
		case 'minutes':
			$inputs['videoads_delay'] = $inputs['videoads_delay'] * 60;
		break;
		case 'hours':
			$inputs['videoads_delay'] = $inputs['videoads_delay'] * 60 * 60;
		break;
	}
	
	//preroll_ads_delay
	if($inputs['preroll_ads_delay'] == '')
		$inputs['preroll_ads_delay'] = 0;
	switch($inputs['preroll_ads_delay_timespan'])
	{
		case 'minutes':
			$inputs['preroll_ads_delay'] = $inputs['preroll_ads_delay'] * 60;
		break;
		case 'hours':
			$inputs['preroll_ads_delay'] = $inputs['preroll_ads_delay'] * 60 * 60;
		break;
	}
	
	//	Template has changed? Clear the Smarty Cache & Compile directories
	if ($inputs['jwplayerskin'] != $config['jwplayerskin'])
	{
		//	empty compile directory
		$dir = opendir($smarty->compile_dir);
		while (false !== ($file = readdir($dir)))
		{
			if(strlen($file) > 2)
			{
				$ext = strtolower(array_pop(explode('.', $file)));
				if ($ext == 'php' && strpos($file, '%') !== false)
				{
					unlink($smarty->compile_dir .'/'. $file);
				}
			}
		}
		closedir($dir);
		
		//	empty cache directory
		$dir = opendir($smarty->cache_dir);
		while (false !== ($file = readdir($dir)))
		{
			if(strlen($file) > 2)
			{
				$ext = strtolower(array_pop(explode('.', $file)));
				if ($ext == 'php' && strpos($file, '%') !== false)
				{
					unlink($smarty->cache_dir .'/'. $file);
				}
			}
		}
		closedir($dir);
	}
	
	// moderator permissions
	$perms = '';
	// mod_can_manage_users
	$perms .= 'manage_users:';
	$perms .= ($_POST['mod_can_manage_users'] == "1") ? '1' : '0'; 
	$perms .= ';';
	// mod_can_manage_comments
	$perms .= 'manage_comments:';
	$perms .= ($_POST['mod_can_manage_comments'] == "1") ? '1' : '0'; 
	$perms .= ';';
	// mod_can_manage_videos
	$perms .= 'manage_videos:';
	$perms .= ($_POST['mod_can_manage_videos'] == "1") ? '1' : '0'; 
	$perms .= ';';
	$perms .= 'manage_articles:';
	$perms .= ($_POST['mod_can_manage_articles'] == "1") ? '1' : '0'; 
	$perms .= ';';
	
	if($info_msg == '')
	{
		update_config('moderator_can', $perms);
		
		if ($inputs['allow_user_uploadvideo_unit'] == 'MB')
		{
			$inputs['allow_user_uploadvideo_bytes'] = (int)$inputs['allow_user_uploadvideo_bytes'] .'M';
		}
		else if ($inputs['allow_user_uploadvideo_unit'] == 'KB')
		{
			$inputs['allow_user_uploadvideo_bytes'] = (int)$inputs['allow_user_uploadvideo_bytes'] .'K';
		}
		$inputs['allow_user_uploadvideo_bytes'] = return_bytes($inputs['allow_user_uploadvideo_bytes']);
		
		$upload_max_filesize = return_bytes(ini_get('upload_max_filesize'));
		$post_max_size = return_bytes(ini_get('post_max_size'));
		
		if (_MOD_SOCIAL)
		{	
			$loggables = activity_load_options();
			
			foreach ($loggables as $activity => $v)
			{
				if (array_key_exists('loggable_activity_'.$activity, $inputs))
				{
					$loggables[$activity] = 1;
					unset($inputs['loggable_activity_'. $activity]);
				}
				else
				{
					$loggables[$activity] = 0;
				}
			}
			update_config('activity_options', serialize($loggables), true);

			unset($loggables);
		}
		$inputs['player_timecolor'] = str_replace('#', '', $inputs['player_timecolor']);
		$inputs['player_bgcolor'] = str_replace('#', '', $inputs['player_bgcolor']);
		
		foreach ($inputs as $config_name => $config_value)
		{
			if ($config_name != 'submit' && $config_name != 'allow_user_uploadvideo_unit')
			{	
				update_config($config_name, $config_value, true);
			}
		}

		if((int) readable_filesize($config['allow_user_uploadvideo_bytes']) != $inputs['allow_user_uploadvideo_bytes']) {
		
			
			if ($inputs['allow_user_uploadvideo_bytes'] > $upload_max_filesize || $inputs['allow_user_uploadvideo_bytes'] > $post_max_size)
			{
				//$info_msg = 'It appears that your <strong>Max. upload size</strong> (Under "User Settings") is greater than your <a href="sys_phpinfo.php">PHP configuration</a> allows.<strong>Contact your hosting provider and ask them to increase "<em>upload_max_filesize</em>" and "<em>post_max_size</em>" to match your requirements.</strong>';
				
				// change back to old value
				$inputs['allow_user_uploadvideo_bytes'] = $config['allow_user_uploadvideo_bytes'];
			}
		}
		
		$player_config = "{embedded: true,
							showOnLoadBegin: true, 
							useHwScaling: false, 
							menuItems: [false, false, true, true, true, false, false], 
							timeDisplayFontColor: '0x". $inputs['player_timecolor'] ."', 
							controlBarBackgroundColor: '0x". $inputs['player_bgcolor'] ."', 
							progressBarColor2: '0x000000', 
							progressBarColor1: '0xFFFFFF', 
							controlsOverVideo: 'locked', 
							controlBarGloss: 'high', 
							initialScale: 'fit', 
							hideControls: false, 
							autoPlay: false,
							autoBuffering: true,
							watermarkLinkUrl: '". $inputs['player_watermarklink'] ."', 
							showWatermark: '". $inputs['player_watermarkshow'] ."', 
							watermarkUrl: '". $inputs['player_watermarkurl']  ."', 
							playList: [ { overlayId: 'play', 
									  name: 'ClickToPlay'
									 }, 
									 {  linkWindow: '_blank', 
										linkUrl: '". _URL ."/watch.php?vid=___UNIQ___', 
										url: '". _URL ."/videos.php?vid=___UNIQ___', 
										name: ''
									 }]}";

		$player_config = rawurlencode($player_config);
		$player_config = _URL .'/player.swf?config='. $player_config;
		
		@chmod(ABSPATH .'admin/temp/embedparams.xml', 0755);
		if (is_writable(ABSPATH .'admin/temp/embedparams.xml'))
		{
			$fp = fopen('./temp/embedparams.xml', 'w');
			fwrite($fp, $player_config, strlen($player_config));
			fclose($fp);
		}
		else
		{
			$info_msg = 'File "/admin/temp/embedparams.xml" is not writable. Please CHMOD this file to 0777 and retry.';
		}
		
		// jw player skin
		if ( ! isset($config['auto_feature'])) // silent update
		{
			$sql = "INSERT INTO pm_config 
						(name, value) 
					VALUES ('auto_feature', '". secure_sql($_POST['auto_feature']) ."')";
			@mysql_query($sql);
			
			$config['auto_feature'] = $_POST['auto_feature'];
		}
		
		if ($config['video_player'] == 'jwplayer' || $_POST['video_player'] == 'jwplayer')
		{
			@chmod(ABSPATH .'jwembed.xml', 0755);
			if (file_exists(ABSPATH .'jwembed.xml') && is_writable(ABSPATH .'jwembed.xml'))
			{
				$write_this = '';
				$write_this .= "<config>\n";
				$write_this .= " <backcolor>". $inputs['player_bgcolor'] ."</backcolor>\n";
				$write_this .= " <frontcolor>". $inputs['player_timecolor'] ."</frontcolor>\n";
				$write_this .= " <screencolor>000000</screencolor>\n";
				$write_this .= " <controlbar>over</controlbar>\n";
				$write_this .= " <bufferlength>5</bufferlength>\n";
				$write_this .= " <autostart>false</autostart>\n";
				$write_this .= " <logo>". $inputs['player_watermarkurl'] ."</logo>\n";	
				$write_this .= " <link>". $inputs['player_watermarklink'] ."</link>\n";	
				$write_this .= '</config>';
				
				$fp = fopen(ABSPATH .'jwembed.xml', 'w');
				fwrite($fp, $write_this, strlen($write_this));
				fclose($fp);
			}
			else
			{
				$info_msg = 'File "/jwembed.xml" is not writable. Please CHMOD this file to 0777 and retry.';
			}
		}
	}
	
	//	Update video sources too. 
	foreach ($_POST['user_choice'] as $source_id => $user_choice)
	{
		if ($user_choice != $video_sources[$source_id]['user_choice'])
		{
			$sql = "UPDATE pm_sources 
					SET user_choice = '". $user_choice ."' 
					WHERE source_id = '". $source_id ."'";
			mysql_query($sql);
			$video_sources[$source_id]['user_choice'] = $user_choice;
		}
	}

	
	//	Update HTML COUNTER / Analytics 
	if (!empty($_POST['htmlcode']))
	{
		if (get_magic_quotes_gpc())
		{
			$htmlcode = stripslashes($_POST['htmlcode']);
		}
		else
		{
			$htmlcode = $_POST['htmlcode'];
		}
		
		$htmlcode = str_replace("'", "\'", $htmlcode);

		$result = update_config('counterhtml', $htmlcode);
		$current_counter = stripslashes($htmlcode);
		$config['counterhtml'] = $current_counter;
	} else {
		$htmlcode = str_replace("'", "\'", $htmlcode);
		$result = update_config('counterhtml', $htmlcode);
		$config['counterhtml'] = $htmlcode;
	}
}

//	Detect jw player 
$jw_player = 0;
if(file_exists(ABSPATH . 'jwplayer.swf'))
{
	$jw_player = 1;
}
$jw_player6 = 0;
if(file_exists(ABSPATH . 'jwplayer.flash.swf'))
{
	$jw_player6 = 1;
}

$mod_can = mod_can();

?>
<div id="adminPrimary">
    <div class="content">
<?php 
if ('' != $info_msg)
{
	echo '<div class="alert alert-error">'.$info_msg.'</div>';
}
else if ($_POST['submit'] == "Save" && $info_msg == '')
{
	echo '<div class="alert alert-success">The new settings were saved.</div>';
}
?>
<form name="sitesettings" method="post" action="settings.php">
<?php echo csrfguard_form('_admin_settings'); ?>
        <div id="settings-jump"></div>
        <nav id="import-nav" class="tabbable" role="navigation">
        <h2 class="h2-import pull-left">Settings</h2>
            <ul class="nav nav-tabs pull-right">
            <li class="<?php echo ($_POST['settings_selected_tab'] == 'tabname1' || $_POST['settings_selected_tab'] == '') ? 'active' : '';?>"><a href="#tabname1" data-toggle="tab" class="tab-pane">General Settings</a></li>
            <li class="<?php echo ($_POST['settings_selected_tab'] == 't6') ? 'active' : '';?>"><a href="#t6" data-toggle="tab" class="tab-pane<?php echo ($_POST['settings_selected_tab'] == 't6') ? ' active' : '';?>">Available Modules</a></li>
            <li class="<?php echo ($_POST['settings_selected_tab'] == 't2') ? 'active' : '';?>"><a data-toggle="tab" href="#t2" class="tab-pane<?php echo ($_POST['settings_selected_tab'] == 't2') ? ' active' : '';?>">Video Player</a></li>
            <li class="<?php echo ($_POST['settings_selected_tab'] == 't3') ? 'active' : '';?>"><a data-toggle="tab" href="#t3" class="tab-pane<?php echo ($_POST['settings_selected_tab'] == 't3') ? ' active' : '';?>">Video Settings</a></li>
            <li class="<?php echo ($_POST['settings_selected_tab'] == 't8') ? 'active' : '';?>"><a data-toggle="tab" href="#t8" class="tab-pane<?php echo ($_POST['settings_selected_tab'] == 't8') ? ' active' : '';?>">Video Sources</a></li>
            <li class="<?php echo ($_POST['settings_selected_tab'] == 't5') ? 'active' : '';?>"><a data-toggle="tab" href="#t5" class="tab-pane<?php echo ($_POST['settings_selected_tab'] == 't5') ? ' active' : '';?>">Video Ads Settings</a></li>
	    	<li class="<?php echo ($_POST['settings_selected_tab'] == 't10') ? 'active' : '';?>"><a data-toggle="tab" href="#t10" class="tab-pane<?php echo ($_POST['settings_selected_tab'] == 't10') ? ' active' : '';?>">Comment Settings</a></li>
            <li class="<?php echo ($_POST['settings_selected_tab'] == 't7') ? 'active' : '';?>"><a data-toggle="tab" href="#t7" class="tab-pane<?php echo ($_POST['settings_selected_tab'] == 't7') ? ' active' : '';?>">E-mail Settings</a></li>
            <li class="<?php echo ($_POST['settings_selected_tab'] == 't9') ? 'active' : '';?>"><a data-toggle="tab" href="#t9" class="tab-pane<?php echo ($_POST['settings_selected_tab'] == 't9') ? ' active' : '';?>">User Settings</a></li>
            </ul>
        </nav>
		<div style="clear:both"></div>
<div class="">
<table width="100%" border="0" cellspacing="1" cellpadding="0">
	<tr>
		<td>

		</td>
	</tr>

    <td valign="top">
	<div class="tab-content">
	<div class="tab-pane fade<?php echo ($_POST['settings_selected_tab'] == 'tabname1' || $_POST['settings_selected_tab'] == 't1' || $_POST['settings_selected_tab'] == '') ? ' in active' : '';?>" id="tabname1">
  	<h2 class="sub-head-settings">General Settings</h2>
	<table cellpadding="0" cellspacing="0" width="100%" class="table table-striped table-bordered pm-tables pm-tables-settings">
		<tr>
			<td width="20%">Site title</td>
			<td>
				<input name="homepage_title" type="text"  size="45" value="<?php echo stripslashes($config['homepage_title']); ?>" />
			</td>
		</tr>
	  <tr>
        <td>Default language</td>
        <td>
			<select name="default_lang">
			<?php
			 foreach($langs as $lang_id => $lang_arr)
			 {
			 	if($lang_id == $config['default_lang'])
				{
					echo '<option value="'.$lang_id.'" selected="selected">'.$lang_arr['title'].'</option>';
				}
				else
				{
					echo '<option value="'.$lang_id.'">'.$lang_arr['title'].'</option>';
				}
			 }
			?>
			</select>
          </td>
        </tr>
	  <tr>
        <td>Use SEO friendly URLs</td>
        <td>
		<label><input name="seomod" type="radio" value="1" <?php echo ($config['seomod']==1) ? 'checked="checked"' : "";?> /> Yes</label>  
		<label><input name="seomod" type="radio" value="0" <?php echo ($config['seomod']==0) ? 'checked="checked"' : "";?> /> No</label>
		<a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="To enable this your server must support <strong>mod_rewrite</strong> commands. Once enabled, all the URLs will transform from a dynamic appearance to a static one. This may improve the search engine rankings. <br><br><strong>Warning:</strong> don't update this setting once your website has been indexed into the search engines."><i class="icon-info-sign"></i></a>
        </td>
        </tr>
      <tr>
        <td>Show video thumbnails from</td>
        <td>
		<label><input name="thumb_from" type="radio" value="1" <?php echo ($config['thumb_from']==1) ? 'checked="checked"' : "";?> /> Remote</label>
		<label><input name="thumb_from" type="radio" value="2" <?php echo ($config['thumb_from']==2) ? 'checked="checked"' : "";?> /> Local</label>
        <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="By selecting '<strong>Local</strong>', the thumbnails associated with the videos you import into your site will be downloaded to your hosting account.<br><br><strong>Recommended:</strong> It is advised to store the thumbnails on your server (Local) instead of using the 'Remote' source. "><i class="icon-info-sign"></i></a>
        </td>
        </tr>

	  <tr>
		  <td>Gzip compression</td>
		  <td><label><input name="gzip" type="radio" value="1" <?php echo ($config['gzip']==1) ? 'checked="checked"' : "";?> /> Enabled</label> 
			<label><input name="gzip" type="radio" value="0" <?php echo ($config['gzip']==0) ? 'checked="checked"' : "";?> /> Disabled</label> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Enable this for faster loading times."><i class="icon-info-sign"></i></a>
          </td>
	  </tr>
	  <tr>
		  <td>Maintenance mode</td>
		  <td>
		  	<label><input name="maintenance_mode" type="radio" value="1" <?php echo ($config['maintenance_mode']==1) ? 'checked="checked"' : "";?> /> Enabled</label> 
		  	<label><input name="maintenance_mode" type="radio" value="0" <?php echo ($config['maintenance_mode']==0) ? 'checked="checked"' : "";?> /> Disabled</label> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Put your site in 'Maintenance mode' if you want to perform updates or layout changes. Users will see a short 'Maintenance mode' message but you can define a custom message below. Once your site is ready to be made available again, simple check the 'Disabled' box.<br><strong>Note</strong>: All administrator and moderators will be able to browse the site when it is in 'Maintenance mode' (as usual)."><i class="icon-info-sign"></i></a>
          </td>
	  </tr>
	  <tr>
		  <td>Maintenance mode message</td>
		  <td>
		  	<input type="text" name="maintenance_display_message" value="<?php echo $config['maintenance_display_message'];?>" /> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Define a custom message for your visitors while your site is in 'Maintenance mode'. If left empty a generic 'Maintenance mode' message will be provided instead."><i class="icon-info-sign"></i></a>
          </td>
	  </tr>
    </table>
    
    <h2 class="sub-head-settings">Analytics/Tracking Code</h2>
	<table cellpadding="0" cellspacing="0" width="100%" class="table table-striped table-bordered pm-tables pm-tables-settings">
      <tr>
          <td width="20%" valign="top">HTML code</td>
          <td>
             <textarea name="htmlcode" rows="3" cols="55"><?php echo $config['counterhtml']; ?></textarea>
             <span class="helptext"><small>This tracking code is inserted in the footer</small></span>
          </td>
      </tr>
    </table>
	</div>
    
	<div class="tab-pane fade<?php echo ($_POST['settings_selected_tab'] == 't2') ? ' in active' : '';?>" id="t2">
	<h2 class="sub-head-settings">Video Player Settings</h2>
	<table cellpadding="0" cellspacing="0" width="100%" class="table table-striped table-bordered pm-tables pm-tables-settings">
	  <tr>
        <td>Default video player</td>
        <td>
		<label><input name="video_player" type="radio" value="flvplayer" <?php echo ($config['video_player']=='flvplayer') ? 'checked="checked"' : "";?> /> FlowPlayer</label> 
		<label><input name="video_player" type="radio" value="embed" <?php echo ($config['video_player']=='embed') ? 'checked="checked"' : "";?> /> Original Player</label>
		<?php if($jw_player) { ?>
		<label><input name="video_player" type="radio" value="jwplayer" <?php echo ($config['video_player']=='jwplayer') ? 'checked="checked"' : "";?> /> JW Player 5</label>
		<?php } else { ?>
		<label><input disabled type="radio" name="" /> JW Player <small>(<a href="http://www.phpsugar.com/forum/viewtopic.php?f=49&amp;t=3983" target="_blank">How to enable JW Player</a>?)</small></label>
		<?php } ?>

		<?php if($jw_player6) { ?>
		<label><input name="video_player" type="radio" value="jwplayer6" <?php echo ($config['video_player']=='jwplayer6') ? 'checked="checked"' : "";?> /> JW Player 6 <span class="label label-warning opac5">experimental</span></label>
		<?php } else { ?>
		<a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Set the default player for your videos. If you use multiple video sources PHP Melody will attempt to your preferred player at all times. Not all of the supported video sources work with JW Player. Check the <strong>Video Sources</strong> tab to see which ones allow JW Player."><i class="icon-info-sign"></i></a>
		<label><input disabled type="radio" name="" /> JW Player <small>(<a href="http://www.phpsugar.com/forum/viewtopic.php?f=49&amp;t=3983" target="_blank">How to enable JW Player</a>?)</small></label>
		<?php } ?>
		<a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="JW Player 6 is still a recently released product and bugs may occur. We recommend using JW Player 6 <em>if</em> your site streams only Youtube videos. "><i class="icon-info-sign"></i></a>        
		</td>
        </tr>
      <tr>
        <td width="20%">JW Player skin</td>
        <td>
			<select name="jwplayerskin">
			<option value="<?php echo $config['jwplayerskin']; ?>" selected="selected"><?php echo ucfirst(trim($config['jwplayerskin'], ".zip")); ?></option>
			<option></option>
			<?php echo dropdown_jwskins(); ?>
			</select>
			<a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="JW Player skins come with their own color scheme which cannot be edited below."><i class="icon-info-sign"></i></a>
			</td>
        </tr>
	  <tr>
        <td>Default player size</td>
        <td><input type="text" name="player_w" size="3" maxlength="3" class="span1"value="<?php echo $config['player_w'];?>" /> x <input type="text" name="player_h" size="3" maxlength="3" class="span1" value="<?php echo $config['player_h'];?>" /> px		</td>
      </tr>
	  <tr>
        <td>Hompage player size</td>
        <td><input type="text" name="player_w_index" size="3" maxlength="3" class="span1"value="<?php echo $config['player_w_index'];?>" /> x <input type="text" name="player_h_index" size="3" maxlength="3" class="span1"value="<?php echo $config['player_h_index'];?>" /> px		</td>
      </tr>
	  <tr>
        <td>My Favorites player size</td>
        <td><input type="text" name="player_w_favs" size="3" maxlength="3" class="span1" value="<?php echo $config['player_w_favs'];?>" /> x <input type="text" name="player_h_favs" size="3" maxlength="3" class="span1" value="<?php echo $config['player_h_favs'];?>" /> px		</td>
      </tr>
	  <tr>
        <td>Embed player size</td>
        <td>
		<input type="text" name="player_w_embed" size="3" maxlength="3" class="span1" value="<?php echo $config['player_w_embed'];?>" /> x <input type="text" name="player_h_embed" size="3" maxlength="3" class="span1" value="<?php echo $config['player_h_embed'];?>" /> px		</td>
      </tr>
	  <tr>
        <td>Play videos in</td>
        <td><label><input name="use_hq_vids" type="radio" value="1" <?php echo ($config['use_hq_vids']==1) ? 'checked="checked"' : "";?> /> High Quality</label> 
		<label><input name="use_hq_vids" type="radio" value="0" <?php echo ($config['use_hq_vids']==0) ? 'checked="checked"' : "";?> /> Low Quality</label>
        <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="This feature applies selectively depending on the video source."><i class="icon-info-sign"></i></a>
        </td>
      </tr>
      <tr>
        <td width="20%">Autoplay videos</td>
        <td>
		<label><input name="player_autoplay" type="radio" value="1" <?php echo ($config['player_autoplay']==1) ? 'checked="checked"' : "";?> /> On</label>  
		<label><input name="player_autoplay" type="radio" value="0" <?php echo ($config['player_autoplay']==0) ? 'checked="checked"' : "";?> /> Off</label>
        </td>
        </tr>
      <tr>
        <td>Video pre-buffering</td>
        <td>
		<label><input name="player_autobuff" type="radio" value="1" <?php echo ($config['player_autobuff']==1) ? 'checked="checked"' : "";?> /> On</label>  
		<label><input name="player_autobuff" type="radio" value="0" <?php echo ($config['player_autobuff']==0) ? 'checked="checked"' : "";?> /> Off</label>		</td>
        </tr>
      <tr>
        <td>Use watermark</td>
        <td>
		<label><input name="player_watermarkshow" type="radio" value="always" <?php echo ($config['player_watermarkshow']=="always") ? 'checked="checked"' : "";?> /> Always</label> 
		<label><input name="player_watermarkshow" type="radio" value="fullscreen" <?php echo ($config['player_watermarkshow']=="fullscreen") ? 'checked="checked"' : "";?> /> 
		Only when fullscreen</label>
		<a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Watermarks can only be shown in Flowplayer and JW Player (<em>paid version</em>). Watermarks cannot be applied to external players."><i class="icon-info-sign"></i></a>		</td>
        </tr>
      <tr>
        <td>Watermark image URL</td>
        <td><input name="player_watermarkurl" type="text" value="<?php echo $config['player_watermarkurl']; ?>" placeholder="http://" /> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Insert the full URL to the image you want to use as a watermark (Image types supported: JPG, GIF, PNG). To disable the watermark please leave this field empty. <br> Note: this works for JW Player Commercial Edition or Flowplayer"><i class="icon-info-sign"></i></a></td>
        </tr>
      <tr>
        <td>Watermark link</td>
        <td><input name="player_watermarklink" type="text" value="<?php echo $config['player_watermarklink']; ?>" placeholder="http://" /> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Clicking the watermark can take the visitor to a desired location. Please enter that location (Complete URL)."><i class="icon-info-sign"></i></a></td>
        </tr>
      <tr>
        <td>Progress bar background color</td>
        <td><input id="bg_bar" name="player_bgcolor" type="text" size="14" value="#<?php echo $config['player_bgcolor'];?>" style="width: 50px;"/></td>
      </tr>
      <tr>
        <td>Video text color</td>
        <td><input id="play_timer" name="player_timecolor" type="text" size="8" value="#<?php echo $config['player_timecolor']; ?>" style="width: 50px;" /></td>
      </tr>
    </table>
	</div>

	<div class="tab-pane fade<?php echo ($_POST['settings_selected_tab'] == 't3') ? ' in active' : '';?>" id="t3">
	<h2 class="sub-head-settings" >Video Settings</h2>
	<table cellpadding="0" cellspacing="0" width="100%" class="table table-striped table-bordered pm-tables pm-tables-settings">
      <tr>
        <td width="20%">Mark video as 'new' for the first</td>
        <td><input name="isnew_days" type="text" size="8" class="span1" value="<?php echo $config['isnew_days']; ?>" /> days</td>
        </tr>
      <tr>
        <td>Mark video as 'popular' after</td>
        <td><input name="ispopular" type="text" size="8" class="span1" value="<?php echo $config['ispopular']; ?>" /> views</td>
        </tr>
		<tr>
		<td>Mark video as 'featured' after
		<td><input name="auto_feature" type="text" size="8" class="span1" value="<?php echo ($config['auto_feature'] != '') ? $config['auto_feature'] : 0; ?>" /> views <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Automatically mark a video as 'Featured' when reaching this number of views. Set to 0 (zero) to disable this feature."><i class="icon-info-sign"></i></a></td>
	</tr>
    </table>
    </div>
	<div class="tab-pane fade<?php echo ($_POST['settings_selected_tab'] == 't10') ? ' in active' : '';?>" id="t10">
	<h2 class="sub-head-settings" >Comment Settings</h2>
    <table cellpadding="0" cellspacing="0" width="100%" class="table table-striped table-bordered pm-tables pm-tables-settings">
	 <tr>
		<td width="20%">Block bad comments</td>
		<td>
		<label><input name="stopbadcomments" type="radio" value="1" <?php echo ($config['stopbadcomments']==1) ? 'checked="checked"' : "";?> /> Yes</label>  
		<label><input name="stopbadcomments" type="radio" value="0" <?php echo ($config['stopbadcomments']==0) ? 'checked="checked"' : "";?> /> No</label>		<a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Filter out the bad comments by editing the 'Blacklist' of unallowed words. Comments containing those words won't be added to the database."><i class="icon-info-sign"></i></a>		</td>
	 </tr>
	 <tr>
		<td>Comments per page</td>
		<td><input name="comments_page" type="text" size="8" class="span1" value="<?php echo $config['comments_page']; ?>" />		<a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Limit the number of comments for each video."><i class="icon-info-sign"></i></a></td>
	 </tr>
	 <tr>
		<td valign="top">Allow comments from</td>
		<td>
		<label><input name="guests_can_comment" type="radio" value="1" <?php echo ($config['guests_can_comment']==1) ? 'checked="checked"' : "";?> /> Anyone</label> 
		<label><input name="guests_can_comment" type="radio" value="0" <?php echo ($config['guests_can_comment']==0) ? 'checked="checked"' : "";?> /> Registered users only</label>	</td>
	 </tr>
	 <tr>
		<td valign="top">Comment moderation</td>
		<td>
		<label><input name="comm_moderation_level" type="radio" value="0" <?php echo ($config['comm_moderation_level']==0) ? 'checked="checked"' : "";?> /> Disabled</label>  
		<label><input name="comm_moderation_level" type="radio" value="1" <?php echo ($config['comm_moderation_level']==1) ? 'checked="checked"' : "";?> /> Moderate guest comments only</label>
		<label><input name="comm_moderation_level" type="radio" value="2" <?php echo ($config['comm_moderation_level']==2) ? 'checked="checked"' : "";?> /> Moderate all comments</label>	</td>
	 </tr>
	 <tr>
		<td valign="top">Default sorting</td>
		<td>
		<label><input name="comment_default_sort" type="radio" value="added" <?php echo ($config['comment_default_sort']=='added') ? 'checked="checked"' : "";?> /> Most recent first</label>  
		<label><input name="comment_default_sort" type="radio" value="score" <?php echo ($config['comment_default_sort']=='score') ? 'checked="checked"' : "";?> /> Most liked first</label>
		</td>
	 </tr>
	 <tr>
		<td valign="top">Dislikes threshold</td>
		<td>
		<input type="text" name="comment_rating_hide_threshold" size="8" class="span1" value="<?php echo $config['comment_rating_hide_threshold']; ?>" /> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Minimum number of dislikes to mute a comment."><i class="icon-info-sign"></i></a>
		</td>
	 </tr>
    </table>
	</div>

   <div class="tab-pane fade<?php echo ($_POST['settings_selected_tab'] == 't5') ? ' in active' : '';?>" id="t5">
   <h2 class="sub-head-settings" >Video Ads Settings</h2>
   <table cellpadding="0" cellspacing="0" width="100%" class="table table-striped table-bordered pm-tables pm-tables-settings">
      <tr>
        <td width="20%">Set <a href="videoads.php">video ads</a> recurrence</td>
        <td><input name="videoads_delay" type="text" size="8" class="span1" value="<?php echo $config['videoads_delay']; ?>" />
		<select name="videoads_delay_timespan" class="input-small">
		 <option value="seconds" <?php if($config['videoads_delay'] > 0) echo 'selected="selected"'; ?>>Seconds</option>
		 <option value="minutes" <?php if($config['videoads_delay'] == 0) echo 'selected="selected"'; ?>>Minutes</option>
		 <option value="hours">Hours</option>
		</select>
		<a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Sets the delay between two video ads. If you set the delay to 2 minutes, your visitors will see a video ad every 2 minutes.  Insert <strong>0 (zero)</strong> to disable the limit and show the ads each time a video is played."><i class="icon-info-sign"></i></a></td>
      </tr>
	  <tr>
        <td width="20%">Set <a href="prerollstatic_ad_manager.php">pre-roll static ads</a> recurrence</td>
        <td><input name="preroll_ads_delay" type="text" size="8" class="span1" value="<?php echo $config['preroll_ads_delay']; ?>" />
		<select name="preroll_ads_delay_timespan" class="input-small">
		 <option value="seconds" <?php if($config['preroll_ads_delay'] > 0) echo 'selected="selected"'; ?>>Seconds</option>
		 <option value="minutes" <?php if($config['preroll_ads_delay'] == 0) echo 'selected="selected"'; ?>>Minutes</option>
		 <option value="hours">Hours</option>
		</select>
		<a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Sets the delay between two pre-roll static ads. If you set the delay to 2 minutes, your visitors will see a pre-roll static ad every 2 minutes. Insert <strong>0 (zero)</strong> to disable the limit and show the ads each time a video is played."><i class="icon-info-sign"></i></a></td>
      </tr>
    </table>
	</div>

	<div class="tab-pane fade<?php echo ($_POST['settings_selected_tab'] == 't6') ? ' in active' : '';?>" id="t6">
	<h2 class="sub-head-settings" >Article Module Settings</h2>
	<table cellpadding="0" cellspacing="0" width="100%" class="table table-striped table-bordered pm-tables pm-tables-settings">
 		<tr>
			<td width="20%">Articles Module</td>
			<td>
			  	<label><input name="mod_article" type="radio" value="1" <?php echo ($config['mod_article']==1) ? 'checked="checked"' : "";?> /> Enabled</label>
				<label><input name="mod_article" type="radio" value="0" <?php echo ($config['mod_article']==0) ? 'checked="checked"' : "";?> /> Disabled</label> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Enable this module if you intend to start a blog or an article area on <?php echo _SITENAME; ?>."><i class="icon-info-sign"></i></a>
			</td>
		</tr>
    </table>
	
	<h2 class="sub-head-settings" >Social Module Settings</h2>
	<table cellpadding="0" cellspacing="0" width="100%" class="table table-striped table-bordered pm-tables pm-tables-settings">
 		<tr>
			<td width="20%">Social Module</td>
			<td>
			  	<label><input name="mod_social" type="radio" value="1" <?php echo ($config['mod_social']==1) ? 'checked="checked"' : "";?> /> Enabled</label>
				<label><input name="mod_social" type="radio" value="0" <?php echo ($config['mod_social']==0) ? 'checked="checked"' : "";?> /> Disabled</label>
			</td>
		</tr>            
		<?php if ($config['mod_social']) : 
		if ( ! function_exists('activity_load_options'))
		{
			include_once(ABSPATH .'include/social_settings.php');
			include_once(ABSPATH .'include/social_functions.php');
		}
		?>
		<tr>
			<td>
				Following limit
			</td>
			<td>
				<input type="text" name="user_following_limit" size="8" class="span1" value="<?php echo $config['user_following_limit']; ?>" /> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Maximum number of users someone can follow."><i class="icon-info-sign"></i></a>
			</td>
		</tr>
		<tr>
			<td>Loggable activities</td>
			<td>
				<?php
				
				
				$loggables = activity_load_options();
				foreach ($loggables as $activity => $value)
				{
					?>
					<label><input type="checkbox" name="loggable_activity_<?php echo $activity;?>" value="1" <?php echo ($value == 1) ? 'checked="checked"' : '';?> /> <?php echo $activity_labels[$activity];?></label>
					<br /> 
					
					<?php
				}
				?>
			</td>
		</tr>
		<?php endif;?>
    </table>
	</div>
	
	<div class="tab-pane fade<?php echo ($_POST['settings_selected_tab'] == 't7') ? ' in active' : '';?>" id="t7">
	<h2 class="sub-head-settings" >E-mail Settings</h2>
	<?php
	if( $config['mail_server'] == 'mail.domain.com' ) {
	?>
		<div class="alert alert-info">
		<strong>Your site can't send any emails at this time</strong>. 
		Please replace the <em>mail server</em>, <em>mail port</em>, <em>mail user</em> and <em>password</em> with an actual email account.
		</div>
	
	<?php
	}
	?>
	<div id="test-email-response"></div>
    <div id="mail_preset_warn"></div>
	<table id="mail_settings" cellpadding="0" cellspacing="0" width="100%" class="table table-striped table-bordered pm-tables pm-tables-settings">
	 <tr>
	 	<td>Choose from existing presets</td>
		<td>
			<div class="qsFilter">
    		<div class="btn-group input-prepend">
			<select id="mail_presets">
			    <option id="none">- none -</option>
			    <option id="gmail">Gmail</option>
			    <option id="godaddy">GoDaddy</option>
			    <option id="yahoo">Yahoo</option>
		    </select>
			</div><!-- .btn-group -->
   			</div><!-- .qsFilter -->
		</td>
	 </tr>
	 <tr>
		<td>Mail server</td>
		<td>
		<input name="mail_server" id="mail_server" type="text" size="25" value="<?php echo $config['mail_server']; ?>" /> Port <input name="mail_port" id="mail_port" type="text" size="5" class="span1" value="<?php echo $config['mail_port']; ?>" /> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="The mail server port is most likely to be 110 but it can also to be: 25, 26, 465 (GMAIL) and 587 (Yahoo). Please ask your host if you're not sure about this."><i class="icon-info-sign"></i></a>
		</td>
	 </tr>
	 <tr>
		<td>Account login</td>
		<td>
		<input name="mail_user" id="mail_user" type="text" size="25" value="<?php echo $config['mail_user']; ?>" /> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="The account login is most likely to be your email address. Please ask your host for details if you need to"><i class="icon-info-sign"></i></a>
		</td>
	 </tr>
	 <tr>
		<td>Account password</td>
		<td>
		<input name="mail_pass" id="mail_pass" type="password" size="25" value="<?php echo $config['mail_pass']; ?>" />
		</td>
	 </tr>
	 <tr>
		<td>Use SMTP protocol for mail</td>
		<td>
		<label><input name="issmtp" type="radio" value="1" <?php echo ($config['issmtp']==1) ? 'checked="checked"' : "";?> /> Yes</label>
		<label><input name="issmtp" type="radio" id="nosmtp" value="0" <?php echo ($config['issmtp']==0) ? 'checked="checked"' : "";?> /> No</label>		</td>
	 </tr>
     <tr>
        <td width="20%">Contact e-mail</td>
        <td><input name="contact_mail" id="contact_mail" type="text" value="<?php echo $config['contact_mail']; ?>" size="30" /> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Contact page submissions will be delivered to this address. We highly recommend this email is associated with the account above."><i class="icon-info-sign"></i></a></td>
     </tr>
	 <tr>
	 	<td>
        <button type="submit" name="test-email" value="Test this email account" class="btn btn-mini btn-blue" id="test-email" data-loading-text="Testing..." />Test this email account</button>
	 	</td>
        <td>
        <div id="loader"><img src="img/ico-loading.gif" width="16" height="16" border="0" /> <em>Please wait...</em></div>
        </td>
	 </tr>
    </table>
	</div>
    
	<div class="tab-pane fade<?php echo ($_POST['settings_selected_tab'] == 't8') ? ' in active' : '';?>" id="t8">
    <h2 class="sub-head-settings" >Video Sources</h2>
    <table cellpadding="0" cellspacing="0" width="100%" class="table table-striped table-bordered pm-tables pm-tables-settings">
    <?php

    $video_sources = array_reverse($video_sources);
	$video_sources = array_sort($video_sources, 'source_name', SORT_ASC);
    foreach ($video_sources as $id => $source)
    {
        $disabled = 1;
        if (is_int($id)) 
        {
            if ($source['flv_player_support'] == 1 && $source['embed_player_support'] == 1)
            {
                $disabled = 0;
            }
        ?>
        <tr>
             <td width="20%">
                <?php
                if ($disabled)
                {
                    echo ucfirst($source['source_name']);
                }
                else
                {
                    echo '<strong>'. ucfirst($source['source_name']) .'</strong>';
                } 
                ?>
            </td>
             <td width="80%">
              <label>
                <input name="user_choice[<?php echo $source['source_id'];?>]" value="flvplayer" type="radio" <?php if($source['user_choice'] == 'flvplayer') echo 'checked="checked"'; if($disabled) echo 'disabled="true"'; ?> /> Use my FLV player 
              </label>
              
              <label>
                <input name="user_choice[<?php echo $source['source_id'];?>]"  value="embed"  type="radio" <?php if($source['user_choice'] == 'embed') echo 'checked="checked"'; if($disabled) echo 'disabled="true"'; ?>  /> Use embed player 
              </label>
             </td>
            </tr>
        <?php
        }
    }
    ?>
    </table>
	</div>

	<div class="tab-pane fade<?php echo ($_POST['settings_selected_tab'] == 't9') ? ' in active' : '';?>" id="t9">
	<h2 class="sub-head-settings" >General User Settings</h2>
	<table cellpadding="0" cellspacing="0" width="100%" class="table table-striped table-bordered pm-tables pm-tables-settings">
	 <tr>
		<td width="20%">Allow registration</td>
		<td>
		<label><input name="allow_registration" type="radio" value="1" <?php echo ($config['allow_registration']=='1') ? 'checked="checked"' : "";?> /> 
		Yes</label>
		<label><input name="allow_registration" type="radio" value="0" <?php echo ($config['allow_registration']=='0') ? 'checked="checked"' : "";?> /> No</label> 
		<a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Set to '<em>No</em>' to disable all public registrations. This will not disable the 'Login' procedure in the front-end. <br> Note: the default setting is '<strong>Yes</strong>'."><i class="icon-info-sign"></i></a>
        </td>
	 </tr>
	 <tr>
		<td width="20%">Email confirmation upon registration</td>
		<td>
		<label><input name="account_activation" type="radio" value="1" <?php echo ($config['account_activation']==1) ? 'checked="checked"' : "";?> /> 
		Enabled</label>
		<label><input name="account_activation" type="radio" value="0" <?php echo ($config['account_activation']==0) ? 'checked="checked"' : "";?> /> Disabled</label> 
		<a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Ask new users to verify their email by clicking a link provided upon registration. The account will remain inactive until they verify their identity."><i class="icon-info-sign"></i></a>
        </td>
	 </tr>
	 <tr>
		<td>Allow users to upload videos</td>
		<td>
		<label><input name="allow_user_uploadvideo" type="radio" value="1" <?php echo ($config['allow_user_uploadvideo']==1) ? 'checked="checked"' : "";?> /> Yes</label>
		<label><input name="allow_user_uploadvideo" type="radio" value="0" <?php echo ($config['allow_user_uploadvideo']==0) ? 'checked="checked"' : "";?> /> No</label> 
		</td>
	 </tr>
	 <tr>
		<td>Allow users to suggest videos</td>
		<td>
		<label><input name="allow_user_suggestvideo" type="radio" value="1" <?php echo ($config['allow_user_suggestvideo']==1) ? 'checked="checked"' : "";?> /> Yes</label>
		<label><input name="allow_user_suggestvideo" type="radio" value="0" <?php echo ($config['allow_user_suggestvideo']==0) ? 'checked="checked"' : "";?> /> No</label> 
		</td>
	 </tr>
	 <tr>
		<td>Max. upload size</td>
		<td>
			<input name="allow_user_uploadvideo_bytes" type="text" size="8" class="span1" value="<?php echo (int) readable_filesize($config['allow_user_uploadvideo_bytes']); ?>" />
			<?php
			$unit = readable_filesize($config['allow_user_uploadvideo_bytes']);
			$unit = explode(' ', $unit);
			$unit = trim($unit[1]);
			?> 
	        
			<select name="allow_user_uploadvideo_unit" class="smaller-select">
				<option value="MB" <?php if ($unit == 'MB') echo 'selected="selected"'; ?>>MB</option>
				<option value="KB" <?php if ($unit == 'KB') echo 'selected="selected"'; ?>>KB</option>
			</select>
	        <?php
			if((int) readable_filesize($config['allow_user_uploadvideo_bytes']) > (int)readable_filesize(get_true_max_filesize())) {
				echo '<span class="label label-warning">Warning your hosting provider has a limit of '.readable_filesize(get_true_max_filesize()).' per upload.</span>';			
			}
			?>
			<a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Define how large the uploaded videos can be. Ask your hosting provider to increase the limit if it's too low."><i class="icon-info-sign"></i></a>
        </td>
	 </tr>
	 <tr>
	 	<td>Like/Dislike rating</td>
		<td>
			<label><input name="bin_rating_allow_anon_voting" type="radio" value="1" <?php echo ($config['bin_rating_allow_anon_voting'] == 1) ? 'checked="checked"' : "";?> /> Anyone</label>
			<label><input name="bin_rating_allow_anon_voting" type="radio" value="0" <?php echo ($config['bin_rating_allow_anon_voting']==0) ? 'checked="checked"' : "";?> /> Registered users only</label> 
		</td>
	 </tr>
	</table>
	
	<h2 class="sub-head-settings">Access Areas Available to Moderators</h2>
	<table cellpadding="0" cellspacing="0" width="100%" class="table table-striped table-bordered pm-tables pm-tables-settings">
     <tr>
        <td width="20%">Videos</td>
        <td>
        	<label><input name="mod_can_manage_videos" type="checkbox" value="1" <?php if ($mod_can['manage_videos']) echo 'checked="checked"'; ?> /> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Moderators will be able to <strong>add</strong>, <strong>embed</strong>, <strong>import</strong>, <strong>edit</strong>, <strong>delete</strong>, <strong>approve</strong> and <strong>manage reported videos</strong>"><i class="icon-info-sign"></i></a>
			</label> 
		</td>
     </tr>
	 <tr>
        <td>Comments</td>
        <td>
        	<label><input name="mod_can_manage_comments" type="checkbox" value="1" <?php if ($mod_can['manage_comments']) echo 'checked="checked"'; ?> /> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Moderators will be able to <strong>approve</strong>, <strong>edit</strong> and <strong>delete</strong> comments"><i class="icon-info-sign"></i></a>
			</label>
		</td>
     </tr>
	 <tr>
        <td>Manage users</td>
        <td>
        	<label><input name="mod_can_manage_users" type="checkbox" value="1" <?php if ($mod_can['manage_users']) echo 'checked="checked"'; ?> /> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Moderators will be able to <strong>activate new accounts</strong>, <strong>ban</strong> and <strong>unban</strong> other users"><i class="icon-info-sign"></i></a>
			</label> 
		</td>
     </tr>
	 <tr>
        <td>Manage articles</td>
        <td>
        	<label><input name="mod_can_manage_articles" type="checkbox" value="1" <?php if ($mod_can['manage_articles']) echo 'checked="checked"'; ?> /> <a href="#" rel="popover" data-placement="right" data-trigger="hover" data-content="Moderators will be able to <strong>add</strong>, <strong>edit</strong> and <strong>delete</strong> articles. <strong>Please note</strong> that there is a special user rank for managing only the articles: the <strong>Editor</strong> rank."><i class="icon-info-sign"></i></a>
			</label> 
		</td>
     </tr>
    </table>
	</div>
    </div>
	</td>
    </tr>
</table>
</div>

<div class="clearfix"></div>

<div id="stack-controls" class="list-controls">
<div class="pull-left">

</div>
<input name="views_from" type="hidden" value="2"  />
<input type="hidden" name="settings_selected_tab" value="<?php echo ($_POST['settings_selected_tab'] != '') ? $_POST['settings_selected_tab']:  't1';?>" />
<button type="submit" name="submit" value="Save" class="btn btn-small btn-success">Save changes</button>
</div><!-- #list-controls -->

</div>
</form>

    </div><!-- .content -->
</div><!-- .primary -->

<script type="text/javascript">
$(document).ready(function(){

  $('#mail_presets').change(function() {
	var $this = $(this).find('option:selected').attr('id');
	
	if($this == 'gmail') {
		$('#mail_settings').find('#mail_server').val('ssl://smtp.gmail.com');
		$('#mail_settings').find('#mail_port').val('465');
		$('#mail_settings').find('#mail_user').val('you@gmail.com');
		$('#mail_settings').find('#mail_pass').val('');
		$('#mail_settings').find('#contact_mail').val('you@gmail.com');
		$('#mail_preset_warn').html('<div class="alert"><small>GMAIL is an excellent choice if the following  conditions are met: <ol><li>Your site sends less than 500 emails per day</li><li>Your hosting provider allows outgoing SSL connections</li><li>Your GMAIL account is set to allow SMTP connections</li></ol></small></div>');
	} 
	if($this == 'godaddy') {
		$('#mail_settings').find('#mail_server').val('relay-hosting.secureserver.net');
		$('#mail_settings').find('#mail_port').val('25');
		$('#mail_settings').find('#mail_user').val('username and password are not required');
		$('#mail_settings').find('#mail_pass').val('none');
		$('#mail_settings').find('#contact_mail').val('you@your-godaddy-account.com');
		$('#mail_settings').find('#nosmtp').attr('checked', 'checked');

		
		$('#mail_preset_warn').html('<div class="alert alert-danger"><small>Using <strong>GoDaddy</strong>\'s server to send emails is a bit problematic. For example they don\'t permit email delivery to @aol.com, @gmail.com, @hotmail.com, @msn.com, or @yahoo.com addresses. That makes their service almost unusable from PHP scripts. We recommend using a different provider if possible.</small></div>').css('display','block');
	} 	if($this == 'yahoo') {
		$('#mail_settings').find('#mail_server').val('smtp.bizmail.yahoo.com');
		$('#mail_settings').find('#mail_port').val('587');
		$('#mail_settings').find('#mail_user').val('you@yahoo.com');
		$('#mail_settings').find('#mail_pass').val('');
		$('#mail_settings').find('#contact_mail').val('you@yahoo.com');
		$('#mail_preset_warn').css('display','none');
	} 	if($this == 'none') {
		$('#mail_settings').find('#mail_server').val('mail.yourdomain.com');
		$('#mail_settings').find('#mail_port').val('25');
		$('#mail_settings').find('#mail_user').val('user+yourdomain.com');
		$('#mail_settings').find('#mail_pass').val('');
		$('#mail_settings').find('#contact_mail').val('user@yourdomain.com');
		$('#mail_preset_warn').css('display','none');
	}
  });
});
</script>
<?php
include('footer.php');
?>