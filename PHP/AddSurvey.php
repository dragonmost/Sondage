<?php
/**
 * Created by PhpStorm.
 * User: 1229753
 * Date: 27/10/2015
 * Time: 11:23
 */
session_start();
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
    $requete->bindValue(':SondageAccount', $_SESSION["email"]);

    // Execute la requête
    $requete->execute();

    $pdo = null;

    $doc = new DOMDocument();
    $doc->loadHTMLFile("Survey.php");
    $Questions = $doc->getElementById('Question');
    $title = $doc->getElementById("SurveyTitle");
    $title->appendChild($doc->createTextNode("Survey Created"));
    $input = $doc->createElement("input");
    $input->setAttribute("value",$pw);
    $input->setAttribute("class", "BlackText");
    $input->setAttribute("ReadOnly","");
    $input->setAttribute("name", "pw");
    $button = $doc->getElementById("button");
    $button->appendChild($doc->createTextNode("Complete Survey"));
    $button->setAttribute("type", "submit");
    $form = $doc->getElementById("form");
    $form->setAttribute("action", "AnswerSurvey.php");
    $Questions->appendChild($input);
    echo $doc->saveHTML();

    for($i = 1; $i<= count($data)-(count($data)/2); $i++)
    {
        $Question = $data['input'.$i];
        $type = $data['r'.$i];
        AddQuestions($Question,$type);
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
    $req = $pdo->prepare($insert);
    $req->bindValue(':QuestQuestion',$Question);
    $req->bindValue(':QuestReponse','' );
    if($Type == 1)
        $req->bindValue(':QuestType',1);
    else
        $req->bindValue(':QuestType',0);
    $req->bindValue(':QuestSondageID',$value[0][0]);


    // Execute la requête
    $req->execute();

    $pdo = null;
}

?>