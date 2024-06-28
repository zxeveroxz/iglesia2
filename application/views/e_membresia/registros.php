<style>
    .panel {
        margin-bottom: 10px;
    }

    .panel.panel-info .panel-heading {
        padding: 5px 10px;
    }

    .panel.panel-info .panel-heading .panel-title {
        text-align: center;
        font-size: 18px;
        font-weight: bolder;
    }

    .form-group {
        margin-bottom: 10px;
    }

    .form-group label {
        margin-bottom: 2px;
        font-size: 12px;
    }

    .form-control {
        letter-spacing: 0.2px;
        font-weight: bold;
        color: navy;
        text-transform: uppercase;
    }

    /* CSS personalizado para form-control-sm */
    .form-control-sm {
        height: 30px;
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }

    .panel-heading[data-toggle="collapse"] {
        cursor: pointer;
    }

    .input-group-addon.half-width {
        width: 50%;
        /* Ajustar el ancho según sea necesario */
    }
</style>
<div class="container">
    <div class="panel panel-info ">
        <div class="panel-heading">
            <h2 class="panel-title">
                REGISTRO DE MEMBRESIA
            </h2>
        </div>
        <?php echo form_open('e_membresia/save', array('class' => '', 'id' => 'formy', 'autocomplete' => "off")); ?>

        <input type="hidden" id="ID_registros" name="ID_registros" value="0" />
        <div class="panel-body">

            <div class=" panel panel-default ">
                <div class="panel-heading" data-toggle="collapse" data-target="#datosGenerales">
                    DATOS GENERALES
                </div>
                <div id="datosGenerales" class="panel-collapse collapse in">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-6    ">
                                <div class="form-group">
                                    <label for="CODIGO_registros">CODIGO</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" id="CODIGO_registros" name="CODIGO_registros" maxlength="8" readonly="true" required>
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-sm" type="button" id="check">CHECK</button>
                                        </span>
                                        <span class="input-group-addon half-width" id="checkMensaje">-</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="DNI_registros">DNI</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" id="DNI_registros" name="DNI_registros" maxlength="8">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success btn-sm" type="button">Consultar</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="FECHA_registros">Fecha de Registro</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="FECHA_registros" name="FECHA_registros" readonly="true">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="PATERNO_registros">Apellido Paterno</label>
                                    <input type="text" class="form-control form-control-sm" id="PATERNO_registros" name="PATERNO_registros" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="MATERNO_registros">Apellido Materno</label>
                                    <input type="text" class="form-control form-control-sm" id="MATERNO_registros" name="MATERNO_registros" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="NOMBRES_registros">Nombres</label>
                                    <input type="text" class="form-control form-control-sm" id="NOMBRES_registros" name="NOMBRES_registros" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="EMAIL_registros">Correo Electronico</label>
                                    <input type="text" class="form-control form-control-sm" id="EMAIL_registros" name="EMAIL_registros">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="DEPARTAMENTO_registros">Lugar de Nacimiento</label>
                                    <select class="form-control form-control-sm" id="DEPARTAMENTO_registros" name="DEPARTAMENTO_registros" required>
                                        <?php foreach ($DEPARTAMENTOS as $d) : ?>
                                            <option value="<?= $d->CODIGO_departamento ?>"><?= $d->NOMBRE_departamento ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="FECHA_NAC_registros">Fecha de Nacimiento</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="FECHA_NAC_registros" name="FECHA_NAC_registros">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="TELEFONO_registros">Telefono</label>
                                    <input type="number" class="form-control form-control-sm" id="TELEFONO_registros" name="TELEFONO_registros">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="MOVIL_registros">Celular</label>
                                    <input type="number" class="form-control form-control-sm" id="MOVIL_registros" name="MOVIL_registros">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="SEXO_registros">Sexo</label>
                                    <select class="form-control form-control-sm" id="SEXO_registros" name="SEXO_registros">
                                        <option value="0">MASCULINO</option>
                                        <option value="1">FEMENINO</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class=" panel panel-default ">
                <div class="panel-heading" data-toggle="collapse" data-target="#direccionActual">
                    DIRECCION ACTUAL
                </div>
                <div id="direccionActual" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="DIRECCION_registros">Direccion</label>
                                    <input type="text" class="form-control form-control-sm" id="DIRECCION_registros" name="DIRECCION_registros" required>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="URBANIZACION_registros">Urbanizacion</label>
                                    <input type="text" class="form-control form-control-sm" id="URBANIZACION_registros" name="URBANIZACION_registros">
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="DISTRITO_registros">Distrito</label>
                                    <select class="form-control form-control-sm" id="DISTRITO_registros" name="DISTRITO_registros" required>
                                        <?php foreach ($DISTRITOS as $d) : ?>
                                            <option value="<?= $d->CODIGO_distrito ?>"><?= $d->NOMBRE_distrito ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="REFERENCIA_registros">Referencia</label>
                                    <input type="text" class="form-control form-control-sm" id="REFERENCIA_registros" name="REFERENCIA_registros">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class=" panel panel-default ">
                <div class="panel-heading" data-toggle="collapse" data-target="#datosEclesiasticos">
                    DATOS ECLESIASTICOS
                </div>
                <div id="datosEclesiasticos" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="IGLESIA_CONV_registros">Iglesia de Conversion</label>
                                    <select class="form-control form-control-sm" id="IGLESIA_CONV_registros" name="IGLESIA_CONV_registros">
                                        <?php foreach ($IGLESIAS as $row) : ?>
                                            <option value="<?= $row->CODIGO_iglesia ?>"><?= $row->NOMBRE_iglesia ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="FECHA_CONV_registros">F. de Conversion</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control form-control-sm" id="FECHA_CONV_registros" name="FECHA_CONV_registros" autocomplete="off">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="IGLESIA_BAU_registros">Iglesia de Bautizo</label>
                                    <select class="form-control form-control-sm" id="IGLESIA_BAU_registros" name="IGLESIA_BAU_registros">
                                        <?php foreach ($IGLESIAS as $row) : ?>
                                            <option value="<?= $row->CODIGO_iglesia ?>"><?= $row->NOMBRE_iglesia ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="FECHA_BAU_registros">F. de Bautizo</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control form-control-sm" id="FECHA_BAU_registros" name="FECHA_BAU_registros">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="ZONA_registros">Zona</label>
                                    <select class="form-control form-control-sm" id="ZONA_registros" name="ZONA_registros" required>
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($ZONAS as $row) : ?>
                                            <option value="<?= $row->CODIGO_zona ?>"><?= $row->NOMBRE_zona ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="RESIDENCIA_registros">Residencia</label>
                                    <select class="form-control form-control-sm" id="RESIDENCIA_registros" name="RESIDENCIA_registros" required>
                                        <option value="" disabled>...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="CARGO_registros">Cargo</label>
                                    <select class="form-control form-control-sm" id="CARGO_registros" name="CARGO_registros">
                                        <?php foreach ($CARGOS as $row) : ?>
                                            <option value="<?= $row->CODIGO_cargos ?>"><?= $row->NOMBRE_cargos ?> (<?= $row->ABREVIATURA_cargos ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="GRADOS_CARGO_registros">Grado</label>
                                    <select class="form-control form-control-sm" id="GRADOS_CARGO_registros" name="GRADOS_CARGO_registros">
                                        <option value="0">-</option>
                                        <option value="6">6</option>
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="PADRE_E_registros">Codigo P.E.</label>
                                    <input type="text" class="form-control form-control-sm" id="PADRE_E_registros" name="PADRE_E_registros">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="PADRE_espiritual">Nombre Padre Espiritual</label>
                                    <input type="text" class="form-control form-control-sm" id="PADRE_espiritual">
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="TIPO_DIEZMO_registros">T. Diezmo</label>
                                    <select class="form-control form-control-sm" id="TIPO_DIEZMO_registros" name="TIPO_DIEZMO_registros">
                                        <option value="S">Semanal</option>
                                        <option value="Q">Quincenal</option>
                                        <option value="M">Mensual</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="TIPO_ASIS_registros">T. Asistencia</label>
                                    <select class="form-control form-control-sm" id="TIPO_ASIS_registros" name="TIPO_ASIS_registros">
                                        <option value="N">NORMAL</option>
                                        <option value="D">DOMINGO</option>
                                        <option value="V">VIAJE</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <div class=" panel panel-default ">
                <div class="panel-heading" data-toggle="collapse" data-target="#datosOtros">
                    ESTUDIO, TRABAJO Y FAMILIA
                </div>
                <div id="datosOtros" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="ESTUDIO_registros">Estudios</label>
                                    <select class="form-control form-control-sm" id="ESTUDIO_registros" name="ESTUDIO_registros">
                                        <?php foreach ($ESTUDIOS as $row) : ?>
                                            <option value="<?= $row->CODIGO_estudio ?>"><?= $row->NOMBRE_estudio ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="PROFESION_registros">Profesion</label>
                                    <select class="form-control form-control-sm" id="PROFESION_registros" name="PROFESION_registros">
                                        <?php foreach ($PROFESIONES as $row) : ?>
                                            <option value="<?= $row->CODIGO_profesion ?>"><?= $row->NOMBRE_profesion ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="ESTADO_LAB_registros">Estado Laboral</label>
                                    <select class="form-control form-control-sm" id="ESTADO_LAB_registros" name="ESTADO_LAB_registros">
                                        <?php foreach ($ESTADOS_LABORALES as $row) : ?>
                                            <option value="<?= $row->CODIGO_estado_laboral ?>"><?= $row->NOMBRE_estado_laboral ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="OFICIO_registros">Oficio</label>
                                    <select class="form-control form-control-sm" id="OFICIO_registros" name="OFICIO_registros">
                                        <?php foreach ($OFICIOS as $row) : ?>
                                            <option value="<?= $row->CODIGO_oficio ?>"><?= $row->NOMBRE_oficio ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="CAT_EMPRESA_registros">Tamaño Empresa</label>
                                    <select class="form-control form-control-sm" id="CAT_EMPRESA_registros" name="CAT_EMPRESA_registros">
                                        <?php foreach ($TIPOS_EMPRESAS as $row) : ?>
                                            <option value="<?= $row->CODIGO_tipo_empresa ?>"><?= $row->NOMBRE_tipo_empresa ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="TIPO_EMPRESA_registros">Tipo Empresa</label>
                                    <input type="text" class="form-control form-control-sm" id="TIPO_EMPRESA_registros" name="TIPO_EMPRESA_registros">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ESTADO_CIV_registros">Estado Civil</label>
                                    <select class="form-control form-control-sm" id="ESTADO_CIV_registros" name="ESTADO_CIV_registros">
                                        <?php foreach ($ESTADOS_CIVILES as $row) : ?>
                                            <option value="<?= $row->CODIGO_estado_civil ?>"><?= $row->NOMBRE_estado_civil ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ESTADO_REL_registros">Estado Religioso</label>
                                    <select class="form-control form-control-sm" id="ESTADO_REL_registros" name="ESTADO_REL_registros">
                                        <?php foreach ($ESTADOS_RELIGIOSOS as $row) : ?>
                                            <option value="<?= $row->CODIGO_estado_religioso ?>"><?= $row->NOMBRE_estado_religioso ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>


            <div class=" panel panel-default ">
                <div class="panel-body row">
                    <input type="hidden" id="llave" name="llave" />
                    <input type="hidden" id="lat" name="lat" />
                    <input type="hidden" id="lng" name="lng" />
                    <div class="col-sm-6 text-center"><button class="btn btn-danger" type="button" id="cancelar">CANCELAR</button></div>
                    <div class="col-sm-6 text-center"><button class="btn btn-primary" type="submit" id="save">GUARDAR</button></div>
                </div>
            </div>


        </div>






        <?php echo form_close(); ?>


    </div>
</div>

<script>
    $(document).ready(function() {

        function formatDate(input) {
            if(input=="0000-00-00")
                return "";

            var datePart = input.match(/\d+/g),
                year = datePart[0], // get only four digits
                month = datePart[1],
                day = datePart[2];
            return day + '/' + month + '/' + year;
        }


        $('.date').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true
        });



        $("#check").click(function() {
            var paterno = $("#PATERNO_registros").val().substr(0, 2);
            var materno = $("#MATERNO_registros").val().substr(0, 2);
            var nombre = $("#NOMBRES_registros").val().substr(0, 2);

            var baseCodigo = paterno + materno + nombre;

            // Completar con ceros hasta 6 caracteres
            while (baseCodigo.length < 6) {
                baseCodigo += '0';
            }

            function verificarCodigo(codigo, contador) {
                $.ajax({
                    url: '<?= base_url("varios/verificarXcodigo") ?>',
                    method: 'GET',
                    data: {
                        codigo: codigo
                    },
                    success: function(response) {
                        if (response == 0) {
                            // Código disponible
                            $("#CODIGO_registros").val(codigo);
                            $("#checkMensaje").html("Codigo: "+codigo+" disponible");
                        } else {
                            // Código ocupado, sumar un número
                            contador++;
                            var nuevoCodigo = baseCodigo + ("0" + contador).slice(-2); // Completar con ceros si es necesario
                            $("#checkMensaje").html("Verificando el codigo: "+nuevoCodigo);
                            verificarCodigo(nuevoCodigo, contador);
                        }
                    },
                    error: function() {
                        alert('Error al verificar el código.');
                    }
                });
            }

            verificarCodigo(baseCodigo + "00", 0);
        });


        function validaciones() {
            var valid = true;

            console.log("validaciones");
            // Limpiar mensajes de error previos y bordes rojos
            $(".form-group").removeClass('has-error');
            $(".error").remove();

            // Validar todos los campos requeridos
            $('#formy [required]').each(function() {
                if ($(this).val() === '') {
                    $(this).closest(".form-group").addClass('has-error');
                    valid = false;
                }
            });


            var dni = $("#DNI_registros").val();
            if (dni !== "") {
                if (dni.length != 8) {
                    $("#DNI_registros").closest(".form-group").addClass('has-error');
                    valid = false;
                }
            }

            // Validación del campo email
            var email = $("#EMAIL_registros").val();
            if (email !== "") {
                var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!emailPattern.test(email)) {
                    $("#email").closest(".form-group").addClass('has-error');
                    valid = false;
                }
            }

            // Validación del campo teléfono
            var telefono = $("#MOVIL_registros").val();
            if (telefono !== "") {
                var telefonoPattern = /^[0-9]{10}$/;
                if (!telefonoPattern.test(telefono)) {
                    $("#telefono").closest(".form-group").addClass('has-error');
                    valid = false;
                }
            }

            return valid;
        }


        $("#formy").submit(function(e) {
            e.preventDefault();
            $(this).find('input:not([type="hidden"]), select').each(function() {
                var value = $(this).val();
                $(this).val(value.toUpperCase());
            });

            if (validaciones()) {
                $.ajax({
                    url: '<?= base_url("e_membresia/save") ?>',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response > 0) {
                            alert('Formulario enviado con éxito.');
                            //$("#formy")[0].reset();
                            location.href = '<?= base_url("e_membresia/registro/") ?>' + response.trim();
                        } else {
                            alert('Error al enviar el formulario.');
                        }
                    },
                    error: function() {
                        alert('Error al enviar el formulario.');
                    }
                });
            } else {
                alert('Por favor, completa los campos requeridos.');
                return;
            }
        });


        var $guardar_Residencia = null;

        function llenar(row) {
            $guardar_Residencia = row.RESIDENCIA_registros;
            Object.entries(row).forEach(function([key, val]) {
                $("#" + key).val(val);
            });
            $("#ZONA_registros").change();

            llenarFormatoFechas();

            if (row !== null) {
                $("#save").html("A C T U A L I Z A R");
                $("#cancelar").html("R E S E T E A R");
                $("#check").attr("disabled", true);
            }
        }

        function llenarFormatoFechas(clase = ".date") {
            $('.date').each(function() {
                var input = $(this).find('input[type="text"]');
                //var inputId = input.attr('id');                
                input.datepicker('setDate', formatDate(input.val()));

            });
        }


        $("#ZONA_registros").change(function(e) {
            let v = $(this).val();
            var RESIDENCIA_registros = $('#RESIDENCIA_registros');
            RESIDENCIA_registros.empty();
            RESIDENCIA_registros.attr('disabled', 'disabled');

            var promise = $.ajax('<?= base_url("varios/zonaXresidencias") ?>', {
                data: {
                    zona: v
                },
                method: 'GET',
                dataType: 'json',
                success: function(data, status, xhr) {
                    data.forEach(function(item) {
                        var option = $('<option></option>')
                            .attr('value', item.CODIGO_residencia)
                            .text(item.ORDEN_residencia);
                        RESIDENCIA_registros.append(option);
                    });
                },
                complete: function() {
                    RESIDENCIA_registros.removeAttr('disabled');
                },
                error: function(jqXhr, textStatus, errorMessage) { // error callback 
                    alert("Error occurred: " + errorMessage);
                }
            });

            // Cuando la promesa se resuelve (AJAX completo), restaurar el valor de RESIDENCIA_registros
            promise.done(function() {
                if ($guardar_Residencia != null) {
                    $("#RESIDENCIA_registros").val($guardar_Residencia);
                    $guardar_Residencia = null;
                }
            });
        });


        $("#cancelar").click(function() {
            let ID_registros = $("#ID_registros").val();
            if (ID_registros == 0) {
                location.href = '<?= base_url("e_membresia/registro/") ?>';
            } else {
                location.href = '<?= base_url("e_membresia/registro/") ?>' + ID_registros;
            }
        });



        <?php
        if ($ROW != null) {
            $json = json_encode($ROW);
            echo "llenar($json)";
        }
        ?>

    });
</script>