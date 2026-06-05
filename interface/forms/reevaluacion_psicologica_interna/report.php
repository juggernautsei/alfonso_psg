<?php
require_once(dirname(__file__)."/../../globals.php");

function reevaluacion_psicologica_interna_report($pid, $encounter, $cols, $id)
{
	$data = sqlQuery("select * from form_reevaluacion_psicologica_interna where pid=? and id=?", array($pid,$id));
//	$data1 = sqlStatement("select * from psychiatric_medicamento where form_id=?",$id);
  //      $drugs_code = [];
    //    while($row=sqlFetchArray($data1)){
//array_push($drugs_code,$row);
	//      }
	print "<style>input[type='checkbox'][readonly] {
  pointer-events: none;
}</style>";
	print "<table><tr><td><b>Fecha de Servicio:</b></td><td>".attr(oeFormatShortDate(substr($data['date_service'], 0, 10)))."</td></tr><tr><td>\n";
	  print '<tr><td>Start Time: </td><td>'.$data['start_time'].'</td></tr><tr><td>End Time: </td><td>'.$data['end_time'].'</td></tr>';

	print '<h4 style="padding:10px;"> Historial Medico:</h4>
	<br><br></td></tr>
<tr><td>
      <b>Hospitalizaciones previas: </b>
	  </td><td>
      <input type="checkbox" name="hosp_prev_si" value="hosp_prev_si"  '. (($data['hosp_prev_si']=="hosp_prev_si")?"checked='checked'":"").' >
      <label for="inputPassword4">Si</label>
	  </td><td>
      <input type="checkbox" name="hosp_prev_no" value="hosp_prev_no"  '. (($data['hosp_prev_no']=="hosp_prev_no")?"checked='checked'":"").' >
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
	  </td></tr>
	 <tr><td> 
      <b>Ultima fecha:</b>
	  </td><td>
       '. $data['ultima_fecha'].'
</td></tr>
<tr><td>
      <b>Historial de ideas Suicidas: </b>
	  </td><td>
      <input type="checkbox" name="his_sui_si" value="his_sui_si"  '. (($data['his_sui_si']=="his_sui_si")?"checked='checked'":"").' >
      <label for="inputPassword4">Si</label>
	  </td><td>
      <input type="checkbox" name="his_sui_no" value="his_sui_no"  '. (($data['his_sui_no']=="his_sui_no")?"checked='checked'":"").' >
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
</td></tr>
<tr><td>
      <b>Historial intentos Suicidas: </b>
	  </td><td>
      <input type="checkbox" name="his_int_si" value="his_int_si"  '. (($data['his_int_si']=="his_int_si")?"checked='checked'":"").' >
      <label for="inputPassword4">Si</label>
	  </td><td>
      <input type="checkbox" name="his_int_no" value="his_int_no"  '. (($data['his_int_no']=="his_int_no")?"checked='checked'":"").' >
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
	  </td><td>
</td></tr>
<tr><td>
      <b>Plan Estructurado: </b>
	  </td><td>
      <input type="checkbox" name="plan_est_si" value="plan_est_si"  '. (($data['plan_est_si']=="plan_est_si")?"checked='checked'":"").' >
      <label for="inputPassword4">Si</label>
	  </td><td>
      <input type="checkbox" name="plan_est_no" value="plan_est_no"  '. (($data['plan_est_no']=="plan_est_no")?"checked='checked'":"").' >
      <label for="inputEmail4">No</label>
	  </td><td>
</td></tr>
<tr><td>
      <b>Historial de Tx Psiquiatrico: </b>
	  </td><td>
      <input type="checkbox" name="his_psi_si" value="his_psi_si"  '. (($data['his_psi_si']=="his_psi_si")?"checked='checked'":"").' >
      <label for="inputPassword4">Si</label>
	  </td><td>
      <input type="checkbox" name="his_psi_no" value="his_psi_no"  '. (($data['his_psi_no']=="his_psi_no")?"checked='checked'":"").' >
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
	  </td></tr>
<tr><td>
      <b>Diagnostico:</b>
	  </td><td>
       '. $data['his_psi_diagnostico'].'
</td></tr>
<tr><td>
      <b>
       Medicamento
      </b>
	  </td><td>
      '. $data['medicamento'].'
  </td></tr>
<tr><td>
<br><br>
<h4 style="padding: 11px;">Estado Mental: </h4>
<br><br>
</td></tr>
<tr><td>
      <b>Apariencia :</b>
</td></tr>
<tr><td>
      <input type="checkbox" name="apa_alerta" value="alerta"  '. (($data['apa_alerta'] =="alerta") ? "checked='checked'" : "").' >
      <label for="inputPassword4">Alerta </label>
	  </td><td>
      <input type="checkbox" name="apa_deshi" value="deshi"  '. (($data['apa_deshi'] == "deshi") ? "checked='checked'" :"").' >
      <label for="inputEmail4">Deshidratado </label>
	  </td><td>
      <input type="checkbox" name="apa_hidratado" value="hidratado"  '. (($data['apa_hidratado'] == "hidratado") ?"checked='checked'":"").' >
      <label for="inputPassword4">Hidratado </label>
	 </td></tr>
