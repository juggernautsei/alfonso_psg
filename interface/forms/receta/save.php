<?php
require_once("../../globals.php");
require_once("$srcdir/forms.inc");
require_once("$srcdir/sql.inc");
require_once("$srcdir/encounter.inc");
require_once("$srcdir/acl.inc");
require_once("$srcdir/api.inc");
require_once("$srcdir/formatting.inc.php");
require_once("$srcdir/formdata.inc.php");


$mode =   (isset($_POST['mode']))  ? $_POST['mode'] : '';
$id = (isset($_POST['id']) ? $_POST['id'] : '');
$user =  (isset($_SESSION['authUserID']))  ? $_SESSION['authUserID'] : '';

 if($mode == 'new')
{
	$arg = array($pid,$encounter,$user,$_POST['direccion'],$_POST['rx'],$_POST['refill']);
	$pq_id = sqlInsert("insert into form_receta (pid,encounter,user,direccion,rx,refill) values(?,?,?,?,?,?)",$arg);
        addForm($encounter, "Receta",$pq_id,"receta", $pid, $userauthorized);

//        prescription($pq_id,$user,$pid,$encounter,$created_at);

        //$mylab_id = lab_orders($gf_id,$user,$pid,$encounter);

                formJump();
 }
else if($mode == 'edit')
{
	$arg = array($_POST['direccion'],$_POST['rx'],$_POST['refill'],$id);
	$pq_id = sqlStatement("update form_receta set direccion=?, rx=?, refill=? where id=?",$arg);

                formJump();
 }
?>
