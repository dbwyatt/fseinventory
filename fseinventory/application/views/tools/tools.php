<?php echo $_SERVER['QUERY_STRING']; ?>

<div class="align_main padding_top_large padding_bottom_large">
	<h2>Tools</h2>
</div>

<div class="main">
	<div class="content">
		<div class="float_right">
			<button id="add_tool_entry" type="button" class="btn btn-primary">+ Add Entry</button>
			<button type="button" class="btn btn-info">Edit Entry</button>
		</div>
		
		<table id="tools-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
				<?php
					foreach($tools_columns as $column) {
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
					foreach($tools_columns as $column) {
						echo "<th>";
						echo "$column";
						echo "</th>";
					}
				?> 
				</tr>
			</tfoot>
			<tbody>
				<?php
					foreach($all_tools as $column => $tool)
					{
						echo "<tr>";
						foreach($tool as $t)
							echo "<td>$t </td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>