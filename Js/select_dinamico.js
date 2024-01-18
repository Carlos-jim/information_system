//Funcion para mostrar los municipios dependiendo del estado seleccionado
$(document).ready(function() {
    $("#slc_estado").change(function() {

        //$('#slc_parroquia').find('option').remove().end().append('<option value="0">Seleccione la parroquia</option>').val('whatever');

        $("#slc_estado option:selected").each(function(){
            codigo = $(this).val();
            $.post("/Funeraria/Models/Domicilio_Models/Includes/getMunicipios.php", 
                {codigo : codigo},
                function(data) {
                    $("#slc_municipio").html('<option value="0">Seleccione el municipio</option>' + data);
                }
                ); 
        });
    });
});

//Funcion para mostrar las parroquias dependiendo del municipio seleccionado
$(document).ready(function() {
    $("#slc_municipio").click(function() {

        //$('#slc_ciudad').find('option').remove().end().append('<option value="0">Seleccione la ciudad</option>').val('whatever');

        $("#slc_municipio option:selected").each(function(){
            codigo = $(this).val();
            $.post("/Funeraria/Models/Domicilio_Models/Includes/getParroquias.php", 
                {codigo : codigo},
                function(data) {
                    $("#slc_parroquia").html('<option value="0">Seleccione la parroquia</option>' + data);
                }
                ); 
        });
    });
});

//Funcion para mostrar las ciudades dependiendo de la parroquia seleccionada
$(document).ready(function() {
    $("#slc_parroquia").change(function() {

        $("#slc_parroquia option:selected").each(function(){
            codigo = $(this).val();
            $.post("/Funeraria/Models/Domicilio_Models/Includes/getCiudades.php", 
                {codigo : codigo},
                function(data) {
                    $("#slc_ciudad").html('<option value="0">Seleccione la ciudad</option>' + data);
                }
                ); 
        });
    });
});