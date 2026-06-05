<?php

include_once '../../globals.php';
include_once "$srcdir/options.inc.php";

$form_title = '';
$result = getPatientData($_SESSION['pid'], "sex,DOB,DATE_FORMAT(DOB,'%Y%m%d') as DOB");
//print_r($result);
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
  <br />
  <br />
  <div class="col-md-12 enc-form">
<form class="" name="psychiatric_form" role="form" method="post" action="<?php echo $rootdir; ?>/forms/receta/save.php" enctype="multipart/form-data">
<?php
if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
        $data = sqlQuery("select * from form_receta where id=?",$_REQUEST['id']);
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
  <!--<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
      <input type="text" class="form-control" id="nombre" placeholder="Nombre">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Apellidos</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Apellidos">
    </div>
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
      <label class="form-check-label" for="gridCheck">
       Direccion
      </label>
      <textarea class="col-md-12" rows="3" name="direccion"><?php echo $data['direccion']; ?></textarea>
  </div>
<div class="form-group col-md-12">
      <label class="form-check-label" for="gridCheck">
       Rx
      </label>
      <textarea class="col-md-12" rows="5" name="rx"><?php echo $data['rx']; ?></textarea>
  </div>
<div class="form-group col-md-4">
      <label for="inputState">Refill : </label>
      <select id="inputState" class="form-control" name="refill">
        <option selected>0</option>
        <option value=1 <?php echo (($data['refill'] == 1) ? 'selected':'')?>>1</option>
        <option value=2 <?php echo (($data['refill'] == 2) ? 'selected':'')?>>2</option>
        <option value=3 <?php echo (($data['refill'] == 3) ? 'selected':'')?>>3</option>
        <option value=4 <?php echo (($data['refill'] == 4) ? 'selected':'')?>>4</option>
        <option value=5 <?php echo (($data['refill'] == 5) ? 'selected':'')?>>5</option>
      </select>
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
  </html>
