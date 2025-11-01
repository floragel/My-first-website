<?php
$bdd = new PDO("mysql:host=localhost;dbname=nintendolahlou;charset=utf8", "root", "");
if(isset($_POST['pseudo']) And isset($_POST['message']) And !empty($_POST['pseudo']) And !empty($_POST['message'])){

	$pseudo = htmlspecialchars($_POST['pseudo']);
	$message = htmlspecialchars($_POST['message']);

	$insertmsg = $bdd->prepare('INSERT INTO chat(pseudo, message) VALUES(?, ?)');
	$insertmsg->execute(array($pseudo, $message));
}
?>
<html>
<head>
	<title>Discussion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="icon" type="image/png" href="img/bab.png" />
<body>
	<!-- menu de navigation -->
	<nav class="menu-nave">
		<ul>
			<li class="machaîne">
				<a href="https://www.youtube.com/channel/UChiVAAYLJKbB7rEQe8MDhIw" target="_BLANK">
					ma chaîne -
				</a>
			</li>

			<li class="accueil">
				<a href="index.html">
					Accueil -
				</a>
			</li>

			<li class="mesvidéos">
				<a href="Vidéos.html">
					 Vidéos -
				</a>
			</li>

			<li class="contactez">

				<a href="Contactez.html">
					 Contactez moi -
				</a>
			</li>

			<li class="chaîne">

				<a href="amis.html">
					 Les chaînes de mes amis
				</a>
			</li>
			
			<li class="telechargement">
				<a href="téléchargement.html">
				téléchargement
			</a>
			
			</li>

						<li class="OLOGRA">
				<a href="OLOGRAOS.html">
				OLOGRA'OS
			</a>
			
			</li>

			<li class="chat">
				<a href="chat.php">
				Disscusion
			</a>
			
			</li>

			<br></br><br></br>

			<h1 align="center">Coucou les amis voici un chat pour parler entre nous</h1>

			<br></br>
	

	<form method="post" action="" align="down">
		<input class="chat2" type="text" name="pseudo" placeholder="Pseudo"><br></br>
		<textarea class="chat2"type="text" name="message" placeholder="Message"></textarea><br></br>
		<input type="submit" value="envoyer">
	</form>
	<div align="left"><?php
	$allmsg = $bdd->query('SELECT * FROM chat ORDER BY id DESC');
	while($msg = $allmsg->fetch()){
	?>
	<h3><b><?php echo $msg['pseudo'] ?> :</b> <?php echo $msg['message']?></h3><br></br>
	<?php
	}
	?>
</div>
</body>
</html>