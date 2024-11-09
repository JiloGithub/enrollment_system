<?php
session_start();

define('ROOT', 'http://localhost/enrollment/');
define('ASSET', 'public/');
define('ADMIN_ASSET', '../public/');
define('ADMIN_CLASSES', '../private/classes/admin/');
define('CLASSES', 'private/classes/student/');
define('CONFIG', 'http://localhost/enrollment/private/config/');
define('ADMIN_ALERT', '../public/include/alert.php');
define('ALERT', 'public/include/alert.php');
define('ADMIN', 'http://localhost/enrollment/admin/index.php');


require 'Database.php';
require 'File.php';
require 'Hash.php';
require 'Input.php';
require 'Redirect.php';
require 'Request.php';
require 'Session.php';
