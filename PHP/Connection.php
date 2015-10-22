<script src="../js/sondage.js"></script>
<?php




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

function DisplayAccount()
{
    try {
        $pdo = new PDO('sqlite:bd.Account');
    }
    catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }


    try {
        $req = $pdo->prepare("SELECT * FROM donnees");
        $req->execute();

        $values_from_db = $req->fetchAll();
        //print_r($values_from_db);

        foreach ($values_from_db as $single_data)
        {
            //echo '<p>' . $single_data['AccountEmail'] . '</p>';
            //echo '<p>' . $single_data['AccountPW'] . '</p>';
            //echo '<script> displayLstAccount('.json_encode($single_data['AccountEmail']). ','. json_encode($single_data['AccountisAdmin']) . ')</script>';
            appendAccount($single_data['AccountEmail'], $single_data['AccountisAdmin']);
        }


        /*while ($result = $req->fetchAll())(PDO::FETCH_NUM)) {
            foreach ($result as $key => $value) {
                echo "$key => $value <br>";
                echo '<script> displayLstAccount('.$value.')</script>';
            }
        }*/
    }
    catch (PDOException $ex) {
        echo "Connection failed: " . $ex->getMessage();
    }


    //$index = JSON_ENCODE($table);
}

function appendAccount($name, $isAdmin)
{
    $doc = new DOMDocument();
    $doc->loadHTML("AdminHome.php");
    $doc->getElementById('lstAccount');
    $liste = $doc->createElement("li");

    $divNorm = $doc->createElement("div");
    $divNorm->setAttribute("id", "normal");
    $divMod = $doc->createElement("div");
    $divMod->setAttribute("id", "modify");

    //mon div normal
    $lblNorm = $doc->createElement("label");
    $lblNorm->appendChild($doc->createTextNode($name));
    $pencil = $doc->createElement("a");
    $pencilSpan = $doc->createElement("span");
    $pencilSpan->setAttribute("class", "glyphicon glyphicon-pencil");
    $pencilSpan->setAttribute("aria-hidden", "true");
    $pencil->appendChild($pencilSpan);
    $pencil->setAttribute("class", "Account-Management");
    $pencil->setAttribute("href", "#");
    $trash = $doc->createElement("a");
    $trashSpan = $doc->createElement("span");
    $trashSpan->setAttribute("class", "glyphicon glyphicon-trash");
    $trashSpan->setAttribute("aria-hidden", "true");
    $trash->appendChild($trashSpan);
    $trash->setAttribute("class", "Account-Management");
    $trash->setAttribute("href", "#");

    //mon div de modifier
    $input = $doc->createElement("input");
    $input->setAttribute("type", "email");
    $input->setAttribute("placeholder", $name);


    $divNorm->appendChild($lblNorm);
    $divNorm->appendChild($pencil);
    $divNorm->appendChild($trash);
    $divMod->appendChild($input);
    $liste->appendChild($divNorm);
    $liste->appendChild($divMod);
    $doc->appendChild($liste);
}

?>