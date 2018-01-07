<?php echo $_SERVER['QUERY_STRING']; ?>

<div class="align_main padding_top_large padding_bottom_large">
	<h2>Office Equipment</h2>
</div>

<div class="main">
	<div class="content">
		<div class="loading">Loading...</div>
		<table id="office-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
				<?php
					foreach($office_columns as $column) {
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
					foreach($office_columns as $column) {
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
						echo "<tr>";
						foreach($office as $o)
							echo "<td>$o </td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>