<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IOT</title>
		<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<h1 class="text-center">Home Controller</h1>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-lg-4 p-2">
						<div class="card">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  </div>
						</div>					
				</div>
				<div class="col-xs-12 col-sm-6 col-lg-4 p-2">
						<div class="card">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  </div>
						</div>					
				</div>
				<div class="col-xs-12 col-sm-6 col-lg-4 p-2">
						<div class="card">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  </div>
						</div>					
				</div>
				<div class="col-xs-12 col-sm-6 col-lg-4 p-2">
						<div class="card">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  </div>
						</div>					
				</div>
				<div class="col-xs-12 col-sm-6 col-lg-4 p-2">
						<div class="card">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  </div>
						</div>					
				</div>
				<div class="col-xs-12 col-sm-6 col-lg-4 p-2">
						<div class="card">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  </div>
						</div>					
				</div>
			</div>
			<ul>
				<li>voltage</li>
				<li>current</li>
				<li>power</li>
				<li>energy</li>
				<li>frequency</li>
				<li>pf</li>
			</ul>
		</div>

		<!-- jQuery -->
		<script src="<?php echo base_url()?>assets/jquery/jquery-2.2.3.min.js"></script>
		<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js" ></script>
		<script type="text/javascript">			
			  var baseurl  = "<?php echo base_url()?>";

				function fetchdata(){ 

	        $.ajax({
	            url : baseurl + 'home/status',
	            type: "post",
	            dataType: "json",
	            success: function(callback){
	                console.log(callback.data);
	            },
					    complete:function(data){ 
						     setTimeout(fetchdata,5000); 
						  }, 
	            error: function (jqXHR, textStatus, errorThrown){
	                alert('Error get data from ajax');
	            }
	        });    

				} 

				$(document).ready(function(){ 
				  setTimeout(fetchdata,5000); 
				});
		</script>
	</body>
</html>


