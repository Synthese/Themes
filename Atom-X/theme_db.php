<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) PHP-Fusion Inc
| https://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: Atom-X/theme_db.php
| Author: PHP-Fusion Inc
| Author: RobiNN
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if (!defined('IN_FUSION')) {
    die('Access Denied');
}

$theme_title = 'Atom-X';
$theme_description = 'Ported The Atom-X Theme for PHP Fusion 9.';
$theme_screenshot = 'screenshot.jpg';
$theme_author = 'PHP-Fusion Inc & RobiNN';
$theme_web = 'https://php-fusion.co.uk';
$theme_license = 'AGPL3';
$theme_version = '1.01';
$theme_folder = 'Atom-X';

$theme_insertdbrow[] = DB_SETTINGS_THEME." (settings_name, settings_value, settings_theme) VALUES ('enable_last_seen_users_x9', 1, '".$theme_folder."');";
$theme_deldbrow[] = DB_SETTINGS_THEME." WHERE settings_theme='".$theme_folder."'";
