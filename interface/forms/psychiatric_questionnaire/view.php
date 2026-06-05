<?php

include_once '../../globals.php';
include_once "$srcdir/options.inc.php";

$form_title = '';
$result = getPatientData($_SESSION['pid'], "sex,DOB,DATE_FORMAT(DOB,'%Y%m%d') as DOB, fname, lname");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cuestionario Psiquiátrico</title>
  <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/bootstrap/dist/css/bootstrap.min.css?v=41">
  <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/font-awesome/css/font-awesome.css">

  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/bootstrap/dist/js/bootstrap.min.js"></script>

</head>
<body>
<h3>Cuestionario Psiquiátrico</h3>
<hr>
  <div class="col-md-offset-1 col-md-10 enc-form">
<form class="" name="psychiatric_form" role="form" method="post" action="<?php echo $rootdir; ?>/forms/psychiatric_questionnaire/save.php" enctype="multipart/form-data">
<?php
if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
	$data = sqlQuery("select * from form_psychiatric_questionnaire where id=?",$_REQUEST['id']);
	$data1 = sqlStatement("select * from psychiatric_medicamento where form_id=?",$_REQUEST['id']);
	$drugs_code = [];
	while($row=sqlFetchArray($data1)){
array_push($drugs_code,$row);
	}
?>
<input type="hidden" name="mode" value="edit"/>
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"/>
<?php
 }else{
?>
<input type="hidden" name="mode" value="new"/>
<?php
 }
?>

  <div class="form-row">
    <!--<div class="form-group col-md-4">
      <label for="inputEmail4">Nombre</label>
      <input type="text" class="form-control" id="nombre" placeholder="Nombre" readonly value="<?php echo $result['fname'];?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Apellidos</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Apellidos" readonly value="<?php echo $result['lname'];?>">
    </div>
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress">Edad</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Edad" readonly>
  </div>-->
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
  <div class="form-group col-md-12">
    <label for="inputState">Estado Civil : &nbsp;&nbsp;</label>
      <input class="form-check-input" type="checkbox" name="civil_casado" value="casado" <?php echo (($data['civil_casado'] == 'casado')?'checked':'')?>>
      <label class="form-check-label" for="gridCheck">
        Casado(a)
      </label>&nbsp;&nbsp;
      <input class="form-check-input" type="checkbox" name="civil_soltero" value="soltero" <?php echo (($data['civil_soltero'] == 'soltero')?'checked':'')?>>
      <label class="form-check-label" for="gridCheck">
        Soltero(a)
      </label>&nbsp;&nbsp;
      <input class="form-check-input" type="checkbox" name="civil_divorciado" value="divorciado" <?php echo (($data['civil_divorciado'] == 'divorciado')?'checked':'')?>>
      <label class="form-check-label" for="gridCheck">
        Divorciado(a)&nbsp;&nbsp;
      </label>
      <input class="form-check-input" type="checkbox" name="civil_viudo" value="viudo" <?php echo (($data['civil_viudo'] == 'viudo')?'checked':'')?>>
      <label class="form-check-label" for="gridCheck">
        Viudo(a)
      </label>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Cuáles son sus preocupaciones con el paciente?
      </label>
      <textarea class="col-md-12" rows="3" name="caules_comments"><?php echo $data['caules_comments']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>
  <div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Padece el paciente de alguna condicion medica?? &nbsp;&nbsp;
      </label>
	      <input class="form-check-input" type="radio" name="padece" value="yes" <?php echo (($data['padece'] == 'yes')?'checked':'')?>>
      <label class="form-check-label" for="gridCheck">
        Si
      </label>&nbsp;&nbsp;
      <input class="form-check-input" type="radio" name="padece" value="no" <?php echo (($data['padece'] == 'no')?'checked':'')?>>
      <label class="form-check-label" for="gridCheck">
        No
      </label>&nbsp;&nbsp;
<br>
<label>En caso de haber contestado afirmativamente, favor de enumerar las condiciones medicas :</label>
      <textarea class="col-md-12" rows="3" name="padece_comments"><?php echo $data['padece_comments'];?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Se ha realizado el paciente alguna cirugia? &nbsp;&nbsp;
      </label>
<input class="form-check-input" type="radio" value="yes" name="se_ha" <?php echo (($data['se_ha'] == 'yes')?'checked':'')?>>
      <label class="form-check-label" for="gridCheck">
        Si
      </label>&nbsp;&nbsp;
      <input class="form-check-input" type="radio" name="se_ha" value="no" <?php echo (($data['se_ha'] == 'no')?'checked':'')?>>
      <label class="form-check-label" for="gridCheck">
        No
      </label>&nbsp;&nbsp;
