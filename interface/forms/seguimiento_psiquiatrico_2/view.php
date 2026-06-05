<?php

include_once '../../globals.php';
include_once "$srcdir/options.inc.php";

use OpenEMR\Core\Header;


$form_title = '';
$result = getPatientData($_SESSION['pid'], "sex,DOB,DATE_FORMAT(DOB,'%Y%m%d') as DOB, fname, lname");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Seguimiento Psiquiátrico (2)</title>
  <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/bootstrap/dist/css/bootstrap.min.css?v=41">
  <link rel="stylesheet" href="<?php echo $GLOBALS['webroot'] ?>/public/assets/font-awesome/css/font-awesome.css">

  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $GLOBALS['assets_static_relative']; ?>/bootstrap/dist/js/bootstrap.min.js"></script>
  <?php Header::setupHeader(['datetime-picker', 'common', 'jquery-ui', 'jquery-ui-darkness']); ?>
  <script>
    function get_pre_value() {
      var url = new URL(window.location.href);
      url.searchParams.set('get_pre_value', '1');
      window.location.href = url.href;
    }
    $(document).ready(function() {
      $('.datepicker').datetimepicker({
        maxDate: 0,
        <?php $datetimepicker_timepicker = false; ?>
        <?php $datetimepicker_showseconds = false; ?>
        <?php $datetimepicker_formatInput = true; ?>
        <?php require($GLOBALS['srcdir'] . '/js/xl/jquery-datetimepicker-2-5-4.js.php'); ?>
      });
    });
  </script>
  <style>
    .freqother-hidden {
      display: none;
    }

    .nav>a {
      border-bottom: 1px solid #fff !important;
      color: #fff;
    }

    .nav>li>a:hover {
      background-color: none !important;
    }

    .nav>a.active {
      background-color: white !important;
      color: black;
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
  <br>
  <?php
  if (!isset($_REQUEST['id']) || $_REQUEST['id'] == '') { ?>

    <div class="row col-md-offset-3" onclick="get_pre_value()"><button class="btn btn-primary">Get Most recent Value</button></div>
  <?php }
  ?>
  <div id="tabs" class="row m-0" style="border-top:1px solid black">
    <!--<h3>Formato Psiquiátrico</h3>-->
    <div class="col-12">
      <form class="col-12" name="seguimiento_form" role="form" method="post" action="<?php echo $rootdir; ?>/forms/seguimiento_psiquiatrico_2/save.php?<?php echo (isset($_REQUEST['id']) && $_REQUEST['id'] != '') ? ('mode=edit&id=' . $_REQUEST['id']) : 'mode=new'; ?>" enctype="multipart/form-data">
        <?php
        $data = [];
        if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
          $data = sqlQuery("select * from form_seguimiento_psiquiatrico_2 where id=?", $_REQUEST['id']);
        } else if (isset($_REQUEST['get_pre_value']) && $_REQUEST['get_pre_value'] != '') {
          $data = sqlQuery("select sp.* from form_seguimiento_psiquiatrico_2 sp left join forms f on f.form_id=sp.id and f.formdir='seguimiento_psiquiatrico_2' and sp.pid=f.pid where sp.pid=" . $pid . " and f.deleted=0 order by sp.date desc,sp.id desc limit 1");
        }
        ?>
        <div id="menu6" class="col-12">
          <div class="col-md-12 in-content">
            <div>
              <!-- Start :: Examen Psiquiatrico Section -->
              <h4>Examen Psiquiatrico</h4>

              <div class="form-group">
                <table class="table examen-psiquiatrico-table">
                  <tr>
                    <td>
                      <label>Nombre &nbsp;&nbsp;&nbsp;</label>
                    </td>
                    <td>
                      <input type="text" name="ep_nombre" class="form-control" value="<?php echo !empty($data) ? $data['ep_nombre'] : ''; ?>" />
                    </td>

                    <td>
                      <label>Edad &nbsp;&nbsp;&nbsp;</label>
                    </td>
                    <td>
                      <input type="text" name="ep_edad" class="form-control" value="<?php echo !empty($data) ? $data['ep_edad'] : ''; ?>" />
                    </td>
                    <td>
                      <label>Fecha de servicio &nbsp;&nbsp;&nbsp;</label>
                    </td>
                    <td>
                      <input type="text" name="ep_fecha_de_servicio" class="form-control" value="<?php echo !empty($data) ? $data['ep_fecha_de_servicio'] : ''; ?>" />
                    </td>
                  </tr>
                  <tr>
                    <td>Dx</td>
                    <td colspan="5">
                      <input type="text" name="ep_dx" value="<?php echo !empty($data) ? $data['ep_dx'] : ''; ?>" class="form-control" />
                    </td>
                  </tr>
                  <tr>
                    <td>Subjetivo</td>
                    <td colspan="5">
                      <textarea name="ep_subjetivo" rows="10" class="w-100"><?php echo !empty($data) ? $data['ep_subjetivo'] : ''; ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Apariencia</td>
                    <td colspan="3">
                      <select name="ep_apariencia_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Buena Higiene" <?php echo (!empty($data) && ($data['ep_apariencia_select'] == "Buena Higiene") ? "selected" : "") ?>>Buena Higiene</option>
                        <option value="Desaliñado" <?php echo (!empty($data) && ($data['ep_apariencia_select'] == "Desaliñado") ? "selected" : "") ?>>Desaliñado</option>
                        <option value="Nítida" <?php echo (!empty($data) && ($data['ep_apariencia_select'] == "Nítida") ? "selected" : "") ?>>Nítida</option>
                        <option value="Normal para la edad" <?php echo (!empty($data) && ($data['ep_apariencia_select'] == "Normal para la edad") ? "selected" : "") ?>>
                          Normal para la edad
                        </option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_apariencia_textarea" rows="3"><?php echo !empty($data) ? $data['ep_apariencia_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Actitud/ Conducta</td>
                    <td colspan="3">
                      <select name="ep_actitud_conducta_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Cooperadora" <?php echo (!empty($data) && ($data['ep_actitud_conducta_select'] == "Cooperadora") ? "selected" : "") ?>>Cooperadora</option>
                        <option value="Hostil" <?php echo (!empty($data) && ($data['ep_actitud_conducta_select'] == "Hostil") ? "selected" : "") ?>>Hostil</option>
                        <option value="Agresivo" <?php echo (!empty($data) && ($data['ep_actitud_conducta_select'] == "Agresivo") ? "selected" : "") ?>>Agresivo</option>
                        <option value="Reservado" <?php echo (!empty($data) && ($data['ep_actitud_conducta_select'] == "Reservado") ? "selected" : "") ?>>Reservado</option>
                        <option value="Desinteresado" <?php echo (!empty($data) && ($data['ep_actitud_conducta_select'] == "Desinteresado") ? "selected" : "") ?>>Desinteresado</option>
                        <option value="Desorganizado" <?php echo (!empty($data) && ($data['ep_actitud_conducta_select'] == "Desorganizado") ? "selected" : "") ?>>Desorganizado</option>
                        <option value="Se limita a emitir sonidos" <?php echo (!empty($data) && ($data['ep_actitud_conducta_select'] == "Se limita a emitir sonidos") ? "selected" : "") ?>>
                          Se limita a emitir sonidos
                        </option>
                        <option value="Emplea lenguaje soez o insultos" <?php echo (!empty($data) && ($data['ep_actitud_conducta_select'] == "Emplea lenguaje soez o insultos") ? "selected" : "") ?>>
                          Emplea lenguaje soez o insultos
                        </option>
                        <option value="Hace comentarios inapropiados" <?php echo (!empty($data) && ($data['ep_actitud_conducta_select'] == "Hace comentarios inapropiados") ? "selected" : "") ?>>
                          Hace comentarios inapropiados
                        </option>
                        <option value="No contesta preguntas" <?php echo (!empty($data) && ($data['ep_actitud_conducta_select'] == "No contesta preguntas") ? "selected" : "") ?>>
                          No contesta preguntas
                        </option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_actitud_conducta_textarea" rows="3"><?php echo !empty($data) ? $data['ep_actitud_conducta_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Actividad Motora</td>
                    <td colspan="3">
                      <select name="ep_actividad_motora_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Retraso Psicomotor" <?php echo (!empty($data) && ($data['ep_actividad_motora_select'] == "Retraso Psicomotor") ? "selected" : ""); ?>>Retraso Psicomotor</option>
                        <option value="Agitado" <?php echo (!empty($data) && ($data['ep_actividad_motora_select'] == "Agitado") ? "selected" : ""); ?>>Agitado</option>
                        <option value="Tembloroso" <?php echo (!empty($data) && ($data['ep_actividad_motora_select'] == "Tembloroso") ? "selected" : ""); ?>>Tembloroso</option>
                        <option value="Paciente encamado" <?php echo (!empty($data) && ($data['ep_actividad_motora_select'] == "Paciente encamado") ? "selected" : ""); ?>>Paciente encamado</option>
                        <option value="Paciente en silla de ruedas" <?php echo (!empty($data) && ($data['ep_actividad_motora_select'] == "Paciente en silla de ruedas") ? "selected" : ""); ?>>Paciente en silla de ruedas</option>
                        <option value="Ambula por sí solo" <?php echo (!empty($data) && ($data['ep_actividad_motora_select'] == "Ambula por sí solo") ? "selected" : ""); ?>>Ambula por sí solo</option>
                        <option value="Ambula con andador o bastón" <?php echo (!empty($data) && ($data['ep_actividad_motora_select'] == "Ambula con andador o bastón") ? "selected" : ""); ?>>Ambula con andador o bastón</option>
                        <option value="Ambula con ayuda" <?php echo (!empty($data) && ($data['ep_actividad_motora_select'] == "Ambula con ayuda") ? "selected" : ""); ?>>Ambula con ayuda</option>
                        <option value="No temblores" <?php echo (!empty($data) && ($data['ep_actividad_motora_select'] == "No temblores") ? "selected" : ""); ?>>No temblores</option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_actividad_motora_textarea" rows="3"><?php echo !empty($data) ? $data['ep_actitud_conducta_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Habla</td>
                    <td colspan="3">
                      <select name="ep_habla_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Clara" <?php echo (!empty($data) && ($data['ep_habla_select'] == "Clara") ? "selected" : ""); ?>>Clara</option>
                        <option value="Disártrica" <?php echo (!empty($data) && ($data['ep_habla_select'] == "Disártrica") ? "selected" : ""); ?>>Disártrica</option>
                        <option value="Mínima" <?php echo (!empty($data) && ($data['ep_habla_select'] == "Mínima") ? "selected" : ""); ?>>Mínima</option>
                        <option value="Pausada" <?php echo (!empty($data) && ($data['ep_habla_select'] == "Pausada") ? "selected" : ""); ?>>Pausada</option>
                        <option value="Apresurada" <?php echo (!empty($data) && ($data['ep_habla_select'] == "Apresurada") ? "selected" : ""); ?>>Apresurada</option>
                        <option value="Murmura" <?php echo (!empty($data) && ($data['ep_habla_select'] == "Murmura") ? "selected" : ""); ?>>Murmura</option>
                        <option value="No habla" <?php echo (!empty($data) && ($data['ep_habla_select'] == "No habla") ? "selected" : ""); ?>>No habla</option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_habla_textarea" rows="3"><?php echo !empty($data) ? $data['ep_habla_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Talante</td>
                    <td colspan="3">
                      <select name="ep_talante_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Eutímico" <?php echo (!empty($data) && ($data['ep_talante_select'] == "Eutímico") ? "selected" : ""); ?>>Eutímico</option>
                        <option value="Deprimido" <?php echo (!empty($data) && ($data['ep_talante_select'] == "Deprimido") ? "selected" : ""); ?>>Deprimido</option>
                        <option value="Expansivo" <?php echo (!empty($data) && ($data['ep_talante_select'] == "Expansivo") ? "selected" : ""); ?>>Expansivo</option>
                        <option value="Ansioso" <?php echo (!empty($data) && ($data['ep_talante_select'] == "Ansioso") ? "selected" : ""); ?>>Ansioso</option>
                        <option value="Paciente no contestó o no se le entendió" <?php echo (!empty($data) && ($data['ep_talante_select'] == "Paciente no contestó o no se le entendió") ? "selected" : ""); ?>>
                          Paciente no contestó o no se le entendió
                        </option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_talante_textarea" rows="3"><?php echo !empty($data) ? $data['ep_talante_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Afecto</td>
                    <td colspan="3">
                      <select name="ep_afecto_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Amplio" <?php echo (!empty($data) && ($data['ep_afecto_select'] == "Amplio") ? "selected" : ""); ?>>Amplio</option>
                        <option value="Restringido" <?php echo (!empty($data) && ($data['ep_afecto_select'] == "Restringido") ? "selected" : ""); ?>>Restringido</option>
                        <option value="Embotado" <?php echo (!empty($data) && ($data['ep_afecto_select'] == "Embotado") ? "selected" : ""); ?>>Embotado</option>
                        <option value="Lábil" <?php echo (!empty($data) && ($data['ep_afecto_select'] == "Lábil") ? "selected" : ""); ?>>Lábil</option>
                        <option value="Congruente con estado de ánimo" <?php echo (!empty($data) && ($data['ep_afecto_select'] == "Congruente con estado de ánimo") ? "selected" : ""); ?>>
                          Congruente con estado de ánimo
                        </option>
                        <option value="Incongruente con su estado de ánimo" <?php echo (!empty($data) && ($data['ep_afecto_select'] == "Incongruente con su estado de ánimo") ? "selected" : ""); ?>>
                          Incongruente con su estado de ánimo
                        </option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_afecto_textarea" rows="3"><?php echo !empty($data) ? $data['ep_afecto_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Percepción / Trastornos alucinatorios</td>
                    <td colspan="3">
                      <select name="ep_pta_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Disturbios perceptuales" <?php echo (!empty($data) && ($data['ep_pta_select'] == "Disturbios perceptuales") ? "selected" : ""); ?>>Disturbios perceptuales</option>
                        <option value="No" <?php echo (!empty($data) && ($data['ep_pta_select'] == "No") ? "selected" : ""); ?>>No</option>
                        <option value="Si" <?php echo (!empty($data) && ($data['ep_pta_select'] == "Si") ? "selected" : ""); ?>>Si</option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_pta_textarea" rows="3"><?php echo !empty($data) ? $data['ep_pta_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td>Tipo de Alucinaciones (Si aplica)</td>
                    <td colspan="3">
                      <select name="ep_tda_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Visual" <?php echo (!empty($data) && ($data['ep_tda_select'] == "Visual") ? "selected" : ""); ?>>Visual</option>
                        <option value="Auditivo" <?php echo (!empty($data) && ($data['ep_tda_select'] == "Auditivo") ? "selected" : ""); ?>>Auditivo</option>
                        <option value="Táctil" <?php echo (!empty($data) && ($data['ep_tda_select'] == "Táctil") ? "selected" : ""); ?>>Táctil</option>
                        <option value="Olfativo" <?php echo (!empty($data) && ($data['ep_tda_select'] == "Olfativo") ? "selected" : ""); ?>>Olfativo</option>
                        <option value="Somático" <?php echo (!empty($data) && ($data['ep_tda_select'] == "Somático") ? "selected" : ""); ?>>Somático</option>
                        <option value="Gustativo" <?php echo (!empty($data) && ($data['ep_tda_select'] == "Gustativo") ? "selected" : ""); ?>>Gustativo</option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_tda_textarea" rows="3"><?php echo !empty($data) ? $data['ep_tda_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td>Memoria</td>
                    <td colspan="5">
                      <table class="table">
                        <tr>
                          <td>Inmediata</td>
                          <td>
                            <select name="ep_mi_select" class="form-control">
                              <option value="">--Select--</option>
                              <option value="Preservada" <?php echo (!empty($data) && ($data['ep_mi_select'] == "Preservada") ? "selected" : ""); ?>>Preservada</option>
                              <option value="Alterada" <?php echo (!empty($data) && ($data['ep_mi_select'] == "Alterada") ? "selected" : ""); ?>>Alterada</option>
                            </select>
                          </td>
                          <td>
                            <textarea name="ep_mi_textarea" rows="3"><?php echo !empty($data) ? $data['ep_mi_textarea'] : ''; ?></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td>Reciente</td>
                          <td>
                            <select name="ep_mr_select" class="form-control">
                              <option value="">--Select--</option>
                              <option value="Preservada" <?php echo (!empty($data) && ($data['ep_mr_select'] == "Preservada") ? "selected" : ""); ?>>Preservada</option>
                              <option value="Alterada" <?php echo (!empty($data) && ($data['ep_mr_select'] == "Alterada") ? "selected" : ""); ?>>Alterada</option>
                            </select>
                          </td>
                          <td>
                            <textarea name="ep_mr_textarea" rows="3"><?php echo !empty($data) ? $data['ep_mr_textarea'] : ''; ?></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td>Remota</td>
                          <td>
                            <select name="ep_mre_select" class="form-control">
                              <option value="">--Select--</option>
                              <option value="Preservada" <?php echo (!empty($data) && ($data['ep_mre_select'] == "Preservada") ? "selected" : ""); ?>>Preservada</option>
                              <option value="Alterada" <?php echo (!empty($data) && ($data['ep_mre_select'] == "Alterada") ? "selected" : ""); ?>>Alterada</option>
                            </select>
                          </td>
                          <td>
                            <textarea name="ep_mre_textarea" rows="3"><?php echo !empty($data) ? $data['ep_mre_textarea'] : ''; ?></textarea>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <td>Contenido de Pensamiento</td>
                    <td colspan="3">
                      <select name="ep_cdp_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Ideas delirantes" <?php echo (!empty($data) && ($data['ep_cdp_select'] == "Ideas delirantes") ? "selected" : ""); ?>>Ideas delirantes</option>
                        <option value="Obsesiones" <?php echo (!empty($data) && ($data['ep_cdp_select'] == "Obsesiones") ? "selected" : ""); ?>>Obsesiones</option>
                        <option value="Miedos irracionales" <?php echo (!empty($data) && ($data['ep_cdp_select'] == "Miedos irracionales") ? "selected" : ""); ?>>Miedos irracionales</option>
                        <option value="Gira en torno a preocupaciones de su diario vivir" <?php echo (!empty($data) && ($data['ep_cdp_select'] == "Gira en torno a preocupaciones de su diario vivir") ? "selected" : ""); ?>>
                          Gira en torno a preocupaciones de su diario vivir
                        </option>
                        <option value="No trae preocupaciones durante la entrevista" <?php echo (!empty($data) && ($data['ep_cdp_select'] == "No trae preocupaciones durante la entrevista") ? "selected" : ""); ?>>
                          No trae preocupaciones durante la entrevista
                        </option>
                        <option value="Paciente no contestó o no se entendió" <?php echo (!empty($data) && ($data['ep_cdp_select'] == "Paciente no contestó o no se entendió") ? "selected" : ""); ?>>
                          Paciente no contestó o no se entendió
                        </option>
                        <option value="Respuestas no guardan relevancia con preguntas o temas tratados" <?php echo (!empty($data) && ($data['ep_cdp_select'] == "Respuestas no guardan relevancia con preguntas o temas tratados") ? "selected" : ""); ?>>
                          Respuestas no guardan relevancia con preguntas o temas tratados
                        </option>
                        <option value="Confabula" <?php echo (!empty($data) && ($data['ep_cdp_select'] == "Confabula") ? "selected" : ""); ?>>Confabula</option>
                        <option value="Paciente no contestó o no se le entendió" <?php echo (!empty($data) && ($data['ep_cdp_select'] == "Paciente no contestó o no se le entendió") ? "selected" : ""); ?>>
                          Paciente no contestó o no se le entendió
                        </option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_cdp_textarea" rows="3"><?php echo !empty($data) ? $data['ep_cdp_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td>Ideas Suicidas</td>
                    <td colspan="3">
                      <select name="ep_is_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Niega ideas suicidas" <?php echo (!empty($data) && ($data['ep_is_select'] == "Niega ideas suicidas") ? "selected" : ""); ?>>
                          Niega ideas suicidas
                        </option>
                        <option value="Sin plan Estructurado" <?php echo (!empty($data) && ($data['ep_is_select'] == "Sin plan Estructurado") ? "selected" : ""); ?>>
                          Sin plan Estructurado
                        </option>
                        <option value="Con plan estructurado" <?php echo (!empty($data) && ($data['ep_is_select'] == "Con plan estructurado") ? "selected" : ""); ?>>
                          Con plan estructurado
                        </option>
                        <option value="Paciente no habla" <?php echo (!empty($data) && ($data['ep_is_select'] == "Paciente no habla") ? "selected" : ""); ?>>
                          Paciente no habla
                        </option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_is_textarea" rows="3"><?php echo !empty($data) ? $data['ep_is_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td>Ideas Homicidas</td>
                    <td colspan="3">
                      <select name="ep_ih_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Niega ideas homicidas" <?php echo (!empty($data) && ($data['ep_ih_select'] == "Niega ideas homicidas") ? "selected" : ""); ?>>
                          Niega ideas homicidas
                        </option>
                        <option value="Sin plan Estructurado" <?php echo (!empty($data) && ($data['ep_ih_select'] == "Sin plan Estructurado") ? "selected" : ""); ?>>
                          Sin plan Estructurado
                        </option>
                        <option value="Con plan estructurado" <?php echo (!empty($data) && ($data['ep_ih_select'] == "Con plan estructurado") ? "selected" : ""); ?>>
                          Con plan estructurado
                        </option>
                        <option value="Paciente no habla" <?php echo (!empty($data) && ($data['ep_ih_select'] == "Paciente no habla") ? "selected" : ""); ?>>
                          Paciente no habla
                        </option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_ih_textarea" rows="3"><?php echo !empty($data) ? $data['ep_ih_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td>Procesamiento de Pensamientos</td>
                    <td colspan="3">
                      <select name="ep_pdp_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Coherente" <?php echo (!empty($data) && ($data['ep_pdp_select'] == "Coherente") ? "selected" : ""); ?>>Coherente</option>
                        <option value="Incoherente" <?php echo (!empty($data) && ($data['ep_pdp_select'] == "Incoherente") ? "selected" : ""); ?>>Incoherente</option>
                        <option value="Lógico" <?php echo (!empty($data) && ($data['ep_pdp_select'] == "Lógico") ? "selected" : ""); ?>>Lógico</option>
                        <option value="Ilógico" <?php echo (!empty($data) && ($data['ep_pdp_select'] == "Ilógico") ? "selected" : ""); ?>>Ilógico</option>
                        <option value="Realista" <?php echo (!empty($data) && ($data['ep_pdp_select'] == "Realista") ? "selected" : ""); ?>>Realista</option>
                        <option value="No realista" <?php echo (!empty($data) && ($data['ep_pdp_select'] == "No realista") ? "selected" : ""); ?>>No realista</option>
                        <option value="Relevante" <?php echo (!empty($data) && ($data['ep_pdp_select'] == "Relevante") ? "selected" : ""); ?>>Relevante</option>
                        <option value="No relevante" <?php echo (!empty($data) && ($data['ep_pdp_select'] == "No relevante") ? "selected" : ""); ?>>No relevante</option>
                        <option value="No habla" <?php echo (!empty($data) && ($data['ep_pdp_select'] == "No habla") ? "selected" : ""); ?>>No habla</option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_pdp_textarea" rows="3"><?php echo !empty($data) ? $data['ep_pdp_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td>Nivel de Atención</td>
                    <td colspan="3">
                      <select name="ep_nda_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Centrada en los temas tratados" <?php echo (!empty($data) && ($data['ep_nda_select'] == "Centrada en los temas tratados") ? "selected" : ""); ?>>
                          Centrada en los temas tratados
                        </option>
                        <option value="Hiper vigilante" <?php echo (!empty($data) && ($data['ep_nda_select'] == "Hiper vigilante") ? "selected" : ""); ?>>
                          Hiper vigilante
                        </option>
                        <option value="Se distrae fácilmente con estímulos irrelevantes" <?php echo (!empty($data) && ($data['ep_nda_select'] == "Se distrae fácilmente con estímulos irrelevantes") ? "selected" : ""); ?>>
                          Se distrae fácilmente con estímulos irrelevantes
                        </option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_nda_textarea" rows="3"><?php echo !empty($data) ? $data['ep_nda_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Orientación</td>
                    <td colspan="5">
                      <table class="table">
                        <tr>
                          <td>Tiempo</td>
                          <td>
                            <select name="ep_ot_select" class="form-control">
                              <option value="">--Select--</option>
                              <option value="Si" <?php echo (!empty($data) && ($data['ep_ot_select'] == "Si") ? "selected" : ""); ?>>Si</option>
                              <option value="No" <?php echo (!empty($data) && ($data['ep_ot_select'] == "No") ? "selected" : ""); ?>>No</option>
                            </select>
                          </td>
                          <td>
                            <textarea name="ep_ot_textarea" rows="3"><?php echo !empty($data) ? $data['ep_ot_textarea'] : ''; ?></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td>Lugar</td>
                          <td>
                            <select name="ep_ol_select" class="form-control">
                              <option value="">--Select--</option>
                              <option value="Si" <?php echo (!empty($data) && ($data['ep_ol_select'] == "Si") ? "selected" : ""); ?>>Si</option>
                              <option value="No" <?php echo (!empty($data) && ($data['ep_ol_select'] == "No") ? "selected" : ""); ?>>No</option>
                            </select>
                          </td>
                          <td>
                            <textarea name="ep_ol_textarea" rows="3"><?php echo !empty($data) ? $data['ep_ol_textarea'] : ''; ?></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td>Persona</td>
                          <td>
                            <select name="ep_op_select" class="form-control">
                              <option value="">--Select--</option>
                              <option value="Si" <?php echo (!empty($data) && ($data['ep_op_select'] == "Si") ? "selected" : ""); ?>>Si</option>
                              <option value="No" <?php echo (!empty($data) && ($data['ep_op_select'] == "No") ? "selected" : ""); ?>>No</option>
                            </select>
                          </td>
                          <td>
                            <textarea name="ep_op_textarea" rows="3"><?php echo !empty($data) ? $data['ep_op_textarea'] : ''; ?></textarea>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td>Concentración</td>
                    <td colspan="3">
                      <select name="ep_concentracion_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Adecuada" <?php echo (!empty($data) && ($data['ep_concentracion_select'] == "Adecuada") ? "selected" : ""); ?>>Adecuada</option>
                        <option value="Disminuida" <?php echo (!empty($data) && ($data['ep_concentracion_select'] == "Disminuida") ? "selected" : ""); ?>>Disminuida</option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_concentracion_textarea" rows="3"><?php echo !empty($data) ? $data['ep_concentracion_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td>Juicio</td>
                    <td colspan="3">
                      <select name="ep_julicio_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Adecuado" <?php echo (!empty($data) && ($data['ep_julicio_select'] == "Adecuado") ? "selected" : ""); ?>>Adecuado</option>
                        <option value="Superficial" <?php echo (!empty($data) && ($data['ep_julicio_select'] == "Superficial") ? "selected" : ""); ?>>Superficial</option>
                        <option value="Pobre" <?php echo (!empty($data) && ($data['ep_julicio_select'] == "Pobre") ? "selected" : ""); ?>>Pobre</option>
                        <option value="Ninguno" <?php echo (!empty($data) && ($data['ep_julicio_select'] == "Ninguno") ? "selected" : ""); ?>>Ninguno</option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_julicio_textarea" rows="3"><?php echo !empty($data) ? $data['ep_julicio_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>

                  <tr>
                    <td>Introspección</td>
                    <td colspan="3">
                      <select name="ep_introspeccion_select" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Consciente de sus problemas o situaciones" <?php echo (!empty($data) && ($data['ep_introspeccion_select'] == "Consciente de sus problemas o situaciones") ? "selected" : ""); ?>>
                          Consciente de sus problemas o situaciones
                        </option>
                        <option value="No está consciente de sus problemas o situaciones" <?php echo (!empty($data) && ($data['ep_introspeccion_select'] == "No está consciente de sus problemas o situaciones") ? "selected" : ""); ?>>
                          No está consciente de sus problemas o situaciones
                        </option>
                        <option value="Tiene alguna consciencia de sus problemas o situaciones" <?php echo (!empty($data) && ($data['ep_introspeccion_select'] == "Tiene alguna consciencia de sus problemas o situaciones") ? "selected" : ""); ?>>
                          Tiene alguna consciencia de sus problemas o situaciones
                        </option>
                        <option value="Confundido" <?php echo (!empty($data) && ($data['ep_introspeccion_select'] == "Confundido") ? "selected" : ""); ?>>
                          Confundido
                        </option>
                      </select>
                    </td>
                    <td colspan="2">
                      <textarea name="ep_introspeccion_textarea" rows="3"><?php echo !empty($data) ? $data['ep_introspeccion_textarea'] : ''; ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td>Medicación</td>
                    <td colspan="5">
                      <textarea name="ep_medicacion_text" rows="5" class="w-100"><?php echo !empty($data) ? $data['ep_medicacion_text'] : ''; ?></textarea>
                    </td>
                  </tr>
                  <tr class="pt-5">
                    <td>Firma</td>
                    <td colspan="2">
                      <input type="text" name="ep_firma_input" value="<?php echo !empty($data) ? $data['ep_firma_input'] : ''; ?>" class="form-control" />
                    </td>
                    <td colspan="3"></td>
                  </tr>
                  <tr class="pt-5">
                    <td colspan="2">
                      Dra. Nereida Feliciano <br />
                      NPI: 1528010725 <br />
                      Lic: 8722
                    </td>
                    <td colspan="4"></td>
                  </tr>
                </table>
              </div>
              <!-- End :: Examen Psiquiatrico Section -->

            </div>
          </div>
        </div>

        <div class="col-md-12" style="display:flex;justify-content:center;">
          <button type="submit" class="btn btn-primary"><?php
                                                        if (isset($_REQUEST['id']) && $_REQUEST['id'] != '')
                                                          echo 'Update & Close';
                                                        else
                                                          echo 'Save & Close';
                                                        ?>
          </button>
          <button class="btn btn-danger" onclick="top.restoreSession();parent.closeTab(window.name, true);">Cancel</button>
        </div>
    </div>
    </form>
  </div>
  </div>
