<script src="../js/sondage.js"></script>
<?php

Connect($_POST["email"], $_POST["pw"]);

function Connect($email, $pw)
{
    try {
        $pdo = new PDO('sqlite:bd.Account');
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

    try {
        $sel = "SELECT * FROM donnees WHERE AccountEmail= :Email AND AccountPW= :PW AND AccountisAdmin= 1";
        $req = $pdo->prepare($sel);
        $req->bindValue(":Email", $email);
        $req->bindValue(":PW", md5($pw));
        $req->execute();

        $val = $req->fetch(PDO::FETCH_NUM);

        if($val != null)
            header("location:AdminHome.html");
        else
        {
            $sel = "SELECT * FROM donnees WHERE AccountEmail= :Email AND AccountPW= :PW AND AccountisAdmin= 0";
            $req = $pdo->prepare($sel);
            $req->bindValue(":Email", $email);
            $req->bindValue(":PW", md5($pw));
            $req->execute();

            if($val) {
                header("location:SurveyHome.html");
            }
        }


    } catch (PDOException $ex) {
        echo "Connection failed: " . $ex->getMessage();
    }
}

function CreateAccount($email, $pw, $isAdmin)
{

// Connexion
    try {
        $pdo = new PDO('sqlite:bd.Account');
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    /**************************************
     * Cr�ation des tables                       *
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

        // Execute la requ�te
        $requete->execute();

        echo "Insertion r�ussie" . $pdo->lastInsertId();
    } catch (PDOException $e) {
        echo 'Insertion failed: ' . $e->getMessage();
    }

// ferme la requ�te
    $pdo = null;
}

function AdminHome()
{
    try {
        $pdo = new PDO('sqlite:bd.Account');
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }


    try {
        $req = $pdo->prepare("SELECT * FROM donnees");
        $req->execute();

        $values_from_db = $req->fetchAll();
        //print_r($values_from_db);

        foreach ($values_from_db as $single_data) {
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
    } catch (PDOException $ex) {
        echo "Connection failed: " . $ex->getMessage();
    }


    //$index = JSON_ENCODE($table);
}

function appendAccount($name, $isAdmin)
{
    $doc = new DOMDocument();
    $doc->loadHTMLFile("AdminHome.html");
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

    echo $doc->saveHTML();
}

?>