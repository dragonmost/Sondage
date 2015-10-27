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
    $doc->loadHTMLFile("CompleteSurvey.php");
    $Questions = $doc->getElementById('Question');
    $input = $doc->createElement("input");
    $input->setAttribute("value",$pw);
    $input->setAttribute("class", "BlackText");
    $input->setAttribute("ReadOnly","");
    $button = $doc->getElementById("button");
    $button->appendChild($doc->createTextNode("Complete Survey"));
    $button->setAttribute("type", "submit");
    $button->setAttribute("name", "pw");
    $Questions->appendChild($input);
    echo $doc->saveHTML();

    for($ii = 1;$ii<= count($data)-(count($data)/2);$ii++)
    {
        $Question = $data['Question'.$ii];
        $Type = $data['Type'.$ii];
        AddQuestions($Question,$Type);
    }
}

function AddQuestions($Question,$Type)//ajoute les questions au sondage
{
    try {
        $pdo = new PDO('sqlite:bd.Account');
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

    $str = "SELECT SondageID FROM Sondage ORDER BY SondageID DESC";
    $Select = $pdo->prepare($str);
    $Select->execute();

    $value = $Select->fetchAll();

    $insert = "INSERT INTO Question(QuestQuestion, QuestReponse, QuestType, QuestSondageID) VALUES(:QuestQuestion,:QuestReponse,:QuestType,:QuestSondageID)";
    $requete = $pdo->prepare($insert);
    $requete->bindValue(':QuestQuestion',$Question);
    $requete->bindValue(':QuestReponse','' );
    $requete->bindValue(':QuestType',$Type);
    $requete->bindValue(':QuestSondageID',$value[0][0]);


    // Execute la requête
    $requete->execute();

    $pdo = null;
}

?>