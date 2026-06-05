<?php
require_once(dirname(__file__)."/../../globals.php");

function nota_de_progreso_psicologica_report($pid, $encounter, $cols, $id)
{
	$data = sqlQuery("select * from form_nota_de_progreso_psicologica where pid=? and id=?", array($pid,$id));
//	$data1 = sqlStatement("select * from psychiatric_medicamento where form_id=?",$id);
  //      $drugs_code = [];
    //    while($row=sqlFetchArray($data1)){
//array_push($drugs_code,$row);
	//      }
	print "<style>input[type='checkbox'][readonly] {
  pointer-events: none;
}</style>";
	print "<table>";
	print '<tr><td><b>Fecha de Servicio:</b></td><td>'.attr(oeFormatShortDate(substr($data['date_service'], 0, 10))).'</td></tr>';
  print '<tr><td>Start Time: </td><td>'.$data['start_time'].'</td></tr><tr><td>End Time: </td><td>'.$data['end_time'].'</td></tr>';

	print '<tr><td colspan=2><b>
       Informante (si no es paciente):
      </b></td><td colspan=7>
      '. $data['informante'] .'
  </td></tr>
<tr><td>
      <b>
       S:
      </b>
	  </td><td colspan=8>
      '. $data['informante_s'].'
  </td></tr>
  <tr><td>
<b>O: </b>
</td></tr>
<tr><td>
      <b>Aparencia: </b>
	  </td><td>
      <input type="checkbox" name="apa_acicalado" value="acicalado"  '. (($data['apa_acicalado']=="acicalado")?"checked='checked'":"").' >
      <label for="inputPassword4">Acicalado</label>
	  </td><td>
      <input type="checkbox" name="apa_despeinado" value="despeinado"  '. (($data['apa_despeinado']=="despeinado")?"checked='checked'":"").' >
      <label for="inputEmail4">Despeinado</label>
	  </td><td>
      <input type="checkbox" name="apa_extrano" value="extrano"  '. (($data['apa_extrano']=="extrano")?"checked='checked'":"").' >
      <label for="inputEmail4">Extrano</label>
	  </td><td>
      <input type="checkbox" name="apa_inapropiado" value="inapropiado"  '. (($data['apa_inapropiado']=="inapropiado")?"checked='checked'":"").' >
      <label for="inputEmail4">Inapropiado</label>
	  </td></tr>
<tr><td>
      <b>Higiene: </b>
	  </td><td>
      <input type="checkbox" name="hig_buena" value="buena"  '. (($data['hig_buena']=="buena")?"checked='checked'":"").' >
      <label for="inputPassword4">Buena</label>
	  </td><td>
      <input type="checkbox" name="hig_aceptable" value="aceptable"  '. (($data['hig_aceptable']=="aceptable")?"checked='checked'":"").' >
      <label for="inputEmail4">Aceptable</label>
	  </td><td>
      <input type="checkbox" name="hig_pobre" value="pobre"  '. (($data['hig_pobre']=="pobre")?"checked='checked'":"").' >
      <label for="inputEmail4">Pobre</label>
</td></tr>
<tr><td>
      <b>Contacto Visual: </b>
	  </td><td>
      <input type="checkbox" name="cv_buena" value="buena"  '. (($data['cv_buena']=="buena")?"checked='checked'":"").' >
      <label for="inputPassword4">Buena</label>
	  </td><td>
      <input type="checkbox" name="cv_aceptable" value="aceptable"  '. (($data['cv_aceptable']=="aceptable")?"checked='checked'":"").' >
      <label for="inputEmail4">Aceptable</label>
	  </td><td>
      <input type="checkbox" name="cv_pobre" value="pobre"  '. (($data['cv_pobre']=="pobre")?"checked='checked'":"").' >
      <label for="inputEmail4">Pobre</label>
