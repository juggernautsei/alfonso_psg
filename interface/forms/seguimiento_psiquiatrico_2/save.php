<?php
require_once("../../globals.php");
require_once("$srcdir/forms.inc");
require_once("$srcdir/encounter.inc");
require_once("$srcdir/api.inc");
require_once("$srcdir/formatting.inc.php");
require_once("$srcdir/formdata.inc.php");


$mode =   (isset($_GET['mode']) && $_GET['mode'] != '')  ? $_GET['mode'] : '';
$id = (isset($_POST['id']) ? $_POST['id'] : '');
$user =  (isset($_SESSION['authUserID']))  ? $_SESSION['authUserID'] : '';


print_r($_POST);
if ($mode == 'new') {
        $newid = formSubmit('form_seguimiento_psiquiatrico_2', $_POST, $_GET["id"], $userauthorized);
        addForm($encounter, "Seguimiento Psiquiatrico (2)", $newid, "seguimiento_psiquiatrico_2", $pid, $userauthorized);
        formJump();
} else if ($mode == 'edit') {
        formUpdate('form_seguimiento_psiquiatrico_2', $_POST, $_GET["id"], $userauthorized);
        formJump();
}