<br>
<label>En caso de haber contestado afirmativamente, favor de enumerar las cirugias que se ha realizado :</label>
      <textarea class="col-md-12" rows="3" name="se_ha_comments"><?php echo $data['se_ha_comments'];?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Es alergico el paciente a algun medicamento?&nbsp;&nbsp;
      </label>
<input class="form-check-input" type="radio" value="yes" name="es" <?php echo (($data['es'] == 'yes')?'checked':'')?>>
      <label class="form-check-label" for="gridCheck">
        Si
      </label>&nbsp;&nbsp;
      <input class="form-check-input" type="radio" value="no" name="es" <?php echo (($data['es'] == 'no')?'checked':'')?>>
      <label class="form-check-label" for="gridCheck">
        No
      </label>&nbsp;&nbsp;
<br>
<label>En caso de haber contestado afirmativamente, favor de enumerar las alergias del paciente :</label>
<textarea class="col-md-12" rows="3" name="es_comments"><?php echo $data['es_comments'];?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Favor de enumerar los medicamentos que toma el paciente :
      </label>
<input type="hidden" name="prescription_delete[]" id="prescription_delete" value="">
                      <table class='table table-responsive'>
                        <thead>
                            <tr>
                              <th>Medicamento</th>
                              <th>Dosis</th>
                              <th>Frecuencia</th>
                              <th></th>
                            </tr>
                      </tr>
                      </thead>

                      <?php if (!empty($drugs_code)) { ?>
			<tbody class="table table-responsive mainrow_drug">
 <?php foreach ($drugs_code as $key => $dc) { ?>
                            <!-- <div class='row'>
                              <div class='col-md-12' style='padding-bottom:10px;'> -->
                                <tr class="rowdrug_1 first_primary">
                                  <td><input class="drug_align protoautosuggest ui-autocomplete-input drug_code_search" name="prescription[<?php echo $key; ?>][medicamento]" placeholder="Medicamento" autocomplete="off" type="text" value='<?php echo $dc['medicamento'] ?>'>
                                    <input class="drug_code" name="prescription[<?php echo $key; ?>][drug_code]" type="hidden" value="<?php echo $dc['drug_code'] ?>">
                                  <input class="id" type="hidden" name="prescription[<?php echo $key; ?>][id]" value="<?php echo $dc['id'] ?>">
                                    <input class="prescription_id" name="prescription_id" type="hidden" value="<?php echo $dc['id'] ?>"></td>
                                  <td><input class="drug_concentration drug_align" name="prescription[<?php echo $key; ?>][dosis]" value="<?php echo $dc['dosis']; ?>"></td>
                                  <td><input class='from_date datepicker drug_align' placeholder='Frequencia' autocomplete="off" name="prescription[<?php echo $key; ?>][frecuencia]" value="<?php echo $dc['frecuencia']; ?>"></td>
<!--                                    <td><input class="to_date datepicker drug_align" placeholder='M/D/Y' autocomplete="off" name="prescription[<?php echo $key; ?>][date_to]" value="<?php echo $dc['date_to']; ?>"></td>
                                  <td><select class="drugs_form drug_align" style="text-align:center;" name="prescription[<?php echo $key; ?>][drug_form]">
                                      <?php
                                      foreach ($drug_interval_list as $k => $value) {
                                        $selected = ($k == $dc['drug_form']) ? 'selected' : '';
                                        echo "<option value='$k' $selected>" . $value . "</option>";
                                      }
                                      ?>
</select></td>
                                  <td><textarea class="special_instructions" style="margin-right:10px; height:60px;margin-top:5px;" name="prescription[<?php echo $key; ?>][special_instructions]"><?php echo $dc['special_instructions']; ?></textarea></td>-->
                                  <td>
                                  <div class="form-group">
                                      <a href="javascript:void(0);" class="btn btn-primary adddrug"><span class="glyphicon glyphicon-plus text-white"></span></a>
                                      <a href="javascript:void(0);" class="btn btn-danger rmdrug"><span class="glyphicon glyphicon-minus text-white"></span></a>
                                    </div>
                                  </td>
                                </tr>
                              <!-- </div>
                            </div> -->
                        <?php } ?>
			</tbody>
<?php } else { ?>
                        <tbody class="table table-responsive mainrow_drug">
                          <!-- <div class='row'>
                            <div class="col-md-12" style="padding-bottom:10px;"> -->
                              <tr class="rowdrug_1 first_primary">
                                <td><input class="drug_align protoautosuggest ui-autocomplete-input drug_code_search" name="prescription[0][medicamento]" placeholder="Medicamento" autocomplete="off" type="text" value=''>
                                <input class="drug_code" name="prescription[0][drug_code]" type="hidden" value="">
                                <input class="id" type="hidden" name="prescription[0][id]" value=""></td>
                                <input class="prescription_id" name="prescription_id" type="hidden" value=""></td>
                                <td><input class="drug_concentration drug_align" name="prescription[0][dosis]" value="" placeholder="Dosis"></td>
                                <td>
                                  <input class='frecuencia' placeholder='Frecuencia' autocomplete="off" name="prescription[0][frecuencia]" value=""></td>
                                 <!-- <td><input class="to_date datepicker drug_align" placeholder='M/D/Y' autocomplete="off" name="prescription[0][date_to]" value=""></td>
                                <td><select class="drugs_form drug_align" style="text-align:center;width:170px !important;" name="prescription[0][drug_form]">
                                    <?php
                                    foreach ($drug_interval_list as $kt => $value) {
                                      echo "<option value='$kt'>" . $value . "</option>";
                                    }
                                    ?>
                                  </select></td>
<td><textarea class="special_instructions" style="margin-right:10px; height:60px;width:190px !important;margin-top:5px;" name="prescription[0][special_instructions]"></textarea></td>
                                <td><input class="add_to_medications drug_align" name="prescription[0][add_to_medications]" type="checkbox" value="1"></td>-->
                                <td>
                                  <div class='form-group'>
                                  <a href="javascript:void(0);" class="btn btn-primary adddrug"><span class="glyphicon glyphicon-plus text-white"></span></a>
                                    <a href="javascript:void(0);" class="btn btn-danger rmdrug"><span class="glyphicon glyphicon-minus text-white"></span></a>
                                  </div>
                                </td>
                              </tr>
                            <!-- </div>
                          </div> -->
                        </tbody>
		      <?php } ?>
