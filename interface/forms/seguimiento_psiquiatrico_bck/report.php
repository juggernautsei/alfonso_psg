<?php
require_once(dirname(__file__)."/../../globals.php");

function seguimiento_psiquiatrico_report($pid, $encounter, $cols, $id)
{
	$data = sqlQuery("select * from form_seguimiento_psiquiatrico where pid=? and id=?", array($pid,$id));
//	$data1 = sqlStatement("select * from psychiatric_medicamento where form_id=?",$id);
  //      $drugs_code = [];
    //    while($row=sqlFetchArray($data1)){
//array_push($drugs_code,$row);
	//      }
	print "<style>input[type='checkbox'][readonly] {
  pointer-events: none;
}</style>";
	print "<table><tr><td>\n";
	print '  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Plan Medico</label>
      <input type="text" class="form-control" name="plan_medico" placeholder="Plan Medico" value=" '. $data['plan_medico'].' ">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Numero</label>
      <input type="text" class="form-control" name="numero" placeholder="Numero" value=" '. $data['numero'].' ">
    </div>
  </div>
<div class="form-row form-inline">

<div class="form-group col-md-12">
      <label for="inputEmail4">Modalidad : &nbsp;&nbsp;</label>
      <input type="checkbox" name="modalidad" value="individual"  '. (($data['modalidad'] =="individual") ? "checked" : "").' >
      <label for="inputPassword4">Individual </label>
      <input type="checkbox" name="individual" value="con_paciente"  '. (($data['individual'] == "con_paciente") ? "checked" :"").' >
      <label for="inputEmail4">Fam.Con Paciente </label>
      <input type="checkbox" name="con_paciente" value="sin_paciente"  '. (($data['con_paciente'] == "sin_paciente") ?"checked":"").' >
      <label for="inputPassword4">Fam.Sin Paciente </label>
      <input type="checkbox" name="sin_paciente" value="grupal"  '. (($data['sin_paciente']=="grupal")?"checked":"").' >
      <label for="inputPassword4">Grupal </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Diagnostico
      </label>
      <textarea class="col-md-12" rows="3" name="diagnostico"> '. $data['diagnostico'].' </textarea>
  </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Actitud : &nbsp;&nbsp;</label>
      <input type="checkbox" name="actitud" value="cooperador"  '. (($data['actitud'] == "cooperador")?"checked":"").' >
      <label for="inputPassword4">Cooperador </label>
      <input type="checkbox" name="cooperador" value="no_cooperador"  '. (($data['cooperador']=="no_cooperador")?"checked":"").' >
      <label for="inputEmail4">No Cooperador</label>
      <input type="checkbox" name="no_cooperador" value="hostil"  '. (($data['no_cooperador']=="hostil")?"checked":"").' >
      <label for="inputPassword4">Hostil</label>
      <input type="checkbox" name="hostil" value="demandante"  '. (($data['hostil']=="demandante")?"checked":"").' >
      <label for="inputPassword4">Demandante</label>
      <input type="checkbox" name="demandante" value="reservado"  '. (($data['demandante']=="reservado")?"checked":"").' >
      <label for="inputPassword4">Reservado</label>
      <input type="checkbox" name="reservado" value="suspicaz"  '. (($data['reservado']=="suspicaz")?"checkbox":"").' >
      <label for="inputPassword4">Suspicaz</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Sintomas Presentes : &nbsp;&nbsp;</label>
      <input type="checkbox" name="sintomas" value="ansiedad"  '. (($data['sintomas']=="ansiedad")?"checked":"").' >
      <label for="inputPassword4">Ansiedad</label>
      <input type="checkbox" name="ansiedad" value="deprimido"  '. (($data['ansiedad']=="deprimido")?"checked":"").' >
      <label for="inputEmail4">Deprimido</label>
      <input type="checkbox" name="deprimido" value="insomonia"  '. (($data['deprimido']=="insomonia")?"checked":"").' >
      <label for="inputPassword4">Insomonia</label>
      <input type="checkbox" name="insomonia" value="llanto"  '. (($data['insomonia']=="llanto")?"checked":"").' >
      <label for="inputPassword4">Llanto</label>
      <input type="checkbox" name="llanto" value="ataque_de_panico"  '. (($data['llanto']=="ataque_de_panico")?"checked":"").' >
      <label for="inputPassword4">Ataque De Panico</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Trastornos Perceptivos : &nbsp;&nbsp;</label>
      <input type="checkbox" name="trastornos_si" value="trastornos_si"  '. (($data['trastornos_si']=="trastornos_si")?"checked":"").' >
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="trastornos_no" value="trastornos_no"  '. (($data['trastornos_no']=="trastornos_no")?"checked":"").' >
      <label for="inputEmail4">No </label>
      <label for="inputEmail4">&nbsp;&nbsp;Describa: </label>
      <textarea class="form-control" rows=2 name="trastornos_describa"> '. $data['trastornos_describa'].' </textarea>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Tiempo De Sintomas</label>
      <input type="text" size="2" class="form-control" name="tiempo_sintomas" value=" '. $data['tiempo_sintomas'].' ">
      <label for="inputPassword4">Horas</label>
      <input type="text" size="2" class="form-control" name="horas" value=" '. $data['horas'].' ">
      <label for="inputEmail4">Dias</label>
      <input type="text" size="2" class="form-control" name="dias" value=" '. $data['dias'].' ">
      <label for="inputPassword4">Semanas</label>
      <input type="text" size="2" class="form-control" name="semanas" value=" '. $data['semanas'].' ">
      <label for="inputPassword4">Meses</label>
      <input type="text" size="2" class="form-control" name="meses" value=" '. $data['meses'].' ">
      <label for="inputPassword4">Anos</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Intensidad : &nbsp;&nbsp;</label>
      <input type="checkbox" name="intensidad" value="leve"  '. (($data['intensidad']=="leve")?"checked":"").' >
      <label for="inputPassword4">Leve</label>
      <input type="checkbox" name="leve" value="moderada"  '. (($data['leve']=="moderada")?"checked":"").' >
      <label for="inputEmail4">Moderada</label>
      <input type="checkbox"  name="moderada" value="severa"  '. (($data['moderada']=="severa")?"checked":"").' >
      <label for="inputEmail4">Severa</label>
