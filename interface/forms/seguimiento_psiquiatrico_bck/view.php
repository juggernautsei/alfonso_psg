<?php

include_once '../../globals.php';
include_once "$srcdir/options.inc.php";

$form_title = '';
$result = getPatientData($_SESSION['pid'], "sex,DOB,DATE_FORMAT(DOB,'%Y%m%d') as DOB, fname, lname");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Seguimiento Psiquiátrico</title>
  <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/bootstrap/dist/css/bootstrap.min.css?v=41">
  <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/font-awesome/css/font-awesome.css">

  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/bootstrap/dist/js/bootstrap.min.js"></script>

</head>
<body>
<h3>Seguimiento Psiquiátrico</h3>
<hr>
  <div class="col-md-offset-1 col-md-10 enc-form">
  <form class="" name="seguimiento_form" role="form" method="post" action="<?php echo $rootdir; ?>/forms/seguimiento_psiquiatrico/save.php?<?php echo (isset($_REQUEST['id']) && $_REQUEST['id'] != '') ? ('mode=edit&id='.$_REQUEST['id']): 'mode=new';?>" enctype="multipart/form-data">
<?php
if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
	$data = sqlQuery("select * from form_seguimiento_psiquiatrico where id=?",$_REQUEST['id']);
	$data1 = sqlStatement("select * from psychiatric_medicamento where form_id=?",$_REQUEST['id']);
	$drugs_code = [];
	while($row=sqlFetchArray($data1)){
array_push($drugs_code,$row);
	}
}
?>
<!--<input type="hidden" name="mode" value="edit"/>
<input type="hidden" name="id" value="<?php //echo $_REQUEST['id']; ?>"/>-->

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Plan Medico</label>
      <input type="text" class="form-control" name="plan_medico" placeholder="Plan Medico" value="<?php echo $data['plan_medico'];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Numero</label>
      <input type="text" class="form-control" name="numero" placeholder="Numero" value="<?php echo $data['numero'];?>">
    </div>
  </div>
<div class="form-row form-inline">

<div class="form-group col-md-12">
      <label for="inputEmail4">Modalidad : &nbsp;&nbsp;</label>
      <input type="checkbox" name="modalidad" value="individual" <?php echo (($data['modalidad'] =="individual") ? "checked" : "");?>>
      <label for="inputPassword4">Individual </label>
      <input type="checkbox" name="individual" value="con_paciente" <?php echo (($data['individual'] == "con_paciente") ? "checked" :"");?>>
      <label for="inputEmail4">Fam.Con Paciente </label>
      <input type="checkbox" name="con_paciente" value="sin_paciente" <?php echo (($data['con_paciente'] == "sin_paciente") ?"checked":"");?>>
      <label for="inputPassword4">Fam.Sin Paciente </label>
      <input type="checkbox" name="sin_paciente" value="grupal" <?php echo (($data['sin_paciente']=="grupal")?"checked":"");?>>
      <label for="inputPassword4">Grupal </label>
    </div>
