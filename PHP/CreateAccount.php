<?php
/**
 * Created by PhpStorm.
 * User: 1229753
 * Date: 23/10/2015
 * Time: 16:31
 */

//CreateAccount($_POST["email"], $_POST["pw"], $_POST["check"]);

//print("1");
//print($_POST["check"]);
//print($_POST["check"]);
session_start();
CreateAccount($_POST["email"], $_POST["pw"], $_POST["check"]);

function CreateAccount($email, $pw, $isAdmin)
{

// Connexion
    try {
        $pdo = new PDO('sqlite:bd.Account');
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    /**************************************
     * Création des tables                       *
     **************************************/
    try {
        $pdo->exec("CREATE TABLE IF NOT EXISTS Account (
						AccountEmail TEXT PRIMARY KEY NOT NULL UNIQUE,
						AccountPW TEXT NOT NULL,
						AccountisAdmin INTEGER NOT NULL)");

        $insert = "INSERT INTO donnees (AccountEmail, AccountPW, AccountisAdmin) VALUES (:email, :pw, :isAdmin)";
        $requete = $pdo->prepare($insert);
        $requete->bindValue(':email', $email);
        $requete->bindValue(':pw', md5($pw));
        if($isAdmin == "on")
            $requete->bindValue(':isAdmin', 1);
        else
            $requete->bindValue(':isAdmin', 0);

        // Execute la requête
        $requete->execute();

        echo "Insertion réussie" . $pdo->lastInsertId();
    } catch (PDOException $e) {
        echo 'Insertion failed: ' . $e->getMessage();
    }

// ferme la requête
    $pdo = null;
}

?>