</div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
        Orientacion:
      </label>
      <textarea class="col-md-12" rows="3" name="orientacion"> '. $data['orientacion'].' </textarea>
  </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Apariencia : &nbsp;&nbsp;</label>
      <input type="checkbox" name="apariencia" value="apropiada"  '. (($data['apariencia']=="apropiada")?"checked":"").' >
      <label for="inputPassword4">Apropiada</label>
      <input type="checkbox" name="apropiada" value="inapropiada"  '. (($data['apropiada']=="inapropiada")?"checked":"").' >
      <label for="inputEmail4">Inapropiada</label>
      <input type="checkbox" name="inapropiada" value="desalinada"  '. (($data['inapropiada']=="desalinada")?"checked":"").' >
      <label for="inputEmail4">Desalinada</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Animo : &nbsp;&nbsp;</label>
      <input type="checkbox"  name="animo" value="eutimico"  '. (($data['animo']=="eutimico")?"checked":"").' >
      <label for="inputPassword4">Eutimico</label>
      <input type="checkbox" name="eutimico" value="irritable"  '. (($data['eutimico']=="irritable")?"checked":"").' >
      <label for="inputEmail4">Irritable</label>
      <input type="checkbox"  name="irritable" value="euforico"  '. (($data['irritable']=="euforico")?"checked":"").' >
      <label for="inputPassword4">Euforico</label>
      <input type="checkbox" name="euforico" value="elevado"  '. (($data['euforico']=="elevado")?"checked":"").' >
      <label for="inputPassword4">Elevado</label>
      <input type="checkbox" name="elevado" value="ansioso"  '. (($data['elevado']=="ansioso")?"checked":"").' >
      <label for="inputPassword4">Ansioso</label>
      <input type="checkbox" name="ansioso" value="deprimido"  '. (($data['ansioso']=="deprimido")?"checked":"").' >
      <label for="inputPassword4">Deprimido</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Afecto : &nbsp;&nbsp;</label>
      <input type="checkbox"  name="afecto" value="congruente"  '. (($data['afecto']=="congruente")?"checked":"").' >
      <label for="inputPassword4">Congruente</label>
      <input type="checkbox" name="congruente" value="emotado"  '. (($data['congruente']=="emotado")?"checked":"").' >
      <label for="inputEmail4">Embotado</label>
      <input type="checkbox" name="emotado" value="labil"  '. (($data['emotado']=="labil")?"checked":"").' >
      <label for="inputPassword4">Labil</label>
      <input type="checkbox"  name="labil" value="afecto_inapropiado"  '. (($data['labil']=="afecto_inapropiado")?"checked":"").' >
      <label for="inputPassword4">Inapropiado</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Juicio : &nbsp;&nbsp;</label>
      <input type="checkbox" name="juicio" value="j_apropiada"  '. (($data['juicio']=="j_apropiada")?"checked":"").' >
      <label for="inputPassword4">Apropiada</label>
      <input type="checkbox" name="j_apropiada" value="j_conservado"  '. (($data['j_apropiada']=="j_conservado")?"checked":"").' >
      <label for="inputEmail4">Conservado</label>
      <input type="checkbox" name="j_conservado" value="j_pobre"  '. (($data['j_conservado']=="j_pobre")?"checked":"").' >
      <label for="inputPassword4">Pobre</label>
      <input type="checkbox"  name="j_pobre" value="j_nulo"  '. (($data['j_pobre']=="j_nulo")?"checked":"").' >
      <label for="inputPassword4">Nulo</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Interospeccion:</label>
      <input type="checkbox" name="interospeccion" value="i_apropiada"  '. (($data['interospeccion']=="i_apropiada")?"checked":"").' >
      <label for="inputPassword4">Apropiada</label>
      <input type="checkbox"  name="i_apropiada" value="i_conservado"  '. (($data['i_apropiada']=="i_conservado")?"checked":"").' >
      <label for="inputEmail4">Conservado</label>
      <input type="checkbox" name="i_conservado" value="i_pobre"  '. (($data['i_conservado']=="i_pobre")?"checked":"").' >
      <label for="inputPassword4">Pobre</label>
      <input type="checkbox" name="i_pobre" value="i_nulo"  '. (($data['i_pobre']=="i_nulo")?"checekd":"").' >
      <label for="inputPassword4">Nulo</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Memoria:</label>
      <input type="text" class="form-control" name="memoria" value=" '. $data['memoria'].' ">
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Immediata:</label>
      <input type="checkbox" name="immediata" value="im_afectada"  '. (($data['immediata']=="im_afectada")?"checked":"").' >
      <label for="inputPassword4">Afectada</label>
      <input type="checkbox" name="im_afectada" value="im_apropiada"  '. (($data['im_afectada']=="im_apropiada")?"checked":"").' >
      <label for="inputEmail4">Apropiada</label>
      <input type="checkbox" name="im_apropiada" value="intacta"  '. (($data['im_apropiada']=="intacta")?"checked":"").' >
      <label for="inputPassword4">Intacta &nbsp;&nbsp;</label>
      <label for="inputPassword4">Corto Tiempo:</label>
      <input type="checkbox" name="corto_tiempo" value="ti_afectada"  '. (($data['corto_tiempo']=="ti_afectada")?"checekd":"").' >
