<?php
require_once(dirname(__file__)."/../../globals.php");

function evaluacion_inicial_psicologica_report($pid, $encounter, $cols, $id)
{
	$data = sqlQuery("select * from form_evaluacion_inicial_psicologica where pid=? and id=?", array($pid,$id));
//	$data1 = sqlStatement("select * from psychiatric_medicamento where form_id=?",$id);
  //      $drugs_code = [];
    //    while($row=sqlFetchArray($data1)){
//array_push($drugs_code,$row);
	//      }
	print "<style>input[type='checkbox'][readonly] {
  pointer-events: none;
}</style>";
	print '
<table>
<tr><td><b>Fecha de Servicio:</b></td><td>'.attr(oeFormatShortDate(substr($data['date_service'], 0, 10))).'</td></tr>';
 print '<tr><td>Start Time: &emsp;'.$data['start_time'].'</td></tr><tr><td>End Time: &emsp;'.$data['end_time'].'</td></tr>';

print '<tr><td><h3>Datos Demograficos</h3></td></tr>';
//	print "<table><tr><td>\n";
	print '
<tr>
                                    <td>    <b>Matrimonios anteriores:</b></td>
				       <td>'. $data['anteriores'].'</td></tr>
                                        <tr> <td><b>Hijos / as:</b></td>
                                            <td>'. $data['hijos_as'].'</td></tr>
                            <tr><td>
                                        <b>Edades:</b></td><td>
                                            '. $data['edades'].'
                                        </td></tr>
                                    
                                <tr><td>
                                        <b>Escolarided del cliente</b>
                                        </td><td>
                                            '. $data['cliente'].'
                                        </td></tr>
                            <tr><td>
                                        <b>Lugar de Trabajo: </b>
                                        </td><td>
                                            '. $data['lugar_trabojo'].'
                                        </td></tr>
                                <tr><td>
                                        <b>Ocupacion: </b>
                                        </td><td>
                                            '. $data['ocupacion'].'
                                       </td></tr>
                                <tr><td>
                                        <b>Anos en el empleo actual: </b>
                                        </td><td>
                                            '. $data['anos_actual'].'
                                       </td></tr>
                            <tr><td>
                                        <b>Experiencia militar: </b>
                                        </td><td>
					'. $data['militar'].'</td><td>

											Presente </td><td>'. $data['militar1'].' </td><td>Pasada </td><td>'. $data['militar2'].' </td><td>N/A
                                        </td></tr><br><br><tr></tr>
		    <tr><td><h3>Asunto Presentado: </h3></td></tr>
                    
                        <tr><td>
                                    <b>ASUNTO PRESENTADO:</b>
                                    </td><td>
                                        '. $data['presentado'].'
                                    </td></tr>
                            <tr><td>
                                    <b>Desde cuando? </b>
                                    </td><td>
                                        '. $data['desde_cuando'].'
										</td></tr>
                                    
									<tr><td>
                                    <b>Evento precipitante: </b>
                                    </td><td>
                                        '. $data['evento_precipitante'].'
				    </td></tr>
                            <tr><td>
							
                                    <b>Como le afecta su funcionamiento habitual (sintomas / conducta)</b>
									</td></tr>
                                    <tr><td>
                                            <b>Personalmente:</b>
                                        </td><td>
                                            '. $data['personalmente_como'].'(Ej, estado emocional, sintomas, salud)
                                        </td></tr>
                                    <tr><td>
                                            <b>Ocupacionalmente:</b>
                                        </td><td>
                                            '. $data['ocupacionalmente'].'(Ej, pobre ejacutoria, ausencias)
                                        </td></tr>
                                    <tr><td>
                                            <b>Socialmente:</b>
                                        </td><td>
                                            '. $data['socialmente'].'(Ej, conflictos interpersonales, aislamiento)
                                        </td></tr>
                            <tr><td>
                                    <b>Tratamiento previo: </b>
									</td><td>
                                    
                                            
                                                <input type="checkbox" class="form-check-input" name="trat_si" value="si"  '. (($data['trat_si']=='si')?'checked="checked"':'').' > SI
                                            
                                                <input type="checkbox" class="form-check-input" name="trat_no" value="no"  '. (($data['trat_no']=='no')?'checked="checked"':'').' > NO
                                            
                                        </td></tr>
                                    <tr><td>
                                            <b>Psicologico:</b>
											</td></tr>
                                        <tr><td>
                                            Lugar </td><td> '. $data['lugar'].'
											</td></tr><tr><td>
											Cuando </td><td>'. $data['cuando_psi'].'
											
											</td></tr><tr><td>Dx: </td><td>'. $data['dx'].'
                                        </td></tr>
									<tr><td>
                                            <b>Psiquiatrico:</b>
                                        </td></tr>
										<tr><td>
                                            Lugar</td><td> '. $data['lugar_1'].'
											</td></tr><tr><td>
											Cuando </td><td>'. $data['cuado_1'].'
											</td></tr><tr><td>
											Medicamentos: </td><td>'. $data['medi'].'
                                       </td></tr>
                                    <tr><td>
                                            <b>Sustancias: </b>
                                        </td></tr>
										<tr><td>
                                            Lugar </td><td>'. $data['lugar_2'].'
											</td></tr><tr><td>
											Cuando </td><td>'. $data['cuado_2'].'
											</td></tr><tr><td>
											Alcohol: </td><td>'. $data['alcohol'].'
											</td></tr><tr><td>
											Drogas: </td><td>'. $data['drogas'].' 
                                        </td></tr>
                                    <tr><td>
                                            <b>Hospitaliationes psiquiatricas: </b>
                                        </td></tr>
                                        <tr><td>
                                            Lugar
											</td><td>
											'. $data['lugar_3'].'
                                        </td></tr><tr><td>
                                            Cuando
											</td><td>											
											'. $data['cuando'].'
											</td></tr><tr><td>Cuantas </td><td>'. $data['cuantas'].' 
											</td></tr><tr><td>Parcial: </td><td>'. $data['parcial'].' 
											</td></tr><tr><td>Regular: </td><td>'. $data['regular'].'
                                        </td></tr>
                                   <tr><td>
                                            <b>Historial Familiar: </b>
                                        </td><td>
                                                    <input type="checkbox" class="form-check-input" name="hist_si" value="si"  '. (($data['hist_si'] == "si") ? "checked='checked'":"").' > SI
                                               
                                                    <input type="checkbox" class="form-check-input" name="hist_no" value="no"  '. (($data['hist_no'] == "no") ? "checked='checked'":"").' > NO
													</td></tr>
                                        <tr><td>
                                            Relacion Fam: </td><td>'. $data['relacion'].'
											</td></tr>
                                        <tr><td>
                                            Dx: </td><td>'. $data['dx_1'].'
											</td></tr>
                                        
                            <tr><td>
                                    <b>Historial Medico y Condiciones Fisicas: </b>
                                    </td><td>
                                        '. $data['hist_medi'].'
                                    </td></tr>
                            <tr><td>
                                    <b>Medicamentos al presente: </b>
                                    </td><td>
                                        '. $data['medi_presenta'].'
                                    </td></tr>
                            <tr><td>
                                    <b>Historial Psicosocial Relevante (Logros, perdidas, traumas y sistema de apoyo): </b>
                                    </td><td>
                                        '. $data['medi_presente_area'].'
                                    </td></tr>
                            <tr><td>
                                    <b>Aspectos Legales: </b>
                                    </td><td>
                                          '. $data['aspectos_legal'].' 
                                    </td></tr>
                            <tr><td>
                                    <b>Situacion financieras: </b>
                                    </td><td>
                                        '. $data['situacion_finance'].' 
                                    </td></tr>
                            <tr><td>
                                    <b>Consumo de Alcohol: </b>
                                    </td><td>
                                         '. $data['consumo_alcohol'].' 
                                    </td></tr>
                            <tr><td>
                                    <b>Consumo de Sustancias Controladas: </b>
                                    </td><td>
                                        '. $data['controladas'].'
				    </td></tr>
