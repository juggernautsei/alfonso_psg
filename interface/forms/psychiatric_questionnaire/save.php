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
//print_r($_POST);die();

function prescription($form_id,$user,$pid,$encounter){
        $d_id = sqlQuery("delete from psychiatric_medicamento where form_id=?",$form_id);
        foreach($_POST['prescription'] as $k => $value){
          if($value['medicamento'] != ''){
                         $arg = array($user,$pid, $encounter,$form_id,$value['medicamento'],$value['dosis'],$value['frecuencia']);
                         $p_id = sqlInsert("insert into psychiatric_medicamento (user,pid,encounter,form_id,medicamento,dosis,frecuencia) values(?,?,?,?,?,?,?)", $arg);
          }
        }

}

/*if($_POST['prescription_delete'][0] && count($_POST['prescription_delete'][0]) > 0){
                $tempData = json_decode( html_entity_decode( stripslashes ($_POST['prescription_delete'][0] ) ) );
                $val = implode(",",$tempData);
                if($val != '')
                sqlQuery("delete from axaprescriptions where id IN (".$val.")");
}*/

 if($mode == 'new')
{
	$arg = array($pid,$encounter,$user,$_POST['civil_casado'],$_POST['civil_soltero'],$_POST['civil_divorciado'],$_POST['civil_viudo'],$_POST['caules_comments'],$_POST['padece'],$_POST['padece_comments'],$_POST['se_ha'],$_POST['se_ha_comments'],$_POST['es'],$_POST['es_comments'],$_POST['hosp'],$_POST['hosp_comments'],$_POST['intentos'],$_POST['intentos_comments'],$_POST['abuso'],$_POST['abuso_comments'],$_POST['familiares'],$_POST['familiares_comments']);
	$pq_id = sqlInsert("insert into form_psychiatric_questionnaire (pid,encounter,user,civil_casado,civil_soltero,civil_divorciado,civil_viudo,caules_comments,padece,padece_comments,se_ha,se_ha_comments,es,es_comments,hosp,hosp_comments,intentos,intentos_comments,abuso,abuso_comments,familiares,familiares_comments,activity) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1)",$arg);
        addForm($encounter, "Cuestionario Psiquiátrico",$pq_id,"psychiatric_questionnaire", $pid, $userauthorized);

        prescription($pq_id,$user,$pid,$encounter);

        //$mylab_id = lab_orders($gf_id,$user,$pid,$encounter);

       if(isset($_GET['submit']) && $_GET['submit'] == 'ajax' )     {
               echo json_encode(['form_id' => $gf_id,'lab_id' => $mylab_id]);
        }else
                formJump();
 }
else if($mode == 'edit')
{
	$arg = array($_POST['civil_casado'],$_POST['civil_soltero'],$_POST['civil_divorciado'],$_POST['civil_viudo'],$_POST['caules_comments'],$_POST['padece'],$_POST['padece_comments'],$_POST['se_ha'],$_POST['se_ha_comments'],$_POST['es'],$_POST['es_comments'],$_POST['hosp'],$_POST['hosp_comments'],$_POST['intentos'],$_POST['intentos_comments'],$_POST['abuso'],$_POST['abuso_comments'],$_POST['familiares'],$_POST['familiares_comments'],$_POST['id']);
	$pq_id = sqlStatement("update form_psychiatric_questionnaire set civil_casado =? , civil_soltero=?, civil_divorciado=?, civil_viudo=?, caules_comments=?, padece=?, padece_comments=?, se_ha=?, se_ha_comments=?, es=?, es_comments=?, hosp=?,hosp_comments=?,intentos=?,intentos_comments=?,abuso=?,abuso_comments=?,familiares=?,familiares_comments=? where id=?",$arg);
//        $pq_id = sqlInsert("insert into form_psychiatric_questionnaire (pid,encounter,user,civil_casado,civil_soltero,civil_divorciado,civil_viudo,caules_comments,padece,padece_comments,se_ha,se_ha_comments,es,es_comments,hosp,hosp_comments,intentos,intentos_comments,abuso,abuso_comments,familiares,familiares_comments,activity) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1)",$arg);
  //      addForm($encounter, "Cuestionario Psiquiátrico",$pq_id,"psychiatric_questionnaire", $pid, $userauthorized);

//        prescription($pq_id,$user,$pid,$encounter,$created_at);

        //$mylab_id = lab_orders($gf_id,$user,$pid,$encounter);

        prescription($_POST['id'],$user,$pid,$encounter);
                formJump();
 }
?>
