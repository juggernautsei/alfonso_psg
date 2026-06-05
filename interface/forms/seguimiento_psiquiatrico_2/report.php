<?php
require_once(dirname(__file__) . '/../../globals.php');

function seguimiento_psiquiatrico_2_report($pid, $encounter, $cols, $id)
{
  $data = sqlQuery('select * from form_seguimiento_psiquiatrico_2 where pid=? and id=?', array($pid, $id));

  print "
<div>
              <!-- Start :: Examen Psiquiatrico Section -->
              <h4>Examen Psiquiatrico</h4>

              <div class='form-group'>
                <table class='table examen-psiquiatrico-table'>
                  <tr>
                    <td>
                      <label>Nombre &nbsp;&nbsp;&nbsp;</label>
                    </td>
                    <td>
                      <span class='form-control' type='text' name='ep_nombre'>" . (!empty($data) ? $data['ep_nombre'] : '') . "</span>
                    </td>

                    <td>
                      <label>Edad &nbsp;&nbsp;&nbsp;</label>
                    </td>
                    <td>
                      <span class='form-control' type='text' name='ep_edad'>" . (!empty($data) ? $data['ep_edad'] : '') . "</span>
                    </td>
                    <td>
                      <label>Fecha de servicio &nbsp;&nbsp;&nbsp;</label>
                    </td>
                    <td>
                      <span class='form-control' type='text' name='ep_fecha_de_servicio'>" . (!empty($data) ? $data['ep_fecha_de_servicio'] : '') . "</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Dx</td>
                    <td colspan='5'>
                      <span class='form-control' type='text' name='ep_dx'>" . (!empty($data) ? $data['ep_dx'] : '') . "</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Subjetivo</td>
                    <td colspan='5'>
                      <span class='form-control' name='ep_subjetivo' rows='10' class='w-100'>" . (!empty($data) ? $data['ep_subjetivo'] : '') . "</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Apariencia</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_apariencia_select' >" . (!empty($data) ? $data['ep_apariencia_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_apariencia_textarea' rows='3'>" . (!empty($data) ? $data['ep_apariencia_textarea'] : '') . "</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Actitud/ Conducta</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_actitud_conducta_select' >
                        " . (!empty($data) ? $data['ep_actitud_conducta_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_actitud_conducta_textarea' rows='3'>" . (!empty($data) ? $data['ep_actitud_conducta_textarea'] : '') . "</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Actividad Motora</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_actividad_motora_select' >" . (!empty($data) ? $data['ep_actividad_motora_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_actividad_motora_textarea' rows='3'>" . (!empty($data) ? $data['ep_actitud_conducta_textarea'] : '') . "</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Habla</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_habla_select' >
                        " . (!empty($data) ? $data['ep_habla_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_habla_textarea' rows='3'>" . (!empty($data) ? $data['ep_habla_textarea'] : '') . "</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Talante</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_talante_select' >
                        " . (!empty($data) ? $data['ep_talante_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_talante_textarea' rows='3'>" . (!empty($data) ? $data['ep_talante_textarea'] : '') . "</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Afecto</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_afecto_select' >
                        " . (!empty($data) ? $data['ep_afecto_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_afecto_textarea' rows='3'>" . (!empty($data) ? $data['ep_afecto_textarea'] : '') . "</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Percepción / Trastornos alucinatorios</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_pta_select' >
                        " . (!empty($data) ? $data['ep_pta_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_pta_textarea' rows='3'>" . (!empty($data) ? $data['ep_pta_textarea'] : '') . "</span>
                    </td>
                  </tr>

                  <tr>
                    <td>Tipo de Alucinaciones (Si aplica)</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_tda_select' >
                        " . (!empty($data) ? $data['ep_tda_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_tda_textarea' rows='3'>" . (!empty($data) ? $data['ep_tda_textarea'] : '') . "</span>
                    </td>
                  </tr>

                  <tr>
                    <td>Memoria</td>
                    <td colspan='5'>
                      <table class='table'>
                        <tr>
                          <td>Inmediata</td>
                          <td>
                            <span class='form-control' name='ep_mi_select' >
                              " . (!empty($data) ? $data['ep_mi_select'] : '') . "
                            </span>
                          </td>
                          <td>
                            <span class='form-control' name='ep_mi_textarea' rows='3'>" . (!empty($data) ? $data['ep_mi_textarea'] : '') . "</span>
                          </td>
                        </tr>
                        <tr>
                          <td>Reciente</td>
                          <td>
                            <span class='form-control' name='ep_mr_select' >
                              " . (!empty($data) ? $data['ep_mr_select'] : '') . "
                            </span>
                          </td>
                          <td>
                            <span class='form-control' name='ep_mr_textarea' rows='3'>" . (!empty($data) ? $data['ep_mr_textarea'] : '') . "</span>
                          </td>
                        </tr>
                        <tr>
                          <td>Remota</td>
                          <td>
                            <span class='form-control' name='ep_mre_select' >
                              " . (!empty($data) ? $data['ep_mre_select'] : '') . "
                            </span>
                          </td>
                          <td>
                            <span class='form-control' name='ep_mre_textarea' rows='3'>" . (!empty($data) ? $data['ep_mre_textarea'] : '') . "</span>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <td>Contenido de Pensamiento</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_cdp_select' >
                       " . (!empty($data) ? $data['ep_cdp_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_cdp_textarea' rows='3'>" . (!empty($data) ? $data['ep_cdp_textarea'] : '') . "</span>
                    </td>
                  </tr>

                  <tr>
                    <td>Ideas Suicidas</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_is_select' >
                        " . (!empty($data) ? $data['ep_is_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_is_textarea' rows='3'>" . (!empty($data) ? $data['ep_is_textarea'] : '') . "</span>
                    </td>
                  </tr>

                  <tr>
                    <td>Ideas Homicidas</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_ih_select' >
                        " . (!empty($data) ? $data['ep_ih_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_ih_textarea' rows='3'>" . (!empty($data) ? $data['ep_ih_textarea'] : '') . "</span>
                    </td>
                  </tr>

                  <tr>
                    <td>Procesamiento de Pensamientos</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_pdp_select' >
                        " . (!empty($data) ? $data['ep_pdp_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_pdp_textarea' rows='3'>" . (!empty($data) ? $data['ep_pdp_textarea'] : '') . "</span>
                    </td>
                  </tr>

                  <tr>
                    <td>Nivel de Atención</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_nda_select' >
                        " . (!empty($data) ? $data['ep_nda_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_nda_textarea' rows='3'>" . (!empty($data) ? $data['ep_nda_textarea'] : '') . "</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Orientación</td>
                    <td colspan='5'>
                      <table class='table'>
                        <tr>
                          <td>Tiempo</td>
                          <td>
                            <span class='form-control' name='ep_ot_select' >
                              " . (!empty($data) ? $data['ep_ot_select'] : '') . "
                            </span>
                          </td>
                          <td>
                            <span class='form-control' name='ep_ot_textarea' rows='3'>" . (!empty($data) ? $data['ep_ot_textarea'] : '') . "</span>
                          </td>
                        </tr>
                        <tr>
                          <td>Lugar</td>
                          <td>
                            <span class='form-control' name='ep_ol_select' >
                              " . (!empty($data) ? $data['ep_ol_select'] : '') . "
                            </span>
                          </td>
                          <td>
                            <span class='form-control' name='ep_ol_textarea' rows='3'>" . (!empty($data) ? $data['ep_ol_textarea'] : '') . "</span>
                          </td>
                        </tr>
                        <tr>
                          <td>Persona</td>
                          <td>
                            <span class='form-control' name='ep_op_select' >
                              " . (!empty($data) ? $data['ep_op_select'] : '') . "
                            </span>
                          </td>
                          <td>
                            <span class='form-control' name='ep_op_textarea' rows='3'>" . (!empty($data) ? $data['ep_op_textarea'] : '') . "</span>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td>Concentración</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_concentracion_select' >
                        " . (!empty($data) ? $data['ep_concentracion_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_concentracion_textarea' rows='3'>" . (!empty($data) ? $data['ep_concentracion_textarea'] : '') . "</span>
                    </td>
                  </tr>

                  <tr>
                    <td>Juicio</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_julicio_select' >
                        " . (!empty($data) ? $data['ep_julicio_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_julicio_textarea' rows='3'>" . (!empty($data) ? $data['ep_julicio_textarea'] : '') . "</span>
                    </td>
                  </tr>

                  <tr>
                    <td>Introspección</td>
                    <td colspan='3'>
                      <span class='form-control' name='ep_introspeccion_select' >
                        " . (!empty($data) ? $data['ep_introspeccion_select'] : '') . "
                      </span>
                    </td>
                    <td colspan='2'>
                      <span class='form-control' name='ep_introspeccion_textarea' rows='3'>" . (!empty($data) ? $data['ep_introspeccion_textarea'] : '') . "</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Medicación</td>
                    <td colspan='5'>
                      <span class='form-control' name='ep_medicacion_text' rows='5' class='w-100'>" . (!empty($data) ? $data['ep_medicacion_text'] : '') . "</span>
                    </td>
                  </tr>
                  <tr class='pt-5'>
                    <td>Firma</td>
                    <td colspan='2'>
                      <span class='form-control' type='text' name='ep_firma_input'>" . (!empty($data) ? $data['ep_firma_input'] : '') . "</span>
                    </td>
                    <td colspan='3'></td>
                  </tr>
                  <tr class='pt-5'>
                    <td colspan='2'>
                      Dra. Nereida Feliciano <br />
                      NPI: 1528010725 <br />
                      Lic: 8722
                    </td>
                    <td colspan='4'></td>
                  </tr>
                </table>
              </div>
              <!-- End :: Examen Psiquiatrico Section -->

            </div>
";
}
