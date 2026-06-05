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
  <title>Nota De Progreso De Trabajo Social</title>
  <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/bootstrap/dist/css/bootstrap.min.css?v=41">
  <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/font-awesome/css/font-awesome.css">

  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/bootstrap/dist/js/bootstrap.min.js"></script>
<?php Header::setupHeader(['datetime-picker','common']); ?>

<style>
	input[type=checkbox] {
	margin-left: 10px;
	margin-right: 3px;
}
	</style>
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
<h3>Nota De Progreso De Trabajo Social</h3>
<hr>
<?php
if (!isset($_REQUEST['id']) || $_REQUEST['id'] == '') {?>

        <div class="row col-md-offset-3" onclick="get_pre_value()"><button class="btn btn-primary">Get Most recent Value</button></div>
<?php }
?>
  <div class="col-md-offset-1 col-md-10 enc-form">
  <form class="" name="seguimiento_form" role="form" method="post" action="<?php echo $rootdir; ?>/forms/nota_de_progreso_de_trabajo_social/save.php?<?php echo (isset($_REQUEST['id']) && $_REQUEST['id'] != '') ? ('mode=edit&id='.$_REQUEST['id']): 'mode=new';?>" enctype="multipart/form-data">
<?php
if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
	$data = sqlQuery("select * from form_nota_de_progreso_de_trabajo_social where id=?",$_REQUEST['id']);
} else if(isset($_REQUEST['get_pre_value']) && $_REQUEST['get_pre_value'] != ''){

	$data = sqlQuery("select fp.* from form_nota_de_progreso_de_trabajo_social fp left join forms f on f.form_id=fp.id and f.formdir='nota_de_progreso_de_trabajo_social' and fp.pid=f.pid where fp.pid=".$pid." and f.deleted=0 order by fp.date desc,fp.id desc limit 1");
}
?>
<!--<input type="hidden" name="mode" value="edit"/>
<input type="hidden" name="id" value="<?php //echo $_REQUEST['id']; ?>"/>-->

<div class="form-row form-inline">

<div class="form-group col-md-12">
<div class="col-md-12 row">
<div class="col-md-2">
                            <label for='form_date' class="text-right"><?php echo xlt('Fecha de Servicio:'); ?></label>
</div>
<div class="col-md-4">
                            <input type='text' class='form-control datepicker' name='date_service' id='form_date' <?php echo ($disabled ?? '') ?> value='<?php echo (isset($_REQUEST['id']) && $_REQUEST['id'] != '') ? attr(oeFormatShortDate(substr($data['date_service'], 0, 10))) : attr(oeFormatShortDate(date('Y-m-d'))); ?>' title='<?php echo xla('Fecha de Servicio'); ?>' />
</div>
			</div>
