<?php
require_once(dirname(__file__)."/../../globals.php");
/*
function med_unit($val){
	$units = ['1'=>'mg', '2'=>'mg/1cc','3'=>'mg/2cc','4'=>'mg/3cc','5'=>'mg/4cc','6'=>'mg/5cc','7'=>'mcg','8'=>'grams','9'=>'mL'];
	return $units[$val];
}

function med_form($val) {
	$forms = ['1'=>'suspension','2'=>'tablet','3'=>'capsule','4'=>'solution','5'=>'tsp','6'=>'ml','7'=>'units','8'=>'inhalations','9'=>'gtts(drops)','10'=>'cream','11'=>'ointment','12'=>'puff'];
	return $forms[$val];
}

function med_route($val) {
	$routes = ['1'=>'Per Oris','2'=>'Per Rectum','3'=>'To Skin','4'=>'To Affected Area','5'=>'Sublingual','6'=>'OS','7'=>'OD','8'=>'OU','9'=>'SQ','10'=>'IM','11'=>'IV','12'=>'Per Nostril','13'=>'Both Ears','14'=>'Left Ear','15'=>'Right Ear','inhale'=>'Inhale','intradermal'=>'Intradermal','other'=>'Other/Miscellaneous','transdermal'=>'Transdermal','intramuscular'=>'Intramuscular'];
	return $routes[$val];
}

function med_interval($val) {
	$interval = ['1'=>'b.i.d','2'=>'t.i.d','3'=>'q.i.d','4'=>'q.3h','5'=>'q.4h','6'=>'q.5h','7'=>'q.6h','8'=>'q.8h','9'=>'q.d','10'=>'a.c','11'=>'p.c','12'=>'a.m','13'=>'p.m','14'=>'ante','15'=>'h','16'=>'h.s','17'=>'p.r.n','18'=>'stat'];
	return $interval[$val];
}
 
 */
