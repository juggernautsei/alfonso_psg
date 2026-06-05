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
	print "<table style='font-family:helvetica'><tr><td>\n";
echo '		<div class="form-group col-md-12">
      <label for="inputEmail4">1. La modalidad de la intervencion fue : &nbsp;&nbsp;</label>
<br>
      <input type="checkbox" name="modalidad" value="individual" checked="'.(($data['mo_individual'] =="individual") ? "checked" : "").'">
      <label for="inputPassword4">Individual </label>
      <input type="checkbox" name="individual" value="con_paciente" '. (($data['mo_grupal'] == "grupal") ? "checked" :"").' readonly>
      <label for="inputEmail4">Grupal </label>
      <input type="checkbox" name="con_paciente" value="sin_paciente" '.(($data['mo_familiar'] == "familiar") ?"checked":"").' readonly>
      <label for="inputPassword4">familiar</label>
      <input type="checkbox" name="sin_paciente" value="grupal" '.(($data['mo_familiay']=="familiay")?"checked":"").' readonly>
      <label for="inputPassword4">familia y residente </label>
      <input type="checkbox" name="sin_paciente" value="grupal" '.(($data['mo_cuidador']=="cuidador")?"checked":"").' readonly>
      <label for="inputPassword4">cuidador </label>
    </div>
<div class="form-group col-md-12"></div>';
/*	print '<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Diagnostico :
      </label>
      <span >'.$data['diagnostico'].'</span>
      </div>';*/
	print '<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">2. Com se observo durante la intervencion? :  &nbsp;&nbsp;</label><br>
      <input type="checkbox" name="actitud" value="cooperador" '.(($data['com_aseado'] == "aseado")?"checked":"").' readonly>
      <label for="inputPassword4">aseado, con vestimenta apropiada</label>
      <input type="checkbox" name="cooperador" value="no_cooperador" '. (($data['com_aceptable']=="aceptable")?"checked":"").' readonly>
      <label for="inputEmail4">Aceptable para su condicion</label><br>
      <input type="checkbox" name="no_cooperador" value="hostil" '. (($data['com_pobre']=="pobre")?"checked":"").' readonly>
      <label for="inputPassword4">Pobre Higiene</label>
      <input type="checkbox" name="hostil" value="demandante" '. (($data['com_puede']=="puede")?"checked":"").' readonly>
      <label for="inputPassword4">Puede Mejorar</label>
      <input type="checkbox" name="demandante" value="reservado" '. (($data['com_otras']=="otras")?"checked":"").' readonly>
      <label for="inputPassword4">Otras</label>
 <textarea class="form-control" rows=2 name="com_comments">'.$data['com_comments'].'</textarea>
    </div>';
print '<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">3. Presento algun hematoma fisico visible : &nbsp;&nbsp;</label>
      <input type="checkbox" name="pres_si" value="si" '.(($data['pres_si']=="si")?"checked":"").'>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="pres_no" value="no" '.(($data['pres_no']=="no")?"checked":"").'>
      <label for="inputEmail4">No</label>
      <br>
      <div>(de responder si vease anejo 1.0)</div>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">4. Su alimentacion es adecuada : &nbsp;&nbsp;</label>
      <input type="checkbox" name="su_si" value="si" '.(($data['su_si']=="si")?"checked":"").'>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="su_no" value="no" '. (($data['su_no']=="no")?"checked":"").'>
      <label for="inputEmail4">No</label></div>
      <div class="col-md-12"><b><label for="inputEmail4">de responder no, especifique </label></b><br></div>
      <div class="col-md-12">'. $data['su_comments'].'</div>
<br>';

print '<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">5. Estado de animo presentado fue: </label>
      <input type="checkbox" name="es_alerta" value="alerta" '.(($data['es_alerta']=="alerta")?"checked":"").'>
      <label for="inputPassword4">alerta</label>
      <input type="checkbox" name="es_alegre" value="alegre" '. (($data['es_alegre']=="alegre")?"checked":"").'>
      <label for="inputEmail4">alegre</label>
      <input type="checkbox" name="es_tranquilo" value="tranquilo" '. (($data['es_tranquilo']=="tranquilo")?"checked":"").'>
      <label for="inputPassword4">tranquilo(a)</label>
      <input type="checkbox" name="es_ansioso" value="ansioso" '. (($data['es_ansioso']=="ansioso")?"checked":"").'>
      <label for="inputPassword4">ansioso(a)</label>
      <input type="checkbox" name="es_triste" value="triste" '. (($data['es_triste']=="triste")?"checked":"").'>
      <label for="inputPassword4">triste</label>
      <input type="checkbox" name="es_decaido" value="decaido" '. (($data['es_decaido']=="decaido")?"checked":"").'>
      <label for="inputPassword4">decaido</label><br>
      <input type="checkbox" name="es_irritable" value="irritable" '. (($data['es_irritable']=="irritable")?"checked":"").'>
      <label for="inputPassword4">irritable</label>
      <input type="checkbox" name="es_agitado" value="agitado" '. (($data['es_agitado']=="agitado")?"checked":"").'>
      <label for="inputPassword4">agitado</label>
      <input type="checkbox" name="es_deprimido" value="deprimido" '. (($data['es_deprimido']=="deprimido")?"checked":"").'>
      <label for="inputPassword4">deprimido</label>
      <input type="checkbox" name="es_na" value="na" '. (($data['es_na']=="na")?"checked":"") .'>
      <label for="inputPassword4">NA</label>
    </div>';

