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
<h3>Seguimiento Follow Up</h3>
<hr>
  <div class="col-md-offset-1 col-md-10 enc-form">
  <form class="" name="seguimiento_form" role="form" method="post" action="<?php echo $rootdir; ?>/forms/formato_psiquiatrico_follow_up/save.php?<?php echo (isset($_REQUEST['id']) && $_REQUEST['id'] != '') ? ('mode=edit&id='.$_REQUEST['id']): 'mode=new';?>" enctype="multipart/form-data">
<?php
if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
	$data = sqlQuery("select * from form_formato_psiquiatrico_follow_up where id=?",$_REQUEST['id']);
}
?>
<!--<input type="hidden" name="mode" value="edit"/>
<input type="hidden" name="id" value="<?php //echo $_REQUEST['id']; ?>"/>-->
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Razon de la visita
      </label>
      <textarea class="col-md-12" rows="3" name="razon"><?php echo $data['razon']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Re-evaluacion de eslado mental del paciente
      </label>
      <textarea class="col-md-12" rows="3" name="reevaluacion"><?php echo $data['reevaluacion']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Cambios respecto a la visita anterior
      </label>
      <textarea class="col-md-12" rows="3" name="cambios"><?php echo $data['cambios']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       No se reporta cambios respecto a la visita anterior
      </label>
      <textarea class="col-md-12" rows="3" name="no_se_reporta"><?php echo $data['no_se_reporta']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Cambios en las condiciones medicas de la paciente
      </label>
      <textarea class="col-md-12" rows="3" name="cambios_en"><?php echo $data['cambios_en']; ?></textarea>
  </div>
<div class="form-group col-md-12 form-inline">
      <input type="checkbox" name="no_hubo_cambios" value="no_hubo_cambios" <?php echo (($data['no_hubo_cambios'] == "no_hubo_cambios")?"checked":"");?>>
      <label for="inputPassword4">No hubo cambios </label>
</div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Comentarios adicionales
      </label>
      <textarea class="col-md-12" rows="3" name="cmt_adicionales"><?php echo $data['cmt_adicionales']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Estable de sus condiciones medicas
      </label>
      <textarea class="col-md-12" rows="3" name="estable"><?php echo $data['estable']; ?></textarea>
  </div>
<div class="form-group col-md-12"></div>

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
