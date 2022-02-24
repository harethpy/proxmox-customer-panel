<?php

echo "<style>
@import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400&display=swap');

body {
    font-family: 'Ubuntu', sans-serif !important; 
}
</style>";


echo '
<nav class="navbar navbar-expand-lg navbar-light bg-light">

	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">Overlaxed API</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNavDropdown">
	      <ul class="navbar-nav">
	        <li class="nav-item">
	          <a class="nav-link" aria-current="page" href="/htdocs/panel/main.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
	        </li>
	        
	        <li class="nav-item dropdown ">
	          <a class="nav-link dropdown-toggle " id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            <i class="fa fa-server" aria-hidden="true"></i> Servers
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          
	            <li><a class="dropdown-item" href="/htdocs/panel/manage_servers.php"><i class="fa fa-inbox" aria-hidden="true"></i> My Servers</a></li>
	          
	            <li><a class="dropdown-item" href="#"><i class="fa fa-window-close" aria-hidden="true"></i> Suspended Servers</a></li>
	          </ul>
	        </li>

	        <li class="nav-item dropdown ">
	          <a class="nav-link dropdown-toggle " id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            <i class="fa fa-cart-plus" aria-hidden="true"></i> Order
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	            <li><a class="dropdown-item" href="/htdocs/panel/pre_config_server.php"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Configure Server <span class="badge bg-success text-white">(15 mins)</span> </a></li>
	            <li><a class="dropdown-item" href="/htdocs/panel/instant_servers.php"><i class="fa fa-plug" aria-hidden="true"></i> Instant Servers <span class="badge bg-info text-white">(5 mins)</span> </a></li>
	          </ul>
	        </li>

	        
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            <i class="fa fa-money" aria-hidden="true"></i> Billing
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	            <li><a class="dropdown-item" href="/htdocs/panel/invoices.php"><i class="fa fa-file-text" aria-hidden="true"></i> Invoices</a></li>
	            <li><a class="dropdown-item" href="#"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Payments</a></li>
	          </ul>
	        </li>
	        
	        <li class="nav-item">
	          <a class="nav-link" aria-current="page" href="/htdocs/panel/changelog.php"><i class="fa fa-book" aria-hidden="true"></i> Changelogs</a>
	        </li>
	        
	      </ul>
	    </div>
	  </div>
	 <div class="col-md-3">
    <span class="navbar-text">
      Welcome, <strong>'.$login_session.
      '</strong> <span class="badge bg-danger text-white">
      <a href="/htdocs/logout.php" style="text-decoration:none !important;color:inherit !important;">Logout</a></span>
     <br>v1.2
    </span>
   </div>
  </nav>
  

';

?>