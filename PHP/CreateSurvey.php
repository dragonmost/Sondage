<?php
/**
 * Created by PhpStorm.
 * User: 1229753
 * Date: 27/10/2015
 * Time: 10:24
 */
session_start();
CreateSurvey($_POST["nbQ"]);

function CreateSurvey($nbQ)
{
    $doc = new DOMDocument();
    $doc->loadHTMLFile("Creation.php");

    for($i = 1; $i <= $nbQ; $i++)
    {
        $ele = $doc->getElementById('Question');
        $liste = $doc->createElement("li");

        $div = $doc->createElement("div");
        $lab = $doc->createElement("label");
        $input = $doc->createElement("input");
        $labType = $doc->createElement("label");
        $radio1 = $doc->createElement("input");
        $radio1->setAttribute("type", "radio");
        $radio2 = $doc->createElement("input");
        $radio2->setAttribute("type", "radio");

        $div->setAttribute("id", "Q" . $i);
        $lab->appendChild($doc->createTextNode("Question " . $i));
        $input->setAttribute("name", "input" . $i);
        $input->setAttribute("class", "BlackText");
        $radio1->setAttribute("id", "app" . $i);
        $radio1->setAttribute("checked", "checked");
        $radio1->setAttribute("name", "r" .$i);
        $radio1->setAttribute("value", "1");
        $radio2->setAttribute("id", "dev" . $i);
        $radio2->setAttribute("name", "r" .$i);
        $radio2->setAttribute("value", "0");

        $labType->appendChild($doc->createTextNode("Appreciation: "));
        $labType->appendChild($radio1);
        $labType->appendChild($doc->createTextNode(" Developpement: "));
        $labType->appendChild($radio2);

        $div->appendChild($lab);
        $div->appendChild($input);
        $div->appendChild($labType);
        $liste->appendChild($div);

        $ele->appendChild($liste);
    }

    $button = $doc->getElementById("button");
    $button->appendChild($doc->createTextNode("Complete Survey"));

    echo $doc->SaveHTML();
}

?>