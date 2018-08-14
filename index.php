<!DOCTYPE html>
<html>
	<head>
		<title class="blog">BLOG</title>
		<link rel=Stylesheet type="text/css" href=style.css>
	</head>

	<body>
		<h1>BLOG</h1>

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


$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date, \'%d/%m/%Y \') AS date FROM articles ORDER BY date DESC LIMIT 0, 4');


while ($donnees = $req->fetch())

{

?>

<div class="news">

    <h2>

        <?php echo htmlspecialchars($donnees['titre']); ?>

        <em>le <?php echo $donnees['date']; ?></em>

    </h2>

    <em><a href="blog.php?articles=<?php echo $donnees['id']; ?>">Modifier</a></em>
    <em><a href="blog.php?articles=<?php echo $donnees['id']; ?>">Supprimer</a></em>
    <em><a href="blog.php?articles=<?php echo $donnees['id']; ?>">Ajouter</a></em>
    
    
    <p>


    <?php

    // On affiche le contenu de l'article.

    echo nl2br(htmlspecialchars($donnees['contenu']));

    ?>

    <br />

    
    </p>

</div>

<?php

} // Fin de la boucle des articles.

$req->closeCursor();

?>

	</body>
</html>
