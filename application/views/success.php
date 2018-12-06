<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/bootstrap.min.js" />
	
</head>
<body>

<!-- Bootstrap 4 Navbar  -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<a href="<?php echo base_url(); ?>" class="navbar-brand">Home</a>

	
	
</nav>
<!-- End Bootstrap 4 Navbar -->

	

<div class="container mt-5">
	<div class="row">
        <div class="col-md-2"></div>  
        <div class="col-md-8">
        	<div class="card">
        		<h4 class="card-header">Transaction <label for="Success" class="badge badge-success">Success</label></h4>
        		<div class="card-body">
        			<?php 
		                echo "<p>Thank You. Your booking status is ". $status .".</br>";
		                echo "Your Transaction ID for this transaction is ".$txnid."</br>";
		                echo "We have received a payment of Rs. " . $amount . "</p>";
		            ?>
        		</div>
        	</div>
            
         </div> 
        <div class="col-md-2"></div>
    </div>
	<!-- Footer -->
	

</div> 

</body>
</html>