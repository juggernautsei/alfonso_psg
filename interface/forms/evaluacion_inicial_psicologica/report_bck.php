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
print '<div><h4>Datos Demograficos</h4></div>';
//	print "<table><tr><td>\n";
	print '                <div>
                    <div>
                        <div class="col-md-12 in-content">
                            <div class="">
                                <div class="">
                                    <div class="form-group row">
                                        <label class="text-right">Matrimonios anteriores:</label>
                                        <div class="">
                                       '. $data['anteriores'].'
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Hijos / as:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="hijos_as" value=" '. $data['hijos_as'].' ">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Edades:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="edades" value=" '. $data['edades'].' ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Escolarided del cliente</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="cliente" value=" '. $data['cliente'].' ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Lugar de Trabajo: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="lugar_trabojo" value=" '. $data['lugar_trabojo'].' ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Ocupacion: </label>
                                        <div class="col-sm-6 form-check-inline">
                                            <input type="text" class="form-control" name="ocupacion" value=" '. $data['ocupacion'].' ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Anos en el empleo actual: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="anos_actual" value=" '. $data['anos_actual'].' ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2">Experiencia militar: </label>
                                        <div class="col-sm-10 form-inline">
                                            <input type="text" class="form-control" name="militar" value=" '. $data['militar'].' "> Presente <input type="text" class="form-control" name="militar1" value=" '. $data['militar1'].' "> Pasada <input type="text" class="form-control" name="militar2" value=" '. $data['militar2'].' "> N/A
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
		    </div>
<div><h4>Asunto Presentado: </h4></div>
                    <div id="menu2" class="tab-pane active">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">ASUNTO PRESENTADO:</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="presentado" rows="5" cols="10"> '. $data['presentado'].' </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Desde cuando? </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="desde_cuando" value=" '. $data['desde_cuando'].' ">
                                    </div>
                                    <label class="col-sm-3 text-right">Evento precipitante: </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="evento_precipitante" value=" '. $data['evento_precipitante'].' ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Como le afecta su funcionamiento habitual (sintomas / conducta)</label>
                                    <div class="col-md-12">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Personalmente:</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="personalmente_como" value=" '. $data['personalmente_como'].' ">(Ej, estado emocional, sintomas, salud)
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Ocupacionalmente:</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="ocupacionalmente" value=" '. $data['ocupacionalmente'].' ">(Ej, pobre ejacutoria, ausencias)
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Socialmente:</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="socialmente" value=" '. $data['socialmente'].' ">(Ej, conflictos interpersonales, aislamiento)
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-2">Tratamiento previo: </label>
                                    <div class="col-md-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="trat_si" value="si"  '. (($data['trat_si']=='si')?'checked':'').' > SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="trat_no" value="no"  '. (($data['trat_no']=='no')?'checked':'').' > NO
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Psicologico:</label>
                                        </div>
                                        <div class="col-sm-10 form-inline">
                                            Lugar <input type="text" class="form-control" name="lugar" value=" '. $data['lugar'].' "> Cuando <input type="text" class="form-control" name="cuando_psi" value=" '. $data['cuando_psi'].' "> Dx: <input type="text" class="form-control" name="dx" value=" '. $data['dx'].' ">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Psiquiatrico:</label>
                                        </div>
                                        <div class="col-sm-10 form-inline ">
                                            Lugar <input type="text" class="form-control" name="lugar_1" value=" '. $data['lugar_1'].' "> Cuando <input type="text" class="form-control" name="cuado_1" value=" '. $data['cuado_1'].' "> Medicamentos: <input type="text" class="form-control" name="medi" value=" '. $data['medi'].' ">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Sustancias: </label>
                                        </div>
                                        <div class="col-sm-10 form-inline">
                                            Lugar <input type="text" class="form-control" name="lugar_2" value=" '. $data['lugar_2'].' "> Cuando <input type="text" class="form-control" name="cuado_2" value=" '. $data['cuado_2'].' "> Alcohol: <input type="text" class="form-control" name="alcohol" value=" '. $data['alcohol'].' "> Drogas: <input type="text" class="form-control" name="drogas" value=" '. $data['drogas'].' ">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Hospitaliationes psiquiatricas: </label>
                                        </div>
                                        <div class="col-sm-6 form-inline">
                                            Lugar <input type="text" class="form-control" name="lugar_3" value=" '. $data['lugar_3'].' ">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-sm-10 form-inline">
                                            Cuando <input type="text" class="form-control" name="cuando" value=" '. $data['cuando'].' "> Cuantas <input type="text" class="form-control" name="cuantas" value=" '. $data['cuantas'].' "> Parcial: <input type="text" class="form-control" name="parcial" value=" '. $data['parcial'].' "> Regular: <input type="text" class="form-control" name="regular" value=" '. $data['regular'].' ">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Historial Familiar: </label>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="hist_si" value="si"  '. (($data['hist_si'] == "si") ? "checked":"").' > SI
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="hist_no" value="no"  '. (($data['hist_no'] == "no") ? "checked":"").' > NO
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 form-inline">
                                            Relacion Fam: <input type="text" class="form-control" name="relacion" value=" '. $data['relacion'].' ">
                                        </div>
                                        <div class="col-md-3 form-inline">
                                            Dx: <input type="text" class="form-control" name="dx_1" value=" '. $data['dx_1'].' ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Historial Medico y Condiciones Fisicas: </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="hist_medi" rows="5" cols="10"> '. $data['hist_medi'].' </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Medicamentos al presente: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="medi_presenta" value=" '. $data['medi_presenta'].' ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Historial Psicosocial Relevante (Logros, perdidas, traumas y sistema de apoyo): </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="medi_presente_area" rows="5" cols="10"> '. $data['medi_presente_area'].' </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Aspectos Legales: </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="aspectos_legal" rows="5" cols="10">  '. $data['aspectos_legal'].' </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Situacion financieras: </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="situacion_finance" rows="5" cols="10"> '. $data['situacion_finance'].' </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Consumo de Alcohol: </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="consumo_alcohol" rows="5" cols="10"> '. $data['consumo_alcohol'].' </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Consumo de Sustancias Controladas: </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="controladas" rows="5" cols="10"> '. $data['controladas'].' </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
		    </div>
