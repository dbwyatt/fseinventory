<div class="main">
	<div class="container summary">
		<div class="row">
			<div class="col">
				<div class="summary-tile total-value">
					<h5>Total Value</h5>
					<span class="value"></span>
				</div>
			</div>
			<div class="col">
				<div class="summary-tile total-count">
					<h5>Total Count</h5>
					<span class="value"></span>
				</div>
			</div>
			<!-- <div class="col">
				<div class="summary-tile ranges">
					<h5>Ranges</h5>
					<span class="value"></span>
				</div>
			</div> -->
		</div>
	</div>
	<div class="container datatable">
		<div class="row">
			<div class="col">
				<div class="datatable-tile">
					<table id="offices-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
							<?php
								foreach($offices_columns as $key => $column) {
									echo "<th id={$key}>";
									echo "$column";
									echo "</th>";
								}
							?> 
							</tr>
						</thead>
						<tfoot>
							<tr>
							<?php
								foreach($offices_columns as $column) {
									echo "<th>";
									echo "$column";
									echo "</th>";
								}
							?> 
							</tr>
						</tfoot>
						<tbody>
							<?php
								foreach($all_offices as $column => $office)
								{
									echo "<tr data-id={$office['id']}>";
									foreach($office as $o)
										echo "<td>$o</td>";
									echo "</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>