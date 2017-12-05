<?php echo $_SERVER['QUERY_STRING']; ?>

<div class="main">
	<div class="content">
		<div class="loading">Loading...</div>
		<table id="tools-table">
			<thead>
				<tr>
				<?php
					foreach($tool_columns as $column) {
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
					foreach($tool_columns as $column) {
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