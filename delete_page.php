<?

require_once('site_core.php');
require_once('site_db.php');

// Set the title of the page
$title = "Delete Page";

echo_head($title);

echo '
	<div class="container">
		<h2>'.$title.'</h2>';
		

$id = $_GET['id'];
$action = $_GET['action'];

if ($id == '') {
		echo '<p>You must enter an id in the URL, i.e., ?id=pageid</p>';
}
else if ($action=='delete') {
	$sql = "DELETE FROM pages WHERE pageid='$id'";
	run_query($sql);

	// $sql = "DELETE FROM asides WHERE asideid='$id'";
	// $sql = "DELETE FROM has_aside WHERE asideid='$aid' AND pageid='$pid'";
	
	echo '<p><b>'.$id.'</b> was deleted from <b>'.$table.'</b></p>';
}
else {		
	echo '
		<p>Are you sure you want to delete <b>'.$id.'</b> from <b>'.$table.'</b>?</p>
		<p>
			<a href="basic_delete.php?action=delete&id='.$id.'" class="btn btn-danger">Yes</a>
		</p>';
}

echo '</div>';

echo_foot();

?>