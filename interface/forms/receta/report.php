<?php
require_once(dirname(__file__)."/../../globals.php");

function receta_report($pid, $encounter, $cols, $id)
{
    $res = sqlStatement("select * from form_receta where pid=? and id=?", array($pid,$id));
    print "<table><tr><td>\n";
    while ($result = sqlFetchArray($res)) {
        print "<span class=bold>" . xlt('Direccion') . ": </span><span class=text>" . text($result{"direccion"}) . "</span><br>\n";
            print "<span class=bold>" . xlt('Rx') . ": </span><span class=text>" . nl2br(text($result{"rx"})) . "</span><br>\n";
            print "<span class=bold>" . xlt('Refill') . ": </span><span class=text>" . nl2br(text($result{"refill"})) . "</span><br>\n";
    }

    print "</td></tr></table>\n";
}
?>