</td></tr>
<tr><td>
      <b>Actitud: </b>
	  </td><td>
      <input type="checkbox" name="ac_cooperadora" value="cooperadora"  '. (($data['ac_cooperadora']=="cooperadora")?"checked='checked'":"").' >
      <label for="inputPassword4">Cooperadora</label>
	  </td><td>
      <input type="checkbox" name="ac_defensiva" value="defensiva"  '. (($data['ac_defensiva']=="defensiva")?"checked='checked'":"").' >
      <label for="inputEmail4">Defensiva</label>
	  </td><td>
      <input type="checkbox" name="ac_cauteloso" value="cauteloso"  '. (($data['ac_cauteloso']=="cauteloso")?"checked='checked'":"").' >
      <label for="inputEmail4">Cauteloso</label>
	  </td><td>
        <input type="checkbox" name="ac_evasiva" value="evasiva"  '. (($data['ac_evasiva']=="evasiva")?"checked='checked'":"").' >
      <label for="inputEmail4">Evasiva</label>
	  </td><td>
        <input type="checkbox" name="ac_suspicaz" value="suspicaz"  '. (($data['ac_suspicaz']=="suspicaz")?"checked='checked'":"").' >
      <label for="inputEmail4">Suspicaz</label>
	  </td><td>
        <input type="checkbox" name="ac_hostil" value="hostil"  '. (($data['ac_hostil']=="hostil")?"checked='checked'":"").' >
      <label for="inputEmail4">Hostil</label>
	  </td><td>
        <input type="checkbox" name="ac_seductiva" value="seductiva"  '. (($data['ac_seductiva']=="seductiva")?"checked='checked'":"").' >
      <label for="inputEmail4">Seductiva</label>
	  </td><td>
        <input type="checkbox" name="ac_apatico" value="apatico"  '. (($data['ac_apatico']=="apatico")?"checked='checked'":"").' >
      <label for="inputEmail4">Apatico</label>
</td></tr>
<tr><td>
      <b>Actividad Motora: </b>
	  </td><td>
      <input type="checkbox" name="am_calmada" value="calmada"  '. (($data['am_calmada']=="calmada")?"checked='checked'":"").' >
      <label for="inputPassword4">Calmada</label>
	  </td><td>
      <input type="checkbox" name="am_retardada" value="retardada"  '. (($data['am_retardada']=="retardada")?"checked='checked'":"").' >
      <label for="inputEmail4">Retardada</label>
	  </td><td>
      <input type="checkbox" name="am_acumentada" value="acumentada"  '. (($data['am_acumentada']=="acumentada")?"checked='checked'":"").' >
      <label for="inputEmail4">Acumentada</label>
	  </td><td>
        <input type="checkbox" name="am_agitada" value="agitada"  '. (($data['am_agitada']=="agitada")?"checked='checked'":"").' >
      <label for="inputEmail4">Agitada</label>
	  </td><td>
        <input type="checkbox" name="am_movimientos" value="movimientos"  '. (($data['am_movimientos']=="movimientos")?"checked='checked'":"").' >
      <label for="inputEmail4">Movimientos Inoluntarios</label>
</td></tr>
<tr><td>
      <b>Animo: </b>
	  </td><td>
      <input type="checkbox" name="ani_eutimico" value="eutimico"  '. (($data['ani_eutimico']=="eutimico")?"checked='checked'":"").' >
      <label for="inputPassword4">Eutimico</label>
	  </td><td>
      <input type="checkbox" name="ani_depresivo" value="depresivo"  '. (($data['ani_depresivo']=="depresivo")?"checked='checked'":"").' >
      <label for="inputEmail4">Depresivo</label>
	  </td><td>
      <input type="checkbox" name="ani_ansioso" value="ansioso"  '. (($data['ani_ansioso']=="ansioso")?"checked='checked'":"").' >
      <label for="inputEmail4">Ansioso</label>
	  </td><td>
        <input type="checkbox" name="ani_coraje" value="coraje"  '. (($data['ani_coraje']=="coraje")?"checked='checked'":"").' >
      <label for="inputEmail4">Coraje</label>
	  </td><td>
        <input type="checkbox" name="ani_euforico" value="euforico"  '. (($data['ani_euforico']=="euforico")?"checked='checked'":"").' >
      <label for="inputEmail4">Euforico</label>
	  </td><td>
        <input type="checkbox" name="ani_culpabilidad" value="culpabilidad"  '. (($data['ani_culpabilidad']=="culpabilidad")?"checked='checked'":"").' >
      <label for="inputEmail4">Culpabilidad</label>
