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


    <title>API - Overlaxed</title>
  </head>

  <body>
  	<?php include("../headers/navbar.php"); ?>

  	<div class="panel fs-6" style="padding:35px;margin:20px;border:1px solid #ddd;">
  		<div class="row ">
  			<div class="col-md-6 ">
            <h3>Resellers Dashboard</h3>
  				<div class="alert alert-warning" role="alert">
  					Manage your servers <a href="manage_servers.php">Here</a>
				  </div>

  				<table class="table table-light table-striped table-hover ">
				<thead>
				  <tr>
					<th>Status</th>
					<th>Count</th>
				  </tr>
				</thead>
				<tbody>
			
				  <tr>
					<td>Clients <span class="badge bg-light text-dark">Managed by you.</span></td>
					<td><a class="btn btn-danger" href="/iptv/index.php/codes/index?view=expired">0</a></td>
				  </tr>
				  <tr>
					<td>Servers Expiring in 7 days</td>
					<td><a class="btn btn-warning" href="/iptv/index.php/users/index?view=soon_to_expire">1</a></td>
				  </tr>
				  <tr>
					<td>Active Servers</td>
					<td><a class="btn btn-success" href="/iptv/index.php/users/index?view=expired">3</a></td>

				  </tr>
				  </tbody>
				  </table>

  			</div>

  		</div>
  	</div>
  </body>

</html>