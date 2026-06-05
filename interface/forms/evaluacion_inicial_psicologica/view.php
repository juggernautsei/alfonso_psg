<?php

include_once '../../globals.php';
include_once "$srcdir/options.inc.php";
use OpenEMR\Core\Header;
?>
<html>

<head>
  <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/bootstrap/dist/css/bootstrap.min.css?v=41">
  <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/font-awesome/css/font-awesome.css">

  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/bootstrap/dist/js/bootstrap.min.js"></script>
<?php Header::setupHeader(['datetime-picker', 'common', 'jquery-ui', 'jquery-ui-darkness']);?>
<script>
// This is for callback by the find-code popup.
// Appends to or erases the current list of related codes.
function set_related(codetype, code, selector, codedesc) {
        var f = document.forms[0];

    var s = f[rcvarname].value;
    if (code) {
        if (s.length > 0) s += ';';
        s += codetype + ':' + code +' - '+codedesc;
    } else {
        s = '';
    }
    f[rcvarname].value = s;
}
// This invokes the find-code popup.
function sel_diagnosis(varname) {
    rcvarname = varname;
    // codetype is just to make things easier and avoid mistakes.
    // Might be nice to have a lab parameter for acceptable code types.
    // Also note the controlling script here runs from interface/patient_file/encounter/.
    let title = <?php echo xlj("Select Diagnosis Codes"); ?>;
    dlgopen('find_code_dynamic.php?codetype=ICD10', '_blank', 985, 750, '', title);
}

// This is for callback by the find-code popup.
// Returns the array of currently selected codes with each element in codetype:code format.
function get_related() {
    return document.forms[0][rcvarname].value.split(';');
}

// This is for callback by the find-code popup.
// Deletes the specified codetype:code from the currently selected list.
function del_related(s) {
    my_del_related(s, document.forms[0][rcvarname], false);
}
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
    <title>Inicial Psicologica</title>
  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">-->
    <style>
        .nav>a {
            border-bottom: 1px solid #fff !important;
            color: #fff;
        }