</td></tr>
<tr><td>
      <b>Afecto: </b>
	  </td><td>
      <input type="checkbox" name="afe_apropiado" value="apropiado"  '. (($data['afe_apropiado']=="apropiado")?"checked='checked'":"").' >
      <label for="inputPassword4">Apropiado</label>
	  </td><td>
      <input type="checkbox" name="afe_labil" value="labil"  '. (($data['afe_labil']=="labil")?"checked='checked'":"").' >
      <label for="inputEmail4">Labil</label>
	  </td><td>
      <input type="checkbox" name="afe_intensidad_normal" value="intensidad_normal"  '. (($data['afe_intensidad_normal']=="intensidad_normal")?"checked='checked'":"").' >
      <label for="inputEmail4">Intensidad Normal</label>
	  </td><td>
        <input type="checkbox" name="afe_maxima_intensidad" value="maxima_intensidad"  '. (($data['afe_maxima_intensidad']=="maxima_intensidad")?"checked='checked'":"").' >
      <label for="inputEmail4">Maxima Intensidad</label>
	  </td><td>
        <input type="checkbox" name="afe_restringido" value="restringido"  '. (($data['afe_restringido']=="restringido")?"checked='checked'":"").' >
      <label for="inputEmail4">Restringido</label>
	  </td><td>
        <input type="checkbox" name="afe_embotado" value="embotado"  '. (($data['afe_embotado']=="embotado")?"checked='checked'":"").' >
      <label for="inputEmail4">Embotado</label>
	  </td><td>
        <input type="checkbox" name="afe_aplanado" value="aplanado"  '. (($data['afe_aplanado']=="aplanado")?"checked='checked'":"").' >
      <label for="inputEmail4">Aplanado</label>
</td></tr>
<tr><td>
      <b>Discurso: </b>
	  </td><td>
      <input type="checkbox" name="dis_normal" value="normal"  '. (($data['dis_normal']=="normal")?"checked='checked'":"").' >
      <label for="inputPassword4">Normal</label>
	  </td><td>
      <input type="checkbox" name="dis_rapido" value="rapido"  '. (($data['dis_rapido']=="rapido")?"checked='checked'":"").' >
      <label for="inputEmail4">Rapido</label>
	  </td><td>
      <input type="checkbox" name="dis_lento" value="lento"  '. (($data['dis_lento']=="lento")?"checked='checked'":"").' >
      <label for="inputEmail4">Lento</label>
	  </td><td>
        <input type="checkbox" name="dis_alto" value="alto"  '. (($data['dis_alto']=="alto")?"checked='checked'":"").' >
      <label for="inputEmail4">Alto</label>
	  </td><td>
        <input type="checkbox" name="dis_dramatico" value="dramatico"  '. (($data['dis_dramatico']=="dramatico")?"checked='checked'":"").' >
      <label for="inputEmail4">Dramatico</label>
	  </td><td>
        <input type="checkbox" name="dis_bloqueo" value="bloqueo"  '. (($data['dis_bloqueo']=="bloqueo")?"checked='checked'":"").' >
      <label for="inputEmail4">Bloqueo de Pensamientos</label>
	  </td><td>
        <input type="checkbox" name="dis_monotono" value="monotono"  '. (($data['dis_monotono']=="monotono")?"checked='checked'":"").' >
      <label for="inputEmail4">Monotono</label>
	  </td><td>
        <input type="checkbox" name="dis_suave" value="suave"  '. (($data['dis_suave']=="suave")?"checked='checked'":"").' >
      <label for="inputEmail4">Suave</label>
	  </td><td>
        <input type="checkbox" name="dis_incoherente" value="incoherente"  '. (($data['dis_incoherente']=="incoherente")?"checked='checked'":"").' >
      <label for="inputEmail4">Incoherente</label>
	  </td><td>
        <input type="checkbox" name="dis_ilogico" value="ilogico"  '. (($data['dis_ilogico']=="ilogico")?"checked='checked'":"").' >
      <label for="inputEmail4">Ilogico</label>
</td></tr>
<tr><td>
      <b>Dificultades Cognitivas: </b>
	  </td><td>
      <input type="checkbox" name="dc_ninguna" value="ninguna"  '. (($data['dc_ninguna']=="ninguna")?"checked='checked'":"").' >
      <label for="inputPassword4">Ninguna</label>
	  </td><td>
      <input type="checkbox" name="dc_atencion" value="atencion"  '. (($data['dc_atencion']=="atencion")?"checked='checked'":"").' >
      <label for="inputEmail4">Atencion</label>
	  </td><td>
      <input type="checkbox" name="dc_concentracion" value="concentracion"  '. (($data['dc_concentracion']=="concentracion")?"checked='checked'":"").' >
      <label for="inputEmail4">Concentracion</label>
	  </td><td>
        <input type="checkbox" name="dc_abstraccion" value="abstraccion"  '. (($data['dc_abstraccion']=="abstraccion")?"checked='checked'":"").' >
      <label for="inputEmail4">Abstraccion</label>
	  </td><td>
        <input type="checkbox" name="dc_introspeccion" value="introspeccion"  '. (($data['dc_introspeccion']=="introspeccion")?"checked='checked'":"").' >
      <label for="inputEmail4">Introspeccion</label>
	  </td><td>
        <input type="checkbox" name="dc_juicio" value="juicio"  '. (($data['dc_juicio']=="juicio")?"checked='checked'":"").' >
      <label for="inputEmail4">Juicio</label>
