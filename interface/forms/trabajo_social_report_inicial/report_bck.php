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
}</style>";
	print "<table><tr><td>\n";
	print '<div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-6 text-right">Historical Bio-psicosocial:</label>
                                <div class="col-sm-6">
                                '. $data['bio_psicosocial'].'
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-6 text-right">HIC #:</label>
                                <div class="col-sm-6">
                                    '. $data['hic'].'
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="menu1" class="tab-pane active">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Escolaridad: </label>
                                        <div class="col-sm-6 lh-25">
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="es_0" value="0"  '. (($data['es_0'] == '0')?"checked":"").' > 0
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_1" value="1"  '. (($data['es_1'] == '1')?"checked":"").' > 1
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_2" value="2"  '. (($data['es_2'] == '2')?"checked":"").' > 2
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_3" value="3"  '. (($data['es_3'] == '3')?"checked":"").' > 3
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_4" value="4"  '. (($data['es_4'] == '4')?"checked":"").' > 4
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_5" value="5"  '. (($data['es_5'] == '5')?"checked":"").' > 5
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_6" value="6"  '. (($data['es_6'] == '6')?"checked":"").' > 6
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_7" value="7"  '. (($data['es_7'] == '7')?"checked":"").' > 7
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_8" value="8"  '. (($data['es_8'] == '8')?"checked":"").' > 8
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_9" value="9"  '. (($data['es_9'] == '9')?"checked":"").' > 9
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_10" value="10"  '. (($data['es_10'] == '10')?"checked":"").' > 10
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_11" value="11"  '. (($data['es_11'] == '11')?"checked":"").' > 11
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_12" value="12"  '. (($data['es_12'] == '12')?"checked":"").' > 12
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_omas" value="omas"  '. (($data['es_omas'] == 'omas')?"checked":"").' > o mas
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Creencia Religiosa:</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" name="creencia_religiosa" value=" '. $data['creencia_religiosa'].' " >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Encargado o Tutor:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="encargado_o_tutor" value=" '. $data['encargado_o_tutor'].' ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Relacion: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="relacion" value=" '. $data['relacion'].' ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">En caso de emergencia llamar al: </label>
                                        <div class="col-sm-6 form-check-inline">
                                            (<input type="text" class="form-control" name="emergencia_llamar" value=" '. $data['emergencia_llamar'].' ">)
                                            <input type="text" class="form-control" name="emergencia_llamar1" value=" '. $data['emergencia_llamar1'].' "> -
                                            <input type="text" class="form-control" name="emergencia_llamar2" value=" '. $data['emergencia_llamar2'].' ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Es veterano: </label>
                                        <div class="col-sm-6">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_si" value="si"  '. (($data['es_si']=="si")?"checked":"").' > Si
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_no" value="no"  '. (($data['es_no']=="no")?"checked":"").' > No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Lugar de procedencia: </label>
                                        <div class="col-sm-6">
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="lugar_casa" value="casa"  '. (($data['lugar_casa']=="casa")?"checked":"").' > Casa o Apartamento
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="lugar_egida" value="egida"  '. (($data['lugar_egida']=="egida")?"checked":"").' > Egida
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="lugar_deam" value="deam"  '. (($data['lugar_deam']=="deam")?"checked":"").' > Deambulante
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="lugar_hospital" value="hospital"  '. (($data['lugar_hospital']=="hospital")?"checked":"").' > Hospital
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="lugar_hogar" value="hogar"  '. (($data['lugar_hogar']=="hogar")?"checked":"").' > Hoger de Cuido Prolongado
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="lugar_otro" value="otro"  '. (($data['lugar_otro']=="otro")?"checked":"").' > Otro (explique)
                                                    <input type="text" class="form-control" name="lugar_explique" value=" '. $data['lugar_explique'].' ">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">De responder Egida o Hospital responda las siguientes aseveraciones: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="de_responder" value=" '. $data['de_responder'].' ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Nombre Hogar o Egida: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="nombre_hogar" value=" '. $data['nombre_hogar'].' ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right"> Numero de telefono: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="numbero_telefono" value=" '. $data['numbero_telefono'].' ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right"> Fecha ingreso en el Hogar o Institucion: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control datepicker" name="fecha_ingreso" placeholder="MM/DD/YYYY" value=" '. $data['fecha_ingreso'].' ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane active">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6 text-right">Estatus Marital:</label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="marital_cas" value="cas"  '. (($data['marital_cas']=="cas")?"checked":"").' > Casado(a)
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="marital_divorce" value="divorce"  '. (($data['marital_divorce']=="divorce")?"checked":"").' > Divorciado(a)
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="marital_viu" value="viu"  '. (($data['marital_viu']=="viu")?"checked":"").' > Viudo(a)
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="marital_sol" value="sol"  '. (($data['marital_sol']=="sol")?"checked":"").' > Soltero(a)
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="marital_nunca" value="nunca"  '. (($data['marital_nunca']=="nunca")?"checked":"").' > Nunca se Caso
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6 text-right">So estuvo casado(a) o tuvo una relacion con alguien por un periodo prolongado: Como se siente al respecto en estos momentos? (sentimientos que expresa)</label>
                                    <div class="col-sm-6">
                                    <textarea class="form-control" name="so_esuvo" rows="10" cols="40"> '. $data['so_esuvo'].' </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6 text-right">Composicion/Familiar</label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="comp_hijos" value="hijos"  '. (($data['comp_hijos']=="hijos")?"checked":"").' > Hijos / Cuantos hijos actualmente:
                                                <input type="text" class="form-control" name="hijos_actual" value=" '. $data['hijos_actual'].' ">
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="hijos_sobrinos" value="sobrinos"  '. (($data['hijos_sobrinos']=="sobrinos")?"checked":"").' > Sobrinos
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="hijos_nietos" value="nietos"  '. (($data['hijos_nietos']=="nietos")?"checked":"").' > Nietos
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="hijos_otro" value="otro"  '. (($data['hijos_otro']=="otro")?"checked":"").' > Otro(
                                                        <input type="text" class="form-control" name="hijos_otro_text" value=" '. $data['hijos_otro_text'].' ">
                                                )
                                            </label>
                                            <label>Empleos en los que se desempeno: (por cuanto tiempo)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu3" class="tab-pane active">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">A. Medico de cabecera</label>
                                    <div class="col-sm-6">
                                        <div>a. Nombre del medico: Dr <input type="text" class="form-control" name="medico_de_cabecera" value=" '. $data['medico_de_cabecera'].' "></div>
                                        <div>b. Telephone: <input type="text" class="form-control" name="telefono" value=" '. $data['telefono'].' "></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12">B. Condiciones medicas diagnosticadas: </label>
                                    <div class="col-sm-12">
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
                                                    <td><input type="checkbox" class="form-check-input" name="diab_si" value="si"  '. (($data['diab_si']=="si")?"checked":"").' ></td>
                                                    <td><input type="checkbox" class="form-check-input" name="diab_no" value="no"  '. (($data['diab_no']=="no")?"checked":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* ALTA PRESION</td>
                                                    <td><input type="checkbox" class="form-check-input" name="alta_si" value="si"  '. (($data['alta_si']=="si")?"checked":"").' ></td>
                                                    <td><input type="checkbox" class="form-check-input" name="alta_no" value="no"  '. (($data['alta_no']=="no")?"checked":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* CONDICIONES PULMONARES</td>
                                                    <td><input type="checkbox" class="form-check-input" name="condi_si" value="si"  '. (($data['condi_si']=="si")?"checked":"").' ></td>
                                                    <td><input type="checkbox" class="form-check-input" name="condi_no" value="no"  '. (($data['condi_no']=="no")?"checked":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* ENFERMEDADES DEL CORAZON</td>
                                                    <td><input type="checkbox" class="form-check-input" name="corazon_si" value="si"  '. (($data['corazon_si']=="si")?"checked":"").' ></td>
                                                    <td><input type="checkbox" class="form-check-input" name="corazon_no" value="no"  '. (($data['corazon_no']=="no")?"checked":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* ARTRITIS</td>
                                                    <td><input type="checkbox" class="form-check-input" name="arti_si" value="si"  '. (($data['arti_si']=="si")?"checked":"").' ></td>
                                                    <td><input type="checkbox" class="form-check-input" name="arti_no" value="no"  '. (($data['arti_no']=="no")?"checked":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* CONDICIONES PSIQUIATRICAS</td>
                                                    <td><input type="checkbox" class="form-check-input" name="psi_si" value="si"  '. (($data['psi_si']=="si")?"checked":"").' ></td>
                                                    <td><input type="checkbox" class="form-check-input" name="psi_no" value="no"  '. (($data['psi_no']=="no")?"checked":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* OTRA</td>
                                                    <td><input type="checkbox" class="form-check-input" name="otra_si" value="si"  '. (($data['otra_si']=="si")?"checked":"").' ></td>
                                                    <td><input type="checkbox" class="form-check-input" name="otra_no" value="no"  '. (($data['otra_no']=="no")?"checked":"").' ></td>
                                                </tr>
                                                <tr>
                                                    <td>* CONDICION FISICA PARA REFERIDO DEL PT. EN EL M.D. DE CABECERA</td>
                                                    <td><input type="checkbox" class="form-check-input" name="para_si" value="si"  '. (($data['para_si']=="si")?"checked":"").' ></td>
                                                    <td><input type="checkbox" class="form-check-input" name="para_no" value="no"  '. (($data['para_no']=="no")?"checked":"").' ></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-6">C. Toma medicamentos: </label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="toma_si" value="si"  '. (($data['toma_si']=="si")?"checked":"").' > SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="toma_no" value="no"  '. (($data['toma_no']=="no")?"checked":"").' > No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-6">De constestar si mencionelos: </label>
                                    <div class="col-sm-6">
                                    <textarea class="form-control" name="de_constestar" rows="4" cols="20"> '. $data['de_constestar'].' </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-6">D. Historial Psiquiatrico: </label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="history_si" value="si"  '. (($data['history_si']=="si")?"checked":"").' > SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="history_no" value="no"  '. (($data['history_no']=="no")?"checked":"").' > No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-6">a. De responder si escriba el nombre del medico : </label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name="responder_medico" value=" '. $data['responder_medico'].' ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-6">E. Historial de Sustancia : </label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sustancia_si" value="si"  '. (($data['sustancia_si']=="si")?"checked":"").'  > SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sustancia_no" value="no"  '. (($data['sustancia_no']=="no")?"checked":"").' > No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-sm-12"><label>a. </label>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sustancia_alcohol" value="alcohol"  '. (($data['sustancia_alcohol']=="alcohol")?"checked":"").' > Alcohol
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sustancia_ciga" value="ciga"  '. (($data['sustancia_ciga']=="ciga")?"checked":"").' > Cigarrillos
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sustancia_otro" value="otro"  '. (($data['sustancia_otro']=="otro")?"checked":"").' > Otros :
                                                <input type="text" class="form-control" name="sustancia_otro_text" value=" '. $data['sustancia_otro_text'].' ">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-6">F. Nivel de Independencia: </label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="nivel_camina" value="camina"  '. (($data['nivel_camina']=="camina")?"checked":"").' > Camina solo
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="nivel_camina_ayuda" value="ayuda"  '. (($data['nivel_camina_ayuda']=="ayuda")?"checked":"").' > Camina con ayuda
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="nivel_silla" value="silla"  '. (($data['nivel_silla']=="silla")?"checked":"").' > Utiliza silla de rueda
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="nivel_encamado" value="encamado"  '. (($data['nivel_encamado']=="encamado")?"checked":"").' > Encamado
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="nivel_otros" value="otros"  '. (($data['nivel_otros']=="otros")?"checked":"").' > Otros (explica)
                                                <input type="text" class="form-control" name="nivel_otros_text" value=" '. $data['nivel_otros_text'].' ">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-6">Sigue instrucciones: </label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sigue_si" value="si"  '. (($data['sigue_si']=="si")?"checked":"").' > SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sigue_no" value="no"  '. (($data['sigue_no']=="no")?"checked":"").' > No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-6">Movilidad: </label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="mivi_excel" value="excel"  '. (($data['mivi_excel']=="excel")?"checked":"").' > Excelente
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="movi_buena" value="buena"  '. (($data['movi_buena']=="buena")?"checked":"").' > Buena
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="movi_con" value="con"  '. (($data['movi_con']=="con")?"checked":"").' > Con dificultad
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-md-12">G. Apariencia Fisica</label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Se asea solo: </label>
                                    <div class="col-sm-2">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="se_si" value="si"  '. (($data['se_si']=="si")?"checked":"").' > SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="se_no" value="no"  '. (($data['se_no']=="no")?"checked":"").' > No
                                            </label>
                                        </div>
                                    </div>
                                    <label class="col-md-2">Necesita Ayuda: </label>
                                    <div class="col-sm-2">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="necesita_si" value="si"  '. (($data['necesita_si']=="si")?"checked":"").' > SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="necesita_no" value="no"  '. (($data['necesita_no']=="no")?"checked":"").' > No
                                            </label>
                                        </div>
                                    </div>
                                    <label class="col-md-2">Coopera en el mantenimiento de su apariencia: </label>
                                    <div class="col-sm-2">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="coopera_si" value="si"  '. (($data['coopera_si']=="si")?"checked":"").' > SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="coopera_no" value="no"  '. (($data['coopera_no']=="no")?"checked":"").' > No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Se Observa: </label>
                                    <div class="col-sm-2">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="se_activa" value="activa"  '. (($data['se_activa']=="activa")?"checked":"").' > Activa
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="se_pasivo" value="pasivo"  '. (($data['se_pasivo']=="pasivo")?"checked":"").' > Pasivo
                                            </label>
                                        </div>
                                    </div>
                                    <label class="col-md-2">Observaciones de su funcionamiento en general: </label>
                                    <div class="col-sm-2">
                                    <input type="text" class="form-control" name="observaciones" value=" '. $data['observaciones'].' ">
                                    </div>
                                    <label class="col-md-2">Coopera en el mantenimiento de su apariencia: </label>
                                    <div class="col-sm-2">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="la_paciente" value="paciente"  '. (($data['la_paciente']=="paciente")?"checked":"").' > La informacion fue recibida del paciente
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="le_terceros" value="terceros"  '. (($data['le_terceros']=="terceros")?"checked":"").' > La Informacion fue recibida de terceros
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">Nombre </label>
                                    <div class="col-sm-3">
                                    <input type="text" class="form-control" name="nombre_text" value=" '. $data['nombre_text'].' ">
                                    </div>
                                    <label class="col-md-3">Relacion: </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="relacion_text" value=" '. $data['relacion_text'].' ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu4" class="tab-pane active">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">A. Memoria</label>
                                    <div class="col-sm-12">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label>a. Memoria reciente: </label>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="reciento_intacta" value="intacta"  '. (($data['reciento_intacta']=="intacta")?"checked":"").' > Intacta
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="reciento_leve" value="leve"  '. (($data['reciento_leve']=="leve")?"checked":"").' > Deterioro Leve
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="reciento_extremo" value="extremo"  '. (($data['reciento_extremo']=="extremo")?"checked":"").' > Deterioro extremo
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label>b. Memoria Remota: </label>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="remota_intacta" value="intacta"  '. (($data['remota_intacta']=="intacta")?"checked":"").' > Intacta
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="remota_leve" value="leve"  '. (($data['remota_leve']=="leve")?"checked":"").' > Deterioro Leve
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="remota_extremo" value="extremo"  '. (($data['remota_extremo']=="extremo")?"checked":"").' > Deterioro extremo
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6">B. Nivel Cognitivo</label>
                                    <div class="col-sm-12">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label>a. Orientado: Persona</label>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="persona_si" value="si"  '. (($data['persona_si']=="si")?"checked":"").' > SI
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="persona_no" value="no"  '. (($data['persona_no']=="no")?"checked":"").' > NO
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        Tiempo <input type="checkbox" class="form-check-input" name="tiempo_si" value="si"  '. (($data['tiempo_si']=="si")?"checked":"").' > SI
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="tiempo_no" value="no"  '. (($data['tiempo_no']=="no")?"checked":"").' > NO
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        Espacio <input type="checkbox" class="form-check-input" name="espasio_si" value="si"  '. (($data['espasio_si']=="si")?"checked":"").' > SI
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="espasio_no" value="no"  '. (($data['espasio_no']=="no")?"checked":"").' > NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">C. Proceso de pensamientos: </label>
                                    <div class="col-md-6" style="margin-left:15px">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="pro_or" value="or"  '. (($data['pro_or']=="or")?"checked":"").' > Organizadas
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="pro_de" value="de"  '. (($data['pro_de']=="de")?"checked":"").' > Desorganizadas
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">D. Al momento de la intervencion se descartaron y el/la paciento nego pensamientos suicidas u homicidas, asi como la presncia de disturbio perceptuales: </label>
                                    <div class="col-md-8" style="margin-left:15px">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="al_si" value="si"  '. (($data['al_si']=="si")?"checked":"").' > SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="al_no" value="no"  '. (($data['al_no']=="no")?"checked":"").' > NO
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label>De responder no, mencione cuales: </label>
                                            </div>
                                            <div class="col-md-6">
                                            <input type="text" class="form-control" name="de_responder_men" value=" '. $data['de_responder_men'].' ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6">E. Exprecion: </label>
                                    <div class="col-sm-12">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label>a. Expresion corporal: </label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_normal" value="normal"  '. (($data['expres_normal']=="normal")?"checked":"").' > Normal
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_alterado" value="alterado"  '. (($data['expres_alterado']=="alterado")?"checked":"").' > Alterado
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_cambio" value="cambio"  '. (($data['expres_cambio']=="cambio")?"checked":"").' > Cambio de respiracion
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_trans" value="trans"  '. (($data['expres_trans']=="trans")?"checked":"").' > Tranquilio 4
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_movi" value="movi"  '. (($data['expres_movi']=="movi")?"checked":"").' > Movimientos (cabeza, brazos y/o pies)
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label>b. Expresion Facial: </label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="facial_movi" value="movi"  '. (($data['facial_movi']=="movi")?"checked":"").' > Movimientos de los ojos
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="facial_boca" value="boca"  '. (($data['facial_boca']=="boca")?"checked":"").' > Movimientos de la boca
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label>c. Expresion verbal: </label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_normal_1" value="normal"  '. (($data['expres_normal_1']=="normal")?"checked":"").' > Normal
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_confu" value="confu"  '. (($data['expres_confu']=="confu")?"checked":"").' > Confundido
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_tri" value="tri"  '. (($data['expres_tri']=="tri")?"checked":"").' > Triste
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_alter" value="alter"  '. (($data['expres_alter']=="alter")?"checked":"").' > Alterado
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_difi" value="difi"  '. (($data['expres_difi']=="difi")?"checked":"").' > Dificultad al expresarse
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_repi" value="repi"  '. (($data['expres_repi']=="repi")?"checked":"").' > Repetitivo en las palabras
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3">En el area expresion la trabajadora social suscribiente descarto movimientos involuntarios producidos por alguna enfermeded y/o medicamento: </label>
                                            <div class="col-md-8" style="margin-left:15px">
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="en_el_si" value="si"  '. (($data['en_el_si']=="si")?"checked":"").' > SI
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="en_el_no" value="no"  '. (($data['en_el_no']=="no")?"checked":"").' > NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">F. Estado de animo presentado fue: </label>
                                    <div class="col-md-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="estado_alerto" value="alerto"  '. (($data['estado_alerto']=="alerto")?"checked":"").' > Alerta
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="estado_alegre" value="alegre"  '. (($data['estado_alegre']=="alegre")?"checked":"").' > Alegre
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                Tiempo <input type="checkbox" class="form-check-input" name="estado_tran" value="tran"  '. (($data['estado_tran']=="tran")?"checked":"").' > Tranquilo
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="estado_ansioso" value="ansioso"  '. (($data['estado_ansioso']=="ansioso")?"checked":"").' > Ansioso
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                Espacio <input type="checkbox" class="form-check-input" name="estado_triste" value="triste"  '. (($data['estado_triste']=="triste")?"checked":"").' > Triste
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="estado_decaido" value="decaido"  '. (($data['estado_decaido']=="decaido")?"checked":"").' > Decaido
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="estado_irritable" value="irritable"  '. (($data['estado_irritable']=="irritable")?"checked":"").' > Irritable
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="estado_agitado" value="agitado"  '. (($data['estado_agitado']=="agitado")?"checked":"").' > Agitado
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="estado_deprimido" value="deprimido"  '. (($data['estado_deprimido']=="deprimido")?"checked":"").' > Deprimido
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Observaciones</label>
                                    <div class="col-md-6" style="margin-left:15px">
                                    <textarea class="form-control" name="observaciones" rows="5" cols="10"> '. $data['observaciones'].' </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu5" class="tab-pane active">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Como se siente respecto a su estadia en el hogar ?</label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="como_lo" value="lo"  '. (($data['como_lo']=="lo")?"checked":"").' > Lo accepta
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="como_no_lo" value="no_lo"  '. (($data['como_no_lo']=="no_lo")?"checked":"").' > No Lo accepta
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Comentarios</label>
                                    <div class="col-sm-6">
                                    <textarea class="form-control" name="comentarios" rows="5" cols="10"> '. $data['comentarios'].' </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu6" class="tab-pane active">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Como interactua el entrevistado con otros residentes en el hogar? Se identifica con algurien en particular. (Explique sentimientos que muestra o expresa)</label>
                                    <div class="col-sm-6">
                                    <textarea class="form-control" name="com_otros" rows="5" cols="10"> '. $data['com_otros'].' </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Como interactua con el cuidador? Mantience buena empatia y se indentifica con el o por el contrario rechaza al ayuda de este. (Explique sentimientos que muestra o expresa)</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="com_cuidador" rows="5" cols="10"> '. $data['com_cuidador'].' </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Como se relaciona con la familia? (Sentimientios afectivos hacia su familia, frecuencia de visitas que recibe? Como se siente presente?) </label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="com_familia" rows="5" cols="10"> '. $data['com_familia'].' </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Se lo llevan los familiares algunos fines de semana fuera del hogar? </label>
                                <div class="col-md-5" style="margin-left:15px">
                                    <div class="form-check-inline ml-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="si_lo_si" value="si"  '. (($data['si_lo_si']=="si")?"checked":"").' > SI
                                        </label>
                                    </div>
                                    <div class="form-check-inline ml-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="si_lo_no" value="no"  '. (($data['si_lo_no']=="no")?"checked":"").' > NO
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Participa en las actividades sociales dentro de su nucleo familiar tales como: (madres, padres, accion de gracias, navidad etc) </label>
                                <div class="col-md-5" style="margin-left:15px">
                                    <div class="form-check-inline ml-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="participa_si" value="si"  '. (($data['participa_si']=="si")?"checked":"").' > SI
                                        </label>
                                    </div>
                                    <div class="form-check-inline ml-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="participa_no" value="no"  '. (($data['participa_no']=="no")?"checked":"").' > NO
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Participa en las actividades sociales qus se llevan a cabo en el hogar </label>
                                <div class="col-md-5" style="margin-left:15px">
                                    <div class="form-check-inline ml-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="qus_hogar_si" value="si"  '. (($data['qus_hogar_si']=="si")?"checked":"").' > SI
                                        </label>
                                    </div>
                                    <div class="form-check-inline ml-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="qus_hogar_no" value="no"  '. (($data['qus_hogar_no']=="no")?"checked":"").' > NO
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Mantieno contacto freecuente con hijos y nietos: </label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" name="mantieno" value=" '. $data['mantieno'].' ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <input type="checkbox" class="form-check-input" name="del_paciente" value="paciente"  '. (($data['del_paciente']=="paciente")?"checked":"").' > <label>La informacion fue recibida del paciente</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" class="form-check-input" name="del_terceros" value="terceros"  '. (($data['del_terceros']=="terceros")?"checked":"").' > <label>La informacion fue recibida de terceros</label>
                                </div>
                                <div class="col-md-3">
                                <label>Nombre: </label><input type="text" class="form-control" name="text_nombre" value=" '. $data['text_nombre'].' ">
                                </div>
                                <div class="col-md-3">
                                <label>Relacion: </label><input type="text" class="form-control" name="text_relacion" value=" '. $data['text_relacion'].' ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu7" class="tab-pane active">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Diagnostico: </label>
                                    <div class="col-sm-6">
                                    <input type="text" class="form-control" name="text_diagnostico" value=" '. $data['text_diagnostico'].' " onclick="sel_diagnosis()" Placeholder="Click to select or change ICD">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6">Plan de accion: </label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="pla_de_accion" rows="5" cols="10"> '. $data['pla_de_accion'].' </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
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
