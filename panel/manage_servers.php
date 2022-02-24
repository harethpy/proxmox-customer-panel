<!doctype html>
<html lang="en">
  <head>
  	<?php
   	include('../config/session.php');
	?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <title>API - Overlaxed</title>

  </head>

  <body>
  	<?php include("../headers/navbar.php"); ?>

  	<div class="panel fs-6 row justify-content-center" style="padding:35px;margin:20px;border:1px solid #ddd;">
  		<div class="col-md-9 ">
  		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col" class="tt" data-toggle="tooltip" data-placement="top" title="API identifies the Reseller's ID, this is important to store and refer servers and clients to the right resellers.">API</th>
		      <th scope="col">Server</th>
		      <th scope="col">Location</th>
		      <th scope="col">IP</th>
		      <th scope="col">Notes</th>
		      <th scope="col">Actions</th>
                <th scope="col">VMID</th>
                <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php 
		    include('src/display_servers.php');
		    ?>
		  </tbody>
		</table>
  		</div>
  	</div>



  	<script type="text/javascript">
  		const tooltips = document.querySelectorAll('.tt');
  		tooltips.forEach(t => {
  			new bootstrap.Tooltip(t)
  		})
  	</script>
  </body>

</html>