</td></tr>
<tr><td>
      <b>Memoria: </b>
	  </td><td>
      <input type="checkbox" name="mem_inmediata" value="inmediata"  '. (($data['mem_inmediata']=="inmediata")?"checked='checked'":"").' >
      <label for="inputPassword4">Inmediata</label>
	  </td><td>
      <input type="checkbox" name="mem_reciente" value="reciente"  '. (($data['mem_reciente']=="reciente")?"checked='checked'":"").' >
      <label for="inputEmail4">Reciente</label>
	  </td><td>
      <input type="checkbox" name="mem_remota" value="remota"  '. (($data['mem_remota']=="remota")?"checked='checked'":"").' >
      <label for="inputEmail4">Remota &nbsp;&nbsp;</label>
	  </td></tr>
<tr><td>
      <b>Comentario:</b></td><td>
       '. $data['mem_comentario'].'
</td></tr>
<tr><td>
      <b>Orientacion: </b>
	  </td><td>
      <input type="checkbox" name="ori_persona" value="persona"  '. (($data['ori_persona']=="persona")?"checked='checked'":"").' >
      <label for="inputPassword4">Persona</label>
	  </td><td>
      <input type="checkbox" name="ori_lugar" value="lugar"  '. (($data['ori_lugar']=="lugar")?"checked='checked'":"").' >
      <label for="inputEmail4">Lugar</label>
	  </td><td>
      <input type="checkbox" name="ori_tiempo" value="tiempo"  '. (($data['ori_tiempo']=="tiempo")?"checked='checked'":"").' >
      <label for="inputEmail4">Tiempo</label>
	  </td><td>
      <input type="checkbox" name="ori_circunstancia" value="circunstancia"  '. (($data['ori_circunstancia']=="circunstancia")?"checked='checked'":"").' >
      <label for="inputEmail4"> Circunstancia&nbsp;&nbsp;</label>
	  </td></tr>
<tr><td>
      <label for="inputEmail4">Comentario:</label>
	  </td><td>
       '. $data['ori_comentario'].'
</td></tr>
<tr><td>
      <b>Contenido de Pensamiento: Suicida </b>
	  </td><td>
      <input type="checkbox" name="cdps_si" value="si"  '. (($data['cdps_si']=="si")?"checked='checked'":"").' >
      <label for="inputPassword4">Si</label>
	  </td><td>
      <input type="checkbox" name="cdps_no" value="no"  '. (($data['cdps_no']=="no")?"checked='checked'":"").' >
      <label for="inputEmail4">No - </label>
	  </td></tr>
<tr><td>
      <b>Plan Estructurado </b>
	  </td><td>
      <input type="checkbox" name="pe_si" value="si"  '. (($data['pe_si']=="si")?"checked='checked'":"").' >
      <label for="inputEmail4">Si</label>
	  </td><td>
      <input type="checkbox" name="pe_no" value="no"  '. (($data['pe_no']=="no")?"checked='checked'":"").' >
      <label for="inputEmail4"> No &nbsp;&nbsp;</label>
	  </td></tr>
<tr><td>
      <b>Homicida:</b>
	  </td><td>
      <input type="checkbox" name="hom_si" value="si"  '. (($data['hom_si']=="si")?"checked='checked'":"").' >
      <label for="inputEmail4">Si</label>
	  </td><td>
      <input type="checkbox" name="hom_no" value="no"  '. (($data['hom_no']=="no")?"checked='checked'":"").' >
      <label for="inputEmail4"> No &nbsp;&nbsp;</label>