<label for="inputPassword4">Afectada</label>
      <input type="checkbox" name="ti_afectada" value="ti_apropiada"  '. (($data['ti_afectada']=="ti_apropiada")?"checked":"").' >
      <label for="inputEmail4">Apropiada</label>
      <input type="checkbox" name="ti_apropiada" value="intacta"  '. (($data['ti_apropiada']=="intacta")?"checked":"").' >
      <label for="inputPassword4">Intacta &nbsp;&nbsp;</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Reciente:</label>
      <input type="checkbox" name="reciente" value="re_afectada"  '. (($data['reciente']=="re_afectada")?"checked":"").' >
      <label for="inputPassword4">Afectada</label>
      <input type="checkbox" name="re_afectada" value="re_apropiada"  '. (($data['re_afectada']=="re_apropiada")?"checked":"").' >
      <label for="inputEmail4">Apropiada</label>
      <input type="checkbox" name="re_apropiada" value="intacta"  '. (($data['re_apropiada']=="intacta")?"checked":"").' >
      <label for="inputPassword4">Intacta &nbsp;&nbsp;</label>
      <label for="inputPassword4">Remota:</label>
      <input type="checkbox" name="remota" value="rem_afectada"  '. (($data['remota']=="rem_afectada")?"checked":"").' >
