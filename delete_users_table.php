<?
session_start();
if (!$_SESSION['authenticated']) die ('Access Denied');
	
require_once('site_db.php');

$sql = "DROP TABLE `an09ronc_users`";

run_query($sql);

echo 'SUCCESS: The following query executed: '.$sql;
?>