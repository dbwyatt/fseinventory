

<style>
	.main
	{
		padding-top: 200px;
		margin: 0 100px 0 100px;
		background-color: yellow;
	}
	.content
	{
		padding: 20px;
		background-color: white;
		/*display: flex;*/
	}
	.content table 
	{
		display: flex;
	}


</style>

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