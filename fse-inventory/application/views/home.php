

<style>
	.main
	{
		/*padding-top: 200px;*/
		/*margin: 0 100px 0 100px;*/
		padding: 150px;
		background-color: #F4F4F4;
	}
	.content
	{
		padding: 20px;
		background-color: white;
		/*display: flex;*/
		box-shadow: 1px 1px 8px -2px grey;
	}
	.content table 
	{
		display: flex;
	}


</style>

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