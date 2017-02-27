<?php
try {
    require_once  '../../alex/project/pdo_connect.php';
    $sql = 'SELECT * FROM scor';
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
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
include "code.php";
?>
</div>
<div>
			<div id="result">
			<p style="text-align:center"><a href="exercise.php">Joaca din nou</a></p>
			</div>
			<div class="centrat">
				<p>Alege:</p>
				<p><a href="?choice=hartie">Hartie</a></p>
				<p><a href="?choice=piatra">Piatra</a></p>
				<p><a href="?choice=foarfeca">Foarfeca</a></p>
			</div>
</div>
<table class="table_center">
    <tr class="th">
        <th id="player">Player</th>
        <th id="computer">Computer</th>
    </tr>
    <?php foreach ($db->query($sql) as $row) { ?>
        <p id="title_sql">SQL Table</p>
        <tr>
            <td id="td_player"><?php echo $row['Player']; ?></td>
        <td id="td_computer"><?php echo $row['Computer']; ?></td
        </tr>
    <?php } ?>
</table>
</body>
</html>