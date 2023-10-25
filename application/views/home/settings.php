<?php $this->load->view('home/_header.inc.php'); ?>		

	<body>
			<div class="card p-3 bg-secondary text-white">
					<h5>Control and Monitoring</h5>
					<small>Change device name</small>
			</div>
		<div class="container">
			<div class="p-2 mt-1">
					<div class="p-3 text-center">
							<div class="p-1">
								<input maxlength="15" class="text-center p-2" id="deviceButton1" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input maxlength="15" class="text-center p-2" id="deviceButton2" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input maxlength="15" class="text-center p-2" id="deviceButton3" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input maxlength="15" class="text-center p-2" id="deviceButton4" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input maxlength="15" class="text-center p-2" id="deviceButton5" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input maxlength="15" class="text-center p-2" id="deviceButton6" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input maxlength="15" class="text-center p-2" id="deviceButton7" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input maxlength="15" class="text-center p-2" id="deviceButton8" type="text" value="device1">	
							</div>							
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


			function getDeviceName(){ 
	        $.ajax({
	            url : baseurl + 'home/device_name',
	            type: "post",
	            dataType: "json",
	            success: function(callback){
									$('#deviceButton1').val(callback.data[0]['name']);

	                $('#deviceButton2').val(callback.data[1]['name']);

	                $('#deviceButton3').val(callback.data[2]['name']);

	                $('#deviceButton4').val(callback.data[3]['name']);

	                $('#deviceButton5').val(callback.data[4]['name']);

	                $('#deviceButton6').val(callback.data[5]['name']);

	                $('#deviceButton7').val(callback.data[6]['name']);

	                $('#deviceButton8').val(callback.data[7]['name']);	            		
	            }, 
	            error: function (jqXHR, textStatus, errorThrown){
	                alert('Error get data from ajax');
	            }
	        });    
				} 

				function updateName(id, name){ 
	        $.ajax({
	            url : baseurl + 'device/updatename',
	            type: "post",
	            data: { id : id, name : name },
	            dataType: "json",
	            success: function(callback){
	            },
					    complete:function(data){ 
						     setTimeout(fetchdata,2000); 
						  }, 
	            error: function (jqXHR, textStatus, errorThrown){
	                alert('Error get data from ajax');
	            }
	        });    
				}

				function iniDeviceInput(){ 						
				    var timer, value;

				    $('#deviceButton1').bind('keyup', function() {
				        clearTimeout(timer);
				        var str = $(this).val();
				        if (str.length > 2 && value != str) {
				            timer = setTimeout(function() {
				                value = str;
				                updateName(1,value);
				            }, 500);
				        }
				    });

				    $('#deviceButton2').bind('keyup', function() {
				        clearTimeout(timer);
				        var str = $(this).val();
				        if (str.length > 2 && value != str) {
				            timer = setTimeout(function() {
				                value = str;
				                updateName(2,value);
				            }, 500);
				        }
				    });

				    $('#deviceButton3').bind('keyup', function() {
				        clearTimeout(timer);
				        var str = $(this).val();
				        if (str.length > 2 && value != str) {
				            timer = setTimeout(function() {
				                value = str;
				                updateName(3,value);
				            }, 500);
				        }
				    });

				    $('#deviceButton4').bind('keyup', function() {
				        clearTimeout(timer);
				        var str = $(this).val();
				        if (str.length > 2 && value != str) {
				            timer = setTimeout(function() {
				                value = str;
				                updateName(4,value);
				            }, 500);
				        }
				    });

				    $('#deviceButton5').bind('keyup', function() {
				        clearTimeout(timer);
				        var str = $(this).val();
				        if (str.length > 2 && value != str) {
				            timer = setTimeout(function() {
				                value = str;
				                updateName(5,value);
				            }, 500);
				        }
				    });

				    $('#deviceButton6').bind('keyup', function() {
				        clearTimeout(timer);
				        var str = $(this).val();
				        if (str.length > 2 && value != str) {
				            timer = setTimeout(function() {
				                value = str;
				                updateName(6,value);
				            }, 500);
				        }
				    });

				    $('#deviceButton7').bind('keyup', function() {
				        clearTimeout(timer);
				        var str = $(this).val();
				        if (str.length > 2 && value != str) {
				            timer = setTimeout(function() {
				                value = str;
				                updateName(7,value);
				            }, 500);
				        }
				    });

				    $('#deviceButton8').bind('keyup', function() {
				        clearTimeout(timer);
				        var str = $(this).val();
				        if (str.length > 2 && value != str) {
				            timer = setTimeout(function() {
				                value = str;
				                updateName(8,value);
				            }, 500);
				        }
				    });

				} 


				$(document).ready(function(){ 
					  iniDeviceInput();
				  	getDeviceName();
				});

		</script>
	</body>
</html>


