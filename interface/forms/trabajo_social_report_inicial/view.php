<?php

include_once '../../globals.php';
require_once("$srcdir/api.inc");
require_once("$srcdir/forms.inc");
require_once("$srcdir/options.inc.php");
use OpenEMR\Core\Header;
?>
<html>

<head>
<link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/bootstrap/dist/css/bootstrap.min.css?v=41">
  <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/font-awesome/css/font-awesome.css">

  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Trabajo Social Report</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">-->
<?php Header::setupHeader(['datetime-picker', 'common', 'jquery-ui', 'jquery-ui-darkness']);?>
<script>
function get_pre_value(){
var url = new URL(window.location.href);
url.searchParams.set('get_pre_value','1');
window.location.href = url.href;
}
$(document).ready(function() {
        $('.datepicker').datetimepicker({
        maxDate: 0,
                <?php $datetimepicker_timepicker = false; ?>
                <?php $datetimepicker_showseconds = false; ?>
                <?php $datetimepicker_formatInput = true; ?>
                <?php require($GLOBALS['srcdir'] . '/js/xl/jquery-datetimepicker-2-5-4.js.php'); ?>
                <?php // can add any additional javascript settings to datetimepicker here; need to prepend first setting with a comma ?>
            });
			});
</script>
    <style>
        .nav-tabs>li>a {
            border-bottom: 1px solid #fff !important;
            color: #fff;
        }
.nav>a {
            border-bottom: 1px solid #fff !important;
            color: #fff;
        }
.nav>a.active {
background-color : white !important;
color: black;
}

        .nav>a:hover {
            background-color: none !important;
        }
        .nav>li>a:hover {
            background-color: none !important;
        }

        .in-content {
            border: 1px solid #ccc;
            padding: 40px;
            height: auto;
        }

        .form-check-inline {
            display: inline-flex;
            align-items: center;
        }

        .ml-2 {
            margin-left: 10px;
        }

        .lh-25 {
            line-height: 25px;
        }
        .mt-4 {
            margin-top: 20px;
        }
    </style>
</head>

<body>
<?php
if (!isset($_REQUEST['id']) || $_REQUEST['id'] == '') {?>

        <div class="row col-md-offset-3" onclick="get_pre_value()"><button class="btn btn-primary">Get Most recent Value</button></div>
<?php }
?>
    <div id="tabs" class="row">
        <div class="col-md-3" style="padding-left:0px;width:300px;min-height:762px;">
            <nav class="nav flex-column" style="min-height:762px;background-color:#337ab7;">
                <a data-toggle="tab" class="nav-link active" href="#menu1"><i class="glyphicon glyphicon-asterisk"></i> Identificacion</a>
                <a data-toggle="tab" href="#menu2" class="nav-link"><i class="glyphicon glyphicon-asterisk"></i> Familia</a>
                <a data-toggle="tab" href="#menu3" class="nav-link"><i class="glyphicon glyphicon-asterisk"></i> Salud</a>
                <a data-toggle="tab" href="#menu4" class="nav-link"><i class="glyphicon glyphicon-asterisk"></i> Nivel Mental</a>
                <a data-toggle="tab" href="#menu5" class="nav-link"><i class="glyphicon glyphicon-asterisk"></i> Adaptacion al hogar de cuido Prolongado</a>
                <a data-toggle="tab" href="#menu6" class="nav-link"><i class="glyphicon glyphicon-asterisk"></i> Socializacion</a>
                <a data-toggle="tab" href="#menu7" class="nav-link"><i class="glyphicon glyphicon-asterisk"></i> Diagnostico</a>
            </nav>
        </div>
	<div class="col-md-9"><br>
<?php
if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
        $data = sqlQuery("select * from form_trabajo_social_report_inicial where id=?",$_REQUEST['id']);
} else if(isset($_REQUEST['get_pre_value']) && $_REQUEST['get_pre_value'] != ''){

	$data = sqlQuery("select fp.* from form_trabajo_social_report_inicial fp left join forms f on f.form_id=fp.id and f.formdir='trabajo_social_report_inicial' and fp.pid=f.pid where fp.pid=".$pid." and f.deleted=0 order by fp.date desc,fp.id desc limit 1");
}
?>
<form class="form-horizontal" name="datos_form" role="form" method="post" action="<?php echo $rootdir; ?>/forms/trabajo_social_report_inicial/save.php?<?php echo (isset($_REQUEST['id']) && $_REQUEST['id'] != '') ? ('mode=edit&id='.$_REQUEST['id']): 'mode=new';?>" enctype="multipart/form-data">
<div class="col-md-12 row">
<div class="col-md-2">
                            <label for='form_date' class="text-right"><?php echo xlt('Fecha de Servicio:'); ?></label>
