<?php
/**
 * Created by PhpStorm.
 * User: Baker
 * Date: 2015-10-27
 * Time: 20:46
 */

session_start();

FilledSurvey($_POST);

function FilledSurvey($data)
{
    $questions = $_SESSION["QuestionID"];
    try {
        $pdo = new PDO('sqlite:bd.Account');
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

    for($i = 0 ; $i < count($data); $i++) {
        $insert = "INSERT INTO Answer(AnswerQuestionID, AnswerAnswer) VALUES(:QuestionID,:Answer)";
        $requete = $pdo->prepare($insert);
        $requete->bindValue(':QuestionID', $questions[$i][2]);
        $requete->bindValue(':Answer', $data["r".$i]);
        $requete->execute();
    }
    $pdo = null;

    $doc = new DOMDocument();
    $doc->loadHTMLFile("Survey.php");
    $Questions = $doc->getElementById('Question');
    $title = $doc->getElementById("SurveyTitle");
    $title->appendChild($doc->createTextNode("Thank you"));
    $button = $doc->getElementById("button");
    $button->appendChild($doc->createTextNode("Home"));
    $button->setAttribute("type", "");
    $button->setAttribute("href", "ClientHome.php");
    $form = $doc->getElementById("form");
    $form->setAttribute("action", "");
    echo $doc->saveHTML();
}

?>