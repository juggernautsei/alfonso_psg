<?php
require_once("../../globals.php");
require_once("$srcdir/forms.inc");
require_once("$srcdir/sql.inc");
require_once("$srcdir/encounter.inc");
#require_once("$srcdir/acl.inc");
require_once("$srcdir/api.inc");
require_once("$srcdir/formatting.inc.php");
require_once("$srcdir/formdata.inc.php");


$mode =   (isset($_GET['mode']) && $_GET['mode'] != '')  ? $_GET['mode'] : '';
$id = (isset($_POST['id']) ? $_POST['id'] : '');
$user =  (isset($_SESSION['authUserID']))  ? $_SESSION['authUserID'] : '';
//print_r($_POST);die();

 if($mode == 'new')
 {
	 $newid = formSubmit('form_nota_de_progreso_de_trabajo_social', $_POST, $_GET["id"], $userauthorized);
    addForm($encounter, "Nota de Progreso de Trabajo Social", $newid, "nota_de_progreso_de_trabajo_social", $pid, $userauthorized);
                formJump();
 }
else if($mode == 'edit')
{
formUpdate('form_nota_de_progreso_de_trabajo_social', $_POST, $_GET["id"], $userauthorized);
                formJump();
 }
?>
