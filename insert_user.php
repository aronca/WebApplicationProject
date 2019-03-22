<?
session_start();
require_once('site_forms.php');
require_once('site_core.php');
require_once('site_db.php');

if (!$_SESSION['authenticated']) die ('Access Denied');

// Set the title of the page
$title = "Insert User";

echo_head($title);

// Create page content
echo '
	<div class="container">
		<h2>'.$title.'</h2>';

// If data is posted and URL action is insert
if ($_POST && $_GET['action']=="insert") {
	
	insert_user($_POST);
	
	echo '
		<div class="alert alert-success" role="alert">
			The following values were submitted. 
			Enter new values and submit again, 
			or press clear to reset the form.
		</div>';
	
	echo_user_form($_POST);
}	
else {
	// If there is no posted data or no URL insert action
	echo_user_form();
}

echo '
	</div> <!-- container -->';
	
echo_foot();



$hashed_passwd = password_hash($passwd, PASSWORD_DEFAULT);

$sql = "INSERT INTO an09ronc_users (userid, passwd, type) VALUES ('$userid','$hashed_passwd','$type')";

run_query($sql);

echo 'SUCCESS: The following query executed: '.$sql;
?>