</div>
<div class="col-md-4">
                            <input type='text' class='form-control datepicker' name='date_service' id='form_date' <?php echo ($disabled ?? '') ?> value='<?php echo (isset($_REQUEST['id']) && $_REQUEST['id'] != '') ? attr(oeFormatShortDate(substr($data['date_service'], 0, 10))) : attr(oeFormatShortDate(date('Y-m-d'))); ?>' title='<?php echo xla('Fecha de Servicio'); ?>' />
</div>
			</div>
<br>
 <div class="col-md-12 row">
<div class="col-md-2">
                            <label for='form_date' class="text-right"><?php echo xlt('Start Time:'); ?></label>
</div>
<div class="col-md-4">
<input type="text" id="start_time" value='<?php echo $data['start_time']; ?>' title='<?php echo xla('Start Time'); ?>' name='start_time' placeholder='HH : MM : AM/PM'/>
</div>
<div class="col-md-2">
                            <label for='form_date' class="text-right"><?php echo xlt('End Time:'); ?></label>
</div>
<div class="col-md-4">
<input type="text" id="end_time" class='form-control'  <?php echo ($disabled ?? '') ?> value='<?php echo $data['end_time']; ?>' name='end_time' placeholder='HH : MM : AM/PM' title='<?php echo xla('End Time'); ?>' />
</div>
</div>
<br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-6 text-right">Historical Bio-psicosocial:</label>
                                <div class="col-sm-6">
				<input type="text" class="form-control" name="bio_psicosocial" value="<?php echo $data['bio_psicosocial'];?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-6 text-right">HIC #:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="hic" value="<?php echo $data['hic'];?>">
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
						<input type="checkbox" class="form-check-input" name="es_0" value="0" <?php echo (($data['es_0'] == '0')?"checked":"");?>> 0
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_1" value="1" <?php echo (($data['es_1'] == '1')?"checked":"");?>> 1
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_2" value="2" <?php echo (($data['es_2'] == '2')?"checked":"");?>> 2
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_3" value="3" <?php echo (($data['es_3'] == '3')?"checked":"");?>> 3
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_4" value="4" <?php echo (($data['es_4'] == '4')?"checked":"");?>> 4
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_5" value="5" <?php echo (($data['es_5'] == '5')?"checked":"");?>> 5
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_6" value="6" <?php echo (($data['es_6'] == '6')?"checked":"");?>> 6
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_7" value="7" <?php echo (($data['es_7'] == '7')?"checked":"");?>> 7
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_8" value="8" <?php echo (($data['es_8'] == '8')?"checked":"");?>> 8
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_9" value="9" <?php echo (($data['es_9'] == '9')?"checked":"");?>> 9
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_10" value="10" <?php echo (($data['es_10'] == '10')?"checked":"");?>> 10
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_11" value="11" <?php echo (($data['es_11'] == '11')?"checked":"");?>> 11
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_12" value="12" <?php echo (($data['es_12'] == '12')?"checked":"");?>> 12
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_omas" value="omas" <?php echo (($data['es_omas'] == 'omas')?"checked":"");?>> o mas
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Creencia Religiosa:</label>
                                        <div class="col-sm-6">
					<input type="text" class="form-control" name="creencia_religiosa" value="<?php echo $data['creencia_religiosa'];?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Encargado o Tutor:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="encargado_o_tutor" value="<?php echo $data['encargado_o_tutor'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Relacion: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="relacion" value="<?php echo $data['relacion'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">En caso de emergencia llamar al: </label>
                                        <div class="col-sm-6 form-check-inline">
                                            (<input type="text" class="form-control" name="emergencia_llamar" value="<?php echo $data['emergencia_llamar'];?>">)
                                            <input type="text" class="form-control" name="emergencia_llamar1" value="<?php echo $data['emergencia_llamar1'];?>"> -
                                            <input type="text" class="form-control" name="emergencia_llamar2" value="<?php echo $data['emergencia_llamar2'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Es veterano: </label>
                                        <div class="col-sm-6">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_si" value="si" <?php echo (($data['es_si']=="si")?"checked":"");?>> Si
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="es_no" value="no" <?php echo (($data['es_no']=="no")?"checked":"");?>> No
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
                                                    <input type="checkbox" class="form-check-input" name="lugar_casa" value="casa" <?php echo (($data['lugar_casa']=="casa")?"checked":"");?>> Casa o Apartamento
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="lugar_egida" value="egida" <?php echo (($data['lugar_egida']=="egida")?"checked":"");?>> Egida
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="lugar_deam" value="deam" <?php echo (($data['lugar_deam']=="deam")?"checked":"");?>> Deambulante
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="lugar_hospital" value="hospital" <?php echo (($data['lugar_hospital']=="hospital")?"checked":"");?>> Hospital
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="lugar_hogar" value="hogar" <?php echo (($data['lugar_hogar']=="hogar")?"checked":"");?>> Hoger de Cuido Prolongado
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="lugar_otro" value="otro" <?php echo (($data['lugar_otro']=="otro")?"checked":"");?>> Otro (explique)
						    <input type="text" class="form-control" name="lugar_explique" value="<?php echo $data['lugar_explique'];?>">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">De responder Egida o Hospital responda las siguientes aseveraciones: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="de_responder" value="<?php echo $data['de_responder'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Nombre Hogar o Egida: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="nombre_hogar" value="<?php echo $data['nombre_hogar'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right"> Numero de telefono: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="numbero_telefono" value="<?php echo $data['numbero_telefono'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right"> Fecha ingreso en el Hogar o Institucion: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control datepicker" name="fecha_ingreso" placeholder="MM/DD/YYYY" value="<?php echo $data['fecha_ingreso'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6 text-right">Estatus Marital:</label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="marital_cas" value="cas" <?php echo (($data['marital_cas']=="cas")?"checked":"");?>> Casado(a)
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="marital_divorce" value="divorce" <?php echo (($data['marital_divorce']=="divorce")?"checked":"");?>> Divorciado(a)
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="marital_viu" value="viu" <?php echo (($data['marital_viu']=="viu")?"checked":"");?>> Viudo(a)
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="marital_sol" value="sol" <?php echo (($data['marital_sol']=="sol")?"checked":"");?>> Soltero(a)
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="marital_nunca" value="nunca" <?php echo (($data['marital_nunca']=="nunca")?"checked":"");?>> Nunca se Caso
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6 text-right">So estuvo casado(a) o tuvo una relacion con alguien por un periodo prolongado: Como se siente al respecto en estos momentos? (sentimientos que expresa)</label>
                                    <div class="col-sm-6">
				    <textarea class="form-control" name="so_esuvo" rows="10" cols="40"><?php echo $data['so_esuvo'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6 text-right">Composicion/Familiar</label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="comp_hijos" value="hijos" <?php echo (($data['comp_hijos']=="hijos")?"checked":"");?>> Hijos / Cuantos hijos actualmente:
						<input type="text" class="form-control" name="hijos_actual" value="<?php echo $data['hijos_actual'];?>">
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="hijos_sobrinos" value="sobrinos" <?php echo (($data['hijos_sobrinos']=="sobrinos")?"checked":"");?>> Sobrinos
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="hijos_nietos" value="nietos" <?php echo (($data['hijos_nietos']=="nietos")?"checked":"");?>> Nietos
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="hijos_otro" value="otro" <?php echo (($data['hijos_otro']=="otro")?"checked":"");?>> Otro(
							<input type="text" class="form-control" name="hijos_otro_text" value="<?php echo $data['hijos_otro_text'];?>">
                                                )
                                            </label>
                                            <label>Empleos en los que se desempeno: (por cuanto tiempo)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu3" class="tab-pane">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">A. Medico de cabecera</label>
                                    <div class="col-sm-6">
                                        <div>a. Nombre del medico: Dr <input type="text" class="form-control" name="medico_de_cabecera" value="<?php echo $data['medico_de_cabecera'];?>"></div>
                                        <div>b. Telephone: <input type="text" class="form-control" name="telefono" value="<?php echo $data['telefono'];?>"></div>
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
                                                    <td><input type="checkbox" class="form-check-input" name="diab_si" value="si" <?php echo (($data['diab_si']=="si")?"checked":"");?>></td>
                                                    <td><input type="checkbox" class="form-check-input" name="diab_no" value="no" <?php echo (($data['diab_no']=="no")?"checked":"");?>></td>
                                                </tr>
                                                <tr>
                                                    <td>* ALTA PRESION</td>
                                                    <td><input type="checkbox" class="form-check-input" name="alta_si" value="si" <?php echo (($data['alta_si']=="si")?"checked":"");?>></td>
                                                    <td><input type="checkbox" class="form-check-input" name="alta_no" value="no" <?php echo (($data['alta_no']=="no")?"checked":"");?>></td>
                                                </tr>
                                                <tr>
                                                    <td>* CONDICIONES PULMONARES</td>
                                                    <td><input type="checkbox" class="form-check-input" name="condi_si" value="si" <?php echo (($data['condi_si']=="si")?"checked":"");?>></td>
                                                    <td><input type="checkbox" class="form-check-input" name="condi_no" value="no" <?php echo (($data['condi_no']=="no")?"checked":"");?>></td>
                                                </tr>
                                                <tr>
                                                    <td>* ENFERMEDADES DEL CORAZON</td>
                                                    <td><input type="checkbox" class="form-check-input" name="corazon_si" value="si" <?php echo (($data['corazon_si']=="si")?"checked":"");?>></td>
                                                    <td><input type="checkbox" class="form-check-input" name="corazon_no" value="no" <?php echo (($data['corazon_no']=="no")?"checked":"");?>></td>
                                                </tr>
                                                <tr>
                                                    <td>* ARTRITIS</td>
                                                    <td><input type="checkbox" class="form-check-input" name="arti_si" value="si" <?php echo (($data['arti_si']=="si")?"checked":"");?>></td>
                                                    <td><input type="checkbox" class="form-check-input" name="arti_no" value="no" <?php echo (($data['arti_no']=="no")?"checked":"");?>></td>
                                                </tr>
                                                <tr>
                                                    <td>* CONDICIONES PSIQUIATRICAS</td>
                                                    <td><input type="checkbox" class="form-check-input" name="psi_si" value="si" <?php echo (($data['psi_si']=="si")?"checked":"");?>></td>
                                                    <td><input type="checkbox" class="form-check-input" name="psi_no" value="no" <?php echo (($data['psi_no']=="no")?"checked":"");?>></td>
                                                </tr>
                                                <tr>
                                                    <td>* OTRA</td>
                                                    <td><input type="checkbox" class="form-check-input" name="otra_si" value="si" <?php echo (($data['otra_si']=="si")?"checked":"");?>></td>
                                                    <td><input type="checkbox" class="form-check-input" name="otra_no" value="no" <?php echo (($data['otra_no']=="no")?"checked":"");?>></td>
                                                </tr>
                                                <tr>
                                                    <td>* CONDICION FISICA PARA REFERIDO DEL PT. EN EL M.D. DE CABECERA</td>
                                                    <td><input type="checkbox" class="form-check-input" name="para_si" value="si" <?php echo (($data['para_si']=="si")?"checked":"");?>></td>
                                                    <td><input type="checkbox" class="form-check-input" name="para_no" value="no" <?php echo (($data['para_no']=="no")?"checked":"");?>></td>
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
                                                <input type="checkbox" class="form-check-input" name="toma_si" value="si" <?php echo (($data['toma_si']=="si")?"checked":"");?>> SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="toma_no" value="no" <?php echo (($data['toma_no']=="no")?"checked":"");?>> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-6">De constestar si mencionelos: </label>
                                    <div class="col-sm-6">
				    <textarea class="form-control" name="de_constestar" rows="4" cols="20"><?php echo $data['de_constestar'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-6">D. Historial Psiquiatrico: </label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="history_si" value="si" <?php echo (($data['history_si']=="si")?"checked":"");?>> SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="history_no" value="no" <?php echo (($data['history_no']=="no")?"checked":"");?>> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-6">a. De responder si escriba el nombre del medico : </label>
                                    <div class="col-sm-6">
				    <input type="text" class="form-control" name="responder_medico" value="<?php echo $data['responder_medico'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-6">E. Historial de Sustancia : </label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sustancia_si" value="si" <?php echo (($data['sustancia_si']=="si")?"checked":"");?> > SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sustancia_no" value="no" <?php echo (($data['sustancia_no']=="no")?"checked":"");?>> No
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
                                                <input type="checkbox" class="form-check-input" name="sustancia_alcohol" value="alcohol" <?php echo (($data['sustancia_alcohol']=="alcohol")?"checked":"");?>> Alcohol
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sustancia_ciga" value="ciga" <?php echo (($data['sustancia_ciga']=="ciga")?"checked":"");?>> Cigarrillos
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sustancia_otro" value="otro" <?php echo (($data['sustancia_otro']=="otro")?"checked":"");?>> Otros :
						<input type="text" class="form-control" name="sustancia_otro_text" value="<?php echo $data['sustancia_otro_text'];?>">
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
                                                <input type="checkbox" class="form-check-input" name="nivel_camina" value="camina" <?php echo (($data['nivel_camina']=="camina")?"checked":"");?>> Camina solo
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="nivel_camina_ayuda" value="ayuda" <?php echo (($data['nivel_camina_ayuda']=="ayuda")?"checked":"");?>> Camina con ayuda
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="nivel_silla" value="silla" <?php echo (($data['nivel_silla']=="silla")?"checked":"");?>> Utiliza silla de rueda
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="nivel_encamado" value="encamado" <?php echo (($data['nivel_encamado']=="encamado")?"checked":"");?>> Encamado
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="nivel_otros" value="otros" <?php echo (($data['nivel_otros']=="otros")?"checked":"");?>> Otros (explica)
						<input type="text" class="form-control" name="nivel_otros_text" value="<?php echo $data['nivel_otros_text'];?>">
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
                                                <input type="checkbox" class="form-check-input" name="sigue_si" value="si" <?php echo (($data['sigue_si']=="si")?"checked":"");?>> SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="sigue_no" value="no" <?php echo (($data['sigue_no']=="no")?"checked":"");?>> No
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
                                                <input type="checkbox" class="form-check-input" name="mivi_excel" value="excel" <?php echo (($data['mivi_excel']=="excel")?"checked":"");?>> Excelente
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="movi_buena" value="buena" <?php echo (($data['movi_buena']=="buena")?"checked":"");?>> Buena
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="movi_con" value="con" <?php echo (($data['movi_con']=="con")?"checked":"");?>> Con dificultad
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
                                                <input type="checkbox" class="form-check-input" name="se_si" value="si" <?php echo (($data['se_si']=="si")?"checked":"");?>> SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="se_no" value="no" <?php echo (($data['se_no']=="no")?"checked":"");?>> No
                                            </label>
                                        </div>
                                    </div>
                                    <label class="col-md-2">Necesita Ayuda: </label>
                                    <div class="col-sm-2">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="necesita_si" value="si" <?php echo (($data['necesita_si']=="si")?"checked":"");?>> SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="necesita_no" value="no" <?php echo (($data['necesita_no']=="no")?"checked":"");?>> No
                                            </label>
                                        </div>
                                    </div>
                                    <label class="col-md-2">Coopera en el mantenimiento de su apariencia: </label>
                                    <div class="col-sm-2">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="coopera_si" value="si" <?php echo (($data['coopera_si']=="si")?"checked":"");?>> SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="coopera_no" value="no" <?php echo (($data['coopera_no']=="no")?"checked":"");?>> No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Se Observa: </label>
                                    <div class="col-sm-2">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="se_activa" value="activa" <?php echo (($data['se_activa']=="activa")?"checked":"");?>> Activa
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="se_pasivo" value="pasivo" <?php echo (($data['se_pasivo']=="pasivo")?"checked":"");?>> Pasivo
                                            </label>
                                        </div>
                                    </div>
                                    <label class="col-md-2">Observaciones de su funcionamiento en general: </label>
                                    <div class="col-sm-2">
				    <input type="text" class="form-control" name="observaciones" value="<?php echo $data['observaciones'];?>">
                                    </div>
                                    <label class="col-md-2">Coopera en el mantenimiento de su apariencia: </label>
                                    <div class="col-sm-2">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="la_paciente" value="paciente" <?php echo (($data['la_paciente']=="paciente")?"checked":"");?>> La informacion fue recibida del paciente
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="le_terceros" value="terceros" <?php echo (($data['le_terceros']=="terceros")?"checked":"");?>> La Informacion fue recibida de terceros
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">Nombre </label>
                                    <div class="col-sm-3">
				    <input type="text" class="form-control" name="nombre_text" value="<?php echo $data['nombre_text'];?>">
                                    </div>
                                    <label class="col-md-3">Relacion: </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="relacion_text" value="<?php echo $data['relacion_text'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu4" class="tab-pane">
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
                                                        <input type="checkbox" class="form-check-input" name="reciento_intacta" value="intacta" <?php echo (($data['reciento_intacta']=="intacta")?"checked":"");?>> Intacta
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="reciento_leve" value="leve" <?php echo (($data['reciento_leve']=="leve")?"checked":"");?>> Deterioro Leve
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="reciento_extremo" value="extremo" <?php echo (($data['reciento_extremo']=="extremo")?"checked":"");?>> Deterioro extremo
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
                                                        <input type="checkbox" class="form-check-input" name="remota_intacta" value="intacta" <?php echo (($data['remota_intacta']=="intacta")?"checked":"");?>> Intacta
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="remota_leve" value="leve" <?php echo (($data['remota_leve']=="leve")?"checked":"");?>> Deterioro Leve
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="remota_extremo" value="extremo" <?php echo (($data['remota_extremo']=="extremo")?"checked":"");?>> Deterioro extremo
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
                                                        <input type="checkbox" class="form-check-input" name="persona_si" value="si" <?php echo (($data['persona_si']=="si")?"checked":"");?>> SI
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="persona_no" value="no" <?php echo (($data['persona_no']=="no")?"checked":"");?>> NO
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        Tiempo <input type="checkbox" class="form-check-input" name="tiempo_si" value="si" <?php echo (($data['tiempo_si']=="si")?"checked":"");?>> SI
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="tiempo_no" value="no" <?php echo (($data['tiempo_no']=="no")?"checked":"");?>> NO
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        Espacio <input type="checkbox" class="form-check-input" name="espasio_si" value="si" <?php echo (($data['espasio_si']=="si")?"checked":"");?>> SI
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="espasio_no" value="no" <?php echo (($data['espasio_no']=="no")?"checked":"");?>> NO
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
                                                <input type="checkbox" class="form-check-input" name="pro_or" value="or" <?php echo (($data['pro_or']=="or")?"checked":"");?>> Organizadas
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="pro_de" value="de" <?php echo (($data['pro_de']=="de")?"checked":"");?>> Desorganizadas
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">D. Al momento de la intervencion se descartaron y el/la paciento nego pensamientos suicidas u homicidas, asi como la presncia de disturbio perceptuales: </label>
                                    <div class="col-md-8" style="margin-left:15px">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="al_si" value="si" <?php echo (($data['al_si']=="si")?"checked":"");?>> SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="al_no" value="no" <?php echo (($data['al_no']=="no")?"checked":"");?>> NO
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <label>De responder no, mencione cuales: </label>
                                            </div>
                                            <div class="col-md-6">
					    <input type="text" class="form-control" name="de_responder_men" value="<?php echo $data['de_responder_men'];?>">
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
                                                        <input type="checkbox" class="form-check-input" name="expres_normal" value="normal" <?php echo (($data['expres_normal']=="normal")?"checked":"");?>> Normal
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_alterado" value="alterado" <?php echo (($data['expres_alterado']=="alterado")?"checked":"");?>> Alterado
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_cambio" value="cambio" <?php echo (($data['expres_cambio']=="cambio")?"checked":"");?>> Cambio de respiracion
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_trans" value="trans" <?php echo (($data['expres_trans']=="trans")?"checked":"");?>> Tranquilio 4
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_movi" value="movi" <?php echo (($data['expres_movi']=="movi")?"checked":"");?>> Movimientos (cabeza, brazos y/o pies)
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
                                                        <input type="checkbox" class="form-check-input" name="facial_movi" value="movi" <?php echo (($data['facial_movi']=="movi")?"checked":"");?>> Movimientos de los ojos
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="facial_boca" value="boca" <?php echo (($data['facial_boca']=="boca")?"checked":"");?>> Movimientos de la boca
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
                                                        <input type="checkbox" class="form-check-input" name="expres_normal_1" value="normal" <?php echo (($data['expres_normal_1']=="normal")?"checked":"");?>> Normal
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_confu" value="confu" <?php echo (($data['expres_confu']=="confu")?"checked":"");?>> Confundido
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_tri" value="tri" <?php echo (($data['expres_tri']=="tri")?"checked":"");?>> Triste
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_alter" value="alter" <?php echo (($data['expres_alter']=="alter")?"checked":"");?>> Alterado
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_difi" value="difi" <?php echo (($data['expres_difi']=="difi")?"checked":"");?>> Dificultad al expresarse
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="expres_repi" value="repi" <?php echo (($data['expres_repi']=="repi")?"checked":"");?>> Repetitivo en las palabras
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3">En el area expresion la trabajadora social suscribiente descarto movimientos involuntarios producidos por alguna enfermeded y/o medicamento: </label>
                                            <div class="col-md-8" style="margin-left:15px">
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="en_el_si" value="si" <?php echo (($data['en_el_si']=="si")?"checked":"");?>> SI
                                                    </label>
                                                </div>
                                                <div class="form-check-inline ml-2">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="en_el_no" value="no" <?php echo (($data['en_el_no']=="no")?"checked":"");?>> NO
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
                                                <input type="checkbox" class="form-check-input" name="estado_alerto" value="alerto" <?php echo (($data['estado_alerto']=="alerto")?"checked":"");?>> Alerta
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="estado_alegre" value="alegre" <?php echo (($data['estado_alegre']=="alegre")?"checked":"");?>> Alegre
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                Tiempo <input type="checkbox" class="form-check-input" name="estado_tran" value="tran" <?php echo (($data['estado_tran']=="tran")?"checked":"");?>> Tranquilo
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="estado_ansioso" value="ansioso" <?php echo (($data['estado_ansioso']=="ansioso")?"checked":"");?>> Ansioso
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                Espacio <input type="checkbox" class="form-check-input" name="estado_triste" value="triste" <?php echo (($data['estado_triste']=="triste")?"checked":"");?>> Triste
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="estado_decaido" value="decaido" <?php echo (($data['estado_decaido']=="decaido")?"checked":"");?>> Decaido
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="estado_irritable" value="irritable" <?php echo (($data['estado_irritable']=="irritable")?"checked":"");?>> Irritable
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="estado_agitado" value="agitado" <?php echo (($data['estado_agitado']=="agitado")?"checked":"");?>> Agitado
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="estado_deprimido" value="deprimido" <?php echo (($data['estado_deprimido']=="deprimido")?"checked":"");?>> Deprimido
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Observaciones</label>
                                    <div class="col-md-6" style="margin-left:15px">
				    <textarea class="form-control" name="observaciones" rows="5" cols="10"><?php echo $data['observaciones'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu5" class="tab-pane">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Como se siente respecto a su estadia en el hogar ?</label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="como_lo" value="lo" <?php echo (($data['como_lo']=="lo")?"checked":"");?>> Lo accepta
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="como_no_lo" value="no_lo" <?php echo (($data['como_no_lo']=="no_lo")?"checked":"");?>> No Lo accepta
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Comentarios</label>
                                    <div class="col-sm-6">
				    <textarea class="form-control" name="comentarios" rows="5" cols="10"><?php echo $data['comentarios'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu6" class="tab-pane">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Como interactua el entrevistado con otros residentes en el hogar? Se identifica con algurien en particular. (Explique sentimientos que muestra o expresa)</label>
                                    <div class="col-sm-6">
				    <textarea class="form-control" name="com_otros" rows="5" cols="10"><?php echo $data['com_otros'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Como interactua con el cuidador? Mantience buena empatia y se indentifica con el o por el contrario rechaza al ayuda de este. (Explique sentimientos que muestra o expresa)</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="com_cuidador" rows="5" cols="10"><?php echo $data['com_cuidador'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Como se relaciona con la familia? (Sentimientios afectivos hacia su familia, frecuencia de visitas que recibe? Como se siente presente?) </label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="com_familia" rows="5" cols="10"><?php echo $data['com_familia'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Se lo llevan los familiares algunos fines de semana fuera del hogar? </label>
                                <div class="col-md-5" style="margin-left:15px">
                                    <div class="form-check-inline ml-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="si_lo_si" value="si" <?php echo (($data['si_lo_si']=="si")?"checked":"");?>> SI
                                        </label>
                                    </div>
                                    <div class="form-check-inline ml-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="si_lo_no" value="no" <?php echo (($data['si_lo_no']=="no")?"checked":"");?>> NO
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Participa en las actividades sociales dentro de su nucleo familiar tales como: (madres, padres, accion de gracias, navidad etc) </label>
                                <div class="col-md-5" style="margin-left:15px">
                                    <div class="form-check-inline ml-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="participa_si" value="si" <?php echo (($data['participa_si']=="si")?"checked":"");?>> SI
                                        </label>
                                    </div>
                                    <div class="form-check-inline ml-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="participa_no" value="no" <?php echo (($data['participa_no']=="no")?"checked":"");?>> NO
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Participa en las actividades sociales qus se llevan a cabo en el hogar </label>
                                <div class="col-md-5" style="margin-left:15px">
                                    <div class="form-check-inline ml-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="qus_hogar_si" value="si" <?php echo (($data['qus_hogar_si']=="si")?"checked":"");?>> SI
                                        </label>
                                    </div>
                                    <div class="form-check-inline ml-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="qus_hogar_no" value="no" <?php echo (($data['qus_hogar_no']=="no")?"checked":"");?>> NO
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Mantieno contacto freecuente con hijos y nietos: </label>
                                <div class="col-sm-6">
				<input type="text" class="form-control" name="mantieno" value="<?php echo $data['mantieno'];?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <input type="checkbox" class="form-check-input" name="del_paciente" value="paciente" <?php echo (($data['del_paciente']=="paciente")?"checked":"");?>> <label>La informacion fue recibida del paciente</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" class="form-check-input" name="del_terceros" value="terceros" <?php echo (($data['del_terceros']=="terceros")?"checked":"");?>> <label>La informacion fue recibida de terceros</label>
                                </div>
                                <div class="col-md-3">
				<label>Nombre: </label><input type="text" class="form-control" name="text_nombre" value="<?php echo $data['text_nombre'];?>">
                                </div>
                                <div class="col-md-3">
				<label>Relacion: </label><input type="text" class="form-control" name="text_relacion" value="<?php echo $data['text_relacion'];?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu7" class="tab-pane">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Diagnostico: </label>
                                    <div class="col-sm-6">
				    <input type="text" class="form-control" name="text_diagnostico" value="<?php echo $data['text_diagnostico'];?>" onclick="sel_diagnosis()" Placeholder="Click to select or change ICD">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6">Plan de accion: </label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="pla_de_accion" rows="5" cols="10"><?php echo $data['pla_de_accion'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 mt-4">
			<div class="btn-toolbar " style="display:flex;justify-content:center;">
<button type="submit" class="btn btn-primary"><?php
if($_REQUEST['id'] != '')
        echo 'Update & Close';
else
        echo 'Save & Close';
?>
</button>
<button class="btn btn-danger" onclick="top.restoreSession();parent.closeTab(window.name, true);">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
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

	// This is for callback by the find-code popup.
// Appends to or erases the current list of related codes.
function set_related(codetype, code, selector, codedesc) {
    var f = document.forms[0];
    var s = f.text_diagnostico.value;
    if (code) {
        if (s.length > 0) s += ';';
        s += codetype + ':' + code;
    } else {
        s = '';
    }
    f.text_diagnostico.value = s;
}
// This invokes the find-code popup.
function sel_diagnosis(varname) {
    rcvarname = varname;
    // codetype is just to make things easier and avoid mistakes.
    // Might be nice to have a lab parameter for acceptable code types.
    // Also note the controlling script here runs from interface/patient_file/encounter/.
    let title = <?php echo xlj("Select Diagnosis Codes"); ?>;
    dlgopen('../../patient_file/encounter/find_code_dynamic.php?codetype=ICD10', '_blank', 985, 750, '', title);
}

// This is for callback by the find-code popup.
// Returns the array of currently selected codes with each element in codetype:code format.
function get_related() {
    return document.forms[0].text_diagnostico.value.split(';');
}

// This is for callback by the find-code popup.
// Deletes the specified codetype:code from the currently selected list.
function del_related(s) {
    my_del_related(s, document.forms[0].text_diagnostico, false);
}
const starttime = document.getElementById('start_time');
const endtime = document.getElementById('end_time');

starttime.addEventListener('input', (e)=> {
  let input = e.target.value;
  // Test if ending with /, so it's a delete operation when ending with /
  if (/\D:$/.test(input)){
    input = input.substr(0, input.length - 3);
  }
  // /\D/g replaces every non zero value
  const values = input.split(':');
  const timeValues = values.slice(0,2).map((v)=>v.replace(/\D/g, ''));

  if (timeValues[0]) timeValues[0] = formatValue(timeValues[0], 12);
  if (timeValues[1]) timeValues[1] = formatValue(timeValues[1], 59);

  const output = timeValues.map(
    (v, i)=> v.length == 2 && i < 2 ? v + ' : ' : v);
  if(values[2]){
    const meridian = formatMeridian(values[2]);
    output.push(meridian);
  }

  e.target.value = output.join('').substr(0, 12);
});
endtime.addEventListener('input', (e)=> {
  let input = e.target.value;
  // Test if ending with /, so it's a delete operation when ending with /
  if (/\D:$/.test(input)){
    input = input.substr(0, input.length - 3);
  }
  // /\D/g replaces every non zero value
  const values = input.split(':');
  const timeValues = values.slice(0,2).map((v)=>v.replace(/\D/g, ''));

  if (timeValues[0]) timeValues[0] = formatValue(timeValues[0], 12);
  if (timeValues[1]) timeValues[1] = formatValue(timeValues[1], 59);

  const output = timeValues.map(
    (v, i)=> v.length == 2 && i < 2 ? v + ' : ' : v);
  if(values[2]){
    const meridian = formatMeridian(values[2]);
    output.push(meridian);
  }

  e.target.value = output.join('').substr(0, 12);
});
const formatValue=(str, max) =>{
  if (str.charAt(0) !== '0' || str == '00') {
    const num = parseInt(str);
    if (isNaN(num) || num <= 0 || num > max) num = 1;
    str = num > parseInt(max.toString().charAt(0)) && num.toString().length == 1 ? '0' + num : num.toString();
  };
  return str;
};

const formatMeridian = (str)=>{
  str = str.toUpperCase().trim();
  return /(AM|PM|^A$|^P$)/.test(str) ? str :'';
}

        </script>
</html>