<label for="inputPassword4">Afectada</label>
      <input type="checkbox" name="rem_afectada" value="rem_apropiada"  '. (($data['rem_afectada']=="rem_apropiada")?"checked":"").' >
      <label for="inputEmail4">Apropiada</label>
      <input type="checkbox" name="rem_apropiada" value="intacta"  '. (($data['rem_apropiada']=="intacta")?"checked":"").' >
      <label for="inputPassword4">Intacta &nbsp;&nbsp;</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Ideas de Suicido:</label>
      <input type="checkbox" name="ids_si" value="ids_si"  '. (($data['ids_si']=="ids_si")?"checked":"").' >
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="ids_no" value="ids_no"  '. (($data['ids_no']=="ids_no")?"checked":"").' >
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
      <label for="inputEmail4">Describa:</label>
       <textarea class="form-control" rows="3" name="ids_describa"> '. $data['ids_describa'].' </textarea>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Ideas Homicidas:</label>
      <input type="checkbox" name="idh_si" value="idh_si"  '. (($data['idh_si']=="idh_si")?"checked":"").' >
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="idh_no" value="idh_no"  '. (($data['idh_no']=="idh_no")?"checked":"").' >
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
      <label for="inputEmail4">Describa:</label>
       <textarea class="form-control" rows="3" name="idh_describa"> '. $data['idh_describa'].' </textarea>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Evaluacion dirigida a:</label>
      <input type="checkbox" name="eda" value="eda"  '. (($data['eda']=="eda")?"checked":"").' >
      <label for="inputPassword4">Remision de sintomatologia</label>
      <input type="checkbox" name="rds" value="rds"  '. (($data['rds']=="rds")?"checked":"").' >
      <label for="inputEmail4">Reevaluacion de Farmacos</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Recomendacion:</label>
      <input type="checkbox" name="recomendacion" value="seg_amb"  '. (($data['recomendacion']=="seg_amb")?"checked":"").' >
      <label for="inputPassword4">Seguimiento ambulatorio</label>
      <input type="checkbox" name="seg_amb" value="psicoterapia"  '. (($data['seg_amb']=="psicoterapia")?"checked":"").' >
      <label for="inputEmail4">Psicoterapia</label>
      <input type="checkbox" name="psicoterapia" value="generalista"  '. (($data['psicoterapia']=="generalista")?"checked":"").' >
      <label for="inputEmail4">Generalista</label>
      <input type="checkbox" name="generalista" value="hospitalizacion"  '. (($data['generalista']=="hospitalizacion")?"checked":"").' >
      <label for="inputEmail4">Hospitalizacion</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Programa de Hospitalizacion:</label>
      <input type="checkbox" name="pdh" value="otro"  '. (($data['pdh']=="otro")?"checked":"").' >
      <label for="inputPassword4">Otro</label>
</div>
<div class="form-group col-md-12 form-inline">
<label for="inputEmail4">Medicacion:</label>
       <textarea class="col-md-12" rows="3" name="medicacion"> '. $data['medicacion'].' </textarea>
</div>
<div class="form-group col-md-12 form-inline">
<label for="inputEmail4">Proxima cita:</label>
       <textarea class="col-md-12" rows="3" name="pc"> '. $data['pc'].' </textarea>
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
