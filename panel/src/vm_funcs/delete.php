<?php 

require("../../config/db.php");
include('../config/session.php');

if(isset($_GET['id']))
{
    // $db is initalized in #display_servers.php
	mysqli_query($db, "UPDATE rs_active_servers SET suspended=true WHERE id=".$_GET['id']);
	echo "<h1>Server deleted.. redirecting</h1>";
	header( "Location: ../../servers.php" );

}

?>