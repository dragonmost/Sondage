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
        $sel = "SELECT * FROM Account WHERE AccountEmail= :Email AND AccountPW= :PW";
        $req = $pdo->prepare($sel);
        $req->bindValue(":Email", $email);
        $req->bindValue(":PW", ($pw));
        $req->execute();

        $val = $req->fetchAll(PDO::FETCH_NUM);

        //print_r($val[0][2]);
        setcookie("email", $email, time() + (86400 * 30), "/");
        setcookie("password", $pw, time() + (86400 * 30), "/");

        if($val[0][2] == 1)
            AdminHome();
        else if ($val[0][2] == 0)
            ClientHome();

    } catch (PDOException $ex) {
        echo "Connection failed: " . $ex->getMessage();
    }
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

        $doc = new DOMDocument();
        $doc->loadHTMLFile("AdminHome.php");

        $i=1;
        foreach ($values_from_db as $single_data) {
            appendAccount($doc, $single_data['AccountEmail'], $single_data['AccountisAdmin'], $i);
            $i = $i +1;
        }

        echo $doc->saveHTML();
        $pdo = null;

    } catch (PDOException $ex) {
        echo "Connection failed: " . $ex->getMessage();
    }


    //$index = JSON_ENCODE($table);
}

function appendAccount($doc, $name, $isAdmin, $i)
{
    $ele = $doc->getElementById('lstAccount');
    $liste = $doc->createElement("li");

    $divNorm = $doc->createElement("div");
    $divNorm->setAttribute("id", "normal". $i);
    $divMod = $doc->createElement("div");
    $divMod->setAttribute("id", "modify". $i);
    $divMod->setAttribute("style", "display: none");

    //mon div normal
    $lblNorm = $doc->createElement("label");
    $lblNorm->appendChild($doc->createTextNode($name));
    $pencil = $doc->createElement("a");
    $pencilSpan = $doc->createElement("span");
    $pencilSpan->setAttribute("class", "glyphicon glyphicon-pencil");
    $pencilSpan->setAttribute("aria-hidden", "true");
    $pencil->appendChild($pencilSpan);
    $pencil->setAttribute("class", "Account-Management");
    $pencil->setAttribute("href", "javascript:Pencil(". "'" . $i ."')");
    $trash = $doc->createElement("a");
    $trashSpan = $doc->createElement("span");
    $trashSpan->setAttribute("class", "glyphicon glyphicon-trash");
    $trashSpan->setAttribute("aria-hidden", "true");
    $trash->appendChild($trashSpan);
    $trash->setAttribute("class", "Account-Management");
    $trash->setAttribute("href", "javascript:Trash()");

    //mon div de modifier
    $input = $doc->createElement("input");
    $input->setAttribute("type", "email");
    $input->setAttribute("placeholder", $name);
    $lblMod = $doc->createElement("label");
    $lblMod->appendChild($doc->createTextNode("isAdmin"));
    $checkbox = $doc->createElement("input");
    $checkbox->setAttribute("type", "checkbox");
    if($isAdmin == 1)
        $checkbox->setAttribute("checked", "");
    $check = $doc->createElement("a");
    $checkSpan = $doc->createElement("span");
    $checkSpan->setAttribute("class", "glyphicon glyphicon-ok");
    $checkSpan->setAttribute("aria-hidden", "true");
    $check->appendChild($checkSpan);
    $check->setAttribute("class", "Account-Management");
    $check->setAttribute("href", "javascript:Check()");
    $cross = $doc->createElement("a");
    $crossSpan = $doc->createElement("span");
    $crossSpan->setAttribute("class", "glyphicon glyphicon-remove");
    $crossSpan->setAttribute("aria-hidden", "true");
    $cross->appendChild($crossSpan);
    $cross->setAttribute("class", "Account-Management");
    $cross->setAttribute("href", "javascript:Cross(". "'" . $i ."')");

    //append au doc
    $divNorm->appendChild($lblNorm);
    $divNorm->appendChild($pencil);
    $divNorm->appendChild($trash);
    $divMod->appendChild($input);
    $divMod->appendChild($lblMod);
    $divMod->appendChild($checkbox);
    $divMod->appendChild($check);
    $divMod->appendChild($cross);
    $liste->appendChild($divNorm);
    $liste->appendChild($divMod);
    $ele->appendChild($liste);
}

function ClientHome()
{
    $doc = new DOMDocument();
    $doc->loadHTMLFile("ClientHome.php");

    echo $doc->SaveHTML();
}

?>