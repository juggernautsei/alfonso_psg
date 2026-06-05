<?php

include_once '../../globals.php';
include_once "$srcdir/options.inc.php";
use OpenEMR\Core\Header;

$form_title = '';
$result = getPatientData($_SESSION['pid'], "sex,DOB,DATE_FORMAT(DOB,'%Y%m%d') as DOB, fname, lname");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Nota De Progreso</title>
  <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/bootstrap/dist/css/bootstrap.min.css?v=41">
  <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/font-awesome/css/font-awesome.css">

  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/bootstrap/dist/js/bootstrap.min.js"></script>
<?php Header::setupHeader(['datetime-picker','common']); ?>

<script>
// This is for callback by the find-code popup.
// Appends to or erases the current list of related codes.
function set_related(codetype, code, selector, codedesc) {
        var f = document.forms[0];

    var s = f[rcvarname].value;
    if (code) {
        if (s.length > 2) s += ';';
        s += codetype + ':' + code +' - '+codedesc;
    } else {
        s = '';
    }
    f[rcvarname].value = s;
}
// This invokes the find-code popup.
function sel_diagnosis(varname) {
    rcvarname = varname;
    // codetype is just to make things easier and avoid mistakes.
    // Might be nice to have a lab parameter for acceptable code types.
    // Also note the controlling script here runs from interface/patient_file/encounter/.
    let title = <?php echo xlj("Select Diagnosis Codes"); ?>;
    dlgopen('find_code_dynamic.php?codetype=ICD10', '_blank', 985, 750, '', title);
}

// This is for callback by the find-code popup.
// Returns the array of currently selected codes with each element in codetype:code format.
function get_related() {
    return document.forms[0][rcvarname].value.split(';');
}
// This is for callback by the find-code popup.
// Deletes the specified codetype:code from the currently selected list.
function del_related(s) {
    my_del_related(s, document.forms[0][rcvarname], false);
}
function get_pre_value(){
var url = new URL(window.location.href);
url.searchParams.set('get_pre_value','1');
window.location.href = url.href;
}
$(document).ready(function() {
        $('.datepicker').datetimepicker({
        maxDate: 0,
                <?php $datetimepicker_timepicker = false; ?>
                <?php $datetimepicker_showseconds = false; ?>
                <?php $datetimepicker_formatInput = true; ?>
                <?php require($GLOBALS['srcdir'] . '/js/xl/jquery-datetimepicker-2-5-4.js.php'); ?>
                <?php // can add any additional javascript settings to datetimepicker here; need to prepend first setting with a comma ?>
            });
			});
</script>
</head>
<body>
<h3>Nota de Progreso</h3>
<hr>
<?php
if (!isset($_REQUEST['id']) || $_REQUEST['id'] == '') {?>

        <div class="row col-md-offset-3" onclick="get_pre_value()"><button class="btn btn-primary">Get Most recent Value</button></div>
<?php }
?>

  <div class="col-md-offset-1 col-md-10 enc-form">
  <form class="" name="nota_de_progreso_form" role="form" method="post" action="<?php echo $rootdir; ?>/forms/nota_de_progreso_psicologica/save.php?<?php echo (isset($_REQUEST['id']) && $_REQUEST['id'] != '') ? ('mode=edit&id='.$_REQUEST['id']): 'mode=new';?>" enctype="multipart/form-data">
<?php
if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
	$data = sqlQuery("select * from form_nota_de_progreso_psicologica where id=?",$_REQUEST['id']);
} else if(isset($_REQUEST['get_pre_value']) && $_REQUEST['get_pre_value'] != ''){
	$data = sqlQuery("select fp.* from form_nota_de_progreso_psicologica fp left join forms f on f.form_id=fp.id and f.formdir='nota_de_progreso_psicologica' and fp.pid=f.pid where fp.pid=".$pid." and f.deleted=0 order by fp.date desc,fp.id desc limit 1");
}
?>
<div class="col-md-12 row">
<div class="col-md-2">
                            <label for='form_date' class="text-right"><?php echo xlt('Fecha de Servicio:'); ?></label>