<tr><td>
      <input type="checkbox" name="apa_combativo" value="combativo"  '. (($data['apa_combativo']=="combativo")?"checked='checked'":"").' >
      <label for="inputPassword4">Combativo </label>
	  </td><td>
      <input type="checkbox" name="apa_malnutricion" value="malnutricion"  '. (($data['apa_malnutricion']=="malnutricion")?"checked='checked'":"").' >
      <label for="inputPassword4">Malnutricion </label>
	  </td><td>
      <input type="checkbox" name="apa_pobre_higiene" value="pobre_higiene"  '. (($data['apa_pobre_higiene']=="pobre_higiene")?"checked='checked'":"").' >
      <label for="inputPassword4">Pobre Higiene </label>
	  </td></tr>
<tr><td>
      <b>Orientacion :</b>
</td></tr>
<tr><td>
      <input type="checkbox" name="ori_tiempo" value="tiempo"  '. (($data['ori_tiempo'] =="tiempo") ? "checked='checked'" : "").' >
      <label for="inputPassword4">Tiempo </label>
	  </td><td>
      <input type="checkbox" name="ori_lugar" value="lugar"  '. (($data['ori_lugar'] == "lugar") ? "checked='checked'" :"").' >
      <label for="inputEmail4">Lugar </label>
	  </td><td>
      <input type="checkbox" name="ori_persona" value="persona"  '. (($data['ori_persona'] == "persona") ?"checked='checked'":"").' >
      <label for="inputPassword4">Persona </label>
    </td></tr>
<tr><td>
      <b>Estado de Animo : </b>
</td></tr>
<tr><td>
      <input type="checkbox" name="est_normal" value="normal"  '. (($data['est_normal'] =="est_normal") ? "checked='checked'" : "").' >
      <label for="inputPassword4">Normal</label>
	  </td><td>
      <input type="checkbox" name="est_deprimido" value="deprimido"  '. (($data['est_deprimido'] == "deprimido") ? "checked='checked'" :"").' >
      <label for="inputEmail4">Deprimido </label>
	  </td><td>
      <input type="checkbox" name="est_ansioso" value="ansioso"  '. (($data['est_ansioso'] == "ansioso") ?"checked='checked'":"").' >
      <label for="inputPassword4">Ansioso </label>
	  </td></tr>
<tr><td>
      <input type="checkbox" name="est_euforico" value="euforico"  '. (($data['est_euforico']=="euforico")?"checked='checked'":"").' >
      <label for="inputPassword4">Euforico </label>
	  </td><td>
      <input type="checkbox" name="est_irritable" value="irritable"  '. (($data['est_irritable']=="irritable")?"checked='checked'":"").' >
      <label for="inputPassword4">Irritable </label>
	  </td><td>
      <input type="checkbox" name="est_molesto" value="molesto"  '. (($data['est_molesto']=="molesto")?"checked='checked'":"").' >
      <label for="inputPassword4">Molesto </label>
    </td></tr>
<tr><td>
      <b>Lenguaje : </b>
</td></tr>
<tr><td>
      <input type="checkbox" name="len_coherente" value="coherente"  '. (($data['len_coherente'] =="coherente") ? "checked='checked'" : "").' >
      <label for="inputPassword4">Coherente </label>
	  </td><td>
      <input type="checkbox" name="len_incoherente" value="incoherente"  '. (($data['len_incoherente'] == "incoherente") ? "checked='checked'" :"").' >
      <label for="inputEmail4">InCoherente </label>
	  </td><td>
      <input type="checkbox" name="len_verbosidad" value="verbosidad"  '. (($data['len_verbosidad'] == "verbosidad") ?"checked='checked'":"").' >
      <label for="inputPassword4">Verbosidad </label>
	  </td></tr>
<tr><td>
      <input type="checkbox" name="len_reservado" value="reservado"  '. (($data['len_reservado']=="reservado")?"checked='checked'":"").' >
      <label for="inputPassword4">Reservado </label>
	  </td><td>
      <input type="checkbox" name="len_callado" value="callado"  '. (($data['len_callado']=="callado")?"checked='checked'":"").' >
      <label for="inputPassword4">Callado </label>
    </td></tr>
<tr><td>
      <b>Afecto : </b>
	  </td><td>
      <input type="checkbox" name="af_apropiado_segun_animo" value="apropiado_segun_animo"  '. (($data['af_apropiado_segun_animo'] =="apropiado_segun_animo") ? "checked='checked'" : "").' >
      <label for="inputPassword4">Apropiado segun animo </label>
	  </td><td>
      <input type="checkbox" name="af_inapropiado_segun_animo" value="inapropiado_segun_animo"  '. (($data['af_inapropiado_segun_animo'] == "inapropiado_segun_animo") ? "checked='checked'" :"").' >
      <label for="inputEmail4">InApropiado segun animo</label>
    </td></tr>
