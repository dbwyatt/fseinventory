<?php echo $_SERVER['QUERY_STRING']; ?>

<div class="main">
	<div class="content">
		<div class="loading">Loading...</div>
		<table id="vehicles-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
				<?php
					foreach($vehicles_columns as $column) {
						echo "<th>";
						echo "$column";
						echo "</th>";
					}
				?> 
				</tr>
			</thead>
			<tfoot>
				<tr>
				<?php
					foreach($vehicles_columns as $column) {
						echo "<th>";
						echo "$column";
						echo "</th>";
					}
				?> 
				</tr>
			</tfoot>
			<tbody>
				<?php
					foreach($all_vehicles as $column => $vehicles)
					{
						echo "<tr>";
						foreach($vehicles as $v)
							echo "<td>$v </td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>