function formato_psiquiatrico_report($pid, $encounter, $cols, $id)
{
	$data = sqlQuery("select * from form_formato_psiquiatrico where pid=? and id=?", array($pid,$id));
	$data1 = sqlStatement("select * from formato_medicamento1 where form_id=?",$id);
	$data2 = sqlStatement("select * from formato_medicamento2 where form_id=?",$id);
        $drugs_code1 = [];
        while($row=sqlFetchArray($data1)){
array_push($drugs_code1,$row);
	}
	$drugs_code2 = [];
        while($row=sqlFetchArray($data2)){
array_push($drugs_code2,$row);
	}
	print '<style>
		.formato th, .formato td,.formato tr {
  border:1px solid black;
  border-collapse:collapse;
padding: 10px;
}

.formato table {
  border:2px solid black;
  border-collapse:collapse;
}

.formato td {
  font-family:Arial;
  font-size:11px;
}
.borderless td, .borderless th {
    border: none;
}
</style>';
	print '<table class="table borderless">';
	print '<tr><td><b>Fecha de Servicio</b>&emsp;'.attr(oeFormatShortDate(substr($data['date_service'], 0, 10))).'</td></tr>';
	print '<tr><td>Start Time: &emsp;'.$data['start_time'].'</td></tr><tr><td>End Time: &emsp;'.$data['end_time'].'</td></tr>';
if(trim($data["razon_para"] != '')){
print '<tr><td>
      <b>
       Razon para solicitar servicios
      </b>&emsp;
      '.$data["razon_para"].'
</td></tr>';
}
if(trim($data['eval_psiquiatrica']) != '')
{
	print '<tr><td>
<b>Evaluacion Psiquiatrica</b>
</td><td>
'.$data['eval_psiquiatrica'].'
</td></tr>';
}
if(trim($data['cues_sobre']) != ''){
print '<tr><td>
<b>Cuestionario sobre enfermedad presente</b>
</td><td>
'.$data['cues_sobre'].'
</td></tr>';
}
if(trim($data['nombre_de']) != ''){
print '<tr><td>
<b> Nombre de Informante principal</b></td><td>
'.$data['nombre_de'].'
</td></tr>';
}
if(trim($data['relacion'] != '')){
print '<tr><td>
<b>Relacion con el paciente</b>
</td><td>'.$data['relacion'].' '.(($data['relacion'] == 'other') ? (' - '.$data['relacion_other']) : '').'
</td></tr>';
}
if(trim($data['fecha_de']) != ''){
print '<tr><td>
<b>Fecha de Ingreso a la institucion</b></td><td>
'.$data['fecha_de'].'
</td></tr>';
}
if(trim($data['cual_fue']) != ''){
print '<tr><td>
<b>Cual fue la razon del ingeso de paciente?</b></td><td>
'.$data['cual_fue'].' '.(($data['cual_fue'] == 'other') ? (' - '.$data['cual_fue_other']) : '').'
</td></tr>';
}
if(trim($data['padece_la'])!=''){
print '<tr><td>
<b>Padece la paciente de alguna condicion mental diagnosticada oficialmente por un medico o psicologo?</b></td><td>
'.$data['padece_la'].' '.(($data['padece_la'] == 'other') ? (' - '.$data['padece_la_other']) : '').'
</td></tr>';
}
if(trim($data['por_cuanto_days'])!=''){
print '<tr><td>
<b>Por cuanto tiempo?</b></td><td>
'.$data['por_cuanto_days'].' (quantity) &nbsp;'.$data['por_cuanto'].' '.(($data['por_cuanto'] == 'other') ? (' - '.$data['por_cuanto_other']) : '').'
</td></tr>';
}
if($data['diagnostico_2'] != ''){
print '<tr><td>
<b>Diagnostico 2</b></td><td>
'.$data['diagnostico_2'].' '.(($data['diagnostico_2'] == 'other') ? (' - '.$data['diagnostico_2_other']) : '').'
</td></tr>';
}
if($data['diagnostico_3'] != ''){
print '<tr><td>
<b>Diagnostico 3</b></td><td>
'.$data['diagnostico_3'].' '.(($data['diagnostico_3'] == 'other') ? (' - '.$data['diagnostico_3_other']) : '').'
</td></tr>';
}
if($data['diagnostico_4'] != ''){
print '<tr><td>
<b>Diagnostico 4</b></td><td>
'.$data['diagnostico_4'].' '.(($data['diagnostico_4'] == 'other') ? (' - '.$data['diagnostico_4_other']) : '').' <br>
</td></tr>';
}
if($data['que_cambios'] != ''){
print '<tr><td>
<b>Que cambios recientes ha habido en la conducta o en los sintomas del paciente? (No incluir conductas o sintomas que han sido la norma en la paciente desde siempre o que estan bien controlados con medicamentos psiquiatricos)?</b></td><td>
'.$data['que_cambios'].' '.(($data['que_cambios'] == 'other') ? (' - '.$data['que_cambios_other']) : '').'<br>
</td></tr>';
}
if(trim($data['por_cuanto_que_days']) != ''){
print '<tr><td>
<b>Por cuanto tiempo?</b></td><td>
'.$data['por_cuanto_que_days'].' (quantity) &nbsp;'.$data['por_cuanto_que'].' '.(($data['por_cuanto_que'] == 'other') ? (' - '.$data['por_cuanto_que_days_other']) : '').'<br>
</td></tr>';
} 
//if($data['his_ninguna'] != '' || $data['his_derrames'] != '' || $data['his_enfermedad'] !='' || $data['his_senil']!='' || $data['his_alzheimor']!='' || $data['his_vascular'] != '' || $data['his_hipotiro'] != '' || $data['his_diabetes'] !='' || $data['his_cardiaca'] !='' || $data['his_arterial'] != '' || $data['his_altos'] != '' || $data['his_asma']!='' || $data['his_enfisema']!=''||$data['his_copd']!=''||$data['his_reflujo']!=''||$data['his_artritis']!=''||$data['his_osteo']!=''||$data['his_fibro']!=''||$data['his_neuro']!=''||$data['his_discos']!='') {
print '
<tr><td>
<b>Historial de condiciones medicas Generales:</b><br><br>
</td></tr>
<tr><td>
'; print '<input type="checkbox" class="" name="his_ninguna" value="ninguna"  '.(($data['his_ninguna'] == "ninguna") ? "checked='checked'":"").' > Ninguna';
print '<input type="checkbox" class="" name="his_derrames" value="derrames"  '.(($data['his_derrames'] == "derrames") ? "checked='checked'" :"").' > Derrames Cerebraies';
print '<input type="checkbox" class="" name="his_epilepsia" value="epilepsia"  '. (($data['his_epilepsia'] == "epilepsia") ?"checked='checked'":"").' > Epilepsia';
print '<input type="checkbox" class="" name="his_enfermedad" value="enfermedad"  '. (($data['his_enfermedad']=="enfermedad")?"checked='checked'":"").' > Enfermedad de parkinson';
print '<input type="checkbox" class="" name="his_senil" value="senil"  '. (($data['his_senil']=="senil")?"checked='checked'":"").' > Demencia Senil';
print '<input type="checkbox" class="" name="his_alzheimor" value="alzheimor"  '. (($data['his_alzheimor']=="alzheimor")?"checked='checked'":"").' > Enfermedad de Alzheimer';
print '<input type="checkbox" class="" name="his_vascular" value="vascular"  '. (($data['his_vascular']=="vascular")?"checked='checked'":"").' > Demencia Vascular';
print '<input type="checkbox" class="" name="his_hipotiro" value="hipotiro"  '. (($data['his_hipotiro']=="hipotiro")?"checked='checked'":"").' > Hipotiroidismo';
print '<input type="checkbox" class="" name="his_diabetes" value="diabetes"  '. (($data['his_diabetes']=="diabetes")?"checked='checked'":"").' > Diabetes';
print '<input type="checkbox" class="" name="his_cardiaca" value="cardiaca"  '. (($data['his_cardiaca']=="cardiaca")?"checked='checked'":"").' > Enfermedad Cardiaca';
print '<input type="checkbox" class="" name="his_arterial" value="arterial"  '. (($data['his_arterial']=="arterial")?"checked='checked'":"").' > Hipertension Arterial';
print '<input type="checkbox" class="" name="his_altos" value="altos"  '. (($data['his_altos']=="altos")?"checked='checked'":"").' > Colesterol o Trigliceridos Altos';
print '<input type="checkbox" class="" name="his_asma" value="asma"  '. (($data['his_asma']=="asma")?"checked='checked'":"").' > Asma Bronquial';
print '<input type="checkbox" class="" name="his_enfisema" value="enfisema"  '. (($data['his_enfisema']=="enfisema")?"checked='checked'":"").' > Enfisema';
print '<input type="checkbox" class="" name="his_copd" value="copd"  '. (($data['his_copd']=="copd")?"checked='checked'":"").' > COPD';
print '<input type="checkbox" class="" name="his_reflujo" value="reflujo"  '. (($data['his_reflujo']=="reflujo")?"checked='checked'":"").' > Reflujo o Gastritis';
print '<input type="checkbox" class="" name="his_artritis" value="artritis"  '. (($data['his_artritis']=="artritis")?"checked='checked'":"").' > Artritis';
print '<input type="checkbox" class="" name="his_osteo" value="osteo"  '. (($data['his_osteo']=="osteo")?"checked='checked'":"").' > Osteoporosis';
print '<input type="checkbox" class="" name="his_fibro" value="fibro"  '. (($data['his_fibro']=="fibro")?"checked='checked'":"").' > Fibromialgia';
print '<input type="checkbox" class="" name="his_neuro" value="neuro"  '. (($data['his_neuro']=="neuro")?"checked='checked'":"").' > Neuropatia';
print '<input type="checkbox" class="" name="his_discos" value="discos"  '. (($data['his_discos']=="discos")?"checked='checked'":"").' > Discos Herniados';
print '<input type="checkbox" class="" name="his_discos" value="other"  '. (($data['his_discos']=="other")?"checked='checked'":"").' > Other'.(($data['his_discos']=="other")?(" - ".$data['favor_de']):"").' ';
print'
</td></tr>';
//}
//<div class="form-group col-md-12">
//<b>Other</b><br>
//'.$data['favor_de'].'
//</div>
//if($data['cmp_ninguna'] != '' || $data['cmp_psicosis'] != '' || $data['cmp_tras_bipo'] != '' || $data['cmp_tras_depr'] != '' || $data['cmp_tras_ansi'] != '' || $data['cmp_tras_por'] != '' || $data['cmp_other'] != '' || $data['cmp_other_cmnt'] != ''){
	print '<tr><td>
<b>Condiciones Médicas Psiquiátricas:</b><br><br>
</td></tr>
<tr><td>';
print '<input type="checkbox" class="" name="cmp_ninguna" value="ninguna"  '. (($data['cmp_ninguna'] =="ninguna") ? "checked='checked'" : "").'> Ninguna';
print '<input type="checkbox" class="" name="cmp_psicosis" value="psicosis"  '. (($data['cmp_psicosis'] =="psicosis") ? "checked='checked'" : "").'> Psicosis';
print '<input type="checkbox" class="" name="cmp_tras_bipo" value="tras_bipo"  '. (($data['cmp_tras_bipo'] =="tras_bipo") ? "checked='checked'" : "").'> Trastorno Bipolar';
print '<input type="checkbox" class="" name="cmp_tras_depr" value="tras_depr"  '. (($data['cmp_tras_depr'] =="tras_depr") ? "checked='checked'": "").'> Trastorno depresivo';
print '<input type="checkbox" class="" name="cmp_tras_ansi" value="tras_ansi"  '. (($data['cmp_tras_ansi'] =="tras_ansi") ? "checked='checked'" : "").'> Trastorno de Ansiedad';
print '<input type="checkbox" class="" name="cmp_tras_por" value="tras_por"  '. (($data['cmp_tras_por'] =="tras_por") ? "checked='checked'" : "").'> Trastorno por uso de Alcohol o Sustancias';
print '<input type="checkbox" class="" name="cmp_other" value="other"  '. (($data['cmp_other'] =="other") ? "checked='checked'" : "").'> Other'.(($data['cmp_other'] =="other") ? " - ".$data['cmp_other_cmnt']."<br>" : "");
print '</td></tr>';
//}

//if($data['c_ninguna'] != '' || $data['c_cabg']!=''||$data['c_impde']!=''||$data['c_imppro']!=''||$data['c_apende']!=''||$data['c_coli']!=''||$data['c_herni']!=''||$data['c_amp']!=''||$data['c_cir']!=''){
print '<tr><td>
<b>Cirugias o Procedimientos:</b><br>
</td></tr>
<tr><td>';
print '<input type="checkbox" class="" name="c_ninguna" value="ninguna"  '. (($data['c_ninguna'] =="ninguna") ? "checked='checked'" : "").'> Ninguna';
print '<input type="checkbox" class="" name="c_cabg" value="cabg"  '. (($data['c_cabg'] == "cabg") ? "checked='checked'" :"").'> Revascularizacion Coronaria (CABG)';
print '<input type="checkbox" class="" name="c_impde" value="impde"  '. (($data['c_impde'] == "impde") ?"checked='checked'":"").'> Implantacion de Marcapaso';
print '<input type="checkbox" class="" name="c_imppro" value="imppro"  '. (($data['c_imppro'] == "imppro") ?"checked='checked'":"").'> Implantacion de protesis';
print '<input type="checkbox" class="" name="c_apende" value="apende"  '. (($data['c_apende'] == "apende") ?"checked='checked'":"").'> Apendectomia';
print '<input type="checkbox" class="" name="c_coli" value="coli"  '. (($data['c_coli'] == "coli") ?"checked='checked'":"").'> Colicistectomia';
print '<input type="checkbox" class="" name="c_herni" value="herni"  '. (($data['c_herni'] == "herni") ?"checked='checked'":"").'> Herniorrafia';
print '<input type="checkbox" class="" name="c_amp" value="amp"  '. (($data['c_amp'] == "amp") ?"checked='checked'":"").'> Amputacion de Extremidad';
print '<input type="checkbox" class="" name="c_cir" value="cir"  '. (($data['c_cir'] == "cir") ?"checked='checked'":"").'> Cirugia de Cadera';
print '<input type="checkbox" class="" name="c_cir" value="other"  '. (($data['c_cir'] == "other") ?"checked='checked'":"").'> Other'.(($data['c_cir'] == "other") ?(" - ".$data['favor_de_no']):"");
print'
</td></tr>';
//}
//<div class="form-group col-md-12">
//<b>Favor de no escribir debajo de la linea roja</b><br>
//'.$data['favor_de_no'].'
//</div>
print '
<tr><td>
<b>Alergias</b><br>
</td><td>
'.$data['alergias'].'
</td></tr></table>
                      <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th>Medicamento</th>
                              <th>Dosis</th>
                              <th>Unidad</th>
                              <th>Cantidad</th>
                              <th>Via</th>
                              <th>Route</th>
                              <th>Frecuencia</th>
                              <th>Recargas</th>
                            </tr>
                      </tr>
                      </thead>


                        <tbody class="table mainrow_drug1">
'; foreach ($drugs_code1 as $key => $dc) { print'<tr class="rowdrug_1 first_primary"><td>'.$dc['medicamento'].'
                                  <td>'.$dc['dosis'].'</td>
                                    <td>'.med_unit($dc['unit']).'</td>
                                    <td>'.$dc['amount'].'</td>
                                    <td>'.med_form($dc['form']).'</td><td>'.med_route($dc['route']).'</td>
                                    <td>'.($dc['interval'] == '19' ? ('Other - '.$dc['freq_other']) :med_interval($dc['interval'])).'</td>
                                    <td>'.$dc['refills'].'</td>
                                </tr>';
                         }
                        print '</tbody>
						</table>