</div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Diagnostico
      </label>
      <textarea class="col-md-12" rows="3" name="diagnostico"><?php echo $data['diagnostico']; ?></textarea>
  </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Actitud : &nbsp;&nbsp;</label>
      <input type="checkbox" name="actitud" value="cooperador" <?php echo (($data['actitud'] == "cooperador")?"checked":"");?>>
      <label for="inputPassword4">Cooperador </label>
      <input type="checkbox" name="cooperador" value="no_cooperador" <?php echo (($data['cooperador']=="no_cooperador")?"checked":"");?>>
      <label for="inputEmail4">No Cooperador</label>
      <input type="checkbox" name="no_cooperador" value="hostil" <?php echo (($data['no_cooperador']=="hostil")?"checked":"");?>>
      <label for="inputPassword4">Hostil</label>
      <input type="checkbox" name="hostil" value="demandante" <?php echo (($data['hostil']=="demandante")?"checked":"");?>>
      <label for="inputPassword4">Demandante</label>
      <input type="checkbox" name="demandante" value="reservado" <?php echo (($data['demandante']=="reservado")?"checked":"");?>>
      <label for="inputPassword4">Reservado</label>
      <input type="checkbox" name="reservado" value="suspicaz" <?php echo (($data['reservado']=="suspicaz")?"checkbox":"");?>>
      <label for="inputPassword4">Suspicaz</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Sintomas Presentes : &nbsp;&nbsp;</label>
      <input type="checkbox" name="sintomas" value="ansiedad" <?php echo (($data['sintomas']=="ansiedad")?"checked":"");?>>
      <label for="inputPassword4">Ansiedad</label>
      <input type="checkbox" name="ansiedad" value="deprimido" <?php echo (($data['ansiedad']=="deprimido")?"checked":"");?>>
      <label for="inputEmail4">Deprimido</label>
      <input type="checkbox" name="deprimido" value="insomonia" <?php echo (($data['deprimido']=="insomonia")?"checked":"");?>>
      <label for="inputPassword4">Insomonia</label>
      <input type="checkbox" name="insomonia" value="llanto" <?php echo (($data['insomonia']=="llanto")?"checked":"");?>>
      <label for="inputPassword4">Llanto</label>
      <input type="checkbox" name="llanto" value="ataque_de_panico" <?php echo (($data['llanto']=="ataque_de_panico")?"checked":"");?>>
      <label for="inputPassword4">Ataque De Panico</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Trastornos Perceptivos : &nbsp;&nbsp;</label>
      <input type="checkbox" name="trastornos_si" value="trastornos_si" <?php echo (($data['trastornos_si']=="trastornos_si")?"checked":"");?>>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="trastornos_no" value="trastornos_no" <?php echo (($data['trastornos_no']=="trastornos_no")?"checked":"");?>>
      <label for="inputEmail4">No </label>
      <label for="inputEmail4">&nbsp;&nbsp;Describa: </label>
      <textarea class="form-control" rows=2 name="trastornos_describa"><?php echo $data['trastornos_describa'];?></textarea>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Tiempo De Sintomas</label>
      <input type="text" size="2" class="form-control" name="tiempo_sintomas" value="<?php echo $data['tiempo_sintomas'];?>">
      <label for="inputPassword4">Horas</label>
      <input type="text" size="2" class="form-control" name="horas" value="<?php echo $data['horas'];?>">
      <label for="inputEmail4">Dias</label>
      <input type="text" size="2" class="form-control" name="dias" value="<?php echo $data['dias'];?>">
      <label for="inputPassword4">Semanas</label>
      <input type="text" size="2" class="form-control" name="semanas" value="<?php echo $data['semanas'];?>">
      <label for="inputPassword4">Meses</label>
      <input type="text" size="2" class="form-control" name="meses" value="<?php echo $data['meses'];?>">
      <label for="inputPassword4">Anos</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Intensidad : &nbsp;&nbsp;</label>
      <input type="checkbox" name="intensidad" value="leve" <?php echo (($data['intensidad']=="leve")?"checked":"");?>>
      <label for="inputPassword4">Leve</label>
      <input type="checkbox" name="leve" value="moderada" <?php echo (($data['leve']=="moderada")?"checked":"");?>>
      <label for="inputEmail4">Moderada</label>
      <input type="checkbox"  name="moderada" value="severa" <?php echo (($data['moderada']=="severa")?"checked":"");?>>
      <label for="inputEmail4">Severa</label>
