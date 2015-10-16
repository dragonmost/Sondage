<?php

session_start();
$var = "Baker";

$index =  file_get_contents("index.html");

$index = str_replace("%title%", $var, $index);

echo $index;
/*
$title = "Baker";

echo  file_get_contents('index.html');

echo $_GET['prenom'];

function Connexion()
{
    try {
        $pdo = new PDO('sqlite:bd.sqlite3');
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function CreateAccount()
{
    try {
        $pdo->exec("CREATE TABLE IF NOT EXISTS donnees (
						id INTEGER PRIMARY KEY,
						nom TEXT,
						prenom TEXT,
						time INTEGER)");

        $insert = "INSERT INTO donnees (nom, prenom, time) VALUES (:nom, :prenom, :time)";
        $requete = $pdo->prepare($insert);
        $requete->bindValue(':nom', "Di Croci");
        $requete->bindValue(':prenom', "Michel");
        $requete->bindValue(':time', date(DATE_RFC2822));

        // Execute la requête
        $requete->execute();

        echo "Insertion réussie" . $pdo->lastInsertId();
    } catch (PDOException $e) {
        echo 'Insertion failed: ' . $e->getMessage();
    }

// ferme la requête
    $pdo = null;
}

function test()
{

}



/*
$_GET c'est les parametres passés en GET a la page, genre dans l'url (param1=1&param2=2 .....)

$_POST c'est dans la erquete HTML, c'est la meme chose que GET, c'est juste pas affiché a lutilisateur

$_SERVER c'est les "super"-variables

$_SESSION c'est la session de l'utilisateur
*/

?>









