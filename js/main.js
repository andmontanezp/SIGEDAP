$(document).ready(function(){
    
    $(function() {
        $( "#cedula" ).autocomplete({
          source: base_url+"/trabajador/autocompleteCedula",
        });
    });

    $(function() {
        $( "#nombres" ).autocomplete({
          source: base_url+"/trabajador/autocompleteNombres",
        });
    });

    /*Validations*/

    function limpiar(){
        $("#cedula").val("");
        $("#nombres").val("");
        $("#apellidos").val("");
        $("#gerencia").val("");
        $("#coordinacion").val("");
        $("#cargo").val("");
    }
    $("#tipo_busqueda").change(function(){
    var form = $("#search_trabajador"),
    validator1 = form.validate({
        rules : {
                    cedula : {required: true,number:true}
                },
                messages : {
                    cedula : {
                        required: "Ingrese un número de cédula.",
                        number : "Por favor, ingrese un número de cédula válido."
                    }
                },
                submitHandler : function(form){
                    form.submit();
                } 
    });
        if ($(this).val()=="1") {
            $("#cedula").prop("disabled", false);
            $("#cedula").focus();
            $("#nombres").prop("disabled", true);
            $("#apellidos").prop("disabled", true);
            $("#gerencia").prop("disabled", true);
            $("#coordinacion").prop("disabled", true);
            $("#cargo").prop("disabled", true);

        } else if ($(this).val()=="2") {
            $("#cedula").prop("disabled", true);
            $("#nombres").prop("disabled", false);
            $("#nombres").focus();
            $("#gerencia").prop("disabled", true);
            $("#coordinacion").prop("disabled", true);
            $("#cargo").prop("disabled", true);
            
        } else if ($(this).val()=="3") {
            $("#cedula").prop("disabled", true);
            $("#nombres").prop("disabled", true);
            $("#apellidos").prop("disabled", true);
            $("#gerencia").prop("disabled", false);
            $("#coordinacion").prop("disabled", true);
            $("#cargo").prop("disabled", true);
        } else if ($(this).val()=="4") {
            $("#cedula").prop("disabled", true);
            $("#nombres").prop("disabled", true);
            $("#apellidos").prop("disabled", true);
            $("#gerencia").prop("disabled", true);
            $("#coordinacion").prop("disabled", false);
            $("#cargo").prop("disabled", true);
        } else if ($(this).val()=="5") {
            $("#cedula").prop("disabled", true);
            $("#nombres").prop("disabled", true);
            $("#apellidos").prop("disabled", true);
            $("#gerencia").prop("disabled", true);
            $("#coordinacion").prop("disabled", true);
            $("#cargo").prop("disabled", false);
        }
        limpiar();
    });

            


    (function(){
        var url = base_url+"cargo/llenarCoordinaciones";   
        $.post(base_url+"cargo/llenarCoordinaciones", {car_gerencia_id : $('#car_gerencia_id').val(), cargo_id : $('#car_id').val()}, function(data) {
            $('#car_coordinacion_id').html(data);
            $('#car_coordinacion_id').prop('disabled', false);
        });
    })();
    $('.carousel').carousel({
        interval: 5000
    });
    
    $('#myTab a:first').tab('show');

	$('.form_date').datetimepicker({
             language:  'es',
             weekStart: 1,
             todayBtn:  1,
             autoclose: 1,
             todayHighlight: 1,
             startView: 2,
             minView: 2,
             forceParse: 0,
             startDate : '-3y',
             endDate : '+0d'
    });
    $('.form_date2').datetimepicker({
             language:  'es',
             weekStart: 1,
             todayBtn:  1,
             autoclose: 1,
             todayHighlight: 1,
             startView: 2,
             minView: 2,
             forceParse: 0,
             startDate : '-100y',
             endDate : '+0d'
    });

    $('#id_estado').change(function() {
        //alert($(this).val());
            var url = base_url+"trabajador/llenarMunicipios";
            if ($(this).val()=='0') {
                $('#id_municipio').prop('disabled', true);
            } else {
                $.post(base_url+"trabajador/llenarMunicipios", {id_estado : $(this).val()}, function(data) {
                    //alert(data);
                    $('#id_municipio').html(data);
                    $('#id_municipio').prop('disabled', false);
                });
            };
    });

    $('#id_municipio').change(function() {
        //alert($(this).val());
        var url = base_url+"trabajador/llenarParroquias";
            if ($(this).val()=='0') {
                $('#id_parroquia').prop('disabled', true);
            } else {
                $.post(base_url+"trabajador/llenarParroquias", {id_municipio : $(this).val()}, function(data) {
                    //alert(data);
                    $('#id_parroquia').html(data);
                    $('#id_parroquia').prop('disabled', false);
                });
            };
    });

    $('#car_gerencia_id').change(function() {
        alert($(this).val());
        var url = base_url+"cargo/llenarCoordinaciones";
            if ($(this).val()=='0') {
                $('#car_coordinacion_id').prop('disabled', true);
            } else {
                $.post(base_url+"cargo/llenarCoordinaciones", {car_gerencia_id : $(this).val()}, function(data) {
                    //alert(data);
                    $('#car_coordinacion_id').html(data);
                    $('#car_coordinacion_id').prop('disabled', false);
                });
            };
    });
    
    $('#buscar_trabajador').click(function() {
        var url = base_url+"hcm/buscarTrabajador";
        if($('#tipo_busqueda').val()=="0"){
            alert("Seleccione un criterio de búsqueda...");
            $('#tipo_busqueda').focus();
        } else if($('#tipo_busqueda').val()=="1"){
            if ($('#buscar').val()=='') {
                alert('Ingrese un número de cedula para realizar la búsqueda...');
            $('#buscar').focus();
            } else {
                var table = "";
                $.post(url, {tra_cedula : $('#buscar').val()}, function(data) {
                    var j = 1;
                    $.each(data, function(i,item) {
                        if (item.idtrabajador != "0") {
                            $('#idtrabajador').val(item.idtrabajador);
                            $('#nombres').val(item.tra_nombres);
                            $('#apellidos').val(item.tra_apellidos);
                            $('#cedula').val(item.nacionalidad+item.tra_cedula);
                            $('#sede').val(item.sede);
                            $('#gerencia').val(item.gerencia);
                            $('#coordinacion').val(item.coordinacion);
                            $('#cargo').val(item.cargo);
                            $('#movil').val(item.tra_telf_celular);
                            if (item.fam_nombres != undefined) {
                                table+="<tr><td>"+j+"</td><td>"+item.fam_nombres+" "+item.fam_apellidos+"</td><td>"+item.nac_descripcion+""+item.fam_cedula+"</td><td>"+item.tfa_descripcion+"</td><td>"+item.edad+"</td><td></td><td><a href='' class='glyphicon glyphicon-list-alt'>Requisitos</a></td><td><a href='' class='glyphicon glyphicon-file'>Documentación</a></td></tr>";
                                $('#body').html(table);
                                j++;
                            }                                
                        } else {
                            $('#idtrabajador').val("");
                            $('#nombres').val("");
                            $('#tra_cargo_id').val(0);
                            alert(item.mensaje);
                        }
                    });
                }, "json");            
            };
        } else if($('#tipo_busqueda').val()=="2"){
            alert("Se buscará por código...");
        }
    });

    $('#guardarmovimiento').click(function() {
        var url = base_url+"trabajador/registrarMovimiento";
		if ($('#idcargo').val()=='vacio' || $('#idsede').val()=='vacio') {
			alert('Ingrese un cargo y una sede para realizar el movimiento...');
			$('#idsede').focus();
		} else {
			$.post(url, {    idtrabajador : $('#idtrabajador').val(), 
                             idsede_anterior : $('#idsede_anterior').val(), 
                             idcargo_anterior : $('#idcargo_anterior').val(), 
                             funciones_anteriores : $('#funciones_anteriores').val(),
                             idsede : $('#idsede').val(), 
                             idcargo : $('#idcargo').val(),
                             funciones_nuevas : $('#funciones_nuevas').val(),
                             fechadesde : $('#fechadesde').val(),
                             usuario_id : $('#usuario_id').val()
                        }, 
            function(data) {
    			if (data.error == 0) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert("Ha ocurrido un error, intente nuevamente...");
                };
			}, "json");
		};
    });

    $('#guardaractividad').click(function() {
        var url = base_url+"trabajador/registrarActividad";
        if ($('#txa_tipoactividad_id').val()=='0' || $('#txa_descripcion').val()=='') {
            alert('Ingrese el tipo de actividad y la descripcion...');
            $('#txa_tipoactividad_id').focus();
        } else {
            $.post(url, {    txa_trabajador_id : $('#idtrabajador').val(), 
                             txa_tipoactividad_id : $('#txa_tipoactividad_id').val(), 
                             txa_descripcion : $('#txa_descripcion').val(), 
                             txa_fecha_inicio : $('#dtp_input5').val(),
                             txa_fecha_fin : $('#dtp_input6').val(), 
                             txa_ubicacion : $('#txa_ubicacion').val()
                         }, 
            function(data) {
                if (data.error == 0) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert("Ha ocurrido un error, intente nuevamente...");
                };
            }, "json");
        };
    });

    $('#guardaralergia').click(function() {
            var url = base_url+"trabajador/registrarAlergia";
            if ($('#txa_tal_id').val()=='0' || $('#txa_observaciones').val()=='') {
                alert('Ingrese el tipo de alergia y las observaciones...');
                $('#txa_tal_id').focus();
            } else {
                $.post(url, {    txa_trab_id : $('#txa_trab_id').val(), 
                                 txa_tal_id : $('#txa_tal_id').val(), 
                                 txa_observaciones : $('#txa_observaciones').val(), 
                                 txa_usuario_creacion : $('#usuario_id').val(),
                                 txa_usuario_actualizacion : $('#usuario_id').val()
                             }, 
                function(data) {
                    if (data.error == 0) {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert("Ha ocurrido un error, intente nuevamente...");
                    };
                }, "json");
            };
        });

    $('#guardardiscapacidad').click(function() {
            var url = base_url+"trabajador/registrarDiscapacidad";
            if ($('#txd_dis_id').val()=='0' || $('#txd_observaciones').val()=='') {
                alert('Ingrese el tipo de discapacidad y las observaciones...');
                $('#txd_dis_id').focus();
            } else {
                $.post(url, {
                            txd_trab_id : $('#txd_trab_id').val(), 
                            txd_dis_id : $('#txd_dis_id').val(), 
                            txd_observaciones : $('#txd_observaciones').val(), 
                            txd_usuario_creacion : $('#usuario_id').val(),
                            txd_usuario_actualizacion : $('#usuario_id').val()
                             }, 
                function(data) {
                    if (data.error == 0) {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert("Ha ocurrido un error, intente nuevamente...");
                    };
                }, "json");
            };
        });

    $('#alergico').change(function() {
        var alergico = $(this).val();
        if (alergico == 'vacio' || alergico == 'NO') {
            $('#tipoalergia').prop('readonly', 'readonly');
        } else {
            $('#tipoalergia').prop('readonly', false);
        }

    });

    $('#instruccion').change(function() {
        var value = $(this).val();
        if (value == 'OTRO') {
            $('#otrosestudios').prop('readonly', false);
            $('#area').prop('readonly', 'readonly');
            $('#area').val('');
        } else if (value == 'T.S.U' || value == 'INGENIERIA' || value == 'LICENCIATURA') {
            $('#area').prop('readonly', false);
            $('#otrosestudios').prop('readonly', 'readonly');
            $('#otrosestudios').val('');
        } else {
            $('#otrosestudios').prop('readonly', 'readonly');
            $('#area').prop('readonly', 'readonly');
            $('#area').val('');
            $('#otrosestudios').val('');
        }

    });

    $('#area').change(function() {
        var value = $(this).val();
        if (value == 'T.S.U' || value == 'INGENIERIA' || value == 'LICENCIATURA') {
            $('#area').prop('readonly', false);
        } else {
            $('#area').prop('readonly', 'readonly');
        }

    });

    $('#cursos').change(function() {
        var value = $(this).val();
        if (value == 'SI') {
            $('#descripcioncursos').prop('readonly', false);
        } else {
            $('#descripcioncursos').prop('readonly', 'readonly');
        }

    });

    $('#estudiando').change(function() {
        var value = $(this).val();
        if (value == 'SI') {
            $('#estudios').prop('readonly', false);
        } else {
            $('#estudios').prop('readonly', 'readonly');
            $('#estudios').val('');
        }

    });

    $('#fam_nacionalidad_id').change(function() {
        var value = $(this).val();
        if (value == 3) {
            $('#fam_cedula').prop('readonly','readonly');
            $('#fam_cedula').val('N/P');
            $('#fam_genero').focus();
        } else {
            $('#fam_cedula').prop('readonly',false);
            $('#fam_cedula').val('');
            $('#fam_cedula').focus();
        }

    });

    $('#guardarexperiencia').click(function() {
        var url = base_url+"trabajador/registrarExperiencia";
        if ($('#empresa').val()=='' || $('#cargoexp').val()=='' || $('#jefeinmediato').val()=='') {
            alert('Rellene todos los campos para continuar con el registro...');
            $('#empresa').focus();
        } else {
            $.post(url, {    idtrabajador : $('#idtrabajador').val(), 
                             empresa : $('#empresa').val(), 
                             cargoexp : $('#cargoexp').val(), 
                             jefeinmediato : $('#jefeinmediato').val(),
                             telefonosexp : $('#telefonosexp').val(), 
                             usuario_id : $('#usuario_id').val()
                        }, 
            function(data) {
                if (data.error == 0) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert("Ha ocurrido un error, intente nuevamente...");
                };
            }, "json");
        };
    });

    $('#guardarestudios').click(function() {
        var url = base_url+"trabajador/registrarEstudios";
        if ($('#txe_tipoestudio_id').val()=='' || $('#txe_institucion').val()=='' || $('#txe_titulo_obtenido').val()=='') {
            alert('Rellene todos los campos para continuar con el registro...');
            $('#txe_tipoestudio_id').focus();
        } else {
            $.post(url, {    txe_trabajador_id : $('#txe_trabajador_id').val(), 
                             txe_tipoestudio_id : $('#txe_tipoestudio_id').val(), 
                             txe_institucion : $('#txe_institucion').val(), 
                             txe_areaestudio_id : $('#txe_areaestudio_id').val()
                        }, 
            function(data) {
                if (data.error == 0) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert("Ha ocurrido un error, intente nuevamente...");
                };
            }, "json");
        };
    });

    $('#guardarfamiliar').click(function() {
        var url = base_url+"trabajador/registrarFamiliar";
        //alert($('#idtrabajador').val());
        if ($('#idtrabajador').val()==0) {
            alert('No se ha referenciado el código del trabajador...');
        } else if ($('#tipo_familiar_id').val()==0) {
            alert('Seleccione el tipo de familiar...');
            $('#tipo_familiar_id').focus();
        } else if ($('#fam_nombres').val()=='') {
            alert('Ingrese el nombre del familiar...');
            $('#fam_nombres').focus();
        } else if ($('#fam_apellidos').val()=='') {
            alert('Ingrese el apellido del familiar...');
            $('#fam_apellidos').focus();
        } else if ($('#fam_nacionalidad_id').val()==0) {
            alert('Seleccione la nacionalidad...');
            $('#fam_nacionalidad_id').focus();
        } else if ($('#fam_cedula').val()=='') {
            alert('Ingrese la cedula del familiar...');
            $('#fam_cedula').focus();
        } else if ($('#fam_genero_id').val()==0) {
            alert('Seleccione el genero del familiar...');
            $('#fam_genero_id').focus();
        } else if ($('#fam_fechanac').val()=='') {
            alert('Seleccione la fecha de nacimiento del familiar...');
            $('#fam_fechanac').focus();
        } else {
            $.post(url, {    trabajador_id : $('#idtrabajador').val(), 
                             tipo_familiar_id : $('#tipo_familiar_id').val(), 
                             fam_nombres : $('#fam_nombres').val(), 
                             fam_apellidos : $('#fam_apellidos').val(),
                             fam_nacionalidad_id : $('#fam_nacionalidad_id').val(), 
                             fam_cedula : $('#fam_cedula').val(), 
                             fam_genero_id : $('#fam_genero_id').val(), 
                             fam_fechanac : $('#fam_fechanac').val(), 
                             fam_telefono : $('#fam_telefono').val(), 
                             fam_direccion : $('#fam_direccion').val(), 
                             usu_cre : $('#usuario_id').val(),
                             usu_act : $('#usuario_id').val()
                        }, 
            function(data) {
                if (data.error == 0) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert("Ha ocurrido un error, intente nuevamente...");
                }            
            }, "json");
        };
    });
});