</div>
<div class="col-md-4">
                            <input type='text' class='form-control datepicker' name='date_service' id='form_date' <?php echo ($disabled ?? '') ?> value='<?php echo (isset($_REQUEST['id']) && $_REQUEST['id'] != '') ? attr(oeFormatShortDate(substr($data['date_service'], 0, 10))) : attr(oeFormatShortDate(date('Y-m-d'))); ?>' title='<?php echo xla('Fecha de Servicio'); ?>' />
</div>
                        </div>
<br>
 <div class="col-md-12 row">
<div class="col-md-2">
                            <label for='form_date' class="text-right"><?php echo xlt('Start Time:'); ?></label>
</div>
<div class="col-md-4">
<input type="text" id="start_time" value='<?php echo $data['start_time']; ?>' title='<?php echo xla('Start Time'); ?>' name='start_time' placeholder='HH : MM : AM/PM'/>
</div>
<div class="col-md-2">
                            <label for='form_date' class="text-right"><?php echo xlt('End Time:'); ?></label>
</div>
<div class="col-md-4">
<input type="text" id="end_time" class='form-control'  <?php echo ($disabled ?? '') ?> value='<?php echo $data['end_time']; ?>' name='end_time' placeholder='HH : MM : AM/PM' title='<?php echo xla('End Time'); ?>' />
</div>
</div>
<br>
<!--<input type="hidden" name="mode" value="edit"/>
<input type="hidden" name="id" value="<?php //echo $_REQUEST['id']; ?>"/>-->
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Informante (si no es paciente):
      </label>
      <textarea class="col-md-12" rows="3" name="informante"><?php echo $data['informante']; ?></textarea>
  </div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       S:
      </label>
      <textarea class="col-md-12" rows="3" name="informante_s"><?php echo $data['informante_s']; ?></textarea>
  </div>
<h4 style="padding: 11px;">O: </h4>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Aparencia: </label>
      <input type="checkbox" name="apa_acicalado" value="acicalado" <?php echo (($data['apa_acicalado']=="acicalado")?"checked":"");?>>
      <label for="inputPassword4">Acicalado</label>
      <input type="checkbox" name="apa_despeinado" value="despeinado" <?php echo (($data['apa_despeinado']=="despeinado")?"checked":"");?>>
      <label for="inputEmail4">Despeinado</label>
      <input type="checkbox" name="apa_extrano" value="extrano" <?php echo (($data['apa_extrano']=="extrano")?"checked":"");?>>
      <label for="inputEmail4">Extrano</label>
      <input type="checkbox" name="apa_inapropiado" value="inapropiado" <?php echo (($data['apa_inapropiado']=="inapropiado")?"checked":"");?>>
      <label for="inputEmail4">Inapropiado</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Higiene: </label>
      <input type="checkbox" name="hig_buena" value="buena" <?php echo (($data['hig_buena']=="buena")?"checked":"");?>>
      <label for="inputPassword4">Buena</label>
      <input type="checkbox" name="hig_aceptable" value="aceptable" <?php echo (($data['hig_aceptable']=="aceptable")?"checked":"");?>>
      <label for="inputEmail4">Aceptable</label>
      <input type="checkbox" name="hig_pobre" value="pobre" <?php echo (($data['hig_pobre']=="pobre")?"checked":"");?>>
      <label for="inputEmail4">Pobre</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Contacto Visual: </label>
      <input type="checkbox" name="cv_buena" value="buena" <?php echo (($data['cv_buena']=="buena")?"checked":"");?>>
      <label for="inputPassword4">Buena</label>
      <input type="checkbox" name="cv_aceptable" value="aceptable" <?php echo (($data['cv_aceptable']=="aceptable")?"checked":"");?>>
      <label for="inputEmail4">Aceptable</label>
      <input type="checkbox" name="cv_pobre" value="pobre" <?php echo (($data['cv_pobre']=="pobre")?"checked":"");?>>
      <label for="inputEmail4">Pobre</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Actitud: </label>
      <input type="checkbox" name="ac_cooperadora" value="cooperadora" <?php echo (($data['ac_cooperadora']=="cooperadora")?"checked":"");?>>
      <label for="inputPassword4">Cooperadora</label>
      <input type="checkbox" name="ac_defensiva" value="defensiva" <?php echo (($data['ac_defensiva']=="defensiva")?"checked":"");?>>
      <label for="inputEmail4">Defensiva</label>
      <input type="checkbox" name="ac_cauteloso" value="cauteloso" <?php echo (($data['ac_cauteloso']=="cauteloso")?"checked":"");?>>
      <label for="inputEmail4">Cauteloso</label>
	<input type="checkbox" name="ac_evasiva" value="evasiva" <?php echo (($data['ac_evasiva']=="evasiva")?"checked":"");?>>
      <label for="inputEmail4">Evasiva</label>
	<input type="checkbox" name="ac_suspicaz" value="suspicaz" <?php echo (($data['ac_suspicaz']=="suspicaz")?"checked":"");?>>
      <label for="inputEmail4">Suspicaz</label>
	<input type="checkbox" name="ac_hostil" value="hostil" <?php echo (($data['ac_hostil']=="hostil")?"checked":"");?>>
      <label for="inputEmail4">Hostil</label>
	<input type="checkbox" name="ac_seductiva" value="seductiva" <?php echo (($data['ac_seductiva']=="seductiva")?"checked":"");?>>
      <label for="inputEmail4">Seductiva</label>
	<input type="checkbox" name="ac_apatico" value="apatico" <?php echo (($data['ac_apatico']=="apatico")?"checked":"");?>>
      <label for="inputEmail4">Apatico</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Actividad Motora: </label>
      <input type="checkbox" name="am_calmada" value="calmada" <?php echo (($data['am_calmada']=="calmada")?"checked":"");?>>
      <label for="inputPassword4">Calmada</label>
      <input type="checkbox" name="am_retardada" value="retardada" <?php echo (($data['am_retardada']=="retardada")?"checked":"");?>>
      <label for="inputEmail4">Retardada</label>
      <input type="checkbox" name="am_acumentada" value="acumentada" <?php echo (($data['am_acumentada']=="acumentada")?"checked":"");?>>
      <label for="inputEmail4">Acumentada</label>
        <input type="checkbox" name="am_agitada" value="agitada" <?php echo (($data['am_agitada']=="agitada")?"checked":"");?>>
      <label for="inputEmail4">Agitada</label>
        <input type="checkbox" name="am_movimientos" value="movimientos" <?php echo (($data['am_movimientos']=="movimientos")?"checked":"");?>>
      <label for="inputEmail4">Movimientos Inoluntarios</label>
