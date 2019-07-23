<?php 
    $title = "Peterman Ratings | Players";

    include("./includes/header.php");
    include("./includes/navigation.php");
?>

<article>

	<div class="player-search-filter-container">  
		<form action="process-player-list.php" method="post">
			<input type="text" name="player-name" class="" placeholder="Enter Player Name">

			<input type="text" name="club-name" class="" placeholder="Enter Club Name">

			<select name="country-name" class="" placeholder="Select Country">
				<option>Select Country</option>
			</select>

			<select name="state-name" class="" placeholder="Select State">
				<option>Select State</option>
			</select>

			<input type="text" name="recent-competitor" class="" placeholder="Most Recent Competitor">

			<button type="submit" name="submit-search-filter" class="">Search</button>
		</form>
	</div>

	<div class="player-search-result-container">
		<table class="player-search-result-table">
			<?php
				if(isset($_SESSION["player-name"]) && $_SESSION["player-name"] != NULL)
				{
					$player = $_SESSION["player-name"];
					$club = $_SESSION["club"];

					echo "<tr class='player-search-result-table-headers'>
							<th>Player</th>
							<th>Club</th>
						  </tr>";
					
					for($i = 0; $i < count($player); $i++)
					{
						echo "<tr>";
						echo "<td><a href='profile.php'>".$player[$i]."</a></td>";
						echo "<td>".$club[$i]."</td>";
						echo "</tr>";
					}					
				}
				else
				{ 
					echo "No player by the given filter exists.";
				}

				unset($_SESSION["player-name"]);
				unset($_SESSION["club"]);
			?>
		</table>
	</div>

</article>

<?php
    include("./includes/footer.php");
?>