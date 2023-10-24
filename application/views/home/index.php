<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IOT</title>
		<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap4-toggle.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="bg-secondary bg-gradient-secondary">
		<div>
			<div class="card border-info p-3">
					<h2 class="text-center">Control and Monitoring</h2>
			</div>
			<div class="p-2 shadow mt-1">		
					<div class="row mt-3">
							<div class="col">
									<div class="card border-info p-2">
			                <div class="text-info text-center">Voltage</div>
			                <div class="text-info text-center mt-2">
			                	<h5><span id="voltage">000</span> V</h5>
			                </div>
			            </div>				
							</div>
							<div class="col">
									<div class="card border-info p-2">
			                <div class="text-info text-center">Current</div>
			                <div class="text-info text-center mt-2">
			                	<h5><span id="current">000</span> A</h5>
			                </div>
			            </div>				
							</div>
					</div>
					<div class="row mt-3">
							<div class="col">
									<div class="card border-info p-2">
			                <div class="text-info text-center">Power</div>
			                <div class="text-info text-center mt-2">
			                	<h5><span id="power">000</span> W</h5>
			                </div>
			            </div>				
							</div>
							<div class="col">
									<div class="card border-info p-2">
			                <div class="text-info text-center">Energy</div>
			                <div class="text-info text-center mt-2">
			                	<h5><span id="energy">000</span> kWH</h5>
			                </div>
			            </div>				
							</div>
					</div>
					<div class="row mt-3">
							<div class="col">
									<div class="card border-info p-2">
			                <div class="text-info text-center">Frequency</div>
			                <div class="text-info text-center mt-2">
			                	<h5><span id="frequency">00</span> Hz</h5>
			                </div>
			            </div>				
							</div>
							<div class="col">
									<div class="card border-info p-2">
			                <div class="text-info text-center">Power Factor</div>
			                <div class="text-info text-center mt-2">
			                	<h5><span id="pf">00</span></h5>
			                </div>
			            </div>				
							</div>
					</div>
			</div>
		</div>


	  
		<div class="pt-2 pn-2">
			
			<div class="d-flex d-flex justify-content-between bg-secondary">
			  <div class="p-2">
			  	<div class="d-flex justify-content-start">
			  		<div class="btn btn-info">
			  			<div class="fa fa-home"></div>
			  		</div>
			  		<div class="btn btn-info">2</div>
			  		<div class="btn btn-info">3</div>
			  	</div>
			  </div>
			  <div class="p-2">
					<div class="d-flex justify-content-end">
			  		<div class="btn btn-info">
			  			<div class="fa fa-cog"></div>
			  		</div>
			  		<div class="btn btn-info">
			  			<i class="fa fa-question-circle"></i>
			  		</div>
			  		<div class="btn btn-info">
			  			<div class="fa fa-sign-out"></div>			  			
			  		</div>
			  	</div>			  	
			  </div>
			</div>

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
	                $('#voltage').html(callback.data['voltage']);
	                $('#current').html(callback.data['current']);
	                $('#power').html(callback.data['power']);
	                $('#energy').html(callback.data['energy']);
	                $('#frequency').html(callback.data['frequency']);
	                $('#pf').html(callback.data['pf']);
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
				  	setTimeout(fetchdata,2000); 

				    $('#btnvoltage').change(function() {
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