<br>
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
      <label for="inputEmail4">1. La modalidad de la intervencion fue: &nbsp;&nbsp;</label>
      <input type="checkbox" name="mo_individual" value="individual" <?php echo (($data['mo_individual'] =="individual") ? "checked" : "");?>>
      <label for="inputPassword4"> Individual </label>
      <input type="checkbox" name="mo_grupal" value="grupal" <?php echo (($data['mo_grupal'] == "grupal") ? "checked" :"");?>>
      <label for="inputEmail4"> Grupal </label>
      <input type="checkbox" name="mo_familiar" value="familiar" <?php echo (($data['mo_familiar'] == "familiar") ?"checked":"");?>>
      <label for="inputPassword4"> familiar </label>
      <input type="checkbox" name="mo_familiay" value="familiay" <?php echo (($data['mo_familiay']=="familiay")?"checked":"");?>>
      <label for="inputPassword4">familia y residente </label>
      <input type="checkbox" name="mo_cuidador" value="cuidador" <?php echo (($data['mo_cuidador']=="cuidador")?"checked":"");?>>
      <label for="inputPassword4">cuidador </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">2. Com se observo durante la intervencion? : &nbsp;&nbsp;</label>
      <input type="checkbox" name="com_aseado" value="aseado" <?php echo (($data['com_aseado'] == "aseado")?"checked":"");?>>
      <label for="inputPassword4">aseado, con vestimenta apropiada</label>
      <input type="checkbox" name="com_aceptable" value="aceptable" <?php echo (($data['com_aceptable']=="aceptable")?"checked":"");?>>
      <label for="inputEmail4">Aceptable para su condicion</label><br>
      <input type="checkbox" name="com_pobre" value="pobre" <?php echo (($data['com_pobre']=="pobre")?"checked":"");?>>
      <label for="inputPassword4">Pobre Higiene</label>
      <input type="checkbox" name="com_puede" value="puede" <?php echo (($data['com_puede']=="puede")?"checked":"");?>>
      <label for="inputPassword4">Puede Mejorar</label>
      <input type="checkbox" name="com_otras" value="otras" <?php echo (($data['com_otras']=="otras")?"checked":"");?>>
      <label for="inputPassword4">Otras</label>
      <textarea class="form-control" rows=2 name="com_comments"><?php echo $data['com_comments'];?></textarea>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">3. Presento algun hematoma fisico visible : &nbsp;&nbsp;</label>
      <input type="checkbox" name="pres_si" value="si" <?php echo (($data['pres_si']=="si")?"checked":"");?>>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="pres_no" value="no" <?php echo (($data['pres_no']=="no")?"checked":"");?>>
      <label for="inputEmail4">No</label>
      <br>
      <div>(de responder si vease anejo 1.0)</div>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">4. Su alimentacion es adecuada : &nbsp;&nbsp;</label>
      <input type="checkbox" name="su_si" value="si" <?php echo (($data['su_si']=="si")?"checked":"");?>>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="su_no" value="no" <?php echo (($data['su_no']=="no")?"checked":"");?>>
      <label for="inputEmail4">No; de responder no, especifique </label>
      <textarea class="form-control" rows=2 name="su_comments"><?php echo $data['su_comments'];?></textarea>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">5. Estado de animo presentado fue: </label>
      <input type="checkbox" name="es_alerta" value="alerta" <?php echo (($data['es_alerta']=="alerta")?"checked":"");?>>
      <label for="inputPassword4">alerta</label>
      <input type="checkbox" name="es_alegre" value="alegre" <?php echo (($data['es_alegre']=="alegre")?"checked":"");?>>
      <label for="inputEmail4">alegre</label>
      <input type="checkbox" name="es_tranquilo" value="tranquilo" <?php echo (($data['es_tranquilo']=="tranquilo")?"checked":"");?>>
      <label for="inputPassword4">tranquilo(a)</label>
      <input type="checkbox" name="es_ansioso" value="ansioso" <?php echo (($data['es_ansioso']=="ansioso")?"checked":"");?>>
      <label for="inputPassword4">ansioso(a)</label>
      <input type="checkbox" name="es_triste" value="triste" <?php echo (($data['es_triste']=="triste")?"checked":"");?>>
      <label for="inputPassword4">triste</label>
      <input type="checkbox" name="es_decaido" value="decaido" <?php echo (($data['es_decaido']=="decaido")?"checked":"");?>>
      <label for="inputPassword4">decaido</label><br>
      <input type="checkbox" name="es_irritable" value="irritable" <?php echo (($data['es_irritable']=="irritable")?"checked":"");?>>
      <label for="inputPassword4">irritable</label>
      <input type="checkbox" name="es_agitado" value="agitado" <?php echo (($data['es_agitado']=="agitado")?"checked":"");?>>
      <label for="inputPassword4">agitado</label>
      <input type="checkbox" name="es_deprimido" value="deprimido" <?php echo (($data['es_deprimido']=="deprimido")?"checked":"");?>>
      <label for="inputPassword4">deprimido</label>
      <input type="checkbox" name="es_na" value="na" <?php echo (($data['es_na']=="na")?"checked":"");?>>
      <label for="inputPassword4">NA</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">6. A nivel cognitivo se encontraba : &nbsp;&nbsp;</label>
      <input type="checkbox" name="ni_na" value="na" <?php echo (($data['ni_na']=="na")?"checked":"");?>>
      <label for="inputPassword4">NA &nbsp;&nbsp;</label>
      <label for="inputEmail4">Orientado en: </label>
      <input type="checkbox"  name="ori_persona" value="persona" <?php echo (($data['ori_persona']=="persona")?"checked":"");?>>
      <label for="inputEmail4">persona</label>
      <input type="checkbox"  name="ori_espacio" value="espacio" <?php echo (($data['ori_espacio']=="espacio")?"checked":"");?>>
      <label for="inputEmail4">espacio</label>
      <input type="checkbox"  name="ori_tiempo" value="tiempo" <?php echo (($data['ori_tiempo']=="tiempo")?"checked":"");?>>
      <label for="inputEmail4">tiempo &nbsp;&nbsp;</label><br>
      <label for="inputEmail4">Desorientado en: </label>
      <input type="checkbox"  name="dori_persona" value="persona" <?php echo (($data['dori_persona']=="persona")?"checked":"");?>>
      <label for="inputEmail4">persona</label>
      <input type="checkbox"  name="dori_espacio" value="espacio" <?php echo (($data['dori_espacio']=="espacio")?"checked":"");?>>
      <label for="inputEmail4">espacio</label>
      <input type="checkbox"  name="dori_tiempo" value="tiempo" <?php echo (($data['dori_tiempo']=="tiempo")?"checked":"");?>>
      <label for="inputEmail4">tiempo</label>
</div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">7. Procesos de pensamientos : &nbsp;&nbsp;</label>
      <input type="checkbox" name="pro_na" value="na" <?php echo (($data['pro_na']=="na")?"checked":"");?>>
      <label for="inputPassword4">NA &nbsp;&nbsp;</label>
      <input type="checkbox"  name="pro_organ" value="organ" <?php echo (($data['pro_organ']=="organ")?"checked":"");?>>
      <label for="inputEmail4">organizadas</label>
      <input type="checkbox"  name="pro_dorgan" value="dorgan" <?php echo (($data['pro_dorgan']=="dorgan")?"checked":"");?>>
      <label for="inputEmail4">desorganizadas</label>