</body>
<script>
  $("form").submit(function() {

    var this_master = $(this);

    this_master.find('input[type="checkbox"]').each(function() {
      var checkbox_this = $(this);


      if (!checkbox_this.is(":checked")) {
        checkbox_this.prop('checked', true);
        //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA
        checkbox_this.attr('value', '');
      }
    })
  })

  const starttime = document.getElementById('start_time');
  const endtime = document.getElementById('end_time');

  starttime.addEventListener('input', (e) => {
    let input = e.target.value;
    // Test if ending with /, so it's a delete operation when ending with /
    if (/\D:$/.test(input)) {
      input = input.substr(0, input.length - 3);
    }
    // /\D/g replaces every non zero value
    const values = input.split(':');
    const timeValues = values.slice(0, 2).map((v) => v.replace(/\D/g, ''));

    if (timeValues[0]) timeValues[0] = formatValue(timeValues[0], 12);
    if (timeValues[1]) timeValues[1] = formatValue(timeValues[1], 59);

    const output = timeValues.map(
      (v, i) => v.length == 2 && i < 2 ? v + ' : ' : v);
    if (values[2]) {
      const meridian = formatMeridian(values[2]);
      output.push(meridian);
    }

    e.target.value = output.join('').substr(0, 12);
  });
  endtime.addEventListener('input', (e) => {
    let input = e.target.value;
    // Test if ending with /, so it's a delete operation when ending with /
    if (/\D:$/.test(input)) {
      input = input.substr(0, input.length - 3);
    }
    // /\D/g replaces every non zero value
    const values = input.split(':');
    const timeValues = values.slice(0, 2).map((v) => v.replace(/\D/g, ''));

    if (timeValues[0]) timeValues[0] = formatValue(timeValues[0], 12);
    if (timeValues[1]) timeValues[1] = formatValue(timeValues[1], 59);

    const output = timeValues.map(
      (v, i) => v.length == 2 && i < 2 ? v + ' : ' : v);
    if (values[2]) {
      const meridian = formatMeridian(values[2]);
      output.push(meridian);
    }

    e.target.value = output.join('').substr(0, 12);
  });
  const formatValue = (str, max) => {
    if (str.charAt(0) !== '0' || str == '00') {
      const num = parseInt(str);
      if (isNaN(num) || num <= 0 || num > max) num = 1;
      str = num > parseInt(max.toString().charAt(0)) && num.toString().length == 1 ? '0' + num : num.toString();
    };
    return str;
  };

  const formatMeridian = (str) => {
    str = str.toUpperCase().trim();
    return /(AM|PM|^A$|^P$)/.test(str) ? str : '';
  }
</script>

</html>