<table class="table borderless">';
if($data['hos_si'] != '' || $data['hos_no'] != '' || $data['hos_se']!=''){
print '<tr><td>
<h4>Historial Psiquiatrico</h4><br><br>
</td></tr>
<tr><td>
<b>Hospitalizaciones Psiquiatricas</b> </td><td>';
echo (($data['hos_si'] == "si") ?"Si ":"");
echo (($data['hos_no'] == "no") ?"No ":"");
echo (($data['hos_se'] == "se") ?"SE DESCONOCE ":"");

print'
</td></tr>';
}
if($data['int_si'] != '' || $data['int_no'] != '' || $data['int_se']!=''){
print '<tr><td>
<b>Intentos Suicidas</b>: </td><td>';
echo (($data['int_si'] == "si") ?"Si ":"");
echo (($data['int_no'] == "no") ?"No ":"");
echo (($data['int_se'] == "se") ?"SE DESCONOCE":"");

print'
</td></tr>';
}
if($data['abu_si'] != '' || $data['abu_no'] != '' || $data['abu_se'] !=''){
print '<tr><td>
<b>Abuso de Sustancias o Alcohol</b> : </td><td>';
echo (($data['abu_si'] == "si") ?"Si ":"");
echo (($data['abu_no'] == "no") ?"No ":"");
echo (($data['abu_se'] == "se") ?"SE DESCONOCE":"");
print'
</td></tr>';
}

