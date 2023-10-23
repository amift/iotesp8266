<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IOT</title>
		<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap4-toggle.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="card border-info p-3 mt-2 shadow">
					<h1 class="text-center">Home Controller</h1>
			</div>
			<div class="row mt-3">
					<div class="col">
							<div class="card border-info p-3 shadow">
	                <div class="text-info text-center">VOLTAGE</div>
	                <div class="text-info text-center mt-2"><h3>220 Volt</h3></div>
	            </div>				
					</div>
					<div class="col">
							<div class="card border-info p-3 shadow">
	                <div class="text-info text-center">Current</div>
	                <div class="text-info text-center mt-2"><h3>220 Volt</h3></div>
	            </div>				
					</div>
			</div>
			<div class="row mt-3">
					<div class="col">
							<div class="card border-info p-3 shadow">
	                <div class="text-info text-center">Power</div>
	                <div class="text-info text-center mt-2"><h3>220 Volt</h3></div>
	            </div>				
					</div>
					<div class="col">
							<div class="card border-info p-3 shadow">
	                <div class="text-info text-center">Energy</div>
	                <div class="text-info text-center mt-2"><h3>220 Volt</h3></div>
	            </div>				
					</div>
			</div>
			<div class="row mt-3">
					<div class="col">
							<div class="card border-info p-3 shadow">
	                <div class="text-info text-center">Frequency</div>
	                <div class="text-info text-center mt-2"><h3>220 Volt</h3></div>
	            </div>				
					</div>
					<div class="col">
							<div class="card border-info p-3 shadow">
	                <div class="text-info text-center">Power Factor</div>
	                <div class="text-info text-center mt-2"><h3>220 Volt</h3></div>
	            </div>				
					</div>
			</div>
<!-- <div class="col-xs-12 col-sm-6 col-lg-4 p-2">
						<div class="card">
						  <div class="card-body">
						    <span>
						    	<h5 class="card-title">Voltage</h5>
						    	<div class="pull-right">444</div>
						    </span>
						    <span>
						    	<h5 class="card-title">Current</h5>
						    	<div class="pull-right">444</div>
						    </span>
						    <span>
						    	<h5 class="card-title">Power</h5>
						    	<div class="pull-right">444</div>
						    </span>
						    <span>
						    	<h5 class="card-title">Energy</h5>
						    	<div class="pull-right">444</div>
						    </span>
						    <span>
						    	<h5 class="card-title">PF</h5>
						    	<div class="pull-right">444</div>
						    </span>
						  </div>
				</div> -->			
		</div>

		<!-- jQuery -->
		<script src="<?php echo base_url()?>assets/jquery/jquery-2.2.3.min.js"></script>
		<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js" ></script>
		<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap4-toggle.min.js" ></script>
		<script type="text/javascript">			
			  var baseurl  = "<?php echo base_url()?>";

				function fetchdata(){ 

	        $.ajax({
	            url : baseurl + 'home/status',
	            type: "post",
	            dataType: "json",
	            success: function(callback){
	                // console.log(callback.data['id']);
	            },
					    complete:function(data){ 
						     setTimeout(fetchdata,2000); 
						  }, 
	            error: function (jqXHR, textStatus, errorThrown){
	                alert('Error get data from ajax');
	            }
	        });    

				} 

				$(document).ready(function(){ 
				  // setTimeout(fetchdata,2000); 
				    $('#voltage').change(function() {
				    	stat = $(this).prop('checked');
				    	if (stat) {
				    		console.log("aktif");
				    	}else{
				    		console.log("modaaar");
				    	}
				    })

				});
		</script>
	</body>
</html>


