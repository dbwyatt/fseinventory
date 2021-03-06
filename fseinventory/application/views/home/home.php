<div class="container">	
	<div class="row justify-content-center padding_top_large padding_bottom_large">
		<p>Welcome<?php echo isset($auth_username) ? ', ' . $auth_username : '' ?>!</p>
	</div>

	<div class="row justify-content-center padding_top_large">
		<div class="card" style="width: 20rem; margin: 0 20px;">
		  <img class="card-img-top" src="http://wvbadbuildings.org/wp-content/uploads/2015/02/tools.jpg" alt="Tools">
		  <div class="card-body">
		    <h4 class="card-title">Tools</h4>
		    <p class="card-text">View all tools</p>
		    <a href="<?php echo base_url('tools'); ?>" class="btn btn-primary">Go to Tools</a>
		  </div>
		    <div class="card-footer">
		    	<small class="text-muted"></small>
		    </div>
		</div>

		<div class="card" style="width: 20rem; margin: 0 20px;">
		  <img class="card-img-top" src="https://officesnapshots.com/wp-content/uploads/2016/01/cameron-industrial-office-design-2-700x476.jpg" alt="Offices">
		  <div class="card-body">
		    <h4 class="card-title">Offices</h4>
		    <p class="card-text">View all Offices</p>
		    <a href="<?php echo base_url('offices'); ?>" class="btn btn-primary">Go to Offices</a>
		  </div>
		    <div class="card-footer">
		    	<small class="text-muted"></small>
		    </div>
		</div>

		<div class="card" style="width: 20rem; margin: 0 20px;">
		  <img class="card-img-top" src="https://www.endurancewarranty.com/learning-center/wp-content/uploads/2014/07/extended-warranty-for-used-cars-min.jpg" alt="Vehicles">
		  <div class="card-body">
		    <h4 class="card-title">Vehicles</h4>
		    <p class="card-text">View all Vehicles</p>
		    <a href="<?php echo base_url('vehicles'); ?>" class="btn btn-primary">Go to Vehicles</a>
		  </div>
		    <div class="card-footer">
		    	<small class="text-muted"></small>
		    </div>
		</div>
	</div>
</div>