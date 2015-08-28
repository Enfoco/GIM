<script type="text/javascript">
$(document).ready(function() {
    $("#eps").change(function() {
        $("#eps option:selected").each(function() {
            eps = $('#eps').val();
            $.post("<?= base_url("Alumnos/create"); ?>", {
                eps : eps
            }
        });
        }); 

        $("#ips").change(function() {
            $("#ips option:selected").each(function() {
                ips = $('#ips').val();
                $.post("<?= base_url("Alumnos/create"); ?>", {
                    ips : ips
                }
            });
            })  

        });

        $("#genero").change(function() {
            $("#genero option:selected").each(function() {
                genero = $('#genero').val();
                $.post("<?= base_url("Alumnos/create"); ?>", {
                    genero : genero
                }
            });
            })  

        });

        $("#tipoIdentificacion").change(function() {
            $("#tipoIdentificacion option:selected").each(function() {
                tidentificacion = $('#tipoIdentificacion').val();
                $.post("<?= base_url("Alumnos/create"); ?>", {
                    tidentificacion : tidentificacion
                }
            });
            })  

        });

        $("#rh").change(function() {
            $("#rh option:selected").each(function() {
                rh = $('#rh').val();
                $.post("<?= base_url("Alumnos/create"); ?>", {
                    rh : rh
                }
            });
            })  

        });

        $("#estado").change(function() {
            $("#estado option:selected").each(function() {
                estado = $('#estado').val();
                $.post("<?= base_url("Alumnos/create"); ?>", {
                    estado : estado
                }
            });
            })  

        });

        $(document).ready(function() {
            $("#provincia").change(function() {
                $("#provincia option:selected").each(function() {
                    provincia = $('#provincia').val();
                    $.post("<?= base_url("Alumnos/create"); ?>", {
                        provincia : provincia
                    }, function(data) {
                        $("#localidad").html(data);
                    });
                });
            })


        });
        </script>
