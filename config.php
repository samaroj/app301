<?php

error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
ob_start();
session_start();

define('SITE_URL', 'https://app301.azurewebsites.net/webdev/');

define('DB_DRIVER', 'sqlsrv');
define('DB_SERVER', 'tcp:app301.database.windows.net,1433');
define('DB_SERVER_USERNAME', 'samaroj');
define('DB_SERVER_PASSWORD', 'P@ssw0rd1234');
define('DB_DATABASE', 'app301');


define('PROJECT_NAME', 'Simple Shopping List using PHP and Azure SQL');
$dboptions = array(
              PDO::ATTR_PERSISTENT => FALSE, 
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            );

try {
  $DB = new PDO(DB_DRIVER.':server='.DB_SERVER.'; Database='.DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD , $dboptions);  
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}

//get error/success messages
if ($_SESSION["errorType"] != "" && $_SESSION["errorMsg"] != "" ) {
    $ERROR_TYPE = $_SESSION["errorType"];
    $ERROR_MSG = $_SESSION["errorMsg"];
    $_SESSION["errorType"] = "";
    $_SESSION["errorMsg"] = "";
}
?>