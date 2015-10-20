<?php

CreateAccount("tbk@kek.kek", "ish", 1);


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
        $pdo->exec("CREATE TABLE IF NOT EXISTS donnees (
						AccountEmail TEXT PRIMARY KEY NOT NULL UNIQUE,
						AccountPW TEXT NOT NULL,
						AccountisAdmin INTEGER NOT NULL)");

        $insert = "INSERT INTO donnees (AccountEmail, AccountPW, AccountisAdmin) VALUES (:email, :pw, :isAdmin)";
        $requete = $pdo->prepare($insert);
        $requete->bindValue(':email', $email);
        $requete->bindValue(':pw', md5($pw));
        $requete->bindValue(':isAdmin', $isAdmin);

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