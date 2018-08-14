<!DOCTYPE html>
<html>
	<head>
		<title>page admin</title>
	</head>

	<body>
		<h2>Page Administrateur</h2>
			<?php
			$pdo = new PDO('mysql:host=localhost;dbname=blog', 'segond', 'loudmila32');
		?>



		<?php
			try
			{
    		$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'segond', 'loudmila32');
			}

			catch (Exception $e)
			{
        	die('Erreur : ' . $e->getMessage());
			}


$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM articles ORDER BY date DESC LIMIT 0, 4');


while ($donnees = $req->fetch())

{

?>

<div class="news">

    <h2>
    	
        <?php echo htmlspecialchars($donnees['titre']); ?>

        <em>le <?php echo $donnees['date']; ?></em>

    </h2>

    
    <p>

    <?php

    // On affiche le contenu du billet

    echo nl2br(htmlspecialchars($donnees['contenu']));

    ?>

    <br />

    
    </p>

</div>

<?php

} // Fin de la boucle des billets

$req->closeCursor();

?>




	</body>
</html>