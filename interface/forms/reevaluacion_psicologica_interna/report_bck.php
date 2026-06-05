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
	print "<table><tr><td>\n";
	print '<h4 style="padding:10px;"> Historial Medico:</h4>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Hospitalizaciones previas: </label>
      <input type="checkbox" name="hosp_prev_si" value="hosp_prev_si"  '. (($data['hosp_prev_si']=="hosp_prev_si")?"checked":"").' >
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="hosp_prev_no" value="hosp_prev_no"  '. (($data['hosp_prev_no']=="hosp_prev_no")?"checked":"").' >
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
      <label for="inputEmail4">Ultima fecha:</label>
       <textarea class="form-control" rows="3" name="ultima_fecha"> '. $data['ultima_fecha'].' </textarea>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Historial de ideas Suicidas: </label>
      <input type="checkbox" name="his_sui_si" value="his_sui_si"  '. (($data['his_sui_si']=="his_sui_si")?"checked":"").' >
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="his_sui_no" value="his_sui_no"  '. (($data['his_sui_no']=="his_sui_no")?"checked":"").' >
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Historial intentos Suicidas: </label>
      <input type="checkbox" name="his_int_si" value="his_int_si"  '. (($data['his_int_si']=="his_int_si")?"checked":"").' >
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="his_int_no" value="his_int_no"  '. (($data['his_int_no']=="his_int_no")?"checked":"").' >
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Plan Estructurado: </label>
      <input type="checkbox" name="plan_est_si" value="plan_est_si"  '. (($data['plan_est_si']=="plan_est_si")?"checked":"").' >
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="plan_est_no" value="plan_est_no"  '. (($data['plan_est_no']=="plan_est_no")?"checked":"").' >
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Historial de Tx Psiquiatrico: </label>
      <input type="checkbox" name="his_psi_si" value="his_psi_si"  '. (($data['his_psi_si']=="his_psi_si")?"checked":"").' >
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="his_psi_no" value="his_psi_no"  '. (($data['his_psi_no']=="his_psi_no")?"checked":"").' >
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
      <label for="inputEmail4">Diagnostico:</label>
       <textarea class="form-control" rows="3" name="his_psi_diagnostico"> '. $data['his_psi_diagnostico'].' </textarea>
</div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Medicamento
      </label>
      <textarea class="col-md-12" rows="3" name="medicamento"> '. $data['medicamento'].' </textarea>
  </div>
<h4 style="padding: 11px;">Estado Mental: </h4>

<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Apariencia : &nbsp;&nbsp;</label>
      <input type="checkbox" name="apa_alerta" value="alerta"  '. (($data['apa_alerta'] =="alerta") ? "checked" : "").' >
      <label for="inputPassword4">Alerta </label>
      <input type="checkbox" name="apa_deshi" value="deshi"  '. (($data['apa_deshi'] == "deshi") ? "checked" :"").' >
      <label for="inputEmail4">Deshidratado </label>
      <input type="checkbox" name="apa_hidratado" value="hidratado"  '. (($data['apa_hidratado'] == "hidratado") ?"checked":"").' >
      <label for="inputPassword4">Hidratado </label>
      <input type="checkbox" name="apa_combativo" value="combativo"  '. (($data['apa_combativo']=="combativo")?"checked":"").' >
      <label for="inputPassword4">Combativo </label>
      <input type="checkbox" name="apa_malnutricion" value="malnutricion"  '. (($data['apa_malnutricion']=="malnutricion")?"checked":"").' >
      <label for="inputPassword4">Malnutricion </label>
      <input type="checkbox" name="apa_pobre_higiene" value="pobre_higiene"  '. (($data['apa_pobre_higiene']=="pobre_higiene")?"checked":"").' >
      <label for="inputPassword4">Pobre Higiene </label>
    </div>
</div>
<div class="form-group col-md-12"></div>