</div>

<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Animo: </label>
      <input type="checkbox" name="ani_eutimico" value="eutimico" <?php echo (($data['ani_eutimico']=="eutimico")?"checked":"");?>>
      <label for="inputPassword4">Eutimico</label>
      <input type="checkbox" name="ani_depresivo" value="depresivo" <?php echo (($data['ani_depresivo']=="depresivo")?"checked":"");?>>
      <label for="inputEmail4">Depresivo</label>
      <input type="checkbox" name="ani_ansioso" value="ansioso" <?php echo (($data['ani_ansioso']=="ansioso")?"checked":"");?>>
      <label for="inputEmail4">Ansioso</label>
        <input type="checkbox" name="ani_coraje" value="coraje" <?php echo (($data['ani_coraje']=="coraje")?"checked":"");?>>
      <label for="inputEmail4">Coraje</label>
        <input type="checkbox" name="ani_euforico" value="euforico" <?php echo (($data['ani_euforico']=="euforico")?"checked":"");?>>
      <label for="inputEmail4">Euforico</label>
        <input type="checkbox" name="ani_culpabilidad" value="culpabilidad" <?php echo (($data['ani_culpabilidad']=="culpabilidad")?"checked":"");?>>
      <label for="inputEmail4">Culpabilidad</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Afecto: </label>
      <input type="checkbox" name="afe_apropiado" value="apropiado" <?php echo (($data['afe_apropiado']=="apropiado")?"checked":"");?>>
      <label for="inputPassword4">Apropiado</label>
      <input type="checkbox" name="afe_labil" value="labil" <?php echo (($data['afe_labil']=="labil")?"checked":"");?>>
      <label for="inputEmail4">Labil</label>
      <input type="checkbox" name="afe_intensidad_normal" value="intensidad_normal" <?php echo (($data['afe_intensidad_normal']=="intensidad_normal")?"checked":"");?>>
      <label for="inputEmail4">Intensidad Normal</label>
        <input type="checkbox" name="afe_maxima_intensidad" value="maxima_intensidad" <?php echo (($data['afe_maxima_intensidad']=="maxima_intensidad")?"checked":"");?>>
      <label for="inputEmail4">Maxima Intensidad</label>
        <input type="checkbox" name="afe_restringido" value="restringido" <?php echo (($data['afe_restringido']=="restringido")?"checked":"");?>>
      <label for="inputEmail4">Restringido</label>
        <input type="checkbox" name="afe_embotado" value="embotado" <?php echo (($data['afe_embotado']=="embotado")?"checked":"");?>>
      <label for="inputEmail4">Embotado</label>
        <input type="checkbox" name="afe_aplanado" value="aplanado" <?php echo (($data['afe_aplanado']=="aplanado")?"checked":"");?>>
      <label for="inputEmail4">Aplanado</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Discurso: </label>
      <input type="checkbox" name="dis_normal" value="normal" <?php echo (($data['dis_normal']=="normal")?"checked":"");?>>
      <label for="inputPassword4">Normal</label>
      <input type="checkbox" name="dis_rapido" value="rapido" <?php echo (($data['dis_rapido']=="rapido")?"checked":"");?>>
      <label for="inputEmail4">Rapido</label>
      <input type="checkbox" name="dis_lento" value="lento" <?php echo (($data['dis_lento']=="lento")?"checked":"");?>>
      <label for="inputEmail4">Lento</label>
        <input type="checkbox" name="dis_alto" value="alto" <?php echo (($data['dis_alto']=="alto")?"checked":"");?>>
      <label for="inputEmail4">Alto</label>
        <input type="checkbox" name="dis_dramatico" value="dramatico" <?php echo (($data['dis_dramatico']=="dramatico")?"checked":"");?>>
      <label for="inputEmail4">Dramatico</label>
        <input type="checkbox" name="dis_bloqueo" value="bloqueo" <?php echo (($data['dis_bloqueo']=="bloqueo")?"checked":"");?>>
      <label for="inputEmail4">Bloqueo de Pensamientos</label>
        <input type="checkbox" name="dis_monotono" value="monotono" <?php echo (($data['dis_monotono']=="monotono")?"checked":"");?>>
      <label for="inputEmail4">Monotono</label>
        <input type="checkbox" name="dis_suave" value="suave" <?php echo (($data['dis_suave']=="suave")?"checked":"");?>>
      <label for="inputEmail4">Suave</label>
        <input type="checkbox" name="dis_incoherente" value="incoherente" <?php echo (($data['dis_incoherente']=="incoherente")?"checked":"");?>>
      <label for="inputEmail4">Incoherente</label>
        <input type="checkbox" name="dis_ilogico" value="ilogico" <?php echo (($data['dis_ilogico']=="ilogico")?"checked":"");?>>
      <label for="inputEmail4">Ilogico</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Dificultades Cognitivas: </label>
      <input type="checkbox" name="dc_ninguna" value="ninguna" <?php echo (($data['dc_ninguna']=="ninguna")?"checked":"");?>>
      <label for="inputPassword4">Ninguna</label>
      <input type="checkbox" name="dc_atencion" value="atencion" <?php echo (($data['dc_atencion']=="atencion")?"checked":"");?>>
      <label for="inputEmail4">Atencion</label>
      <input type="checkbox" name="dc_concentracion" value="concentracion" <?php echo (($data['dc_concentracion']=="concentracion")?"checked":"");?>>
      <label for="inputEmail4">Concentracion</label>
        <input type="checkbox" name="dc_abstraccion" value="abstraccion" <?php echo (($data['dc_abstraccion']=="abstraccion")?"checked":"");?>>
      <label for="inputEmail4">Abstraccion</label>
        <input type="checkbox" name="dc_introspeccion" value="introspeccion" <?php echo (($data['dc_introspeccion']=="introspeccion")?"checked":"");?>>
      <label for="inputEmail4">Introspeccion</label>
        <input type="checkbox" name="dc_juicio" value="juicio" <?php echo (($data['dc_juicio']=="juicio")?"checked":"");?>>
      <label for="inputEmail4">Juicio</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Memoria: </label>
      <input type="checkbox" name="mem_inmediata" value="inmediata" <?php echo (($data['mem_inmediata']=="inmediata")?"checked":"");?>>
      <label for="inputPassword4">Inmediata</label>
      <input type="checkbox" name="mem_reciente" value="reciente" <?php echo (($data['mem_reciente']=="reciente")?"checked":"");?>>
      <label for="inputEmail4">Reciente</label>
      <input type="checkbox" name="mem_remota" value="remota" <?php echo (($data['mem_remota']=="remota")?"checked":"");?>>
      <label for="inputEmail4">Remota &nbsp;&nbsp;</label>
      <label for="inputEmail4">Comentario:</label>
       <textarea class="form-control" rows="3" name="mem_comentario"><?php echo $data['mem_comentario']; ?></textarea>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Orientacion: </label>
      <input type="checkbox" name="ori_persona" value="persona" <?php echo (($data['ori_persona']=="persona")?"checked":"");?>>
      <label for="inputPassword4">Persona</label>
      <input type="checkbox" name="ori_lugar" value="lugar" <?php echo (($data['ori_lugar']=="lugar")?"checked":"");?>>
      <label for="inputEmail4">Lugar</label>
      <input type="checkbox" name="ori_tiempo" value="tiempo" <?php echo (($data['ori_tiempo']=="tiempo")?"checked":"");?>>
      <label for="inputEmail4">Tiempo</label>
      <input type="checkbox" name="ori_circunstancia" value="circunstancia" <?php echo (($data['ori_circunstancia']=="circunstancia")?"checked":"");?>>
      <label for="inputEmail4"> Circunstancia&nbsp;&nbsp;</label>
      <label for="inputEmail4">Comentario:</label>
       <textarea class="form-control" rows="3" name="ori_comentario"><?php echo $data['ori_comentario']; ?></textarea>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Contenido de Pensamiento: Suicida </label>
      <input type="checkbox" name="cdps_si" value="si" <?php echo (($data['cdps_si']=="si")?"checked":"");?>>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="cdps_no" value="no" <?php echo (($data['cdps_no']=="no")?"checked":"");?>>
      <label for="inputEmail4">No - </label>
      <label for="inputEmail4">Plan Estructurado </label>
      <input type="checkbox" name="pe_si" value="si" <?php echo (($data['pe_si']=="si")?"checked":"");?>>
      <label for="inputEmail4">Si</label>
      <input type="checkbox" name="pe_no" value="no" <?php echo (($data['pe_no']=="no")?"checked":"");?>>
      <label for="inputEmail4"> No &nbsp;&nbsp;</label>
      <label for="inputEmail4">Homicida:</label>
      <input type="checkbox" name="hom_si" value="si" <?php echo (($data['hom_si']=="si")?"checked":"");?>>
      <label for="inputEmail4">Si</label>
      <input type="checkbox" name="hom_no" value="no" <?php echo (($data['hom_no']=="no")?"checked":"");?>>
      <label for="inputEmail4"> No &nbsp;&nbsp;</label>