<br><tr></tr>
                            <tr><td><h3>Evaluacion De Riesgo (basada en informacion disponible): </h3></td></tr>
                    <tr><td>
                                    <b>Evaluaction de Riesgo</b>
                                    </td></tr>
                                                <tr>
                                                    <td>Suicidio</td><td>
                                                    <input type="checkbox" class="form-check-input" name="suicido_1" value="1"  '. (($data['suicido_1']=='1')?"checked='checked'":"").' >1
                                                    <input type="checkbox" class="form-check-input" name="suicido_2" value="2"  '. (($data['suicido_2']=='2')?"checked='checked'":"").' > 2
                                                    <input type="checkbox" class="form-check-input" name="suicido_3" value="3"  '. (($data['suicido_3']=='3')?"checked='checked'":"").' > 3
                                                    <input type="checkbox" class="form-check-input" name="suicido_4" value="4"  '. (($data['suicido_4']=='4')?"checked='checked'":"").' > 4
                                                    <input type="checkbox" class="form-check-input" name="suicido_5" value="5"  '. (($data['suicido_5']=='5')?"checked='checked'":"").' > 5
                                                </td></tr>
                                                <tr>
                                                    <td>Homicidio</td><td>
                                                    <input type="checkbox" class="form-check-input" name="homo_1" value="1"  '. (($data['homo_1']=='1')?"checked='checked'":"").' >1
                                                    <input type="checkbox" class="form-check-input" name="homo_2" value="2"  '. (($data['homo_2']=='2')?"checked='checked'":"").' > 2
                                                    <input type="checkbox" class="form-check-input" name="homo_3" value="3"  '. (($data['homo_3']=='3')?"checked='checked'":"").' > 3
                                                    <input type="checkbox" class="form-check-input" name="homo_4" value="4"  '. (($data['homo_4']=='4')?"checked='checked'":"").' > 4
                                                    <input type="checkbox" class="form-check-input" name="homo_5" value="5"  '. (($data['homo_5']=='5')?"checked='checked'":"").' > 5</td>
                                                </td></tr>
                                                <tr>
                                                    <td>Violencia domestica / familiar</td>
                                                    <td><input type="checkbox" class="form-check-input" name="violencia_1" value="1"  '. (($data['violencia_1']=='1')?"checked='checked'":"").' >1
                                                    <input type="checkbox" class="form-check-input" name="violencia_2" value="2"  '. (($data['violencia_2']=='2')?"checked='checked'":"").' > 2
                                                    <input type="checkbox" class="form-check-input" name="violencia_3" value="3"  '. (($data['violencia_3']=='3')?"checked='checked'":"").' > 3
                                                    <input type="checkbox" class="form-check-input" name="violencia_4" value="4"  '. (($data['violencia_4']=='4')?"checked='checked'":"").' > 4
                                                    <input type="checkbox" class="form-check-input" name="violencia_5" value="5"  '. (($data['violencia_5']=='5')?"checked='checked'":"").' > 5</td>
                                                </tr>
                                                <tr>
                                                    <td>Violencia en el trabajo</td>
                                                    <td><input type="checkbox" class="form-check-input" name="tra_1" value="1"  '. (($data['tra_1']=='1')?"checked='checked'":"").' >1
                                                    <input type="checkbox" class="form-check-input" name="tra_2" value="2"  '. (($data['tra_2']=='2')?"checked='checked'":"").' > 2
                                                    <input type="checkbox" class="form-check-input" name="tra_3" value="3"  '. (($data['tra_3']=='3')?"checked='checked'":"").' > 3
                                                    <input type="checkbox" class="form-check-input" name="tra_4" value="4"  '. (($data['tra_4']=='4')?"checked='checked'":"").' > 4
                                                    <input type="checkbox" class="form-check-input" name="tra_5" value="5"  '. (($data['tra_5']=='5')?"checked='checked'":"").' > 5</td>
                                                </tr>
                                                <tr>
                                                    <td>Maltrato (ninos / envejecientes)</td>
                                                    <td><input type="checkbox" class="form-check-input" name="maltrato_1" value="1"  '. (($data['maltrato_1']=='1')?"checked='checked'":"").' >1
                                                    <input type="checkbox" class="form-check-input" name="maltrato_2" value="2"  '. (($data['maltrato_2']=='2')?"checked='checked'":"").' > 2
                                                    <input type="checkbox" class="form-check-input" name="maltrato_3" value="3"  '. (($data['maltrato_3']=='3')?"checked='checked'":"").' > 3
                                                    <input type="checkbox" class="form-check-input" name="maltrato_4" value="4"  '. (($data['maltrato_4']=='4')?"checked='checked'":"").' > 4
                                                    <input type="checkbox" class="form-check-input" name="maltrato_5" value="5"  '. (($data['maltrato_5']=='5')?"checked='checked'":"").' > 5</td>
                                                </tr>
                                                <tr>
                                                    <td>Psicosis (alucinaciones / delirios)</td>
                                                    <td><input type="checkbox" class="form-check-input" name="psicosis_1" value="1"  '. (($data['psicosis_1']=='1')?"checked='checked'":"").' >1
                                                    <input type="checkbox" class="form-check-input" name="psicosis_2" value="2"  '. (($data['psicosis_2']=='2')?"checked='checked'":"").' > 2
                                                    <input type="checkbox" class="form-check-input" name="psicosis_3" value="3"  '. (($data['psicosis_3']=='3')?"checked='checked'":"").' > 3
                                                    <input type="checkbox" class="form-check-input" name="psicosis_4" value="4"  '. (($data['psicosis_4']=='4')?"checked='checked'":"").' > 4
                                                    <input type="checkbox" class="form-check-input" name="psicosis_5" value="5"  '. (($data['psicosis_5']=='5')?"checked='checked'":"").' > 5</td>
                                                </tr>
                                            
                            <tr><td>
                                    <b>Escala para evaluar riesgo: </b>
									</td></tr>
                                    <tr><td>
                                            <input type="checkbox" class="form-check-input" name="evaluado" value="evaluado"  '. (($data['evaluado']=='evaluado')?"checked='checked'":"").' > Evaluado, no hay indicadores de riesgo
                                        </td></tr>
                                    <tr><td>
                                            <input type="checkbox" class="form-check-input" name="verbaliza" value="verbaliza"  '. (($data['verbaliza']=='verbaliza')?"checked='checked'":"").' > Verbaliza amenaza, no hay peligro actual
                                        </td></tr>
                                    <tr><td>
                                            <input type="checkbox" class="form-check-input" name="hace" value="hace"  '. (($data['hace']=='hace')?"checked='checked'":"").' > Hace, amenaza existe posibilidad de violencia
                                        </td></tr>
                                    <tr><td>
                                            <input type="checkbox" class="form-check-input" name="existe" value="existe"  '. (($data['existe']=='existe')?"checked='checked'":"").' > Existe amenaza real de violencia (planificacion)
                                        </td></tr>
                                    <tr><td>
                                            <input type="checkbox" class="form-check-input" name="el_cliente" value="el_cliente"  '. (($data['el_cliente']=='el_cliente')?"checked='checked'":"").' > El cliente es peligroso para el u otros
					</td></tr>
