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
		<style type="text/css">

.navs {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 55px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    background-color: #ffffff;
    display: flex;
    overflow-x: auto;
}

.nav__link {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    min-width: 50px;
    overflow: hidden;
    white-space: nowrap;
    font-family: sans-serif;
    font-size: 13px;
    color: #444444;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
    transition: background-color 0.1s ease-in-out;
}

.nav__link:hover {
    background-color: #eeeeee;
}

.nav__link--active {
    color: #009578;
}

.nav__icon {
    font-size: 18px;
}

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -moz-font-feature-settings: 'liga';
  -moz-osx-font-smoothing: grayscale;
}			
		</style>

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
					<h2 class="text-center">Control and Monitoring</h2>
			</div>
			<div class="card border-info p-3 shadow mt-1">		
					<div class="row mt-3">
							<div class="col">
									<div class="card border-info p-3">
			                <div class="text-info text-center">Voltage</div>
			                <div class="text-info text-center mt-2">
			                	<h4><span id="voltage">000</span> V</h4>
			                </div>
			            </div>				
							</div>
							<div class="col">
									<div class="card border-info p-3">
			                <div class="text-info text-center">Current</div>
			                <div class="text-info text-center mt-2">
			                	<h4><span id="current">000</span> A</h4>
			                </div>
			            </div>				
							</div>
					</div>
					<div class="row mt-3">
							<div class="col">
									<div class="card border-info p-3">
			                <div class="text-info text-center">Power</div>
			                <div class="text-info text-center mt-2">
			                	<h4><span id="power">000</span> W</h4>
			                </div>
			            </div>				
							</div>
							<div class="col">
									<div class="card border-info p-3">
			                <div class="text-info text-center">Energy</div>
			                <div class="text-info text-center mt-2">
			                	<h4><span id="energy">000</span> kWH</h4>
			                </div>
			            </div>				
							</div>
					</div>
					<div class="row mt-3">
							<div class="col">
									<div class="card border-info p-3">
			                <div class="text-info text-center">Frequency</div>
			                <div class="text-info text-center mt-2">
			                	<h4><span id="frequency">00</span> Hz</h4>
			                </div>
			            </div>				
							</div>
							<div class="col">
									<div class="card border-info p-3">
			                <div class="text-info text-center">Power Factor</div>
			                <div class="text-info text-center mt-2">
			                	<h4><span id="pf"></span>00</h4>
			                </div>
			            </div>				
							</div>
					</div>
			</div>
		</div>

<!-- Bottom Navbar -->
  <nav class="navbar navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom navbar-light bg-light">
  <!-- <nav class="navbar navbar-dark bg-info navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom"> -->
    <ul class="navbar-nav nav-justified w-100">
      <li class="nav-item">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Cari</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Add</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Notif</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Profile</a>
      </li>
    </ul>
  </nav>
		</nav>

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
				  	// setTimeout(fetchdata,2000); 

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


