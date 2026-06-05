<?php
require_once("../../globals.php");
require_once("$srcdir/forms.inc");
require_once("$srcdir/sql.inc");
require_once("$srcdir/encounter.inc");
require_once("$srcdir/acl.inc");
require_once("$srcdir/api.inc");
require_once("$srcdir/formatting.inc.php");
require_once("$srcdir/formdata.inc.php");


$mode =   (isset($_GET['mode']) && $_GET['mode'] != '')  ? $_GET['mode'] : '';
$id = (isset($_POST['id']) ? $_POST['id'] : '');
$user =  (isset($_SESSION['authUserID']))  ? $_SESSION['authUserID'] : '';
//print_r($_POST);die();

 if($mode == 'new')
 {
	 $newid = formSubmit('form_formato_psiquiatrico_follow_up', $_POST, $_GET["id"], $userauthorized);
    addForm($encounter, "Formato Psiquiatrico Follow Up", $newid, "formato_psiquiatrico_follow_up", $pid, $userauthorized);
                formJump();
 }
else if($mode == 'edit')
{
formUpdate('form_formato_psiquiatrico_follow_up', $_POST, $_GET["id"], $userauthorized);
                formJump();
 }
?>
