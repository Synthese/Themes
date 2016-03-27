<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) PHP-Fusion Inc
| https://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: forums.php
| Author: Chan (Frederick MC Chan)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
require_once __DIR__."/../../../maincore.php";
if (!db_exists(DB_FORUMS)) { redirect(BASEDIR."error.php?code=404"); }

require_once THEMES."templates/admin_header.php";

if (file_exists(INFUSIONS."forum/locale/".LOCALESET."forum_admin.php")) {
	include INFUSIONS."forum/locale/".LOCALESET."forum_admin.php";
} else {
	include INFUSIONS."forum/locale/English/forum_admin.php";
}

if (file_exists(LOCALE.LOCALESET."admin/settings.php")) {
	include LOCALE.LOCALESET."admin/settings.php";
} else {
	include LOCALE."English/admin/settings.php";
}

if (file_exists(INFUSIONS."forum/locale/".LOCALESET."forum_ranks.php")) {
	include INFUSIONS."forum/locale/".LOCALESET."forum_ranks.php";
} else {
	include INFUSIONS."forum/locale/English/forum_ranks.php";
}

require_once FORUM."classes/Admin.php";
require_once FORUM."classes/Functions.php";
require_once INCLUDES.'infusions_include.php';

$forum_settings = get_settings('forum');
$forum_admin = new PHPFusion\Forums\Admin;

opentable($locale['forum_000c']);
$tab_title['title'][] = $locale['forum_admin_000'];
$tab_title['id'][] = 'fm';
$tab_title['icon'][] = '';
$tab_title['title'][] = $locale['forum_admin_001'];
$tab_title['id'][] = 'fr';
$tab_title['icon'][] = '';
$tab_title['title'][] = $locale['forum_admin_002'];
$tab_title['id'][] = 'fs';
$tab_title['icon'][] = '';

echo opentab($tab_title, (isset($_GET['section']) ? $_GET['section'] : 'fm'), 'forum-admin-tabs', true);
if (isset($_GET['section'])) {

    switch($_GET['section']) {
		case 'fr':
			pageAccess('FR');
			add_breadcrumb(array('link'=>INFUSIONS.'forum/admin/forums.php'.$aidlink.'&section=fr', 'title'=>$locale['404']));
			include INFUSIONS.'forum/admin/forum_ranks.php';
			break;
		case 'fs':
			pageAccess('F');
			include INFUSIONS.'forum/admin/settings_forum.php';
			break;
		default :
			redirect(INFUSIONS.'forum/admin/forums.php'.$aidlink);
	}

} else {
	pageAccess('F');
	add_breadcrumb(array('link'=>INFUSIONS.'forum/admin/forums.php'.$aidlink, 'title'=>$locale['forum_admin_000']));
	$forum_admin->display_forum_admin();
}
echo closetab();
closetable();
require_once THEMES."templates/footer.php";