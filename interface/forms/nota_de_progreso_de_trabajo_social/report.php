<?php
require_once(dirname(__file__)."/../../globals.php");

function nota_de_progreso_de_trabajo_social_report($pid, $encounter, $cols, $id)
{
	$data = sqlQuery("select * from form_nota_de_progreso_de_trabajo_social where pid=? and id=?", array($pid,$id));
//	$data1 = sqlStatement("select * from psychiatric_medicamento where form_id=?",$id);
  //      $drugs_code = [];
    //    while($row=sqlFetchArray($data1)){
//array_push($drugs_code,$row);
	//      }
	print "<style>input[type='checkbox'][readonly] {
  pointer-events: none;
}
textarea {
    border: none;
    outline: none;
}
</style>";
	print "<table><tr><td><b>Fecha de Servicio:</b></td><td>".attr(oeFormatShortDate(substr($data['date_service'], 0, 10)))."</td></tr><tr><td colspan=4>\n";
	  print '<tr><td>Start Time: </td><td>'.$data['start_time'].'</td></tr><tr><td>End Time: </td><td>'.$data['end_time'].'</td></tr>';

echo '	
      <b>1. La modalidad de la intervencion fue : &nbsp;&nbsp;</b>
</td></tr>
<tr><td>
      <input type="checkbox" name="modalidad" value="individual" checked="'.(($data['mo_individual'] =="individual") ? "checked='checked'" : "").'">
      <label for="inputPassword4">Individual </label>
	  </td><td>
      <input type="checkbox" name="individual" value="con_paciente" '. (($data['mo_grupal'] == "grupal") ? "checked='checked'" :"").' readonly>
      <label for="inputEmail4">Grupal </label>
	  </td><td>
      <input type="checkbox" name="con_paciente" value="sin_paciente" '.(($data['mo_familiar'] == "familiar") ?"checked='checked'":"").' readonly>
      <label for="inputPassword4">familiar</label>
	  </td><td>
      <input type="checkbox" name="sin_paciente" value="grupal" '.(($data['mo_familiay']=="familiay")?"checked='checked'":"").' readonly>
      <label for="inputPassword4">familia y residente </label>
	  </td><td>
      <input type="checkbox" name="sin_paciente" value="grupal" '.(($data['mo_cuidador']=="cuidador")?"checked='checked'":"").' readonly>
      cuidador 
	  </td></tr>';
	  /*	print '<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Diagnostico :
      </label>
      <span >'.$data['diagnostico'].'</span>
      </div>';*/
	print '<tr><td colspan=4>
      <b>2. Com se observo durante la intervencion? :  &nbsp;&nbsp;</b>
	  </td></tr>
<tr><td>
      <input type="checkbox" name="actitud" value="cooperador" '.(($data['com_aseado'] == "aseado")?"checked='checked'":"").' readonly>
      <label for="inputPassword4">aseado, con vestimenta apropiada</label>
	  </td><td>
      <input type="checkbox" name="cooperador" value="no_cooperador" '. (($data['com_aceptable']=="aceptable")?"checked='checked'":"").' readonly>
      <label for="inputEmail4">Aceptable para su condicion</label>
	  </td><td>
      <input type="checkbox" name="no_cooperador" value="hostil" '. (($data['com_pobre']=="pobre")?"checked='checked'":"").' readonly>
      <label for="inputPassword4">Pobre Higiene</label>
	  </td><td>
      <input type="checkbox" name="hostil" value="demandante" '. (($data['com_puede']=="puede")?"checked='checked'":"").' readonly>
      <label for="inputPassword4">Puede Mejorar</label>
	  </td></tr>
	  <tr><td>
      <input type="checkbox" name="demandante" value="reservado" '. (($data['com_otras']=="otras")?"checked='checked'":"").' readonly>
      <label for="inputPassword4">Otras</label>
	  </td><td colspan=4>
 '.$data['com_comments'].'
    </td></tr>';
print '<tr><td colspan=2>
      <b>3. Presento algun hematoma fisico visible : &nbsp;&nbsp;</b>
	  </td><td>
      <input type="checkbox" name="pres_si" value="si" '.(($data['pres_si']=="si")?"checked='checked'":"").'>
      <label for="inputPassword4">Si</label>
	  </td><td>
      <input type="checkbox" name="pres_no" value="no" '.(($data['pres_no']=="no")?"checked='checked'":"").'>
      <label for="inputEmail4">No</label>
	  </td><td>
      (de responder si vease anejo 1.0)
	  </td></tr>