<tr><td>
      <b>Procesode Pensamiento : </b>
</td></tr>
<tr><td>
      <input type="checkbox" name="pro_logico" value="logico"  '. (($data['pro_logico'] =="logico") ? "checked='checked'" : "").' >
      <label for="inputPassword4">Logico </label>
	  </td><td>
      <input type="checkbox" name="pro_ilogico" value="ilogico"  '. (($data['pro_ilogico'] == "ilogico") ? "checked='checked'" :"").' >
      <label for="inputEmail4">Ilogico </label>
	  </td><td>
      <input type="checkbox" name="pro_relevante" value="pro_relevante"  '. (($data['pro_relevante'] == "relevante") ?"checked='checked'":"").' >
      <label for="inputPassword4">Relevante </label>
	   </td></tr>
<tr><td>
      <input type="checkbox" name="pro_irrelevante" value="irrelevante"  '. (($data['pro_irrelevante']=="irrelevante")?"checked='checked'":"").' >
      <label for="inputPassword4">Irrelevante </label>
	  </td><td>
      <input type="checkbox" name="pro_superficial" value="superficial"  '. (($data['pro_superficial']=="superficial")?"checked='checked'":"").' >
      <label for="inputPassword4">Superficial </label>
	  </td><td>
      <input type="checkbox" name="pro_evasivo" value="evasivo"  '. (($data['pro_evasivo']=="evasivo")?"checked='checked'":"").' >
      <label for="inputPassword4">Evasivo </label>
	   </td></tr>
<tr><td>
      <input type="checkbox" name="pro_circunstancial" value="circunstancial"  '. (($data['pro_circunstancial']=="circunstancial")?"checked='checked'":"").' >
      <label for="inputPassword4">Circunstancial </label>
     </td></tr>
<tr><td>
      <b>Delirios : </b>
</td></tr>
<tr><td>
      <input type="checkbox" name="de_ninguno" value="ninguno"  '. (($data['de_ninguno'] =="ninguno") ? "checked='checked'" : "").' >
      <label for="inputPassword4">Ninguno </label>
	  </td><td>
      <input type="checkbox" name="de_persecucion" value="persecucion"  '. (($data['de_persecucion'] == "persecucion") ? "checked='checked'" :"").' >
      <label for="inputEmail4">Persecucion </label>
	  </td><td>
      <input type="checkbox" name="de_somatico" value="somatico"  '. (($data['de_somatico'] == "somatico") ?"checked='checked'":"").' >
      <label for="inputPassword4">Somatico</label>
	  </td></tr>
<tr><td>
      <input type="checkbox" name="de_grandiosidad" value="grandiosidad"  '. (($data['de_grandiosidad']=="grandiosidad")?"checked='checked'":"").' >
      <label for="inputPassword4">Grandiosidad </label>
	  </td><td>
      <input type="checkbox" name="de_otros" value="otros"  '. (($data['de_otros']=="otros")?"checked='checked'":"").' >
      <label for="inputPassword4">Otros </label>
     </td></tr>
<tr><td>
      <b>Actividad Psicomotora : </b>
</td></tr>
<tr><td>
      <input type="checkbox" name="act_normal" value="normal"  '. (($data['act_normal'] =="normal") ? "checked='checked'" : "").' >
      <label for="inputPassword4">Normal</label>
	  </td><td>
      <input type="checkbox" name="act_retardacion" value="retardacion"  '. (($data['act_retardacion'] == "retardacion") ? "checked='checked'" :"").' >
      <label for="inputEmail4">Retardacion</label>
	  </td><td>
      <input type="checkbox" name="act_agitacion" value="agitacion"  '. (($data['act_agitacion'] == "agitacion") ?"checked='checked'":"").' >
      <label for="inputPassword4">Agitacion </label>
	  </td></tr>
<tr><td>
      <input type="checkbox" name="act_otros" value="otros"  '. (($data['act_otros']=="otros")?"checked='checked'":"").' >
      <label for="inputPassword4">Otros </label>
     </td></tr>
<tr><td>
      <b>
       Diagnosis
      </b>
          </td><td>
'. $data['diagnosis'].'
   </td></tr>
<tr><td>
      <b>
       Expectativas del Tratamiento
      </b>
	  </td><td>
'. $data['exp_del_trat'].'
   </td></tr>
<tr><td>
      <b>
       Recomendaciones:
      </b>
	  </td><td>
      '. $data['recomendaciones'].'
   </td></tr>
<tr><td>
      <b>Nombre de Psicologica que completa : </b>
	  </td><td>
      '. $data['nombre_de_psi'].'
	  </td><td>
      <b>Fecha (dia/mes/ano)</b>
	  </td><td>
       '. $data['fecha'].'
   </td></tr>
<tr><td>
      <b>Firma e Psicologica que completa :</b>
	  </td><td>
      '. $data['firma_e_psi'].'
	  </td><td>
      <b>Numero de Licencia</b>
	  </td><td>
      '. $data['numero_de_lic'];
	/*
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
    </div>';*/
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