<br><tr></tr>
                                    <tr><td><h3>Impresion Diagnostica: </h3></td></tr>
                    <tr><td>
                                    <b>Impresion Diagnostica</b>
                                    </td><td>
                                            '. $data['imp_dia'].'
                                        </td></tr>
<tr><td><h3>Plan De Tratamiento: </h3></td></tr>
                    <tr><td>
                                    <b>Plan De Tratamiento</b></td></tr>
                                                <tr>
                                                    <td><b>Problema / Sintomas</b></td>
                                                    <td><b>Objectivo</b></td>
                                                    <td><b>Estrategia Terapeutica</b></td>
                                                </tr>
                                                <tr>
                                                    <td><textarea class="form-control" name="plm_row1" rows="5" cols="10"> '. $data['plm_row1'].' </textarea></td>
                                                    <td><textarea class="form-control" name="obg_row1" rows="5" cols="10"> '. $data['obg_row1'].' </textarea></td>
                                                    <td><textarea class="form-control" name="estrategia_row1" rows="5" cols="10"> '. $data['estrategia_row1'].' </textarea></td>
                                                </tr>
                                                <tr>
                                                    <td><textarea class="form-control" name="plm_row2" rows="5" cols="10"> '. $data['plm_row2'].' </textarea></td>
                                                    <td><textarea class="form-control" name="obg_row2" rows="5" cols="10"> '. $data['obg_row2'].' </textarea></td>
                                                    <td><textarea class="form-control" name="estrategia_row2" rows="5" cols="10"> '. $data['estrategia_row2'].' </textarea></td>
                                                </tr>
                                                <tr>
                                                    <td><textarea class="form-control" name="plm_row3" rows="5" cols="10"> '. $data['plm_row3'].' </textarea></td>
                                                    <td><textarea class="form-control" name="obg_row3" rows="5" cols="10"> '. $data['obg_row3'].' </textarea></td>
                                                    <td><textarea class="form-control" name="estrategia_row3" rows="5" cols="10"> '. $data['estrategia_row3'].' </textarea></td>
                                                </tr>
									<tr><td>
                                    <b>Referido a otro recurso</b>
                                    </td><td>
                                        '. $data['referido'].'
                                   </td></tr>
                            <tr><td>
                                    <b>Firma Cliente (o custodia legal)</b>
                                    </td><td>
                                        '. $data['firma'].'
                                    </td></tr>
                            <tr><td>
                                    <b>Firma Psicologo y Num. Licencia</b>
                                    </td><td>
                                        '. $data['licencia'].'
                                    </td></tr></table>
';
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
//	  print "</td></tr></table>\n";
}
?>

