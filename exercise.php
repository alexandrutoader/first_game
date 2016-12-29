<!DOCTYPE>
<html>
<head>
<title>Joc</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div id="heading">
	<h1>Piatra, Hartie, Foarfeca</h1>
<?php
include "style.php";
?>
</div>
<div>
			<div id="result">
			<p style="text-align:center"><?php echo $result; ?></p>
			<p style="text-align:center"><a href="exercise.php">Joaca din nou</a></p>
			</div>
			<div class="centrat">
				<p>Alege:</p>
				<p><a href="?choice=hartie">Hartie</a></p>
				<p><a href="?choice=piatra">Piatra</a></p>
				<p><a href="?choice=foarfeca">Foarfeca</a></p>
			</div>
</div>
</body>
</html>