<div><h4>Evaluacion De Riesgo (basada en informacion disponible): </h4></div>
                    <div id="menu3" class="tab-pane active">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12">Evaluaction de Riesgo</label>
                                    <div class="col-sm-12">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Suicidio</td>
                                                    <td><input type="checkbox" class="form-check-input" name="suicido_1" value="1"  '. (($data['suicido_1']=='1')?"checked":"").' >1</td>
                                                    <td><input type="checkbox" class="form-check-input" name="suicido_2" value="2"  '. (($data['suicido_2']=='2')?"checked":"").' > 2</td>
                                                    <td><input type="checkbox" class="form-check-input" name="suicido_3" value="3"  '. (($data['suicido_3']=='3')?"checked":"").' > 3</td>
                                                    <td><input type="checkbox" class="form-check-input" name="suicido_4" value="4"  '. (($data['suicido_4']=='4')?"checked":"").' > 4</td>
                                                    <td><input type="checkbox" class="form-check-input" name="suicido_5" value="5"  '. (($data['suicido_5']=='5')?"checked":"").' > 5</td>
                                                </tr>
                                                <tr>
                                                    <td>Homicidio</td>
                                                    <td><input type="checkbox" class="form-check-input" name="homo_1" value="1"  '. (($data['homo_1']=='1')?"checked":"").' >1</td>
                                                    <td><input type="checkbox" class="form-check-input" name="homo_2" value="2"  '. (($data['homo_2']=='2')?"checked":"").' > 2</td>
                                                    <td><input type="checkbox" class="form-check-input" name="homo_3" value="3"  '. (($data['homo_3']=='3')?"checked":"").' > 3</td>
                                                    <td><input type="checkbox" class="form-check-input" name="homo_4" value="4"  '. (($data['homo_4']=='4')?"checked":"").' > 4</td>
                                                    <td><input type="checkbox" class="form-check-input" name="homo_5" value="5"  '. (($data['homo_5']=='5')?"checked":"").' > 5</td>
                                                </tr>
                                                <tr>
                                                    <td>Violencia domestica / familiar</td>
                                                    <td><input type="checkbox" class="form-check-input" name="violencia_1" value="1"  '. (($data['violencia_1']=='1')?"checked":"").' >1</td>
                                                    <td><input type="checkbox" class="form-check-input" name="violencia_2" value="2"  '. (($data['violencia_2']=='2')?"checked":"").' > 2</td>
                                                    <td><input type="checkbox" class="form-check-input" name="violencia_3" value="3"  '. (($data['violencia_3']=='3')?"checked":"").' > 3</td>
                                                    <td><input type="checkbox" class="form-check-input" name="violencia_4" value="4"  '. (($data['violencia_4']=='4')?"checked":"").' > 4</td>
                                                    <td><input type="checkbox" class="form-check-input" name="violencia_5" value="5"  '. (($data['violencia_5']=='5')?"checked":"").' > 5</td>
                                                </tr>
                                                <tr>
                                                    <td>Violencia en el trabajo</td>
                                                    <td><input type="checkbox" class="form-check-input" name="tra_1" value="1"  '. (($data['tra_1']=='1')?"checked":"").' >1</td>
                                                    <td><input type="checkbox" class="form-check-input" name="tra_2" value="2"  '. (($data['tra_2']=='2')?"checked":"").' > 2</td>
                                                    <td><input type="checkbox" class="form-check-input" name="tra_3" value="3"  '. (($data['tra_3']=='3')?"checked":"").' > 3</td>
                                                    <td><input type="checkbox" class="form-check-input" name="tra_4" value="4"  '. (($data['tra_4']=='4')?"checked":"").' > 4</td>
                                                    <td><input type="checkbox" class="form-check-input" name="tra_5" value="5"  '. (($data['tra_5']=='5')?"checked":"").' > 5</td>
                                                </tr>
                                                <tr>
                                                    <td>Maltrato (ninos / envejecientes)</td>
                                                    <td><input type="checkbox" class="form-check-input" name="maltrato_1" value="1"  '. (($data['maltrato_1']=='1')?"checked":"").' >1</td>
                                                    <td><input type="checkbox" class="form-check-input" name="maltrato_2" value="2"  '. (($data['maltrato_2']=='2')?"checked":"").' > 2</td>
                                                    <td><input type="checkbox" class="form-check-input" name="maltrato_3" value="3"  '. (($data['maltrato_3']=='3')?"checked":"").' > 3</td>
                                                    <td><input type="checkbox" class="form-check-input" name="maltrato_4" value="4"  '. (($data['maltrato_4']=='4')?"checked":"").' > 4</td>
                                                    <td><input type="checkbox" class="form-check-input" name="maltrato_5" value="5"  '. (($data['maltrato_5']=='5')?"checked":"").' > 5</td>
                                                </tr>
                                                <tr>
                                                    <td>Psicosis (alucinaciones / delirios)</td>
                                                    <td><input type="checkbox" class="form-check-input" name="psicosis_1" value="1"  '. (($data['psicosis_1']=='1')?"checked":"").' >1</td>
                                                    <td><input type="checkbox" class="form-check-input" name="psicosis_2" value="2"  '. (($data['psicosis_2']=='2')?"checked":"").' > 2</td>
                                                    <td><input type="checkbox" class="form-check-input" name="psicosis_3" value="3"  '. (($data['psicosis_3']=='3')?"checked":"").' > 3</td>
                                                    <td><input type="checkbox" class="form-check-input" name="psicosis_4" value="4"  '. (($data['psicosis_4']=='4')?"checked":"").' > 4</td>
                                                    <td><input type="checkbox" class="form-check-input" name="psicosis_5" value="5"  '. (($data['psicosis_5']=='5')?"checked":"").' > 5</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12">Escala para evaluar riesgo: </label>
                                    <div class="col-sm-12">
                                        <div class="col-md-12">
                                            <input type="checkbox" class="form-check-input" name="evaluado" value="evaluado"  '. (($data['evaluado']=='evaluado')?"checked":"").' > Evaluado, no hay indicadores de riesgo
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-12">
                                            <input type="checkbox" class="form-check-input" name="verbaliza" value="verbaliza"  '. (($data['verbaliza']=='verbaliza')?"checked":"").' > Verbaliza amenaza, no hay peligro actual
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-12">
                                            <input type="checkbox" class="form-check-input" name="hace" value="hace"  '. (($data['hace']=='hace')?"checked":"").' > Hace, amenaza existe posibilidad de violencia
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-12">
                                            <input type="checkbox" class="form-check-input" name="existe" value="existe"  '. (($data['existe']=='existe')?"checked":"").' > Existe amenaza real de violencia (planificacion)
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-12">
                                            <input type="checkbox" class="form-check-input" name="el_cliente" value="el_cliente"  '. (($data['el_cliente']=='el_cliente')?"checked":"").' > El cliente es peligroso para el u otros
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
		    </div>