</div>

<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Plan Estructurado: </label>
      <input type="checkbox" name="pes_si" value="si" <?php echo (($data['pes_si']=="si")?"checked":"");?>>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="pes_no" value="no" <?php echo (($data['pes_no']=="no")?"checked":"");?>>
      <label for="inputEmail4">No</label>
      <input type="checkbox" name="pes_ideas_de" value="ideas_de" <?php echo (($data['pes_ideas_de']=="ideas_de")?"checked":"");?>>
      <label for="inputEmail4">Ideas de Referencia</label>
        <input type="checkbox" name="pes_obsesiones" value="obsesiones" <?php echo (($data['pes_obsesiones']=="obsesiones")?"checked":"");?>>
      <label for="inputEmail4">Obsesiones</label>
        <input type="checkbox" name="pes_compulsiones" value="compulsiones" <?php echo (($data['pes_compulsiones']=="compulsiones")?"checked":"");?>>
      <label for="inputEmail4">Compulsiones</label>
        <input type="checkbox" name="pes_fobias" value="fobias" <?php echo (($data['pes_fobias']=="fobias")?"checked":"");?>>
      <label for="inputEmail4">Fobias</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Percepcion: </label>
      <input type="checkbox" name="per_no" value="no" <?php echo (($data['per_no']=="no")?"checked":"");?>>
      <label for="inputPassword4">No &nbsp;&nbsp;</label>
      <label for="inputPassword4">Disturbios Sensoperceptuales</label>
      <input type="checkbox" name="ds_delirios" value="delirios" <?php echo (($data['ds_delirios']=="delirios")?"checked":"");?>>
      <label for="inputEmail4">Delirios - </label>
      <label for="inputEmail4">Alucinaciones: </label>
      <input type="checkbox" name="alu_auditivas" value="auditivas" <?php echo (($data['alu_auditivas']=="auditivas")?"checked":"");?>>
      <label for="inputEmail4">Auditivas</label>
        <input type="checkbox" name="alu_visuales" value="visuales" <?php echo (($data['alu_visuales']=="visuales")?"checked":"");?>>
      <label for="inputEmail4">Visuales</label>
        <input type="checkbox" name="alu_olfativas" value="olfativas" <?php echo (($data['alu_olfativas']=="olfativas")?"checked":"");?>>
      <label for="inputEmail4">Olfativas</label>
        <input type="checkbox" name="alu_tactiles" value="tactiles" <?php echo (($data['alu_tactiles']=="tactiles")?"checked":"");?>>
      <label for="inputEmail4">Tactiles</label>
        <input type="checkbox" name="alu_gustativas" value="gustativas" <?php echo (($data['alu_gustativas']=="gustativas")?"checked":"");?>>
      <label for="inputEmail4">Gustativas</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Fiabilidad: </label>
      <input type="checkbox" name="fia_buena" value="buena" <?php echo (($data['fia_buena']=="buena")?"checked":"");?>>
      <label for="inputPassword4">Buena</label>
      <input type="checkbox" name="fia_aceptable" value="aceptable" <?php echo (($data['fia_aceptable']=="aceptable")?"checked":"");?>>
      <label for="inputEmail4">Aceptable</label>
      <input type="checkbox" name="fia_pobre" value="pobre" <?php echo (($data['fia_pobre']=="pobre")?"checked":"");?>>
      <label for="inputEmail4">Pobre</label>