</td></tr>
<tr><td>
      <b>Plan Estructurado: </b>
	  </td><td>
      <input type="checkbox" name="pes_si" value="si"  '. (($data['pes_si']=="si")?"checked='checked'":"").' >
      <label for="inputPassword4">Si</label>
	  </td><td>
      <input type="checkbox" name="pes_no" value="no"  '. (($data['pes_no']=="no")?"checked='checked'":"").' >
      <label for="inputEmail4">No</label>
	  </td><td>
      <input type="checkbox" name="pes_ideas_de" value="ideas_de"  '. (($data['pes_ideas_de']=="ideas_de")?"checked='checked'":"").' >
      <label for="inputEmail4">Ideas de Referencia</label>
	  </td><td>
        <input type="checkbox" name="pes_obsesiones" value="obsesiones"  '. (($data['pes_obsesiones']=="obsesiones")?"checked='checked'":"").' >
      <label for="inputEmail4">Obsesiones</label>
	  </td><td>
        <input type="checkbox" name="pes_compulsiones" value="compulsiones"  '. (($data['pes_compulsiones']=="compulsiones")?"checked='checked'":"").' >
      <label for="inputEmail4">Compulsiones</label>
	  </td><td>
        <input type="checkbox" name="pes_fobias" value="fobias"  '. (($data['pes_fobias']=="fobias")?"checked='checked'":"").' >
      <label for="inputEmail4">Fobias</label>
</td></tr>
<tr><td>
      <b>Percepcion: </b>
	  </td><td>
      <input type="checkbox" name="per_no" value="no"  '. (($data['per_no']=="no")?"checked='checked'":"").' >
      <label for="inputPassword4">No &nbsp;&nbsp;</label>
	  </td><td>
      <label for="inputPassword4">Disturbios Sensoperceptuales</label>
	  </td><td>
      <input type="checkbox" name="ds_delirios" value="delirios"  '. (($data['ds_delirios']=="delirios")?"checked='checked'":"").' >
      <label for="inputEmail4">Delirios - </label>
	  </td></tr>
<tr><td>
      <b>Alucinaciones: </b>
	  </td><td>
      <input type="checkbox" name="alu_auditivas" value="auditivas"  '. (($data['alu_auditivas']=="auditivas")?"checked='checked'":"").' >
      <label for="inputEmail4">Auditivas</label>
	  </td><td>
        <input type="checkbox" name="alu_visuales" value="visuales"  '. (($data['alu_visuales']=="visuales")?"checked='checked'":"").' >
      <label for="inputEmail4">Visuales</label>
	  </td><td>
        <input type="checkbox" name="alu_olfativas" value="olfativas"  '. (($data['alu_olfativas']=="olfativas")?"checked='checked'":"").' >
      <label for="inputEmail4">Olfativas</label>
	  </td><td>
        <input type="checkbox" name="alu_tactiles" value="tactiles"  '. (($data['alu_tactiles']=="tactiles")?"checked='checked'":"").' >
      <label for="inputEmail4">Tactiles</label>
	  </td><td>
        <input type="checkbox" name="alu_gustativas" value="gustativas"  '. (($data['alu_gustativas']=="gustativas")?"checked='checked'":"").' >
      <label for="inputEmail4">Gustativas</label>
</td></tr>
<tr><td>
      <b>Fiabilidad: </b>
	  </td><td>
      <input type="checkbox" name="fia_buena" value="buena"  '. (($data['fia_buena']=="buena")?"checked='checked'":"").' >
      <label for="inputPassword4">Buena</label>
	  </td><td>
      <input type="checkbox" name="fia_aceptable" value="aceptable"  '. (($data['fia_aceptable']=="aceptable")?"checked='checked'":"").' >
      <label for="inputEmail4">Aceptable</label>
	  </td><td>
      <input type="checkbox" name="fia_pobre" value="pobre"  '. (($data['fia_pobre']=="pobre")?"checked='checked'":"").' >
      <label for="inputEmail4">Pobre</label>
</td></tr>
<tr><td>


      <b>
      Comentarios:
      </b>
	  </td><td>
      '. $data['comentarios'].'
  </td></tr>
<tr><td>
      <b>
       A:
      </b>
	  </td><td>
      '. $data['comentarios_a'].'
  </td></tr>
<tr><td>
      <b>
       Diagnosis:
      </b>
          </td><td>
      '. $data['diagnosis'].'
  </td></tr>
<tr><td>
      <b>
       P:
      </b>
	  </td><td>
      '. $data['comentarios_p'].'
  </td></tr>
<tr><td>
      <b>Firma y Num.De Licencia :</b>
	  </td><td>
      '. $data['firma_num'].'
    </td></tr>
<tr><td>';
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
    print "</table>\n";
}
?>