</div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
        Orientacion:
      </label>
      <textarea class="col-md-12" rows="3" name="orientacion"><?php echo $data['orientacion']; ?></textarea>
  </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Apariencia : &nbsp;&nbsp;</label>
      <input type="checkbox" name="apariencia" value="apropiada" <?php echo (($data['apariencia']=="apropiada")?"checked":"");?>>
      <label for="inputPassword4">Apropiada</label>
      <input type="checkbox" name="apropiada" value="inapropiada" <?php echo (($data['apropiada']=="inapropiada")?"checked":"");?>>
      <label for="inputEmail4">Inapropiada</label>
      <input type="checkbox" name="inapropiada" value="desalinada" <?php echo (($data['inapropiada']=="desalinada")?"checked":"");?>>
      <label for="inputEmail4">Desalinada</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Animo : &nbsp;&nbsp;</label>
      <input type="checkbox"  name="animo" value="eutimico" <?php echo (($data['animo']=="eutimico")?"checked":"");?>>
      <label for="inputPassword4">Eutimico</label>
      <input type="checkbox" name="eutimico" value="irritable" <?php echo (($data['eutimico']=="irritable")?"checked":"");?>>
      <label for="inputEmail4">Irritable</label>
      <input type="checkbox"  name="irritable" value="euforico" <?php echo (($data['irritable']=="euforico")?"checked":"");?>>
      <label for="inputPassword4">Euforico</label>
      <input type="checkbox" name="euforico" value="elevado" <?php echo (($data['euforico']=="elevado")?"checked":"");?>>
      <label for="inputPassword4">Elevado</label>
      <input type="checkbox" name="elevado" value="ansioso" <?php echo (($data['elevado']=="ansioso")?"checked":"");?>>
      <label for="inputPassword4">Ansioso</label>
      <input type="checkbox" name="ansioso" value="deprimido" <?php echo (($data['ansioso']=="deprimido")?"checked":"");?>>
      <label for="inputPassword4">Deprimido</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Afecto : &nbsp;&nbsp;</label>
      <input type="checkbox"  name="afecto" value="congruente" <?php echo (($data['afecto']=="congruente")?"checked":"");?>>
      <label for="inputPassword4">Congruente</label>
      <input type="checkbox" name="congruente" value="emotado" <?php echo (($data['congruente']=="emotado")?"checked":"");?>>
      <label for="inputEmail4">Embotado</label>
      <input type="checkbox" name="emotado" value="labil" <?php echo (($data['emotado']=="labil")?"checked":"");?>>
      <label for="inputPassword4">Labil</label>
      <input type="checkbox"  name="labil" value="afecto_inapropiado" <?php echo (($data['labil']=="afecto_inapropiado")?"checked":"");?>>
      <label for="inputPassword4">Inapropiado</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Juicio : &nbsp;&nbsp;</label>
      <input type="checkbox" name="juicio" value="j_apropiada" <?php echo (($data['juicio']=="j_apropiada")?"checked":"");?>>
      <label for="inputPassword4">Apropiada</label>
      <input type="checkbox" name="j_apropiada" value="j_conservado" <?php echo (($data['j_apropiada']=="j_conservado")?"checked":"");?>>
      <label for="inputEmail4">Conservado</label>
      <input type="checkbox" name="j_conservado" value="j_pobre" <?php echo (($data['j_conservado']=="j_pobre")?"checked":"");?>>
      <label for="inputPassword4">Pobre</label>
      <input type="checkbox"  name="j_pobre" value="j_nulo" <?php echo (($data['j_pobre']=="j_nulo")?"checked":"");?>>
      <label for="inputPassword4">Nulo</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Interospeccion:</label>
      <input type="checkbox" name="interospeccion" value="i_apropiada" <?php echo (($data['interospeccion']=="i_apropiada")?"checked":"");?>>
      <label for="inputPassword4">Apropiada</label>
      <input type="checkbox"  name="i_apropiada" value="i_conservado" <?php echo (($data['i_apropiada']=="i_conservado")?"checked":"");?>>
      <label for="inputEmail4">Conservado</label>
      <input type="checkbox" name="i_conservado" value="i_pobre" <?php echo (($data['i_conservado']=="i_pobre")?"checked":"");?>>
      <label for="inputPassword4">Pobre</label>
      <input type="checkbox" name="i_pobre" value="i_nulo" <?php echo (($data['i_pobre']=="i_nulo")?"checekd":"");?>>
      <label for="inputPassword4">Nulo</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Memoria:</label>
      <input type="text" class="form-control" name="memoria" value="<?php echo $data['memoria'];?>">
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Immediata:</label>
      <input type="checkbox" name="immediata" value="im_afectada" <?php echo (($data['immediata']=="im_afectada")?"checked":"");?>>
      <label for="inputPassword4">Afectada</label>
      <input type="checkbox" name="im_afectada" value="im_apropiada" <?php echo (($data['im_afectada']=="im_apropiada")?"checked":"");?>>
      <label for="inputEmail4">Apropiada</label>
      <input type="checkbox" name="im_apropiada" value="intacta" <?php echo (($data['im_apropiada']=="intacta")?"checked":"");?>>
      <label for="inputPassword4">Intacta &nbsp;&nbsp;</label>
      <label for="inputPassword4">Corto Tiempo:</label>
      <input type="checkbox" name="corto_tiempo" value="ti_afectada" <?php echo (($data['corto_tiempo']=="ti_afectada")?"checekd":"");?>>