</div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">8. AI momento de la intervencion se descartaron y el/la paciente nego pensamientos suicidad u homicidas, asi como la presencia de disturbio perceptuales : &nbsp;&nbsp;</label>
      <input type="checkbox" name="ai_si" value="si" <?php echo (($data['ai_si']=="si")?"checked":"");?>>
      <label for="inputPassword4">Si</label>
      <input type="checkbox"  name="ai_no" value="no" <?php echo (($data['ai_no']=="no")?"checked":"");?>>
      <label for="inputEmail4">No &nbsp;&nbsp;</label>
      <label for="inputEmail4">De responder no, mencione cuales:</label>
      <textarea class="col-md-12" rows="3" name="ai_de_res"><?php echo $data['ai_de_res']; ?></textarea>
</div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">9. El (o los) objetivos utilizados durante la intervencion fue (o fueron) : &nbsp;&nbsp;</label>
      <input type="checkbox" name="el_ori" value="ori" <?php echo (($data['el_ori']=="ori")?"checked":"");?>>
      <label for="inputPassword4">orientacion en tiempo y espacio</label>
      <input type="checkbox"  name="el_fort" value="fort" <?php echo (($data['el_fort']=="fort")?"checked":"");?>>
      <label for="inputEmail4">fortalecimiento de la memoria</label><br>
      <input type="checkbox"  name="el_man" value="man" <?php echo (($data['el_man']=="man")?"checked":"");?>>
      <label for="inputEmail4">manejo de soledad</label>
<input type="checkbox"  name="el_red" value="red" <?php echo (($data['el_red']=="red")?"checked":"");?>>
      <label for="inputEmail4">reducir ansiedad </label>
<input type="checkbox"  name="el_mej" value="mej" <?php echo (($data['el_mej']=="mej")?"checked":"");?>>
      <label for="inputEmail4">mejorar estado de animo </label>
<input type="checkbox"  name="el_ven" value="ven" <?php echo (($data['el_ven']=="ven")?"checked":"");?>>
      <label for="inputEmail4">ventilacion de sentimiento</label><br>
<input type="checkbox"  name="el_mande" value="mande" <?php echo (($data['el_mande']=="mande")?"checked":"");?>>
      <label for="inputEmail4">manejo de adaptacion de du ambiente o a un nuevo ambiente </label>
<input type="checkbox"  name="el_mod" value="mod" <?php echo (($data['el_mod']=="mod")?"checked":"");?>>
      <label for="inputEmail4">modificacion de conducta </label><br>
<input type="checkbox"  name="el_manre" value="manre" <?php echo (($data['el_manre']=="manre")?"checked":"");?>>
      <label for="inputEmail4">manejando redes de apoyo o familiares</label><input type="checkbox"  name="el_rem" value="rem" <?php echo (($data['el_rem']=="rem")?"checked":"");?>>
      <label for="inputEmail4">reminiscencia</label>
<input type="checkbox"  name="el_otros" value="otros" <?php echo (($data['el_otros']=="otros")?"checked":"");?>>
      <label for="inputEmail4">otros &nbsp;&nbsp;</label>
<textarea class="col-md-12" rows="3" name="el_comments"><?php echo $data['el_comments']; ?></textarea>

</div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
        10. Observacion en el area mental y/o emocional:
      </label>
      <textarea class="col-md-12" rows="3" name="observacion"><?php echo $data['observacion']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
        11. Respuesta durante y al finalizer intervencion:
      </label><br>Satisfactoria<br>
      <textarea class="col-md-12" rows="3" name="satisfactoria"><?php echo $data['satisfactoria']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
        12. Recomendacion y/o comentario:
      </label><br>Seguimiento psicosocial mensual para fortalecimiento de memoria y refuerzo cognitivo<br>
      <textarea class="col-md-12" rows="3" name="recomendacion"><?php echo $data['recomendacion']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
      </label><br>Diagnosis<br>
<textarea class="col-md-12" name="diagnosis" onclick="sel_diagnosis('diagnosis')" ><?php echo $data['diagnosis']; ?> </textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Tiempo de duracion de Psicoterapia fue de : &nbsp;&nbsp;</label>
      <input type="checkbox" name="tiempo_2530" value="2530" <?php echo (($data['tiempo_2530']=="2530")?"checked":"");?>>
      <label for="inputPassword4">25-30</label>
      <input type="checkbox" name="tiempo_4550" value="4550" <?php echo (($data['tiempo_4550']=="4550")?"checked":"");?>>
      <label for="inputEmail4">45 a 50 min o</label>
      <textarea class="" rows="3" name="tiempo_comm"><?php echo $data['tiempo_comm']; ?></textarea>
      <label for="inputEmail4">min</label>
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
