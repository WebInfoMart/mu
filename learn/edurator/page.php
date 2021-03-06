<?php
// +------------------------------------------------------------------------+
// | PHP Melody ( www.phpsugar.com )
// +------------------------------------------------------------------------+
// | PHP Melody IS NOT FREE SOFTWARE
// | If you have downloaded this software from a website other
// | than www.phpsugar.com or if you have received
// | this software from someone who is not a representative of
// | PHPSUGAR, you are involved in an illegal activity.
// | ---
// | In such case, please contact: support@phpsugar.com.
// +------------------------------------------------------------------------+
// | Developed by: PHPSUGAR (www.phpsugar.com) / support@phpsugar.com
// | Copyright: (c) 2004-2013 PHPSUGAR. All rights reserved.
// +------------------------------------------------------------------------+

session_start();

require('config.php');
require_once(ABSPATH .'include/user_functions.php');
require_once(ABSPATH .'include/islogged.php');
require_once(ABSPATH .'include/article_functions.php');


if ($_GET['p'] != '')
{
	$page_id = (int) $_GET['p'];
}
else if ($_GET['name'] != '')
{
	$page_name = trim($_GET['name']);
	$page_name = urlencode($page_name);
}

if ( ! $page_id && ! $page_name)
{
	header('Location: '. _URL .'/404.php');
	exit();
}

$page = array();
if ($page_id)
{
	$page = get_page($page_id);
}
else
{
	$page = get_page_by_name($page_name);
}

if (count($page) == 0)
{
	$page['title'] = $lang['page_missing_title'];
	$page['content'] = $lang['page_missing_msg'];
}
else
{
	page_update_view_count($page['id']);
}

$smarty->assign('page', $page);

$smarty->assign('template_dir', $template_f);
$smarty->assign('meta_title', htmlspecialchars($page['title'], ENT_QUOTES));
$smarty->assign('meta_keywords', $page['meta_keywords']);
$smarty->assign('meta_description', $page['meta_description']);

$smarty->display('page.tpl');
?>