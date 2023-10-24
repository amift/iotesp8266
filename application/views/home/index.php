	<?php $this->load->view('home/_header.inc.php'); ?>		

	<body class="bg-secondary bg-gradient-secondary">
		<div class="card p-3">
					<h4 class="text-center">Control and Monitoring</h4>
		</div>
			<div class="container">
				<div class="mt-1 mb-4">		
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
			</div> <!-- container -->

			<div class="container">
				  <div class="card p-4 mb-1">
						<div class="d-flex justify-content-between">
							<div class="d-flex align-items-center">
								<div id="deviceName1">Device 1</div>
							</div>
							<input id="deviceButton1" type="checkbox" checked data-toggle="toggle">				
						</div>
				  </div>
				  <div class="card p-4 mb-1">
						<div class="d-flex justify-content-between">
							<div class="d-flex align-items-center">
								<div id="deviceName2">Device 2</div>
							</div>
							<input id="deviceButton2" type="checkbox" checked data-toggle="toggle">				
						</div>
				  </div>
				  <div class="card p-4 mb-1">
						<div class="d-flex justify-content-between">
							<div class="d-flex align-items-center">
								<div id="deviceName3">Device 3</div>
							</div>
							<input id="deviceButton3" type="checkbox" checked data-toggle="toggle">				
						</div>
				  </div>
				  <div class="card p-4 mb-1">
						<div class="d-flex justify-content-between">
							<div class="d-flex align-items-center">
								<div id="deviceName4">Device 4</div>
							</div>
							<input id="deviceButton4" type="checkbox" checked data-toggle="toggle">				
						</div>
				  </div>
				  <div class="card p-4 mb-1">
						<div class="d-flex justify-content-between">
							<div class="d-flex align-items-center">
								<div id="deviceName5">Device 5</div>
							</div>
							<input id="deviceButton5" type="checkbox" checked data-toggle="toggle">				
						</div>
				  </div>
				  <div class="card p-4 mb-1">
						<div class="d-flex justify-content-between">
							<div class="d-flex align-items-center">
								<div id="deviceName6">Device 6</div>
							</div>
							<input id="deviceButton6" type="checkbox" checked data-toggle="toggle">				
						</div>
				  </div>
				  <div class="card p-4 mb-1">
						<div class="d-flex justify-content-between">
							<div class="d-flex align-items-center">
								<div id="deviceName7">Device 7</div>
							</div>
							<input id="deviceButton7" type="checkbox" checked data-toggle="toggle">				
						</div>
				  </div>
				  <div class="card p-4">
						<div class="d-flex justify-content-between">
							<div class="d-flex align-items-center">
								<div id="deviceName8">Device 8</div>
							</div>
							<input id="deviceButton8" type="checkbox" checked data-toggle="toggle">				
						</div>
				  </div>
			</div>
			<br><br><br><br><br>

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


				function getDeviceName(){ 

	        $.ajax({
	            url : baseurl + 'home/device_name',
	            type: "post",
	            dataType: "json",
	            success: function(callback){
									$('#deviceName1').html(callback.data[0]['name']);
									$('#deviceButton1').bootstrapToggle(callback.data[0]['status']);

	                $('#deviceName2').html(callback.data[1]['name']);
									$('#deviceButton2').bootstrapToggle(callback.data[1]['status']);

	                $('#deviceName3').html(callback.data[2]['name']);
									$('#deviceButton3').bootstrapToggle(callback.data[2]['status']);

	                $('#deviceName4').html(callback.data[3]['name']);
									$('#deviceButton4').bootstrapToggle(callback.data[3]['status']);

	                $('#deviceName5').html(callback.data[4]['name']);
									$('#deviceButton5').bootstrapToggle(callback.data[4]['status']);

	                $('#deviceName6').html(callback.data[5]['name']);
									$('#deviceButton6').bootstrapToggle(callback.data[5]['status']);

	                $('#deviceName7').html(callback.data[6]['name']);
									$('#deviceButton7').bootstrapToggle(callback.data[6]['status']);

	                $('#deviceName8').html(callback.data[7]['name']);	            		
									$('#deviceButton8').bootstrapToggle(callback.data[7]['status']);

	                // $('#voltage').html(callback.data[0]['name']);
	            },
					    complete:function(data){ 
						     setTimeout(fetchdata,2000); 
						  }, 
	            error: function (jqXHR, textStatus, errorThrown){
	                alert('Error get data from ajax');
	            }
	        });    

				} 

				function deviceInit(){
			    $('#deviceButton1').change(function() {
			    	stat = $(this).prop('checked');
			    	if (stat) {
			    		console.log("aktif");
			    	}else{
			    		console.log("modaaar");
			    	}
			    })					
				}

				$(document).ready(function(){ 
				  	setTimeout(fetchdata,2000); 

				  	getDeviceName();
				  	deviceInit();

				});
		</script>
	</body>
</html>