<tr><td colspan=2>
      <b>4. Su alimentacion es adecuada : &nbsp;&nbsp;</b>
	  </td><td>
      <input type="checkbox" name="su_si" value="si" '.(($data['su_si']=="si")?"checked='checked'":"").'>
      <label for="inputPassword4">Si</label>
	  </td><td>
      <input type="checkbox" name="su_no" value="no" '. (($data['su_no']=="no")?"checked='checked'":"").'>
      <label for="inputEmail4">No</label></div>
	  </td></tr>
	  <tr><td>
      de responder no, especifique</td><td colspan=4>
      '. $data['su_comments'].'
	  </td></tr>';

print '<tr><td colspan=4>
      <b>5. Estado de animo presentado fue: </b>
	  </td></tr>
<tr><td>
      <input type="checkbox" name="es_alerta" value="alerta" '.(($data['es_alerta']=="alerta")?"checked='checked'":"").'>
      <label for="inputPassword4">alerta</label>
	  </td><td>
      <input type="checkbox" name="es_alegre" value="alegre" '. (($data['es_alegre']=="alegre")?"checked='checked'":"").'>
      <label for="inputEmail4">alegre</label>
	  </td><td>
      <input type="checkbox" name="es_tranquilo" value="tranquilo" '. (($data['es_tranquilo']=="tranquilo")?"checked='checked'":"").'>
      <label for="inputPassword4">tranquilo(a)</label>
	  </td><td>
      <input type="checkbox" name="es_ansioso" value="ansioso" '. (($data['es_ansioso']=="ansioso")?"checked='checked'":"").'>
      <label for="inputPassword4">ansioso(a)</label>
	  </td></tr>
<tr><td>
      <input type="checkbox" name="es_triste" value="triste" '. (($data['es_triste']=="triste")?"checked='checked'":"").'>
      <label for="inputPassword4">triste</label>
	  </td><td>
      <input type="checkbox" name="es_decaido" value="decaido" '. (($data['es_decaido']=="decaido")?"checked='checked'":"").'>
      <label for="inputPassword4">decaido</label>
	  </td><td>
      <input type="checkbox" name="es_irritable" value="irritable" '. (($data['es_irritable']=="irritable")?"checked='checked'":"").'>
      <label for="inputPassword4">irritable</label>
	  </td><td>
      <input type="checkbox" name="es_agitado" value="agitado" '. (($data['es_agitado']=="agitado")?"checked='checked'":"").'>
      <label for="inputPassword4">agitado</label>
	  </td><td>
      <input type="checkbox" name="es_deprimido" value="deprimido" '. (($data['es_deprimido']=="deprimido")?"checked='checked'":"").'>
      <label for="inputPassword4">deprimido</label>
	  </td></tr>
<tr><td>
      <input type="checkbox" name="es_na" value="na" '. (($data['es_na']=="na")?"checked='checked'":"") .'>
      <label for="inputPassword4">NA</label>
	  </td></tr>';

print '<tr><td colspan=2>
      <b>6. A nivel cognitivo se encontraba : &nbsp;&nbsp;</b>
	  </td><td>
      <input type="checkbox" name="ni_na" value="na" '. (($data['ni_na']=="na")?"checked='checked'":"").'>
      <label for="inputPassword4">NA &nbsp;&nbsp;</label>
	  </td></tr>
<tr><td>
      <b>Orientado en: </b>
	  </td><td>
      <input type="checkbox"  name="ori_persona" value="persona" '. (($data['ori_persona']=="persona")?"checked='checked'":"").'>
	  
      <label for="inputEmail4">persona</label>
	  </td><td>
      <input type="checkbox"  name="ori_espacio" value="espacio" '. (($data['ori_espacio']=="espacio")?"checked='checked'":"").'>
      <label for="inputEmail4">espacio</label>
	  </td><td>
      <input type="checkbox"  name="ori_tiempo" value="tiempo" '. (($data['ori_tiempo']=="tiempo")?"checked='checked'":"").'>
      <label for="inputEmail4">tiempo &nbsp;&nbsp;</label>
	  </td></tr>
<tr><td>
      <b>Desorientado en: </b>
	  </td><td>
      <input type="checkbox"  name="dori_persona" value="persona" '. (($data['dori_persona']=="persona")?"checked='checked'":"").'>
      <label for="inputEmail4">persona</label>
	  </td><td>
      <input type="checkbox"  name="dori_espacio" value="espacio" '. (($data['dori_espacio']=="espacio")?"checked='checked'":"").'>
      <label for="inputEmail4">espacio</label>
	  </td><td>
      <input type="checkbox"  name="dori_tiempo" value="tiempo" '. (($data['dori_tiempo']=="tiempo")?"checked='checked'":"").'>
      <label for="inputEmail4">tiempo</label>
</td><td>';

print '<tr><td colspan=5>
      <b>8. AI momento de la intervencion se descartaron y el/la paciente nego pensamientos suicidad u homicidas, asi como la presencia de disturbio perceptuales : &nbsp;&nbsp;</b>
	  </td></tr>
