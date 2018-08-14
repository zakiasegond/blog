<!DOCTYPE html>
<html>
	<head>
		<title>page admin</title>
		<link rel=Stylesheet type="text/css" href=style.css>
	</head>

	<body>
		<h1>Page Administrateur</h1>


<h2>Ajouter un Article</h2>

    <div id="ajouter">

        <form method="POST" ACTION="">


 			Date<input type="text" class="date" name="date" size="20" maxlength="20">

            Titre<input type="text" class="title" name="titre"> 

            Contenu<textarea type="text" class="ajout" name="contenu"></textarea>

            
            <button  class="button" name="submit" type="submit" value="Envoyer">Enregistrer</button>

        </form>

    </div>



<?php

//Message d'erreur si input vide.

if(!empty($_POST['submit'])){

    if (!empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['date'])){

        try {

            //Pour éviter les erreur.

            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

            // Connexion à la base de données.

            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'segond','loudmila32', $pdo_options);

            //Ajout du nouvel article dans la base de donnée.

            $req = $bdd->prepare('INSERT INTO articles(titre, contenu, date)

                VALUES(:titre, :contenu, :date)');

            $req->execute(array(

                ':titre' => $_POST['titre'],

                ':contenu' => $_POST['contenu'],

                ':date' => $_POST['date']

            ));

            header('Location: index.php');

        }

        catch (Exception $e){

            die('Erreur : ' . $e->getMessage());

        }

    }else{

        echo  "<script>alert( 'Erreur, Remplissez tous les champs!');</script>"; 

    }

}

?>
	<h2>Modifier un Article</h2>
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


$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM articles ORDER BY date DESC LIMIT 0, 10');


while ($donnees = $req->fetch())

{

?>

<div class="news">

    <h2>
    	<textarea name="text" class="titre">
		
        <?php echo htmlspecialchars($donnees['titre']); ?>

        <em>le <?php echo $donnees['date']; ?></em>
         </textarea>
    </h2>

    
    <p>
    	<textarea name="text" class="contenu">
    <?php

    // On affiche le contenu du billet


    echo nl2br(htmlspecialchars($donnees['contenu'])); 
    
    ?>
    </textarea>

    <form method="POST">
    <button type='submit'>Enregistrer</button>
    </form>
    <br />



    
    </p>

</div>

<?php

} // Fin de la boucle des billets

$req->closeCursor();

?>






	</body>
</html>