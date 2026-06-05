<?php
require_once(dirname(__file__)."/../../globals.php");

function trabajo_social_report_inicial_report($pid, $encounter, $cols, $id)
{
	$data = sqlQuery("select * from form_trabajo_social_report_inicial where pid=? and id=?", array($pid,$id));
//	$data1 = sqlStatement("select * from psychiatric_medicamento where form_id=?",$id);
  //      $drugs_code = [];
    //    while($row=sqlFetchArray($data1)){
//array_push($drugs_code,$row);
	//      }
	print "<style>input[type='checkbox'][readonly] {
  pointer-events: none;
}
.borderless td, .borderless th {
    border: none;
}
</style>";
	print "<table class='table borderless'><tr><td><b>Fecha de Servicio:</b></td><td>".attr(oeFormatShortDate(substr($data['date_service'], 0, 10)))."</td></tr><tr><td>\n";
	  print '<tr><td>Start Time: </td><td>'.$data['start_time'].'</td></tr><tr><td>End Time: </td><td>'.$data['end_time'].'</td></tr>';

	print '
                                <b>Historical Bio-psicosocial:</b>
                                </td><td colspan=3>
                                '. $data['bio_psicosocial'].'
                                </td></tr>
								<tr><td>
                                <b>HIC #:</b>
                                </td><td colspan=3>
                                    '. $data['hic'].'
                                </td></tr>
								<tr><td colspan=4>
								<h3>Identificacion</h3>
								<br><br>
								</td></tr>
								<tr><td>
                                        <b>Escolaridad: </b>
                                        </td></tr>
								<tr><td>
                                                <label class="form-check-label">
                                                <input type="checkbox" class="" name="es_0" value="0"  '. (($data['es_0'] == '0')?"checked='checked'":"").' > 0
                                                </label>
                                           </td><td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_1" value="1"  '. (($data['es_1'] == '1')?"checked='checked'":"").' > 1
                                                </label>
                                            </td><td colspan=2>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_2" value="2"  '. (($data['es_2'] == '2')?"checked='checked'":"").' > 2
                                                </label>
                                            </td></tr>
								<tr><td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_3" value="3"  '. (($data['es_3'] == '3')?"checked='checked'":"").' > 3
                                                </label>
                                            </td><td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_4" value="4"  '. (($data['es_4'] == '4')?"checked='checked'":"").' > 4
                                                </label>
                                            </td><td colspan=2>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_5" value="5"  '. (($data['es_5'] == '5')?"checked='checked'":"").' > 5
                                                </label>
                                            </td></tr>
								<tr><td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_6" value="6"  '. (($data['es_6'] == '6')?"checked='checked'":"").' > 6
                                                </label>
                                            </td><td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_7" value="7"  '. (($data['es_7'] == '7')?"checked='checked'":"").' > 7
                                                </label>
                                            </td><td colspan=2>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_8" value="8"  '. (($data['es_8'] == '8')?"checked='checked'":"").' > 8
                                                </label>
                                            </td></tr>
								<tr><td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_9" value="9"  '. (($data['es_9'] == '9')?"checked='checked'":"").' > 9
                                                </label>
                                            </td><td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_10" value="10"  '. (($data['es_10'] == '10')?"checked='checked'":"").' > 10
                                                </label>
                                            </td><td colspan=2>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_11" value="11"  '. (($data['es_11'] == '11')?"checked='checked'":"").' > 11
                                                </label>
                                            </td></tr>
								<tr><td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_12" value="12"  '. (($data['es_12'] == '12')?"checked='checked'":"").' > 12
                                                </label>
                                            </td><td colspan=3>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_omas" value="omas"  '. (($data['es_omas'] == 'omas')?"checked='checked'":"").' > o mas
                                                </label>
                                            </td></tr>
								<tr><td>
                                        <b>Creencia Religiosa:</b>
                                        </td><td colspan=3>
                                        '. $data['creencia_religiosa'].'
                                        </td></tr>
										<tr><td>
                                        <b>Encargado o Tutor:</b>
                                        </td><td colspan=3>
                                            '. $data['encargado_o_tutor'].'
                                        </td></tr>
										<tr><td>
                                        <b>Relacion: </b>
                                        </td><td colspan=3>
                                            '. $data['relacion'].'
                                        </td></tr>
										<tr><td>
                                        <b>En caso de emergencia llamar al: </b>
                                        </td><td colspan=3>
                                            (<input type="text" class="" name="emergencia_llamar" value=" '. $data['emergencia_llamar'].' ">)
                                            <input type="text" class="" name="emergencia_llamar1" value=" '. $data['emergencia_llamar1'].' "> -
                                            <input type="text" class="" name="emergencia_llamar2" value=" '. $data['emergencia_llamar2'].' ">
                                        </td></tr>
										<tr><td>
                                        <b>Es veterano: </b>
                                        </td><td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_si" value="si"  '. (($data['es_si']=="si")?"checked='checked'":"").' > Si
                                                </label>
                                            </td><td colspan=3>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="es_no" value="no"  '. (($data['es_no']=="no")?"checked='checked'":"").' > No
                                                </label>
                                            </td></tr>
										<tr><td>
                                        <b>Lugar de procedencia: </b>
                                   </td></tr>
										<tr><td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="lugar_casa" value="casa"  '. (($data['lugar_casa']=="casa")?"checked='checked'":"").' > Casa o Apartamento
                                                </label>
                                            </td><td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="lugar_egida" value="egida"  '. (($data['lugar_egida']=="egida")?"checked='checked'":"").' > Egida
                                                </label>
                                            </td><td colspan=2>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="lugar_deam" value="deam"  '. (($data['lugar_deam']=="deam")?"checked='checked'":"").' > Deambulante
                                                </label>
                                            </td></tr>
										<tr><td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="lugar_hospital" value="hospital"  '. (($data['lugar_hospital']=="hospital")?"checked='checked'":"").' > Hospital
                                                </label>
                                            </td><td>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="lugar_hogar" value="hogar"  '. (($data['lugar_hogar']=="hogar")?"checked='checked'":"").' > Hoger de Cuido Prolongado
                                                </label>
                                            </td><td colspan=2>
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="" name="lugar_otro" value="otro"  '. (($data['lugar_otro']=="otro")?"checked='checked'":"").' > Otro (explique) -
                                                    '. $data['lugar_explique'].'
                                                </label>
                                            </td></tr>
										<tr><td>
                                        <b>De responder Egida o Hospital responda las siguientes aseveraciones: </b>
                                        </td><td colspan=3>
                                            '. $data['de_responder'].'
                                        </td></tr>
										<tr><td>
                                        <b>Nombre Hogar o Egida: </b>
                                        </td><td colspan=3>
                                            '. $data['nombre_hogar'].'
                                        </td></tr>
										<tr><td>
                                        <b> Numero de telefono: </b>
                                        </td><td colspan=3>
                                            '. $data['numbero_telefono'].'
                                        </td></tr>
										<tr><td>
                                        <b> Fecha ingreso en el Hogar o Institucion: </b>
                                        </td><td colspan=3>
                                            '. $data['fecha_ingreso'].'
                                        </td></tr>
										<tr><td>
                    <h3>Familia</h3>
					<br><br>
					</td></tr>
					<tr><td>
                                    <b>Estatus Marital:</b>
                                    </td><td>
                                        
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="marital_cas" value="cas"  '. (($data['marital_cas']=="cas")?"checked='checked'":"").' > Casado(a)
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="marital_divorce" value="divorce"  '. (($data['marital_divorce']=="divorce")?"checked='checked'":"").' > Divorciado(a)
                                            </label>
                                        </td><td colspan=2>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="marital_viu" value="viu"  '. (($data['marital_viu']=="viu")?"checked='checked'":"").' > Viudo(a)
                                            </label>
                                        </td></tr>
					<tr><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="marital_sol" value="sol"  '. (($data['marital_sol']=="sol")?"checked='checked'":"").' > Soltero(a)
                                            </label>
                                        </td><td colspan=3>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="marital_nunca" value="nunca"  '. (($data['marital_nunca']=="nunca")?"checked='checked'":"").' > Nunca se Caso
                                            </label>
                                        </td></tr>
									<tr><td colspan=2>
                                    <b>So estuvo casado(a) o tuvo una relacion con alguien por un periodo prolongado: Como se siente al respecto en estos momentos? (sentimientos que expresa)</b>
                                    </td><td colspan=2>
                                    '. $data['so_esuvo'].'
                                    </td></tr>
									<tr><td>
                                    <b>Composicion/Familiar</b>
                                    </td></tr>
									<tr><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="comp_hijos" value="hijos"  '. (($data['comp_hijos']=="hijos")?"checked='checked'":"").' > Hijos / Cuantos hijos actualmente:
                                                <input type="text" class="" name="hijos_actual" value=" '. $data['hijos_actual'].' ">
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="hijos_sobrinos" value="sobrinos"  '. (($data['hijos_sobrinos']=="sobrinos")?"checked='checked'":"").' > Sobrinos
                                            </label>
                                        </td><td colspan=2>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="hijos_nietos" value="nietos"  '. (($data['hijos_nietos']=="nietos")?"checked='checked'":"").' > Nietos
                                            </label>
                                        </td></tr>
									<tr><td colspan=2>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="hijos_otro" value="otro"  '. (($data['hijos_otro']=="otro")?"checked='checked'":"").' > Otro(
                                                        <input type="text" class="" name="hijos_otro_text" value=" '. $data['hijos_otro_text'].' ">
                                                )
                                            </label>
											</td><td colspan=2>
                                            <label>Empleos en los que se desempeno: (por cuanto tiempo)</label>
                                        </td></tr>
									<tr><td>
                    <h3>Salud</h3>
					<br><br>
					</td></tr>
									<tr><td>
                                    <b>A. Medico de cabecera</b>
									</td><td >
                                    
                                        a. Nombre del medico: Dr '. $data['medico_de_cabecera'].'
										</td><td colspan=2>
                                        b. Telephone: '. $data['telefono'].'
                                    </td></tr>
									<tr><td>
                                    <b>B. Condiciones medicas diagnosticadas: </b>
									</td></tr></table>
                     
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>CONDICION</th>
                                                    <th>SI</th>
                                                    <th>NO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>* DIABETES</td>
                                                    <td><input type="checkbox" class="" name="diab_si" value="si"  '. (($data['diab_si']=="si")?"checked='checked'":"").' ></td>
                                                    <td><input type="checkbox" class="" name="diab_no" value="no"  '. (($data['diab_no']=="no")?"checked='checked'":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* ALTA PRESION</td>
                                                    <td><input type="checkbox" class="" name="alta_si" value="si"  '. (($data['alta_si']=="si")?"checked='checked'":"").' ></td>
                                                    <td><input type="checkbox" class="" name="alta_no" value="no"  '. (($data['alta_no']=="no")?"checked='checked'":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* CONDICIONES PULMONARES</td>
                                                    <td><input type="checkbox" class="" name="condi_si" value="si"  '. (($data['condi_si']=="si")?"checked='checked'":"").' ></td>
                                                    <td><input type="checkbox" class="" name="condi_no" value="no"  '. (($data['condi_no']=="no")?"checked='checked'":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* ENFERMEDADES DEL CORAZON</td>
                                                    <td><input type="checkbox" class="" name="corazon_si" value="si"  '. (($data['corazon_si']=="si")?"checked='checked'":"").' ></td>
                                                    <td><input type="checkbox" class="" name="corazon_no" value="no"  '. (($data['corazon_no']=="no")?"checked='checked'":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* ARTRITIS</td>
                                                    <td><input type="checkbox" class="" name="arti_si" value="si"  '. (($data['arti_si']=="si")?"checked='checked'":"").' ></td>
                                                    <td><input type="checkbox" class="" name="arti_no" value="no"  '. (($data['arti_no']=="no")?"checked='checked'":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* CONDICIONES PSIQUIATRICAS</td>
                                                    <td><input type="checkbox" class="" name="psi_si" value="si"  '. (($data['psi_si']=="si")?"checked='checked'":"").' ></td>
                                                    <td><input type="checkbox" class="" name="psi_no" value="no"  '. (($data['psi_no']=="no")?"checked='checked'":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* OTRA</td>
                                                    <td><input type="checkbox" class="" name="otra_si" value="si"  '. (($data['otra_si']=="si")?"checked='checked'":"").' ></td>
                                                    <td><input type="checkbox" class="" name="otra_no" value="no"  '. (($data['otra_no']=="no")?"checked='checked'":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* CONDICION FISICA PARA REFERIDO DEL PT. EN EL M.D. DE CABECERA</td>
                                                    <td><input type="checkbox" class="" name="para_si" value="si"  '. (($data['para_si']=="si")?"checked='checked'":"").' ></td>
                                                    <td><input type="checkbox" class="" name="para_no" value="no"  '. (($data['para_no']=="no")?"checked='checked'":"").' ></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <table><tr><td>
                                    <b>C. Toma medicamentos: </b>
                                    </td><td>
                                        
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="toma_si" value="si"  '. (($data['toma_si']=="si")?"checked='checked'":"").' > SI
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="toma_no" value="no"  '. (($data['toma_no']=="no")?"checked='checked'":"").' > No
                                            </label>
                                        </td></tr>
										<tr><td>
                                    <label class="col-sm-6">De constestar si mencionelos: </label>
                                    </td><td>
                                    '. $data['de_constestar'].'
                                    </td></tr>
										<tr><td>
                                    <b>D. Historial Psiquiatrico: </b>
                                    </td><td>
                                        
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="history_si" value="si"  '. (($data['history_si']=="si")?"checked='checked'":"").' > SI
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="history_no" value="no"  '. (($data['history_no']=="no")?"checked='checked'":"").' > No
                                            </label>
                                       </td></tr>
										<tr><td>
                                    <b>a. De responder si escriba el nombre del medico : </b>
                                    </td><td>
                                    '. $data['responder_medico'].'
                                    </td></tr>
										<tr><td>
                                    <b>E. Historial de Sustancia : </b>
                                    </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="sustancia_si" value="si"  '. (($data['sustancia_si']=="si")?"checked='checked'":"").'  > SI
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="sustancia_no" value="no"  '. (($data['sustancia_no']=="no")?"checked='checked'":"").' > No
                                            </label>
                                        </td></tr>
										<tr><td>
										<b>a. </b>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="sustancia_alcohol" value="alcohol"  '. (($data['sustancia_alcohol']=="alcohol")?"checked='checked'":"").' > Alcohol
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="sustancia_ciga" value="ciga"  '. (($data['sustancia_ciga']=="ciga")?"checked='checked'":"").' > Cigarrillos
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="sustancia_otro" value="otro"  '. (($data['sustancia_otro']=="otro")?"checked='checked'":"").' > Otros :
                                                <input type="text" class="" name="sustancia_otro_text" value=" '. $data['sustancia_otro_text'].' ">
                                            </label>
                                        </td></tr>
										<tr><td>
                                    <b>F. Nivel de Independencia: </b>
                                    </td><td>
                                        
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="nivel_camina" value="camina"  '. (($data['nivel_camina']=="camina")?"checked='checked'":"").' > Camina solo
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="nivel_camina_ayuda" value="ayuda"  '. (($data['nivel_camina_ayuda']=="ayuda")?"checked='checked'":"").' > Camina con ayuda
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="nivel_silla" value="silla"  '. (($data['nivel_silla']=="silla")?"checked='checked'":"").' > Utiliza silla de rueda
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="nivel_encamado" value="encamado"  '. (($data['nivel_encamado']=="encamado")?"checked='checked'":"").' > Encamado
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="nivel_otros" value="otros"  '. (($data['nivel_otros']=="otros")?"checked='checked'":"").' > Otros (explica)
                                                <input type="text" class="" name="nivel_otros_text" value=" '. $data['nivel_otros_text'].' ">
                                            </label>
                                        </td></tr>
										<tr><td>
                                    <b>Sigue instrucciones: </b>
									
                                    </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="sigue_si" value="si"  '. (($data['sigue_si']=="si")?"checked='checked'":"").' > SI
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="sigue_no" value="no"  '. (($data['sigue_no']=="no")?"checked='checked'":"").' > No
                                            </label>
                                        </td></tr>
										<tr><td>
                                    <b>Movilidad: </b>
                                    </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="mivi_excel" value="excel"  '. (($data['mivi_excel']=="excel")?"checked='checked'":"").' > Excelente
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="movi_buena" value="buena"  '. (($data['movi_buena']=="buena")?"checked='checked'":"").' > Buena
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="movi_con" value="con"  '. (($data['movi_con']=="con")?"checked='checked'":"").' > Con dificultad
                                            </label>
                                        </td></tr>
										<tr><td>
                                    <h3>G. Apariencia Fisica</h3><br>
                                </td></tr>
										<tr><td>
                                    <b>Se asea solo: </b>
                                    </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="se_si" value="si"  '. (($data['se_si']=="si")?"checked='checked'":"").' > SI
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="se_no" value="no"  '. (($data['se_no']=="no")?"checked='checked'":"").' > No
                                            </label>
                                       </td></tr>
										<tr><td>
                                    <b>Necesita Ayuda: </b>
                                    </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="necesita_si" value="si"  '. (($data['necesita_si']=="si")?"checked='checked'":"").' > SI
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="necesita_no" value="no"  '. (($data['necesita_no']=="no")?"checked='checked'":"").' > No
                                            </label>
                                        </td></tr>
										<tr><td>
                                    <b>Coopera en el mantenimiento de su apariencia: </b>
                                    </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="coopera_si" value="si"  '. (($data['coopera_si']=="si")?"checked='checked'":"").' > SI
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="coopera_no" value="no"  '. (($data['coopera_no']=="no")?"checked='checked'":"").' > No
                                            </label>
                                        </td></tr>
										<tr><td>
                                    <b>Se Observa: </b>
                                    </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="se_activa" value="activa"  '. (($data['se_activa']=="activa")?"checked='checked'":"").' > Activa
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="se_pasivo" value="pasivo"  '. (($data['se_pasivo']=="pasivo")?"checked='checked'":"").' > Pasivo
                                            </label>
                                        </td></tr>
										<tr><td>
                                    <b>Observaciones de su funcionamiento en general: </b>
                                    </td><td>
                                    '. $data['observaciones'].'
                                    </td></tr>
										<tr><td>
                                    <b>Coopera en el mantenimiento de su apariencia: </b>
                                    </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="la_paciente" value="paciente"  '. (($data['la_paciente']=="paciente")?"checked='checked'":"").' > La informacion fue recibida del paciente
                                            </label>
                                        </td><td colspan=2>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="le_terceros" value="terceros"  '. (($data['le_terceros']=="terceros")?"checked='checked'":"").' > La Informacion fue recibida de terceros
                                            </label>
                                        </td></tr>
										<tr><td>
                                    <b>Nombre </b>
                                    </td><td colspan=2>
                                     '. $data['nombre_text'].'
                                    </td></tr>
										<tr><td>
                                    <b>Relacion: </b>
                                    </td><td colspan=2>
                                        '. $data['relacion_text'].'
                                    </td></tr>
										<tr><td>
                    <h3>Nivel mental</h3>
					<br><br>
					</td></tr>
										<tr><td>
                                    <b>A. Memoria</b>
									</td></tr>
										<tr><td>
                                    
                                                <b>a. Memoria reciente: </b>
                                            </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="reciento_intacta" value="intacta"  '. (($data['reciento_intacta']=="intacta")?"checked='checked'":"").' > Intacta
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="reciento_leve" value="leve"  '. (($data['reciento_leve']=="leve")?"checked='checked'":"").' > Deterioro Leve
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="reciento_extremo" value="extremo"  '. (($data['reciento_extremo']=="extremo")?"checked='checked'":"").' > Deterioro extremo
                                                    </label>
                                                </td></tr>
										<tr><td>
                                                <b>b. Memoria Remota: </b>
                                            </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="remota_intacta" value="intacta"  '. (($data['remota_intacta']=="intacta")?"checked='checked'":"").' > Intacta
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="remota_leve" value="leve"  '. (($data['remota_leve']=="leve")?"checked='checked'":"").' > Deterioro Leve
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="remota_extremo" value="extremo"  '. (($data['remota_extremo']=="extremo")?"checked='checked'":"").' > Deterioro extremo
                                                    </label>
                                                </td></tr>
										<tr><td>
                                    <b>B. Nivel Cognitivo</b>
                                   </td></tr>
										<tr><td>
                                                <b>a. Orientado: Persona</b>
                                            </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="persona_si" value="si"  '. (($data['persona_si']=="si")?"checked='checked'":"").' > SI
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="persona_no" value="no"  '. (($data['persona_no']=="no")?"checked='checked'":"").' > NO
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        Tiempo <input type="checkbox" class="" name="tiempo_si" value="si"  '. (($data['tiempo_si']=="si")?"checked='checked'":"").' > SI
                                                    </label>
                                                </td></tr>
										<tr><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="tiempo_no" value="no"  '. (($data['tiempo_no']=="no")?"checked='checked'":"").' > NO
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        Espacio <input type="checkbox" class="" name="espasio_si" value="si"  '. (($data['espasio_si']=="si")?"checked='checked'":"").' > SI
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="espasio_no" value="no"  '. (($data['espasio_no']=="no")?"checked='checked'":"").' > NO
                                                    </label>
                                                </td></tr>
										<tr><td>
                                    <b>C. Proceso de pensamientos: </b>
                                    </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="pro_or" value="or"  '. (($data['pro_or']=="or")?"checked='checked'":"").' > Organizadas
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="pro_de" value="de"  '. (($data['pro_de']=="de")?"checked='checked'":"").' > Desorganizadas
                                            </label>
                                        </td></tr>
										<tr><td>
                                    <b>D. Al momento de la intervencion se descartaron y el/la paciento nego pensamientos suicidas u homicidas, asi como la presncia de disturbio perceptuales: </b>
                                    </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="al_si" value="si"  '. (($data['al_si']=="si")?"checked='checked'":"").' > SI
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="al_no" value="no"  '. (($data['al_no']=="no")?"checked='checked'":"").' > NO
                                            </label>
                                        </td></tr>
										<tr><td>
                                                <label>De responder no, mencione cuales: </label>
                                            </td><td>
                                            '. $data['de_responder_men'].'
                                            </td></tr>
										<tr><td>
                                    <b>E. Exprecion: </b>
                                    </td></tr>
										<tr><td>
                                                <b>a. Expresion corporal: </b>
                                            </td></tr>
										<tr><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="expres_normal" value="normal"  '. (($data['expres_normal']=="normal")?"checked='checked'":"").' > Normal
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="expres_alterado" value="alterado"  '. (($data['expres_alterado']=="alterado")?"checked='checked'":"").' > Alterado
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="expres_cambio" value="cambio"  '. (($data['expres_cambio']=="cambio")?"checked='checked'":"").' > Cambio de respiracion
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="expres_trans" value="trans"  '. (($data['expres_trans']=="trans")?"checked='checked'":"").' > Tranquilio 4
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="expres_movi" value="movi"  '. (($data['expres_movi']=="movi")?"checked='checked'":"").' > Movimientos (cabeza, brazos y/o pies)
                                                    </label>
                                                </td></tr>
										<tr><td>
                                                <b>b. Expresion Facial: </b>
                                            </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="facial_movi" value="movi"  '. (($data['facial_movi']=="movi")?"checked='checked'":"").' > Movimientos de los ojos
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="facial_boca" value="boca"  '. (($data['facial_boca']=="boca")?"checked='checked'":"").' > Movimientos de la boca
                                                    </label>
                                                </td></tr>
										<tr><td>
                                                <b>c. Expresion verbal: </b>
                                           </td></tr>
										<tr><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="expres_normal_1" value="normal"  '. (($data['expres_normal_1']=="normal")?"checked='checked'":"").' > Normal
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="expres_confu" value="confu"  '. (($data['expres_confu']=="confu")?"checked='checked'":"").' > Confundido
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="expres_tri" value="tri"  '. (($data['expres_tri']=="tri")?"checked='checked'":"").' > Triste
                                                    </label>
                                                </td></tr>
										<tr><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="expres_alter" value="alter"  '. (($data['expres_alter']=="alter")?"checked='checked'":"").' > Alterado
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="expres_difi" value="difi"  '. (($data['expres_difi']=="difi")?"checked='checked'":"").' > Dificultad al expresarse
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="expres_repi" value="repi"  '. (($data['expres_repi']=="repi")?"checked='checked'":"").' > Repetitivo en las palabras
                                                    </label>
                                                </td></tr>
										<tr><td>
                                            <b>En el area expresion la trabajadora social suscribiente descarto movimientos involuntarios producidos por alguna enfermeded y/o medicamento: </b>
                                            </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="en_el_si" value="si"  '. (($data['en_el_si']=="si")?"checked='checked'":"").' > SI
                                                    </label>
                                                </td><td>
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="" name="en_el_no" value="no"  '. (($data['en_el_no']=="no")?"checked='checked'":"").' > NO
                                                    </label>
                                                </td></tr>
										<tr><td>
                                    <b>F. Estado de animo presentado fue: </b>
                                    </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="estado_alerto" value="alerto"  '. (($data['estado_alerto']=="alerto")?"checked='checked'":"").' > Alerta
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="estado_alegre" value="alegre"  '. (($data['estado_alegre']=="alegre")?"checked='checked'":"").' > Alegre
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                Tiempo <input type="checkbox" class="" name="estado_tran" value="tran"  '. (($data['estado_tran']=="tran")?"checked='checked'":"").' > Tranquilo
                                            </label>
                                        </td></tr>
										<tr><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="estado_ansioso" value="ansioso"  '. (($data['estado_ansioso']=="ansioso")?"checked='checked'":"").' > Ansioso
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                Espacio <input type="checkbox" class="" name="estado_triste" value="triste"  '. (($data['estado_triste']=="triste")?"checked='checked'":"").' > Triste
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="estado_decaido" value="decaido"  '. (($data['estado_decaido']=="decaido")?"checked='checked'":"").' > Decaido
                                            </label>
                                        </td></tr>
										<tr><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="estado_irritable" value="irritable"  '. (($data['estado_irritable']=="irritable")?"checked='checked'":"").' > Irritable
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="estado_agitado" value="agitado"  '. (($data['estado_agitado']=="agitado")?"checked='checked'":"").' > Agitado
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="estado_deprimido" value="deprimido"  '. (($data['estado_deprimido']=="deprimido")?"checked='checked'":"").' > Deprimido
                                            </label>
                                        </td></tr>
										<tr><td>
                                    <b>Observaciones</b>
                                    </td><td>
                                    '. $data['observaciones'].'
                                    </td></tr>
										<tr><td>
                    <h3> Adaptacion al hogar de cuido Prolongado</h3>
					<br><br>
					</td></tr>
										<tr><td>
                                    <b>Como se siente respecto a su estadia en el hogar ?</b>
                                    </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="como_lo" value="lo"  '. (($data['como_lo']=="lo")?"checked='checked'":"").' > Lo accepta
                                            </label>
                                        </td><td>
                                            <label class="form-check-label">
                                                <input type="checkbox" class="" name="como_no_lo" value="no_lo"  '. (($data['como_no_lo']=="no_lo")?"checked='checked'":"").' > No Lo accepta
                                            </label>
                                        </td></tr>
										<tr><td>
                                    <b>Comentarios</b>
                                    </td><td colspan=2>
                                    '. $data['comentarios'].'
                                    </td></tr>
										<tr><td>
                    <h3> Socializacion</h3>
					<br><br>
					</td></tr>
										<tr><td>
                                    <b>Como interactua el entrevistado con otros residentes en el hogar? Se identifica con algurien en particular. (Explique sentimientos que muestra o expresa)</b>
                                    </td><td>
                                    '. $data['com_otros'].'
                                    </td></tr>
										<tr><td>
                                    <b>Como interactua con el cuidador? Mantience buena empatia y se indentifica con el o por el contrario rechaza al ayuda de este. (Explique sentimientos que muestra o expresa)</b>
                                    </td><td>
                                        '. $data['com_cuidador'].'
                                    </td></tr>
										<tr><td>
                                    <b>Como se relaciona con la familia? (Sentimientios afectivos hacia su familia, frecuencia de visitas que recibe? Como se siente presente?) </b>
                                    </td><td>
                                        '. $data['com_familia'].'
                                    </td></tr>
										<tr><td>
                                <b>Se lo llevan los familiares algunos fines de semana fuera del hogar? </b>
                                </td><td>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="" name="si_lo_si" value="si"  '. (($data['si_lo_si']=="si")?"checked='checked'":"").' > SI
                                        </label>
                                    </td><td>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="" name="si_lo_no" value="no"  '. (($data['si_lo_no']=="no")?"checked='checked'":"").' > NO
                                        </label>
                                    </td></tr>
										<tr><td>
                                <b>Participa en las actividades sociales dentro de su nucleo familiar tales como: (madres, padres, accion de gracias, navidad etc) </b>
                                </td><td>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="" name="participa_si" value="si"  '. (($data['participa_si']=="si")?"checked='checked'":"").' > SI
                                        </label>
                                    </td><td>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="" name="participa_no" value="no"  '. (($data['participa_no']=="no")?"checked='checked'":"").' > NO
                                        </label>
                                    </td></tr>
										<tr><td>
                                <b>Participa en las actividades sociales qus se llevan a cabo en el hogar </b>
                                </td><td>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="" name="qus_hogar_si" value="si"  '. (($data['qus_hogar_si']=="si")?"checked='checked'":"").' > SI
                                        </label>
                                    </td><td>
                                        <label class="form-check-label">
                                            <input type="checkbox" class="" name="qus_hogar_no" value="no"  '. (($data['qus_hogar_no']=="no")?"checked='checked'":"").' > NO
                                        </label>
                                    </td></tr>
										<tr><td>
                                <b>Mantieno contacto freecuente con hijos y nietos: </b>
                                </td><td>
                                '. $data['mantieno'].'
                                </td></tr>
										<tr><td>
                                    <input type="checkbox" class="" name="del_paciente" value="paciente"  '. (($data['del_paciente']=="paciente")?"checked='checked'":"").' > <label>La informacion fue recibida del paciente</label>
                                </td><td colspan=3>
                                    <input type="checkbox" class="" name="del_terceros" value="terceros"  '. (($data['del_terceros']=="terceros")?"checked='checked'":"").' > <label>La informacion fue recibida de terceros</label>
                                </td></tr>
										<tr><td>
                                <b>Nombre: </b>
								'. $data['text_nombre'].'
                                </td></tr>
										<tr><td>
                                <b>Relacion: </b>
								'. $data['text_relacion'].'
                                </td></tr>
										<tr><td>
                    <h3>Diagnostico</h3><br><br>
					</td></tr>
										<tr><td>
                                    <b>Diagnostico: </b>
                                    </td><td colspan=2>
                                    '. $data['text_diagnostico'].'
                                    </td></tr>
										<tr><td>
                                    <b>Plan de accion: </b>
                                    </td><td colspan=2>
                                        '. $data['pla_de_accion'].'
                                    ';
/*echo '		<div class="form-group col-md-12">
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
	  print "</td></tr></table>\n";
}
?>