print '<tr><td>
<b>Historial Familiar Psiquiatrico</b> : </td><td>';
echo (($data['his_si'] == "si") ?"Si ":"");
echo (($data['his_se'] == "se") ?"Se desconoce ":"");
echo (($data['his_no'] == "no") ?"No":"");
print'
</td></tr>
<tr><td>
<b>Historial de Efectos Adversos a Medicamentos</b> : </td><td>';
echo (($data['hise_si'] == "si") ?"Si ":"");
echo (($data['hise_se'] == "se") ?"Se desconoce ":"");
echo (($data['hise_no'] == "no") ?"No":"");
print'
</td></tr>
<tr><td>
<b>Comentarios</b></td><td>
'.$data['hos_comm'].'
</td></tr>
<tr><td>
<h4>Examen Mental</h4><br><br>
</td></tr>
<tr><td>
<b>Apariencia:</b></td><td>
'.$data['apariencia'].'</td><td>
'.$data['apariencia_cmnt'].'
</td></tr>
<tr><td>
<b>Actividad Motora:</b></td><td>
'.$data['actividadm'].'</td><td>
'.$data['actividadm_cmnt'].'
</td></tr>
<tr><td>
<b>Actitud:</b></td><td>
'.$data['actitud'].'</td><td>
'.$data['actitud_cmnt'].'
</td></tr>
<tr><td>
<b>Conducta</b></td><td>
'.$data['conducta'].'</td><td>
'.$data['conducta_cmnt'].'
</td></tr>
<tr><td>
<b>Habla:</b></td><td>
'.$data['habia'].'</td><td>
'.$data['habia_cmnt'].'
</td></tr>
<tr><td>
<b>Afecto:</b></td><td>
'.$data['afecto'].'</td><td>
'.$data['afecto_cmnt'].'
</td></tr>
<tr><td>
<b>Talante:</b></td><td>
'.$data['talante'].'</td><td>
'.$data['talante_cmnt'].'
</td></tr>
<tr><td>
<b>Percepción</b></td><td>
'.$data['percepcion'].'</td><td>
'.$data['percepcion_cmnt'].'
</td></tr>
<tr><td>
<b>Contenido de Pensamiento</b></td><td>
'.$data['contenido'].'</td><td>
'.$data['contenido_cmnt'].'
</td></tr>
<tr><td>
<b>Relevancia de sus Respuestas</b></td><td>
'.$data['relevancia'].'</td><td>
'.$data['relevancia_cmnt'].'
</td></tr>
<tr><td>
<b>Procesamiento de Pensamiento</b></td><td>
'.$data['proces_de'].'</td><td>
'.$data['proces_de_cmnt'].'
</td></tr>
<tr><td>
<b>Nivel de Atención</b></td><td>
'.$data['nivel'].'</td><td>
'.$data['nivel_cmnt'].'
</td></tr>
<tr><td>
<b>Concentración</b></td><td>
'.$data['concentracion'].'</td><td>
'.$data['concentracion_cmnt'].'
</td></tr>
<tr><td>
<b>Orientación</b></td><td>
'.$data['orientacion'].'</td><td>
'.$data['orientacion_cmnt'].'
</td></tr>
<tr><td>
<b>Memoria</b></td><td>
'.$data['memoria'].'</td><td>
'.$data['memoria_cmnt'].'
</td></tr>
<tr><td>
<b>Juicio</b></td><td>
'.$data['juicio'].'</td><td>
'.$data['juicio_cmnt'].'
</td></tr>
<tr><td>
<b>Introspección</b></td><td>
'.$data['introspeccion'].'</td><td>
'.$data['introspeccion'].'
</td></tr>
<tr><td>
<b>Ideas Suicidas</b></td><td>
'.$data['ideass'].'</td><td>
'.$data['ideass_cmnt'].'
</td></tr>
<tr><td>
<b>Ideas Homicidas</b></td><td>
'.$data['ideash'].'</td><td>
'.$data['ideash_cmnt'].'
</td></tr>
<tr><td>
<b>Impresion Diagnostica</b></td><td>
'.$data['imp_dia'].'
</td></tr>
</table>
                      <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th>Medicamento</th>
                              <th>Dosis</th>
                              <th>Unidad</th>
                              <th>Cantidad</th>
                              <th>Via</th>
                              <th>Route</th>
                              <th>Frecuencia</th>
                              <th>Recargas</th>
                            </tr>
                      </tr>
                      </thead>


                        <tbody class="table mainrow_drug1">
