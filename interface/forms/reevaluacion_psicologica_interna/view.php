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
  <title>Seguimiento Psiquiátrico</title>
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
<h3>Reevaluación psicológica interna</h3>
<hr>
<?php
if (!isset($_REQUEST['id']) || $_REQUEST['id'] == '') {?>

        <div class="row col-md-offset-3" onclick="get_pre_value()"><button class="btn btn-primary">Get Most recent Value</button></div>
<?php }
?>
  <div class="col-md-offset-1 col-md-10 enc-form">
  <form class="" name="reevaluacion_form" role="form" method="post" action="<?php echo $rootdir; ?>/forms/reevaluacion_psicologica_interna/save.php?<?php echo (isset($_REQUEST['id']) && $_REQUEST['id'] != '') ? ('mode=edit&id='.$_REQUEST['id']): 'mode=new';?>" enctype="multipart/form-data">
<?php
if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
	$data = sqlQuery("select * from form_reevaluacion_psicologica_interna where id=?",$_REQUEST['id']);
}  else if(isset($_REQUEST['get_pre_value']) && $_REQUEST['get_pre_value'] != ''){

	$data = sqlQuery("select fp.* from form_reevaluacion_psicologica_interna fp left join forms f on f.form_id=fp.id and f.formdir='reevaluacion_psicologica_interna' and fp.pid=f.pid where fp.pid=".$pid." and f.deleted=0 order by fp.date desc,fp.id desc limit 1");
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
<!--<input type="hidden" name="mode" value="edit"/>
<input type="hidden" name="id" value="<?php //echo $_REQUEST['id']; ?>"/>-->
<h4 style="padding:10px;"> Historial Medico:</h4>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Hospitalizaciones previas: </label>
      <input type="checkbox" name="hosp_prev_si" value="hosp_prev_si" <?php echo (($data['hosp_prev_si']=="hosp_prev_si")?"checked":"");?>>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="hosp_prev_no" value="hosp_prev_no" <?php echo (($data['hosp_prev_no']=="hosp_prev_no")?"checked":"");?>>
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
      <label for="inputEmail4">Ultima fecha:</label>
       <textarea class="form-control" rows="3" name="ultima_fecha"><?php echo $data['ultima_fecha']; ?></textarea>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Historial de ideas Suicidas: </label>
      <input type="checkbox" name="his_sui_si" value="his_sui_si" <?php echo (($data['his_sui_si']=="his_sui_si")?"checked":"");?>>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="his_sui_no" value="his_sui_no" <?php echo (($data['his_sui_no']=="his_sui_no")?"checked":"");?>>
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Historial intentos Suicidas: </label>
      <input type="checkbox" name="his_int_si" value="his_int_si" <?php echo (($data['his_int_si']=="his_int_si")?"checked":"");?>>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="his_int_no" value="his_int_no" <?php echo (($data['his_int_no']=="his_int_no")?"checked":"");?>>
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Plan Estructurado: </label>
      <input type="checkbox" name="plan_est_si" value="plan_est_si" <?php echo (($data['plan_est_si']=="plan_est_si")?"checked":"");?>>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="plan_est_no" value="plan_est_no" <?php echo (($data['plan_est_no']=="plan_est_no")?"checked":"");?>>
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Historial de Tx Psiquiatrico: </label>
      <input type="checkbox" name="his_psi_si" value="his_psi_si" <?php echo (($data['his_psi_si']=="his_psi_si")?"checked":"");?>>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="his_psi_no" value="his_psi_no" <?php echo (($data['his_psi_no']=="his_psi_no")?"checked":"");?>>
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
      <label for="inputEmail4">Diagnostico:</label>
       <textarea class="form-control" rows="3" name="his_psi_diagnostico"><?php echo $data['his_psi_diagnostico']; ?></textarea>
</div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Medicamento
      </label>
      <textarea class="col-md-12" rows="3" name="medicamento"><?php echo $data['medicamento']; ?></textarea>
  </div>
<h4 style="padding: 11px;">Estado Mental: </h4>

<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Apariencia : &nbsp;&nbsp;</label>
      <input type="checkbox" name="apa_alerta" value="alerta" <?php echo (($data['apa_alerta'] =="alerta") ? "checked" : "");?>>
      <label for="inputPassword4">Alerta </label>
      <input type="checkbox" name="apa_deshi" value="deshi" <?php echo (($data['apa_deshi'] == "deshi") ? "checked" :"");?>>
      <label for="inputEmail4">Deshidratado </label>
      <input type="checkbox" name="apa_hidratado" value="hidratado" <?php echo (($data['apa_hidratado'] == "hidratado") ?"checked":"");?>>
      <label for="inputPassword4">Hidratado </label>
      <input type="checkbox" name="apa_combativo" value="combativo" <?php echo (($data['apa_combativo']=="combativo")?"checked":"");?>>
      <label for="inputPassword4">Combativo </label>
      <input type="checkbox" name="apa_malnutricion" value="malnutricion" <?php echo (($data['apa_malnutricion']=="malnutricion")?"checked":"");?>>
      <label for="inputPassword4">Malnutricion </label>
      <input type="checkbox" name="apa_pobre_higiene" value="pobre_higiene" <?php echo (($data['apa_pobre_higiene']=="pobre_higiene")?"checked":"");?>>
      <label for="inputPassword4">Pobre Higiene </label>
    </div>
</div>
<div class="form-group col-md-12"></div>

<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Orientacion : &nbsp;&nbsp;</label>
      <input type="checkbox" name="ori_tiempo" value="tiempo" <?php echo (($data['ori_tiempo'] =="tiempo") ? "checked" : "");?>>
      <label for="inputPassword4">Tiempo </label>
      <input type="checkbox" name="ori_lugar" value="lugar" <?php echo (($data['ori_lugar'] == "lugar") ? "checked" :"");?>>
      <label for="inputEmail4">Lugar </label>
      <input type="checkbox" name="ori_persona" value="persona" <?php echo (($data['ori_persona'] == "persona") ?"checked":"");?>>
      <label for="inputPassword4">Persona </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Estado de Animo : &nbsp;&nbsp;</label>
      <input type="checkbox" name="est_normal" value="normal" <?php echo (($data['est_normal'] =="est_normal") ? "checked" : "");?>>
      <label for="inputPassword4">Normal</label>
      <input type="checkbox" name="est_deprimido" value="deprimido" <?php echo (($data['est_deprimido'] == "deprimido") ? "checked" :"");?>>
      <label for="inputEmail4">Deprimido </label>
      <input type="checkbox" name="est_ansioso" value="ansioso" <?php echo (($data['est_ansioso'] == "ansioso") ?"checked":"");?>>
      <label for="inputPassword4">Ansioso </label>
      <input type="checkbox" name="est_euforico" value="euforico" <?php echo (($data['est_euforico']=="euforico")?"checked":"");?>>
      <label for="inputPassword4">Euforico </label>
      <input type="checkbox" name="est_irritable" value="irritable" <?php echo (($data['est_irritable']=="irritable")?"checked":"");?>>
      <label for="inputPassword4">Irritable </label>
      <input type="checkbox" name="est_molesto" value="molesto" <?php echo (($data['est_molesto']=="molesto")?"checked":"");?>>
      <label for="inputPassword4">Molesto </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Lenguaje : &nbsp;&nbsp;</label>
      <input type="checkbox" name="len_coherente" value="coherente" <?php echo (($data['len_coherente'] =="coherente") ? "checked" : "");?>>
      <label for="inputPassword4">Coherente </label>
      <input type="checkbox" name="len_incoherente" value="incoherente" <?php echo (($data['len_incoherente'] == "incoherente") ? "checked" :"");?>>
      <label for="inputEmail4">InCoherente </label>
      <input type="checkbox" name="len_verbosidad" value="verbosidad" <?php echo (($data['len_verbosidad'] == "verbosidad") ?"checked":"");?>>
      <label for="inputPassword4">Verbosidad </label>
      <input type="checkbox" name="len_reservado" value="reservado" <?php echo (($data['len_reservado']=="reservado")?"checked":"");?>>
      <label for="inputPassword4">Reservado </label>
      <input type="checkbox" name="len_callado" value="callado" <?php echo (($data['len_callado']=="callado")?"checked":"");?>>
      <label for="inputPassword4">Callado </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Afecto : &nbsp;&nbsp;</label>
      <input type="checkbox" name="af_apropiado_segun_animo" value="apropiado_segun_animo" <?php echo (($data['af_apropiado_segun_animo'] =="apropiado_segun_animo") ? "checked" : "");?>>
      <label for="inputPassword4">Apropiado segun animo </label>
      <input type="checkbox" name="af_inapropiado_segun_animo" value="inapropiado_segun_animo" <?php echo (($data['af_inapropiado_segun_animo'] == "inapropiado_segun_animo") ? "checked" :"");?>>
      <label for="inputEmail4">InApropiado segun animo</label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Procesode Pensamiento : &nbsp;&nbsp;</label>
      <input type="checkbox" name="pro_logico" value="logico" <?php echo (($data['pro_logico'] =="logico") ? "checked" : "");?>>
      <label for="inputPassword4">Logico </label>
      <input type="checkbox" name="pro_ilogico" value="ilogico" <?php echo (($data['pro_ilogico'] == "ilogico") ? "checked" :"");?>>
      <label for="inputEmail4">Ilogico </label>
      <input type="checkbox" name="pro_relevante" value="pro_relevante" <?php echo (($data['pro_relevante'] == "relevante") ?"checked":"");?>>
      <label for="inputPassword4">Relevante </label>
      <input type="checkbox" name="pro_irrelevante" value="irrelevante" <?php echo (($data['pro_irrelevante']=="irrelevante")?"checked":"");?>>
      <label for="inputPassword4">Irrelevante </label>
      <input type="checkbox" name="pro_superficial" value="superficial" <?php echo (($data['pro_superficial']=="superficial")?"checked":"");?>>
      <label for="inputPassword4">Superficial </label>
      <input type="checkbox" name="pro_evasivo" value="evasivo" <?php echo (($data['pro_evasivo']=="evasivo")?"checked":"");?>>
      <label for="inputPassword4">Evasivo </label>
      <input type="checkbox" name="pro_circunstancial" value="circunstancial" <?php echo (($data['pro_circunstancial']=="circunstancial")?"checked":"");?>>
      <label for="inputPassword4">Circunstancial </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Delirios : &nbsp;&nbsp;</label>
      <input type="checkbox" name="de_ninguno" value="ninguno" <?php echo (($data['de_ninguno'] =="ninguno") ? "checked" : "");?>>
      <label for="inputPassword4">Ninguno </label>
      <input type="checkbox" name="de_persecucion" value="persecucion" <?php echo (($data['de_persecucion'] == "persecucion") ? "checked" :"");?>>
      <label for="inputEmail4">Persecucion </label>
      <input type="checkbox" name="de_somatico" value="somatico" <?php echo (($data['de_somatico'] == "somatico") ?"checked":"");?>>
      <label for="inputPassword4">Somatico</label>
      <input type="checkbox" name="de_grandiosidad" value="grandiosidad" <?php echo (($data['de_grandiosidad']=="grandiosidad")?"checked":"");?>>
      <label for="inputPassword4">Grandiosidad </label>
      <input type="checkbox" name="de_otros" value="otros" <?php echo (($data['de_otros']=="otros")?"checked":"");?>>
      <label for="inputPassword4">Otros </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Actividad Psicomotora : &nbsp;&nbsp;</label>
      <input type="checkbox" name="act_normal" value="normal" <?php echo (($data['act_normal'] =="normal") ? "checked" : "");?>>
      <label for="inputPassword4">Normal</label>
      <input type="checkbox" name="act_retardacion" value="retardacion" <?php echo (($data['act_retardacion'] == "retardacion") ? "checked" :"");?>>
      <label for="inputEmail4">Retardacion</label>
      <input type="checkbox" name="act_agitacion" value="agitacion" <?php echo (($data['act_agitacion'] == "agitacion") ?"checked":"");?>>
      <label for="inputPassword4">Agitacion </label>
      <input type="checkbox" name="act_otros" value="otros" <?php echo (($data['act_otros']=="otros")?"checked":"");?>>
      <label for="inputPassword4">Otros </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
Diagnosis
      </label>
<textarea class="col-md-12" name="diagnosis" onclick="sel_diagnosis('diagnosis')" ><?php echo $data['diagnosis']; ?> </textarea>
  </div>
<div class="form-group col-md-12"></div>

<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Expectativas del Tratamiento
      </label>
      <textarea class="col-md-12" rows="3" name="exp_del_trat"><?php echo $data['exp_del_trat']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Recomendaciones:
      </label>
      <textarea class="col-md-12" rows="3" name="recomendaciones"><?php echo $data['recomendaciones']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Nombre de Psicologica que completa : &nbsp;&nbsp;</label>
      <input type="text" name="nombre_de_psi" value="<?php echo $data['nombre_de_psi'];?>">
      <label for="inputPassword4">Fecha (dia/mes/ano)</label>
      <input type="text" name="fecha" value="<?php echo $data['fecha'];?>">
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Firma e Psicologica que completa : &nbsp;&nbsp;</label>
      <input type="text" name="firma_e_psi" value="<?php echo $data['firma_e_psi'];?>">
      <label for="inputPassword4">Numero de Licencia</label>
      <input type="text" name="numero_de_lic" value="<?php echo $data['numero_de_lic'];?>">
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