print '<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">6. A nivel cognitivo se encontraba : &nbsp;&nbsp;</label>
      <input type="checkbox" name="ni_na" value="na" '. (($data['ni_na']=="na")?"checked":"").'>
      <label for="inputPassword4">NA &nbsp;&nbsp;</label>
      <label for="inputEmail4">Orientado en: </label>
      <input type="checkbox"  name="ori_persona" value="persona" '. (($data['ori_persona']=="persona")?"checked":"").'>
      <label for="inputEmail4">persona</label>
      <input type="checkbox"  name="ori_espacio" value="espacio" '. (($data['ori_espacio']=="espacio")?"checked":"").'>
      <label for="inputEmail4">espacio</label>
      <input type="checkbox"  name="ori_tiempo" value="tiempo" '. (($data['ori_tiempo']=="tiempo")?"checked":"").'>
      <label for="inputEmail4">tiempo &nbsp;&nbsp;</label><br>
      <label for="inputEmail4">Desorientado en: </label>
      <input type="checkbox"  name="dori_persona" value="persona" '. (($data['dori_persona']=="persona")?"checked":"").'>
      <label for="inputEmail4">persona</label>
      <input type="checkbox"  name="dori_espacio" value="espacio" '. (($data['dori_espacio']=="espacio")?"checked":"").'>
      <label for="inputEmail4">espacio</label>
      <input type="checkbox"  name="dori_tiempo" value="tiempo" '. (($data['dori_tiempo']=="tiempo")?"checked":"").'>
      <label for="inputEmail4">tiempo</label>
</div>
<div class="form-group col-md-12"></div>';

print '<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">8. AI momento de la intervencion se descartaron y el/la paciente nego pensamientos suicidad u homicidas, asi como la presencia de disturbio perceptuales : &nbsp;&nbsp;</label>
      <input type="checkbox" name="ai_si" value="si" '. (($data['ai_si']=="si")?"checked":"").'>
      <label for="inputPassword4">Si</label>
      <input type="checkbox"  name="ai_no" value="no" '. (($data['ai_no']=="no")?"checked":"").'>
      <label for="inputEmail4">No &nbsp;&nbsp;</label></div>
      <label for="inputEmail4">De responder no, mencione cuales:</label>
      <textarea class="col-md-12" rows="3" name="ai_de_res">'. $data['ai_de_res'].'</textarea>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">9. El (o los) objetivos utilizados durante la intervencion fue (o fueron) : &nbsp;&nbsp;</label>
      <input type="checkbox" name="el_ori" value="ori" '. (($data['el_ori']=="ori")?"checked":"").'>
      <label for="inputPassword4">orientacion en tiempo y espacio</label>
      <input type="checkbox"  name="el_fort" value="fort" '. (($data['el_fort']=="fort")?"checked":"").'>
      <label for="inputEmail4">fortalecimiento de la memoria</label><br>
      <input type="checkbox"  name="el_man" value="man" '. (($data['el_man']=="man")?"checked":"").'>
      <label for="inputEmail4">manejo de soledad</label>
<input type="checkbox"  name="el_red" value="red" '. (($data['el_red']=="red")?"checked":"").'>
      <label for="inputEmail4">reducir ansiedad </label>
<input type="checkbox"  name="el_mej" value="mej" '. (($data['el_mej']=="mej")?"checked":"").'>
      <label for="inputEmail4">mejorar estado de animo </label>
<input type="checkbox"  name="el_ven" value="ven" '. (($data['el_ven']=="ven")?"checked":"").'>
      <label for="inputEmail4">ventilacion de sentimiento</label><br>
<input type="checkbox"  name="el_mande" value="mande" '. (($data['el_mande']=="mande")?"checked":"").'>
      <label for="inputEmail4">manejo de adaptacion de du ambiente o a un nuevo ambiente </label>
<input type="checkbox"  name="el_mod" value="mod" '. (($data['el_mod']=="mod")?"checked":"").'>
      <label for="inputEmail4">modificacion de conducta </label><br>
<input type="checkbox"  name="el_manre" value="manre" '. (($data['el_manre']=="manre")?"checked":"").'>
      <label for="inputEmail4">manejando redes de apoyo o familiares</label><input type="checkbox"  name="el_rem" value="rem" '. (($data['el_rem']=="rem")?"checked":"").'>
      <label for="inputEmail4">reminiscencia</label>
<input type="checkbox"  name="el_otros" value="otros" '. (($data['el_otros']=="otros")?"checked":"").'>
      <label for="inputEmail4">otros &nbsp;&nbsp;</label>
<textarea class="col-md-12" rows="3" name="el_comments">'. $data['el_comments'].'</textarea>
</div>
<div class="form-group col-md-12"></div>';
print '<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
        10. Observacion en el area mental y/o emocional:
      </label>
      <textarea class="col-md-12" rows="3" name="observacion">'. $data['observacion'].'</textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
        11. Respuesta durante y al finalizer intervencion:
      </label><br>Satisfactoria<br>
      <textarea class="col-md-12" rows="3" name="satisfactoria">'.$data['satisfactoria'].'</textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
        12. Recomendacion y/o comentario:
      </label><br>Seguimiento psicosocial mensual para fortalecimiento de memoria y refuerzo cognitivo<br>
      <textarea class="col-md-12" rows="3" name="recomendacion">'. $data['recomendacion'].'</textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Tiempo de duracion de Psicoterapia fue de : &nbsp;&nbsp;</label>
      <input type="checkbox" name="tiempo_2530" value="2530" '. (($data['tiempo_2530']=="2530")?"checked":"").'>
      <label for="inputPassword4">25-30</label>
      <input type="checkbox" name="tiempo_4550" value="4550" '. (($data['tiempo_4550']=="4550")?"checked":"").'>
      <label for="inputEmail4">45 a 50 min o</label>
      <textarea class="" rows="3" name="tiempo_comm">'.$data['tiempo_comm'].'</textarea>
      <label for="inputEmail4">min</label>
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
	  print "</td></tr></table>\n";
}
?>