'; foreach ($drugs_code2 as $key => $dc) { print'
                                <tr class="rowdrug_1 first_primary">
                                  <td>'.$dc['medicamento'].'
				  <td>'.$dc['dosis'].'</td>
<td>'.med_unit($dc['unit']).'</td>
                                    <td>'.$dc['amount'].'</td>
				    <td>'.med_form($dc['form']).'</td><td>'.med_route($dc['route']).'</td>
				    <td>'.($dc['interval'] == '19' ? ('Other - '.$dc['freq_other']) :med_interval($dc['interval'])).'</td>
                                    <td>'.med_interval($dc['interval']).'</td>
                                    <td>'.$dc['refills'].'</td>
                                </tr>';
                         }
                        print '</tbody>
                                                </table>

<h4>Orientacion y Recomendaciones</h4>
<p>Se orienta sobre diagnosticos psiquiatricos forma de tomar los medicamentos y posibles efectos secundarios<br>Se indica informa de forma oportuna sobre efectos secundarios<br>
Se recomienda formar precauciones para evitar caidas<br>
Llamar al 9-1-1 o acudir al hospital en caso de cualquier situacion que pueda amenazar la vida de la paciente, la propiedad u otras personas<br>
Tomar medicamentos segun especificados en receta medica y no hacer cambios per cuenta propia<br>
Encargados o cuidadores del paciente disponibles al momento de la evaluación fueron orientados sobre forma de uso, indicación de tratamiento farmacológico y de los posibles efectos adversos de este.
</p>