</table>
</div>
<div class="form-group col-md-12">
<input type="hidden" name="prescription_delete[]" id="prescription_delete" value="">
                      <table class='table table-responsive'>
                        <thead>
                            <tr>
                              <th colspan="2">Historial Psiquiatrico</th>
                              <th>Commentarios</th>
                            </tr>
                      </tr>
		      </thead>
<tbody  class="table table-responsive">
<tr>
<td>Hospitalizaciones Psiquitricas</td><td>
<input class="form-check-input" type="radio" name="hosp" <?php echo (($data['hosp']=='yes') ? 'checked' : ''); ?> value="yes">
      <label class="form-check-label" for="gridCheck">
        Si&nbsp;&nbsp;
      </label>
      <input class="form-check-input" type="radio" name="hosp" <?php echo (($data['hosp']=='no') ? 'checked' : ''); ?> value="no">
      <label class="form-check-label" for="gridCheck">
        No     </label>
</td><td><textarea rows=3 name="hosp_comments"><?php echo $data['hosp_comments']; ?></textarea></td>
</tr>
<tr>
<td>Intentos Suicidas</td><td>
<input class="form-check-input" type="radio" name="intentos" <?php echo (($data['intentos']=='yes') ? 'checked' : ''); ?> value="yes">
      <label class="form-check-label" for="gridCheck">
        Si&nbsp;&nbsp;
      </label>
      <input class="form-check-input" type="radio" name="intentos" <?php echo (($data['intentos']=='no') ? 'checked' : ''); ?> value="no">
      <label class="form-check-label" for="gridCheck">
        No     </label>
</td><td><textarea rows=3 name="intentos_comments"><?php echo $data['intentos_comments']; ?></textarea></td>
</tr>
<tr>
<td>Abuso de Sustancias o Alcohol</td><td>
<input class="form-check-input" type="radio" name="abuso" <?php echo (($data['abuso']=='yes') ? 'checked' : ''); ?> value="yes">
      <label class="form-check-label" for="gridCheck">
        Si&nbsp;&nbsp;
      </label>
      <input class="form-check-input" type="radio" name="abuso" <?php echo (($data['abuso']=='no') ? 'checked' : ''); ?> value="no">
      <label class="form-check-label" for="gridCheck">
        No     </label>
</td><td><textarea rows=3 name="abuso_comments"><?php echo $data['abuso_comments']; ?></textarea></td>
</tr>
<tr>
<td>Familiares con condiciones psiquiatricas</td><td>
<input class="form-check-input" type="radio" name="familiares" <?php echo (($data['familiares']=='yes') ? 'checked' : ''); ?> value="yes">
      <label class="form-check-label" for="gridCheck">
        Si&nbsp;&nbsp;
      </label>
      <input class="form-check-input" type="radio" name="familiares" <?php echo (($data['familiares']=='no') ? 'checked' : ''); ?> value="no">
      <label class="form-check-label" for="gridCheck">
        No     </label>
</td><td><textarea rows=3 name="familiares_comments"><?php echo $data['familiares_comments']; ?></textarea></td>
</tr>
</tbody>
</table>
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
</script>
  </html>
