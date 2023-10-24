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
			<div class="bg-white p-2 shadow mt-1">		
					<h2> yesh this is settings</h2>
			</div>
		</div>

	  
	<?php $this->load->view('home/_navbar.inc.php'); ?>

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