';
/*	print "<style>input[type='checkbox'][readonly] {
  pointer-events: none;
}</style>";
	print "<table><tr><td>\n";
echo '		<div class="form-group col-md-12">
      <label for="inputEmail4">Modalidad : &nbsp;&nbsp;</label>
      <input type="checkbox" name="modalidad" value="individual" '.(($data['modalidad'] =="individual") ? "checked" : "").' readonly>
      <label for="inputPassword4">Individual </label>
      <input type="checkbox" name="individual" value="con_paciente" '. (($data['individual'] == "con_paciente") ? "checked" :"").' readonly>
      <label for="inputEmail4">Fam.Con Paciente </label>
      <input type="checkbox" name="con_paciente" value="sin_paciente" '.(($data['con_paciente'] == "sin_paciente") ?"checked":"").' readonly>
      <label for="inputPassword4">Fam.Sin Paciente </label>
      <input type="checkbox" name="sin_paciente" value="grupal" '.(($data['sin_paciente']=="grupal")?"checked":"").' readonly>
      <label for="inputPassword4">Grupal </label>
    </div>
';
	print '<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Diagnostico :
      </label>
      <span >'.$data['diagnostico'].'</span>
  </div>';
	print '<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Actitud : &nbsp;&nbsp;</label>
      <input type="checkbox" name="actitud" value="cooperador" '.(($data['actitud'] == "cooperador")?"checked":"").' readonly>
      <label for="inputPassword4">Cooperador </label>
      <input type="checkbox" name="cooperador" value="no_cooperador" '. (($data['cooperador']=="no_cooperador")?"checked":"").' readonly>
      <label for="inputEmail4">No Cooperador</label>
      <input type="checkbox" name="no_cooperador" value="hostil" '. (($data['no_cooperador']=="hostil")?"checked":"").' readonly>
      <label for="inputPassword4">Hostil</label>
      <input type="checkbox" name="hostil" value="demandante" '. (($data['hostil']=="demandante")?"checked":"").' readonly>
      <label for="inputPassword4">Demandante</label>
      <input type="checkbox" name="demandante" value="reservado" '. (($data['demandante']=="reservado")?"checked":"").' readonly>
      <label for="inputPassword4">Reservado</label>
      <input type="checkbox" name="reservado" value="suspicaz" '. (($data['reservado']=="suspicaz")?"checkbox":"").' readonly>
      <label for="inputPassword4">Suspicaz</label>
    </div>';
		/*
        print "<span class=bold>" . xlt('Estado Civil') . ": </span><span class=text>" . text(ucfirst($result{"civil_casado"})) .(($result['civil_soltero'] !='') ? (', '.ucfirst($result['civil_soltero'])): '' ).(($result['civil_divorciado'] !='') ? (', '.ucfirst($result['civil_divorciado'])): '' ).(($result['civil_viudo'] !='') ? (', '.ucfirst($result['civil_viudo'])): '' ). "</span><br>\n";
            print "<span class=bold>" . xlt('Cuáles son sus preocupaciones con el paciente?') . ": </span><span class=text>" . nl2br(text($result{"caules_comments"})) . "</span><br>\n";
            print "<span class=bold>" . xlt('Padece el paciente de alguna condicion medica?') . ": </span><span class=text>" . nl2br(text(ucfirst($result{"padece"}))) . "</span><br>\n";
            print "<span class=bold>" . xlt('Condiciones medicas') . ": </span><span class=text>" . nl2br(text($result{"padece_comments"})) . "</span><br>\n";
            print "<span class=bold>" . xlt('Se ha realizado el paciente alguna cirugia?') . ": </span><span class=text>" . nl2br(text(ucfirst($result{"se_ha"}))) . "</span><br>\n";
            print "<span class=bold>" . xlt('Cirugias que se ha realizado') . ": </span><span class=text>" . nl2br(text($result{"se_ha_comments"})) . "</span><br>\n";
            print "<span class=bold>" . xlt('Es alergico el paciente a algun medicamento?') . ": </span><span class=text>" . nl2br(text(ucfirst($result{"es"}))) . "</span><br>\n";
	    print "<span class=bold>" . xlt('Alergias del paciente') . ": </span><span class=text>" . nl2br(text($result{"es_comments"})) . "</span><br>\n";
    print "</td></tr></table>\n";
?><table class='table table-responsive'>
                        <thead>
                            <tr>
                              <th>Medicamento</th>
                              <th>Dosis</th>
                              <th>Frecuencia</th>
                            </tr>
                      </tr>
                      </thead>

                      <?php if (!empty($drugs_code)) { ?>

<tbody class="table table-responsive mainrow_drug">
 <?php foreach ($drugs_code as $key => $dc) { ?>
                                <tr class="rowdrug_1 first_primary">
                                  <td><?php echo $dc['medicamento'] ?>
                                    <input class="drug_code" name="prescription[<?php echo $key; ?>][drug_code]" type="hidden" value="<?php echo $dc['drug_code'] ?>">
                                  <input class="id" type="hidden" name="prescription[<?php echo $key; ?>][id]" value="<?php echo $dc['id'] ?>">
                                    <input class="prescription_id" name="prescription_id" type="hidden" value="<?php echo $dc['id'] ?>"></td>
                                  <td><?php echo $dc['dosis']; ?></td>
                                  <td><?php echo $dc['frecuencia']; ?></td>
				</tr>
 <?php } ?>
</tbody>
 <?php } ?>
</table>
<?php
    print "<table><tr><td>\n";
            print "<span class=bold>" . xlt('Hospitalizaciones Psiquitricas') . ": </span><span class=text>" . nl2br(text(ucfirst($result{"hosp"}))) . "</span><br><span class=text>" . nl2br(text($result{"hosp_comments"})) . "</span>\n";
            print "<span class=bold>" . xlt('Intentos Suicidas') . ": </span><span class=text>" . nl2br(text(ucfirst($result{"intentos"}))) . "</span><br><span class=text>" . nl2br(text($result{"intentos_comments"})) . "</span>\n";
            print "<span class=bold>" . xlt('Abuso de Sustancias o Alcohol') . ": </span><span class=text>" . nl2br(text(ucfirst($result{"abuso"}))) . "</span><br><span class=text>" . nl2br(text($result{"abuso_comments"})) . "</span>\n";
            print "<span class=bold>" . xlt('Familiares con condiciones psiquiatricas') . ": </span><span class=text>" . nl2br(text(ucfirst($result{"familiares"}))) . "</span><br><span class=text>" . nl2br(text($result{"familiares_comments"})) . "</span>\n";
    }*/
	/*  print "</td></tr></table>\n";*/
}
?>

