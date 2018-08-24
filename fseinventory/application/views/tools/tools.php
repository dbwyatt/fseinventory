<div class="main">
	<div class="content">
		<div class="padding_top_large padding_bottom_large">
			<h2>Tools</h2>
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
						echo "<tr data-id={$tool['id']}>";
						foreach($tool as $t)
							echo "<td>$t</td>";
						
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>