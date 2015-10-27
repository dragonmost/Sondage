<?php
/**
 * Created by PhpStorm.
 * User: 1229753
 * Date: 27/10/2015
 * Time: 11:23
 */

AddSurvey($_POST);

function AddSurvey($data)
{
    try {
        $pdo = new PDO('sqlite:bd.Account');
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    $insert = "INSERT INTO Sondage(PW, Account) VALUES(:SondagePW,:SondageAccount)";
    $requete = $pdo->prepare($insert);
    $pw = substr(str_shuffle("qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789"), 0, 13);
    $requete->bindValue(':SondagePW',$pw);
    $requete->bindValue(':SondageAccount', $_COOKIE['email']);

    // Execute la requête
    $requete->execute();

    $pdo = null;

    $doc = new DOMDocument();
    $doc->loadHTMLFile("../html/CompleteSurvey.html");
    $Questions = $doc->getElementById('Question');
    $input = $doc->createElement("input");
    $input->setAttribute("value",$pw);
    $input->setAttribute("class", "BlackText");
    $input->setAttribute("ReadOnly","");
    $button = $doc->getElementById("button");
    $button->appendChild($doc->createTextNode("Complete Survey"));
    $button->setAttribute("type", "submit");
    $Questions->appendChild($input);
    echo $doc->saveHTML();

    for($ii = 1;$ii<= count($data)-(count($data)/2);$ii++)
    {
        $Question = $_POST['Question'.$ii];
        $Type = $_POST['Type'.$ii];
        AddQuestions($Question,$Type);
    }
}

?>