.nav>a.active {
background-color : white !important;
color: black;
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
                <a data-toggle="tab" href="#menu1" class="nav-link active"><i class="fa fa-certificate"></i> Datos Demograficos</a>
                <a data-toggle="tab" href="#menu2" class="nav-link"><i class="fa fa-certificate"></i> Asunto Presentado</a>
                <a data-toggle="tab" href="#menu3" class="nav-link"><i class="fa fa-certificate"></i> Evaluacion De Riesgo (basada en informacion disponible)</a>
                <a data-toggle="tab" href="#menu4" class="nav-link"><i class="fa fa-certificate"></i> Impresion Diagnostica</a>
                <a data-toggle="tab" href="#menu5" class="nav-link"><i class="fa fa-certificate"></i> Plan De Tratamiento</a>
            </nav>
        </div>
	<div class="col-md-9"><br>
<?php
if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
        $data = sqlQuery("select * from form_evaluacion_inicial_psicologica where id=?",$_REQUEST['id']);
} else if(isset($_REQUEST['get_pre_value']) && $_REQUEST['get_pre_value'] != ''){
	$data = sqlQuery("select fp.* from form_evaluacion_inicial_psicologica fp left join forms f on f.form_id=fp.id and f.formdir='evaluacion_inicial_psicologica' and fp.pid=f.pid where fp.pid=".$pid." and f.deleted=0 order by fp.date desc,fp.id desc limit 1");

}
?>
<form class="" name="datos_form" role="form" method="post" action="<?php echo $rootdir; ?>/forms/evaluacion_inicial_psicologica/save.php?type=datos&<?php echo (isset($_REQUEST['id']) && $_REQUEST['id'] != '') ? ('mode=edit&id='.$_REQUEST['id']): 'mode=new';?>" enctype="multipart/form-data">
<!--	    <form class="form-horizontal" name="social_report" role="form" method="post" action="#" style="line-height:40px">-->
                <!--<div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-6 text-right">Nombre:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nombre">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-6 text-right">Num. Expediente:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="expediente">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-6 text-right">Fecha:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="datepicker1 form-control" name="fecha" placeholder="MM/DD/YYYY">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-6 text-right">Se dio orientacion sobre: Confidencialidad: </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="confidencial">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-6 text-right">Nombre del Psicologo:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="psicologo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="tab-content">
                    <div id="menu1" class="tab-pane active">
                        <div class="col-md-12 in-content">
                            <!--<div class="col-md-12">
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Genero: </label>
                                        <div class="col-sm-6">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="femino" value=""> F
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="masculino" value=""> M
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Edad:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="edad">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Estado Civil: </label>
                                        <div class="col-sm-6">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="estado_s" value=""> S
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="estado_C" value=""> C
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="estado_v" value=""> V
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="estado_d" value=""> D
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Anos: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="anos">
                                        </div>
                                    </div>
                                </div>
			    </div>-->
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
                            <div class="col-md-12 row">
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Matrimonios anteriores:</label>
                                        <div class="col-sm-6">
					<input type="text" class="form-control" name="anteriores" value="<?php echo $data['anteriores'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Hijos / as:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="hijos_as" value="<?php echo $data['hijos_as'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Edades:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="edades" value="<?php echo $data['edades'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Escolarided del cliente</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="cliente" value="<?php echo $data['cliente'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Lugar de Trabajo: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="lugar_trabojo" value="<?php echo $data['lugar_trabojo'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Ocupacion: </label>
                                        <div class="col-sm-6 form-check-inline">
                                            <input type="text" class="form-control" name="ocupacion" value="<?php echo $data['ocupacion'];?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Anos en el empleo actual: </label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="anos_actual" value="<?php echo $data['anos_actual'];?>">
                                        </div>
                                    </div>
				</div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2">Experiencia militar: </label>
                                        <div class="col-sm-10 form-inline">
                                            <input type="text" class="form-control" name="militar" value="<?php echo $data['militar'];?>"> Presente <input type="text" class="form-control" name="militar1" value="<?php echo $data['militar1'];?>"> Pasada <input type="text" class="form-control" name="militar2" value="<?php echo $data['militar2'];?>"> N/A
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
                                    <label class="col-sm-3">ASUNTO PRESENTADO:</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="presentado" rows="5" cols="10"><?php echo $data['presentado'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Desde cuando? </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="desde_cuando" value="<?php echo $data['desde_cuando'];?>">
                                    </div>
                                    <label class="col-sm-3 text-right">Evento precipitante: </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="evento_precipitante" value="<?php echo $data['evento_precipitante'];?>">
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
                                            <input type="text" class="form-control" name="personalmente_como" value="<?php echo $data['personalmente_como'];?>">(Ej, estado emocional, sintomas, salud)
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Ocupacionalmente:</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="ocupacionalmente" value="<?php echo $data['ocupacionalmente'];?>">(Ej, pobre ejacutoria, ausencias)
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Socialmente:</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="socialmente" value="<?php echo $data['socialmente'];?>">(Ej, conflictos interpersonales, aislamiento)
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
                                                <input type="checkbox" class="form-check-input" name="trat_si" value="si" <?php echo (($data['trat_si']=='si')?'checked':'');?>> SI
                                            </label>
                                        </div>
                                        <div class="form-check-inline ml-2">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="trat_no" value="no" <?php echo (($data['trat_no']=='no')?'checked':'');?>> NO
                                            </label>
                                        </div>
				    </div>
                                    <div class="col-md-12 row">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Psicologico:</label>
                                        </div>
                                        <div class="col-sm-10 form-inline">
                                            Lugar <input type="text" class="form-control" name="lugar" value="<?php echo $data['lugar'];?>"> Cuando <input type="text" class="form-control" name="cuando_psi" value="<?php echo $data['cuando_psi'];?>"> Dx: <input type="text" class="form-control" name="dx" value="<?php echo $data['dx'];?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Psiquiatrico:</label>
                                        </div>
                                        <div class="col-sm-10 form-inline ">
                                            Lugar <input type="text" class="form-control" name="lugar_1" value="<?php echo $data['lugar_1'];?>"> Cuando <input type="text" class="form-control" name="cuado_1" value="<?php echo $data['cuado_1'];?>"> Medicamentos: <input type="text" class="form-control" name="medi" value="<?php echo $data['medi'];?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Sustancias: </label>
                                        </div>
                                        <div class="col-sm-10 form-inline">
                                            Lugar <input type="text" class="form-control" name="lugar_2" value="<?php echo $data['lugar_2'];?>"> Cuando <input type="text" class="form-control" name="cuado_2" value="<?php echo $data['cuado_2'];?>"> Alcohol: <input type="text" class="form-control" name="alcohol" value="<?php echo $data['alcohol'];?>"> Drogas: <input type="text" class="form-control" name="drogas" value="<?php echo $data['drogas'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Hospitaliationes psiquiatricas: </label>
                                        </div>
                                        <div class="col-sm-6 form-inline">
                                            Lugar <input type="text" class="form-control" name="lugar_3" value="<?php echo $data['lugar_3'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-sm-10 form-inline">
                                            Cuando <input type="text" class="form-control" name="cuando" value="<?php echo $data['cuando'];?>"> Cuantas <input type="text" class="form-control" name="cuantas" value="<?php echo $data['cuantas'];?>"> Parcial: <input type="text" class="form-control" name="parcial" value="<?php echo $data['parcial'];?>"> Regular: <input type="text" class="form-control" name="regular" value="<?php echo $data['regular'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-sm-2">
                                            <label class="col-sm-6">Historial Familiar: </label>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="hist_si" value="si" <?php echo (($data['hist_si'] == "si") ? "checked":"");?>> SI
                                                </label>
                                            </div>
                                            <div class="form-check-inline ml-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="hist_no" value="no" <?php echo (($data['hist_no'] == "no") ? "checked":"");?>> NO
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 form-inline">
                                            Relacion Fam: <input type="text" class="form-control" name="relacion" value="<?php echo $data['relacion'];?>">
                                        </div>
                                        <div class="col-md-3 form-inline">
                                            Dx: <input type="text" class="form-control" name="dx_1" value="<?php echo $data['dx_1'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Historial Medico y Condiciones Fisicas: </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="hist_medi" rows="5" cols="10"><?php echo $data['hist_medi'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Medicamentos al presente: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="medi_presenta" value="<?php echo $data['medi_presenta'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Historial Psicosocial Relevante (Logros, perdidas, traumas y sistema de apoyo): </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="medi_presente_area" rows="5" cols="10"><?php echo $data['medi_presente_area'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Aspectos Legales: </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="aspectos_legal" rows="5" cols="10"> <?php echo $data['aspectos_legal'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Situacion financieras: </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="situacion_finance" rows="5" cols="10"><?php echo $data['situacion_finance'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Consumo de Alcohol: </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="consumo_alcohol" rows="5" cols="10"><?php echo $data['consumo_alcohol'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3">Consumo de Sustancias Controladas: </label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="controladas" rows="5" cols="10"><?php echo $data['controladas'];?></textarea>
                                    </div>
                                </div>
                            </div>
			</div>
                    </div>
                    <div id="menu3" class="tab-pane">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12">Evaluaction de Riesgo</label>
                                    <div class="col-sm-12">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Suicidio</td>
                                                    <td><input type="checkbox" class="form-check-input" name="suicido_1" value="1" <?php echo (($data['suicido_1']=='1')?"checked":"");?>>1</td>
                                                    <td><input type="checkbox" class="form-check-input" name="suicido_2" value="2" <?php echo (($data['suicido_2']=='2')?"checked":"");?>> 2</td>
                                                    <td><input type="checkbox" class="form-check-input" name="suicido_3" value="3" <?php echo (($data['suicido_3']=='3')?"checked":"");?>> 3</td>
                                                    <td><input type="checkbox" class="form-check-input" name="suicido_4" value="4" <?php echo (($data['suicido_4']=='4')?"checked":"");?>> 4</td>
                                                    <td><input type="checkbox" class="form-check-input" name="suicido_5" value="5" <?php echo (($data['suicido_5']=='5')?"checked":"");?>> 5</td>
                                                </tr>
                                                <tr>
                                                    <td>Homicidio</td>
                                                    <td><input type="checkbox" class="form-check-input" name="homo_1" value="1" <?php echo (($data['homo_1']=='1')?"checked":"");?>>1</td>
                                                    <td><input type="checkbox" class="form-check-input" name="homo_2" value="2" <?php echo (($data['homo_2']=='2')?"checked":"");?>> 2</td>
                                                    <td><input type="checkbox" class="form-check-input" name="homo_3" value="3" <?php echo (($data['homo_3']=='3')?"checked":"");?>> 3</td>
                                                    <td><input type="checkbox" class="form-check-input" name="homo_4" value="4" <?php echo (($data['homo_4']=='4')?"checked":"");?>> 4</td>
                                                    <td><input type="checkbox" class="form-check-input" name="homo_5" value="5" <?php echo (($data['homo_5']=='5')?"checked":"");?>> 5</td>
                                                </tr>
                                                <tr>
                                                    <td>Violencia domestica / familiar</td>
                                                    <td><input type="checkbox" class="form-check-input" name="violencia_1" value="1" <?php echo (($data['violencia_1']=='1')?"checked":"");?>>1</td>
                                                    <td><input type="checkbox" class="form-check-input" name="violencia_2" value="2" <?php echo (($data['violencia_2']=='2')?"checked":"");?>> 2</td>
                                                    <td><input type="checkbox" class="form-check-input" name="violencia_3" value="3" <?php echo (($data['violencia_3']=='3')?"checked":"");?>> 3</td>
                                                    <td><input type="checkbox" class="form-check-input" name="violencia_4" value="4" <?php echo (($data['violencia_4']=='4')?"checked":"");?>> 4</td>
                                                    <td><input type="checkbox" class="form-check-input" name="violencia_5" value="5" <?php echo (($data['violencia_5']=='5')?"checked":"");?>> 5</td>
                                                </tr>
                                                <tr>
                                                    <td>Violencia en el trabajo</td>
                                                    <td><input type="checkbox" class="form-check-input" name="tra_1" value="1" <?php echo (($data['tra_1']=='1')?"checked":"");?>>1</td>
                                                    <td><input type="checkbox" class="form-check-input" name="tra_2" value="2" <?php echo (($data['tra_2']=='2')?"checked":"");?>> 2</td>
                                                    <td><input type="checkbox" class="form-check-input" name="tra_3" value="3" <?php echo (($data['tra_3']=='3')?"checked":"");?>> 3</td>
                                                    <td><input type="checkbox" class="form-check-input" name="tra_4" value="4" <?php echo (($data['tra_4']=='4')?"checked":"");?>> 4</td>
                                                    <td><input type="checkbox" class="form-check-input" name="tra_5" value="5" <?php echo (($data['tra_5']=='5')?"checked":"");?>> 5</td>
                                                </tr>
                                                <tr>
                                                    <td>Maltrato (ninos / envejecientes)</td>
                                                    <td><input type="checkbox" class="form-check-input" name="maltrato_1" value="1" <?php echo (($data['maltrato_1']=='1')?"checked":"");?>>1</td>
                                                    <td><input type="checkbox" class="form-check-input" name="maltrato_2" value="2" <?php echo (($data['maltrato_2']=='2')?"checked":"");?>> 2</td>
                                                    <td><input type="checkbox" class="form-check-input" name="maltrato_3" value="3" <?php echo (($data['maltrato_3']=='3')?"checked":"");?>> 3</td>
                                                    <td><input type="checkbox" class="form-check-input" name="maltrato_4" value="4" <?php echo (($data['maltrato_4']=='4')?"checked":"");?>> 4</td>
                                                    <td><input type="checkbox" class="form-check-input" name="maltrato_5" value="5" <?php echo (($data['maltrato_5']=='5')?"checked":"");?>> 5</td>
                                                </tr>
                                                <tr>
                                                    <td>Psicosis (alucinaciones / delirios)</td>
                                                    <td><input type="checkbox" class="form-check-input" name="psicosis_1" value="1" <?php echo (($data['psicosis_1']=='1')?"checked":"");?>>1</td>
                                                    <td><input type="checkbox" class="form-check-input" name="psicosis_2" value="2" <?php echo (($data['psicosis_2']=='2')?"checked":"");?>> 2</td>
                                                    <td><input type="checkbox" class="form-check-input" name="psicosis_3" value="3" <?php echo (($data['psicosis_3']=='3')?"checked":"");?>> 3</td>
                                                    <td><input type="checkbox" class="form-check-input" name="psicosis_4" value="4" <?php echo (($data['psicosis_4']=='4')?"checked":"");?>> 4</td>
                                                    <td><input type="checkbox" class="form-check-input" name="psicosis_5" value="5" <?php echo (($data['psicosis_5']=='5')?"checked":"");?>> 5</td>
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
                                            <input type="checkbox" class="form-check-input" name="evaluado" value="evaluado" <?php echo (($data['evaluado']=='evaluado')?"checked":"");?>> Evaluado, no hay indicadores de riesgo
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-12">
                                            <input type="checkbox" class="form-check-input" name="verbaliza" value="verbaliza" <?php echo (($data['verbaliza']=='verbaliza')?"checked":"");?>> Verbaliza amenaza, no hay peligro actual
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-12">
                                            <input type="checkbox" class="form-check-input" name="hace" value="hace" <?php echo (($data['hace']=='hace')?"checked":"");?>> Hace, amenaza existe posibilidad de violencia
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-12">
                                            <input type="checkbox" class="form-check-input" name="existe" value="existe" <?php echo (($data['existe']=='existe')?"checked":"");?>> Existe amenaza real de violencia (planificacion)
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-12">
                                            <input type="checkbox" class="form-check-input" name="el_cliente" value="el_cliente" <?php echo (($data['el_cliente']=='el_cliente')?"checked":"");?>> El cliente es peligroso para el u otros
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu4" class="tab-pane col-md-11">
                        <div class="col-md-12 in-content">
                            <div class="col-md-12">
                                <div class="form-group row">
				    <label class="col-sm-12">Impresion Diagnostica</label>
					<textarea class="col-md-12" rows="6" name="imp_dia" onclick="sel_diagnosis('imp_dia')" ><?php echo $data['imp_dia']; ?> </textarea>
                                    <!--<div class="col-sm-12">
                                        <div class="col-md-2">
                                            <label>Eje I : </label>
                                        </div>
                                        <div class="col-md-10">
					    <input type="text" class="form-control" name="eji_1" value="<?php echo $data['eji_1'];?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-2">
                                            <label>Eje II : </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="eji_2" value="<?php echo $data['eji_2'];?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-2">
                                            <label>Eje III : </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="eji_3" value="<?php echo $data['eji_3'];?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-2">
                                            <label>Eje IV : </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="eji_4" value="<?php echo $data['eji_4'];?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-md-2">
                                            <label>Eje V : </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="eji_5" value="<?php echo $data['eji_5'];?>">
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu5" class="tab-pane">
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
                                                    <td><textarea class="form-control" name="plm_row1" rows="5" cols="10"><?php echo $data['plm_row1'];?></textarea></td>
                                                    <td><textarea class="form-control" name="obg_row1" rows="5" cols="10"><?php echo $data['obg_row1'];?></textarea></td>
                                                    <td><textarea class="form-control" name="estrategia_row1" rows="5" cols="10"><?php echo $data['estrategia_row1'];?></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td><textarea class="form-control" name="plm_row2" rows="5" cols="10"><?php echo $data['plm_row2'];?></textarea></td>
                                                    <td><textarea class="form-control" name="obg_row2" rows="5" cols="10"><?php echo $data['obg_row2'];?></textarea></td>
                                                    <td><textarea class="form-control" name="estrategia_row2" rows="5" cols="10"><?php echo $data['estrategia_row2'];?></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td><textarea class="form-control" name="plm_row3" rows="5" cols="10"><?php echo $data['plm_row3'];?></textarea></td>
                                                    <td><textarea class="form-control" name="obg_row3" rows="5" cols="10"><?php echo $data['obg_row3'];?></textarea></td>
                                                    <td><textarea class="form-control" name="estrategia_row3" rows="5" cols="10"><?php echo $data['estrategia_row3'];?></textarea></td>
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
                                        <input type="text" class="form-control" name="referido" value="<?php echo $data['referido'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Firma Cliente (o custodia legal)</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="firma" value="<?php echo $data['firma'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-6">Firma Psicologo y Num. Licencia</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="licencia" value="<?php echo $data['licencia'];?>">
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
                            <!--<a href="#" class="btn btn-primary">Save</a>
                            <a href="#" class="btn btn-danger">Cancel</a>-->
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