</div>

<div class="form-group col-md-12"></div>

<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
      Comentarios:
      </label>
      <textarea class="col-md-12" rows="3" name="comentarios"><?php echo $data['comentarios']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>

<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       A:
      </label>
      <textarea class="col-md-12" rows="3" name="comentarios_a"><?php echo $data['comentarios_a']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Diagnosis:
      </label>
      <textarea class="col-md-12" name="diagnosis" onclick="sel_diagnosis('diagnosis')" ><?php echo $data['diagnosis']; ?> </textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       P:
      </label>
      <textarea class="col-md-12" rows="3" name="comentarios_p"><?php echo $data['comentarios_p']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Firma y Num.De Licencia :</label>
      <input type="text" name="firma_num" value="<?php echo $data['firma_num'];?>">
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="col-md-12">
<button type="submit" class="btn btn-primary"><?php
if($_REQUEST['id'] != '')
	echo 'Update';
else
	echo 'Save';
?>
</button>
  <button class="btn btn-danger" onclick="top.restoreSession();parent.closeTab(window.name, true);">Cancel</button>
</div>
</form>
  </div>

  </body>
<script>
//Adddrug
    $(document).on('click', '.adddrug', function() {
        //$("#prescription_form .datepicker").datepicker("destroy");
//        $(".drug_code_search").autocomplete("destroy");
        var newelm = $('.mainrow_drug tr:last').clone(true);
        var len = $('.mainrow_drug tr').length + 1;
        newelm.find(':input').val('');
        newelm.attr('class', newelm.attr('class').replace(/rowdrug_\d/g, 'rowdrug_' + len));
        newelm.appendTo('.mainrow_drug');
	var prescription_list = ['medicamento', 'dosis', 'frecuencia'];
        prescription_list.forEach(function(i) {
          if (i == 'date_from' || i == 'date_to')
                  $('.rowdrug_' + len).find('td > input[name="prescription[' + (len - 2) + '][' + i + ']"]').attr('id', 'prescription[' + (len - 1) + '][' + i + ']');
          if(i == 'drug_form')
                $('.rowdrug_' + len).find('td > select[name="prescription[' + (len - 2) + '][' + i + ']"]').attr('name', 'prescription[' + (len - 1) + '][' + i + ']');
          if(i == 'special_instructions')
                $('.rowdrug_' + len).find('td > textarea[name="prescription[' + (len - 2) + '][' + i + ']"]').attr('name', 'prescription[' + (len - 1) + '][' + i + ']');
          $('.rowdrug_' + len).find('td > input[name="prescription[' + (len - 2) + '][' + i + ']"]').attr('name', 'prescription[' + (len - 1) + '][' + i + ']');
        });
        //$("#prescription_form .datepicker").datepicker({dateFormat: 'yy-mm-dd'});
    /*    $(".drug_code_search").autocomplete({
          minLength: 2,
          source: "../../search.php?fn=drug_code",
          select: function(event, ui) {
            $(this).val(ui.item.value);
            $(this).next().val(ui.item.code);
          }
    });*/
    });
 $(document).on('click', '.rmdrug', function() {
              if ($('.rmdrug').length > 1) {
                      prescription_delete = ($('input:hidden[name="prescription_delete[]"]').val() != '') ? JSON.parse($('input:hidden[name="prescription_delete[]"]').val()) : [];
                delete_pres = $(this).closest('tr').find('.prescription_id').val();
                if(delete_pres != '')
                        prescription_delete.push(delete_pres);
                $('input:hidden[name="prescription_delete[]"]').val(JSON.stringify(prescription_delete));
                $(this).closest('tr').remove();

        } else
          return false;
 });