<div><h4>Impresion Diagnostica: </h4></div>
                    <div id="menu4" class="tab-pane active">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12">Impresion Diagnostica</label>
                                    <div class="col-sm-12">
                                        <div class="col-md-2">
                                            <label>Eje I : </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="eji_1" value=" '. $data['eji_1'].' ">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-2">
                                            <label>Eje II : </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="eji_2" value=" '. $data['eji_2'].' ">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-2">
                                            <label>Eje III : </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="eji_3" value=" '. $data['eji_3'].' ">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-2">
                                            <label>Eje IV : </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="eji_4" value=" '. $data['eji_4'].' ">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-2">
                                            <label>Eje V : </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="eji_5" value=" '. $data['eji_5'].' ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
		    </div>
<div><h4>Plan De Tratamiento: </h4></div>
                    <div id="menu5" class="tab-pane active">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12">Plan De Tratamiento</label>
                                    <div class="col-sm-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Problema / Sintomas</th>
                                                    <th>Objectivo</th>
                                                    <th>Estrategia Terapeutica</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Referido a otro recurso</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="referido" value=" '. $data['referido'].' ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Firma Cliente (o custodia legal)</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="firma" value=" '. $data['firma'].' ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Firma Psicologo y Num. Licencia</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="licencia" value=" '. $data['licencia'].' ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