<label for="inputPassword4">Afectada</label>
      <input type="checkbox" name="ti_afectada" value="ti_apropiada" <?php echo (($data['ti_afectada']=="ti_apropiada")?"checked":"");?>>
      <label for="inputEmail4">Apropiada</label>
      <input type="checkbox" name="ti_apropiada" value="intacta" <?php echo (($data['ti_apropiada']=="intacta")?"checked":"");?>>
      <label for="inputPassword4">Intacta &nbsp;&nbsp;</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Reciente:</label>
      <input type="checkbox" name="reciente" value="re_afectada" <?php echo (($data['reciente']=="re_afectada")?"checked":"");?>>
      <label for="inputPassword4">Afectada</label>
      <input type="checkbox" name="re_afectada" value="re_apropiada" <?php echo (($data['re_afectada']=="re_apropiada")?"checked":"");?>>
      <label for="inputEmail4">Apropiada</label>
      <input type="checkbox" name="re_apropiada" value="intacta" <?php echo (($data['re_apropiada']=="intacta")?"checked":"");?>>
      <label for="inputPassword4">Intacta &nbsp;&nbsp;</label>
      <label for="inputPassword4">Remota:</label>
      <input type="checkbox" name="remota" value="rem_afectada" <?php echo (($data['remota']=="rem_afectada")?"checked":"");?>>
<label for="inputPassword4">Afectada</label>
      <input type="checkbox" name="rem_afectada" value="rem_apropiada" <?php echo (($data['rem_afectada']=="rem_apropiada")?"checked":"");?>>
      <label for="inputEmail4">Apropiada</label>
      <input type="checkbox" name="rem_apropiada" value="intacta" <?php echo (($data['rem_apropiada']=="intacta")?"checked":"");?>>
      <label for="inputPassword4">Intacta &nbsp;&nbsp;</label>
    </div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Ideas de Suicido:</label>
      <input type="checkbox" name="ids_si" value="ids_si" <?php echo (($data['ids_si']=="ids_si")?"checked":"");?>>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="ids_no" value="ids_no" <?php echo (($data['ids_no']=="ids_no")?"checked":"");?>>
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
      <label for="inputEmail4">Describa:</label>
       <textarea class="form-control" rows="3" name="ids_describa"><?php echo $data['ids_describa']; ?></textarea>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Ideas Homicidas:</label>
      <input type="checkbox" name="idh_si" value="idh_si" <?php echo (($data['idh_si']=="idh_si")?"checked":"");?>>
      <label for="inputPassword4">Si</label>
      <input type="checkbox" name="idh_no" value="idh_no" <?php echo (($data['idh_no']=="idh_no")?"checked":"");?>>
      <label for="inputEmail4">No&nbsp;&nbsp;</label>
      <label for="inputEmail4">Describa:</label>
       <textarea class="form-control" rows="3" name="idh_describa"><?php echo $data['idh_describa']; ?></textarea>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Evaluacion dirigida a:</label>
      <input type="checkbox" name="eda" value="eda" <?php echo (($data['eda']=="eda")?"checked":"");?>>
      <label for="inputPassword4">Remision de sintomatologia</label>
      <input type="checkbox" name="rds" value="rds" <?php echo (($data['rds']=="rds")?"checked":"");?>>
      <label for="inputEmail4">Reevaluacion de Farmacos</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Recomendacion:</label>
      <input type="checkbox" name="recomendacion" value="seg_amb" <?php echo (($data['recomendacion']=="seg_amb")?"checked":"");?>>
      <label for="inputPassword4">Seguimiento ambulatorio</label>
      <input type="checkbox" name="seg_amb" value="psicoterapia" <?php echo (($data['seg_amb']=="psicoterapia")?"checked":"");?>>
      <label for="inputEmail4">Psicoterapia</label>
      <input type="checkbox" name="psicoterapia" value="generalista" <?php echo (($data['psicoterapia']=="generalista")?"checked":"");?>>
      <label for="inputEmail4">Generalista</label>
      <input type="checkbox" name="generalista" value="hospitalizacion" <?php echo (($data['generalista']=="hospitalizacion")?"checked":"");?>>
      <label for="inputEmail4">Hospitalizacion</label>