<tr><td>
      <input type="checkbox" name="ai_si" value="si" '. (($data['ai_si']=="si")?"checked='checked'":"").'>
      <label for="inputPassword4">Si</label>
	  </td><td>
      <input type="checkbox"  name="ai_no" value="no" '. (($data['ai_no']=="no")?"checked='checked'":"").'>
      <label for="inputEmail4">No &nbsp;&nbsp;</label>
	  </td></tr>
<tr><td colspan=2>
      <b>De responder no, mencione cuales:</b>
	  </td><td colspan=3>
      '. $data['ai_de_res'].'
	  </td></tr>
<tr><td colspan=5>
      <b>9. El (o los) objetivos utilizados durante la intervencion fue (o fueron) : &nbsp;&nbsp;</b>
	  </td></tr>
	  <tr><td>
      <input type="checkbox" name="el_ori" value="ori" '. (($data['el_ori']=="ori")?"checked='checked'":"").'>
      <label for="inputPassword4">orientacion en tiempo y espacio</label>
	  </td><td>
      <input type="checkbox"  name="el_fort" value="fort" '. (($data['el_fort']=="fort")?"checked='checked'":"").'>
      <label for="inputEmail4">fortalecimiento de la memoria</label>
	  </td><td>
      <input type="checkbox"  name="el_man" value="man" '. (($data['el_man']=="man")?"checked='checked'":"").'>
      <label for="inputEmail4">manejo de soledad</label>
	  </td><td>
<input type="checkbox"  name="el_red" value="red" '. (($data['el_red']=="red")?"checked='checked'":"").'>
      <label for="inputEmail4">reducir ansiedad </label>
	  </td></tr>
	  <tr><td>
<input type="checkbox"  name="el_mej" value="mej" '. (($data['el_mej']=="mej")?"checked='checked'":"").'>
      <label for="inputEmail4">mejorar estado de animo </label>
	  </td><td>
<input type="checkbox"  name="el_ven" value="ven" '. (($data['el_ven']=="ven")?"checked='checked'":"").'>
      <label for="inputEmail4">ventilacion de sentimiento</label>
	  </td><td>
<input type="checkbox"  name="el_mande" value="mande" '. (($data['el_mande']=="mande")?"checked='checked'":"").'>
      <label for="inputEmail4">manejo de adaptacion de du ambiente o a un nuevo ambiente </label>
	  </td><td>
<input type="checkbox"  name="el_mod" value="mod" '. (($data['el_mod']=="mod")?"checked='checked'":"").'>
      <label for="inputEmail4">modificacion de conducta </label>
	  </td><td>
<input type="checkbox"  name="el_manre" value="manre" '. (($data['el_manre']=="manre")?"checked='checked'":"").'>
      <label for="inputEmail4">manejando redes de apoyo o familiares</label><input type="checkbox"  name="el_rem" value="rem" '. (($data['el_rem']=="rem")?"checked='checked'":"").'>
      <label for="inputEmail4">reminiscencia</label>
	  </td></tr>
	  <tr><td>
<input type="checkbox"  name="el_otros" value="otros" '. (($data['el_otros']=="otros")?"checked='checked'":"").'>

      <label for="inputEmail4">otros &nbsp;&nbsp;</label>
	  </td><td colspan=4>
'. $data['el_comments'].'
</td></tr>';
print '<tr><td colspan=2>
      <b>
        10. Observacion en el area mental y/o emocional:
      </b></td><td colspan=3>
      '. $data['observacion'].'
  </td></tr>
<tr><td colspan=2>
      <b>
        11. Respuesta durante y al finalizer intervencion:
      </label><br>Satisfactoria<br>
	  </td><td colspan=3>
      '.$data['satisfactoria'].'
  </td></tr>
  <tr><td colspan=2>
      <b>
        12. Recomendacion y/o comentario:
      </b>Seguimiento psicosocial mensual para fortalecimiento de memoria y refuerzo cognitivo</td><td colspan=3>
	  
      '. $data['recomendacion'].'
  </td></tr>
<tr><td>
      <b>
   Diagnosis</b></td><td colspan=3>

      '. $data['diagnosis'].'
  </td></tr>
  <tr><td colspan=5>
      <label for="inputEmail4">Tiempo de duracion de Psicoterapia fue de : &nbsp;&nbsp;</label>
      <input type="checkbox" name="tiempo_2530" value="2530" '. (($data['tiempo_2530']=="2530")?"checked='checked'":"").'>
      <label for="inputPassword4">25-30</label>
      <input type="checkbox" name="tiempo_4550" value="4550" '. (($data['tiempo_4550']=="4550")?"checked='checked'":"").'>
      <label for="inputEmail4">45 a 50 min o</label>
      '.$data['tiempo_comm'].'
      <label for="inputEmail4">min</label>
	  </td></tr>
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
	  print "</table>\n";
}
?>