$("form").submit(function () {

    var this_master = $(this);

    this_master.find('input[type="checkbox"]').each( function () {
        var checkbox_this = $(this);


        if(!checkbox_this.is(":checked")) {
            checkbox_this.prop('checked',true);
            //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA
            checkbox_this.attr('value','');
        }
    })
})
	const starttime = document.getElementById('start_time');
const endtime = document.getElementById('end_time');

starttime.addEventListener('input', (e)=> {
  let input = e.target.value;
  // Test if ending with /, so it's a delete operation when ending with /
  if (/\D:$/.test(input)){
    input = input.substr(0, input.length - 3);
  }
  // /\D/g replaces every non zero value
  const values = input.split(':');
  const timeValues = values.slice(0,2).map((v)=>v.replace(/\D/g, ''));

  if (timeValues[0]) timeValues[0] = formatValue(timeValues[0], 12);
  if (timeValues[1]) timeValues[1] = formatValue(timeValues[1], 59);

  const output = timeValues.map(
    (v, i)=> v.length == 2 && i < 2 ? v + ' : ' : v);
  if(values[2]){
    const meridian = formatMeridian(values[2]);
    output.push(meridian);
  }

  e.target.value = output.join('').substr(0, 12);
});
endtime.addEventListener('input', (e)=> {
  let input = e.target.value;
  // Test if ending with /, so it's a delete operation when ending with /
  if (/\D:$/.test(input)){
    input = input.substr(0, input.length - 3);
  }
  // /\D/g replaces every non zero value
  const values = input.split(':');
  const timeValues = values.slice(0,2).map((v)=>v.replace(/\D/g, ''));

  if (timeValues[0]) timeValues[0] = formatValue(timeValues[0], 12);
  if (timeValues[1]) timeValues[1] = formatValue(timeValues[1], 59);

  const output = timeValues.map(
    (v, i)=> v.length == 2 && i < 2 ? v + ' : ' : v);
  if(values[2]){
    const meridian = formatMeridian(values[2]);
    output.push(meridian);
  }

  e.target.value = output.join('').substr(0, 12);
});
const formatValue=(str, max) =>{
  if (str.charAt(0) !== '0' || str == '00') {
    const num = parseInt(str);
    if (isNaN(num) || num <= 0 || num > max) num = 1;
    str = num > parseInt(max.toString().charAt(0)) && num.toString().length == 1 ? '0' + num : num.toString();
  };
  return str;
};

const formatMeridian = (str)=>{
  str = str.toUpperCase().trim();
  return /(AM|PM|^A$|^P$)/.test(str) ? str :'';
}

</script>
  </html>
