<?php echo $_SERVER['QUERY_STRING']; ?>

<div class="main">
	<div class="content">
		<table>
			<tbody>
				<?php 
				foreach($all_tools as $tool)
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