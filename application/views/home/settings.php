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
								<input class="text-center p-2" id="deviceButton1" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input class="text-center p-2" id="deviceButton2" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input class="text-center p-2" id="deviceButton3" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input class="text-center p-2" id="deviceButton4" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input class="text-center p-2" id="deviceButton5" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input class="text-center p-2" id="deviceButton6" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input class="text-center p-2" id="deviceButton7" type="text" value="device1">	
							</div>
							<div class="p-1">
								<input class="text-center p-2" id="deviceButton8" type="text" value="device1">	
							</div>							
					</div>
			</div>
		</div>

	  <?php $this->load->view('home/_navbar.inc.php'); ?>		

		<!-- jQuery -->
		<script src="<?php echo base_url()?>assets/jquery/jquery-2.2.3.min.js"></script>
		<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js" ></script>
		<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap4-toggle.min.js" ></script>
	</body>
</html>