<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Orientacion : &nbsp;&nbsp;</label>
      <input type="checkbox" name="ori_tiempo" value="tiempo"  '. (($data['ori_tiempo'] =="tiempo") ? "checked" : "").' >
      <label for="inputPassword4">Tiempo </label>
      <input type="checkbox" name="ori_lugar" value="lugar"  '. (($data['ori_lugar'] == "lugar") ? "checked" :"").' >
      <label for="inputEmail4">Lugar </label>
      <input type="checkbox" name="ori_persona" value="persona"  '. (($data['ori_persona'] == "persona") ?"checked":"").' >
      <label for="inputPassword4">Persona </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Estado de Animo : &nbsp;&nbsp;</label>
      <input type="checkbox" name="est_normal" value="normal"  '. (($data['est_normal'] =="est_normal") ? "checked" : "").' >
      <label for="inputPassword4">Normal</label>
      <input type="checkbox" name="est_deprimido" value="deprimido"  '. (($data['est_deprimido'] == "deprimido") ? "checked" :"").' >
      <label for="inputEmail4">Deprimido </label>
      <input type="checkbox" name="est_ansioso" value="ansioso"  '. (($data['est_ansioso'] == "ansioso") ?"checked":"").' >
      <label for="inputPassword4">Ansioso </label>
      <input type="checkbox" name="est_euforico" value="euforico"  '. (($data['est_euforico']=="euforico")?"checked":"").' >
      <label for="inputPassword4">Euforico </label>
      <input type="checkbox" name="est_irritable" value="irritable"  '. (($data['est_irritable']=="irritable")?"checked":"").' >
      <label for="inputPassword4">Irritable </label>
      <input type="checkbox" name="est_molesto" value="molesto"  '. (($data['est_molesto']=="molesto")?"checked":"").' >
      <label for="inputPassword4">Molesto </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Lenguaje : &nbsp;&nbsp;</label>
      <input type="checkbox" name="len_coherente" value="coherente"  '. (($data['len_coherente'] =="coherente") ? "checked" : "").' >
      <label for="inputPassword4">Coherente </label>
      <input type="checkbox" name="len_incoherente" value="incoherente"  '. (($data['len_incoherente'] == "incoherente") ? "checked" :"").' >
      <label for="inputEmail4">InCoherente </label>
      <input type="checkbox" name="len_verbosidad" value="verbosidad"  '. (($data['len_verbosidad'] == "verbosidad") ?"checked":"").' >
      <label for="inputPassword4">Verbosidad </label>
      <input type="checkbox" name="len_reservado" value="reservado"  '. (($data['len_reservado']=="reservado")?"checked":"").' >
      <label for="inputPassword4">Reservado </label>
      <input type="checkbox" name="len_callado" value="callado"  '. (($data['len_callado']=="callado")?"checked":"").' >
      <label for="inputPassword4">Callado </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Afecto : &nbsp;&nbsp;</label>
      <input type="checkbox" name="af_apropiado_segun_animo" value="apropiado_segun_animo"  '. (($data['af_apropiado_segun_animo'] =="apropiado_segun_animo") ? "checked" : "").' >
      <label for="inputPassword4">Apropiado segun animo </label>
      <input type="checkbox" name="af_inapropiado_segun_animo" value="inapropiado_segun_animo"  '. (($data['af_inapropiado_segun_animo'] == "inapropiado_segun_animo") ? "checked" :"").' >
      <label for="inputEmail4">InApropiado segun animo</label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Procesode Pensamiento : &nbsp;&nbsp;</label>
      <input type="checkbox" name="pro_logico" value="logico"  '. (($data['pro_logico'] =="logico") ? "checked" : "").' >
      <label for="inputPassword4">Logico </label>
      <input type="checkbox" name="pro_ilogico" value="ilogico"  '. (($data['pro_ilogico'] == "ilogico") ? "checked" :"").' >
      <label for="inputEmail4">Ilogico </label>
      <input type="checkbox" name="pro_relevante" value="pro_relevante"  '. (($data['pro_relevante'] == "relevante") ?"checked":"").' >
      <label for="inputPassword4">Relevante </label>
      <input type="checkbox" name="pro_irrelevante" value="irrelevante"  '. (($data['pro_irrelevante']=="irrelevante")?"checked":"").' >
      <label for="inputPassword4">Irrelevante </label>
      <input type="checkbox" name="pro_superficial" value="superficial"  '. (($data['pro_superficial']=="superficial")?"checked":"").' >
      <label for="inputPassword4">Superficial </label>
      <input type="checkbox" name="pro_evasivo" value="evasivo"  '. (($data['pro_evasivo']=="evasivo")?"checked":"").' >
      <label for="inputPassword4">Evasivo </label>
      <input type="checkbox" name="pro_circunstancial" value="circunstancial"  '. (($data['pro_circunstancial']=="circunstancial")?"checked":"").' >
      <label for="inputPassword4">Circunstancial </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Delirios : &nbsp;&nbsp;</label>
      <input type="checkbox" name="de_ninguno" value="ninguno"  '. (($data['de_ninguno'] =="ninguno") ? "checked" : "").' >
      <label for="inputPassword4">Ninguno </label>
      <input type="checkbox" name="de_persecucion" value="persecucion"  '. (($data['de_persecucion'] == "persecucion") ? "checked" :"").' >
      <label for="inputEmail4">Persecucion </label>
      <input type="checkbox" name="de_somatico" value="somatico"  '. (($data['de_somatico'] == "somatico") ?"checked":"").' >
      <label for="inputPassword4">Somatico</label>
      <input type="checkbox" name="de_grandiosidad" value="grandiosidad"  '. (($data['de_grandiosidad']=="grandiosidad")?"checked":"").' >
      <label for="inputPassword4">Grandiosidad </label>
      <input type="checkbox" name="de_otros" value="otros"  '. (($data['de_otros']=="otros")?"checked":"").' >
      <label for="inputPassword4">Otros </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Actividad Psicomotora : &nbsp;&nbsp;</label>
      <input type="checkbox" name="act_normal" value="normal"  '. (($data['act_normal'] =="normal") ? "checked" : "").' >
      <label for="inputPassword4">Normal</label>
      <input type="checkbox" name="act_retardacion" value="retardacion"  '. (($data['act_retardacion'] == "retardacion") ? "checked" :"").' >
      <label for="inputEmail4">Retardacion</label>
      <input type="checkbox" name="act_agitacion" value="agitacion"  '. (($data['act_agitacion'] == "agitacion") ?"checked":"").' >
      <label for="inputPassword4">Agitacion </label>
      <input type="checkbox" name="act_otros" value="otros"  '. (($data['act_otros']=="otros")?"checked":"").' >
      <label for="inputPassword4">Otros </label>
    </div>
</div>
<div class="form-group col-md-12"></div>

<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Expectativas del Tratamiento
      </label>
      <textarea class="col-md-12" rows="3" name="exp_del_trat"> '. $data['exp_del_trat'].' </textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Recomendaciones:
      </label>
      <textarea class="col-md-12" rows="3" name="recomendaciones"> '. $data['recomendaciones'].' </textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Nombre de Psicologica que completa : &nbsp;&nbsp;</label>
      <input type="text" name="nombre_de_psi" value=" '. $data['nombre_de_psi'].' ">
      <label for="inputPassword4">Fecha (dia/mes/ano)</label>
      <input type="text" name="fecha" value=" '. $data['fecha'].' ">
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-row form-inline">
<div class="form-group col-md-12">
      <label for="inputEmail4">Firma e Psicologica que completa : &nbsp;&nbsp;</label>
      <input type="text" name="firma_e_psi" value=" '. $data['firma_e_psi'].' ">
      <label for="inputPassword4">Numero de Licencia</label>
      <input type="text" name="numero_de_lic" value=" '. $data['numero_de_lic'].' ">
    </div>
</div>
<div class="form-group col-md-12"></div>';
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
