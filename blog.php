<?php
$pdo = new PDO('mysql:host=localhost;dbname=blog', 'segond', 'loudmila32');
?>

?>

<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'segond', 'loudmila32');
}

catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());

}
$reponse = $bdd->query('SELECT * FROM articles') ;