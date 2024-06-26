<?php
//errors directive
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require("../../../../mysql_connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
	<?php include("./header.php") ?>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['location'])) {
		$query = $_GET['location'];
		$query = htmlspecialchars($query);
		$query = trim($query); // remove empty spaces
		$query = strip_tags($query); // html and php tags removed
		$query = htmlspecialchars($query, ENT_QUOTES, 'UTF-8'); // convert anything bad to html characters

		$sql = "SELECT * FROM property WHERE address LIKE '%$query%' OR landlord LIKE '%$query%'";

		$result = mysqli_query($db_connection, $sql);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo '<div class="property-box featured-property">';
				echo '<div class="property-thumbnail"><img class="thumbnail" src=../assets/' . $row["photo_path"] . '></div>';
				echo "<div class='property-description'>";
				echo "<span class='address bold'>" . $row["address"] . "</span>";
				echo "<span class='landlord-email '>Posted by <span class='bold'> " . $row["landlord"] . "</span> </span>";
				echo "<span class='description'>" . $row["description"] . "</span>";
				echo "<span class='rent-price bold'>€" . $row["rent_price"] . "/month</span>";
				echo "</div>";
				echo "<button class='infobtn btn btn-primary' btn-lg btn-block >More Info</button>";
				echo "</div>";
			}
		} else {
			echo "no results :(";
		}
	}
	?>

	<?php include("./footer.php") ?>
</body>

</html>