</div>
<div class="form-group col-md-12 form-inline">
      <label for="inputEmail4">Programa de Hospitalizacion:</label>
      <input type="checkbox" name="pdh" value="otro" <?php echo (($data['pdh']=="otro")?"checked":"");?>>
      <label for="inputPassword4">Otro</label>
</div>
<div class="form-group col-md-12 form-inline">
<label for="inputEmail4">Medicacion:</label>
       <textarea class="col-md-12" rows="3" name="medicacion"><?php echo $data['medicacion']; ?></textarea>
</div>
<div class="form-group col-md-12 form-inline">
<label for="inputEmail4">Proxima cita:</label>
       <textarea class="col-md-12" rows="3" name="pc"><?php echo $data['pc']; ?></textarea>
</div>
  <div class="form-row">
    <!--<div class="form-group col-md-4">
      <label for="inputState">Estado Civil</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>Casado(2)</option>
        <option>Soltero(2)</option>
        <option>Divorciado(a)</option>
        <option>...</option>
      </select>
    </div>-->
   <!-- <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>-->
  </div>
<div class="col-md-12">
<button type="submit" class="btn btn-primary"><?php
if($_REQUEST['id'] != '')
	echo 'Update';
else
	echo 'Save';
?>
</button>
  <button class="btn btn-danger" onclick="top.restoreSession();parent.closeTab(window.name, true);">Cancel</button>
</div>
</form>
  </div>

  </body>
<script>
//Adddrug
    $(document).on('click', '.adddrug', function() {
        //$("#prescription_form .datepicker").datepicker("destroy");
//        $(".drug_code_search").autocomplete("destroy");
        var newelm = $('.mainrow_drug tr:last').clone(true);
        var len = $('.mainrow_drug tr').length + 1;
        newelm.find(':input').val('');
        newelm.attr('class', newelm.attr('class').replace(/rowdrug_\d/g, 'rowdrug_' + len));
        newelm.appendTo('.mainrow_drug');
	var prescription_list = ['medicamento', 'dosis', 'frecuencia'];
        prescription_list.forEach(function(i) {
          if (i == 'date_from' || i == 'date_to')
                  $('.rowdrug_' + len).find('td > input[name="prescription[' + (len - 2) + '][' + i + ']"]').attr('id', 'prescription[' + (len - 1) + '][' + i + ']');
          if(i == 'drug_form')
                $('.rowdrug_' + len).find('td > select[name="prescription[' + (len - 2) + '][' + i + ']"]').attr('name', 'prescription[' + (len - 1) + '][' + i + ']');
          if(i == 'special_instructions')
                $('.rowdrug_' + len).find('td > textarea[name="prescription[' + (len - 2) + '][' + i + ']"]').attr('name', 'prescription[' + (len - 1) + '][' + i + ']');
          $('.rowdrug_' + len).find('td > input[name="prescription[' + (len - 2) + '][' + i + ']"]').attr('name', 'prescription[' + (len - 1) + '][' + i + ']');
        });
        //$("#prescription_form .datepicker").datepicker({dateFormat: 'yy-mm-dd'});
    /*    $(".drug_code_search").autocomplete({
          minLength: 2,
          source: "../../search.php?fn=drug_code",
          select: function(event, ui) {
            $(this).val(ui.item.value);
            $(this).next().val(ui.item.code);
          }
    });*/
    });
 $(document).on('click', '.rmdrug', function() {
              if ($('.rmdrug').length > 1) {
                      prescription_delete = ($('input:hidden[name="prescription_delete[]"]').val() != '') ? JSON.parse($('input:hidden[name="prescription_delete[]"]').val()) : [];
                delete_pres = $(this).closest('tr').find('.prescription_id').val();
                if(delete_pres != '')
                        prescription_delete.push(delete_pres);
                $('input:hidden[name="prescription_delete[]"]').val(JSON.stringify(prescription_delete));
                $(this).closest('tr').remove();

        } else
          return false;
 });
$("form").submit(function () {

    var this_master = $(this);

    this_master.find('input[type="checkbox"]').each( function () {
        var checkbox_this = $(this);


        if(!checkbox_this.is(":checked")) {
            checkbox_this.prop('checked',true);
            //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA
            checkbox_this.attr('value','');
        }
    })
})
</script>
  </html>
