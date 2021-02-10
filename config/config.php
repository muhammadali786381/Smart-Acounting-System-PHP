<?php
//error reporting into file
ini_set('display_errors', 1); // 0 change to 1 for display error
ini_set('display_startup_errors', 1); // 0 change to 1 for display error
ini_set('error_log',dirname(__FILE__).'/error_log.txt');
error_reporting(E_ALL);

//set site url example (http://yourdomain.com/);
define("BASE_URL", "http://localhost/zf_accounting/");


//in case online web server leave blank
define("BASE_PATH", "zf_accounting/"); // lcoal setup case "serverpath/" //in case online remain blank as ""

define("ADMIN_DIR","cp_admin"); //admin folder name use in code for redirection and other task


//password salt -1
define("PASS_SALT_1","gwqqttc6un62w2y9nfpqjh1nyijfm");
//password salt -2
define("PASS_SALT_2","dymbQxSy6qg4P5ci45hir9qpx9yc");
