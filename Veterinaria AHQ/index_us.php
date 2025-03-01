<?php
require("application/usuario.php");


?>  
<!DOCTYPE html>
<html>

<head>
    <title>Acceso clientes Veterinaria AHQ</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/css/bootstrap.min.css">


    <script src="styles/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="styles/js/vendor/jquery-1.12.0.min.js"></script>

    <link rel="stylesheet" href="styles/css/estilo.css">
</head>



<body>



    <div class="sidebar">
        <div class="user-profile">
            <img src="styles/img/logo.jpg" alt="Foto de perfil">
            <h3>
                Veterinaria AHQ Clientes
            </h3>
            <h1>Bienvenido
                <?php echo $nombre ?>
            </h1>
        </div>
        <div class="profile-links">
            <ul>
                <li><a href="index_usuario.php">Editar Perfil</a></li>
                <li><a href="data/cerrar_session.php">Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
 





    <div class="cuadrados-container">
        <center>
            <div class="open-btn">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </center>


        <!-- Primera fila de cuadrados -->
        <div class="cuadrados-row">
            <div class="cuadrado">
                <h1 class="h1-menu-cliente">Mi perfil</h1>
                <a href="index_usuario.php"><img src="styles/img/user.png" alt=""></a>
            </div>
            <div class="cuadrado">
                <h1 class="h1-menu-cliente">Mis recetas</h1>
                <a href="presentation/consulta_receta.php"><img src="styles/img/RECETA.png" alt=""></a>
            </div>
            <div class="cuadrado">
                <h1 class="h1-menu-cliente">Calendario citas</h1>
                <a href="index_atencion.php"><img src="styles/img/calendar.png" alt=""></a>
            </div>

            <div class="cuadrado">
                <h1 class="h1-menu-cliente">Perfil de mascota</h1>
                <a href="presentation/perfil.php"><img src="styles/img/mascota.png" alt=""></a>
            </div>
            <div class="cuadrado">
                <h1 class="h1-menu-cliente">Mis citas</h1>
                <a href="presentation/ver_citas_usuario.php"><img src="styles/img/calendar.png" alt=""></a>
            </div>
            <div class="cuadrado">
                <h1 class="h1-menu-cliente">salir</h1>
                <a href="data/cerrar_session.php"><img src="styles/img/salir.png" alt=""></a>
            </div>
        </div>
        <!-- Segunda fila de cuadrados -->










        <div class="row">



            <div class="col-sm-7">





                <div class="chat">
                    <a style="text-decoration:none;" href="#">
                        <div id="sc">
                            <img style="float:left; display:flex; justify-content:center;" src="styles/img/logo.jpg"
                                width="20px" height="20px" /><b>Chat
                                Veterinaria AHQ</b>
                        </div>
                    </a>
                    <div id="panel">


                        <script>

                            $(document).ready(function () {

                                var i = 0;
                                var st;

                                $("#sc").click(function () {


                                    i++;

                                    $("#panel").slideToggle();

                                    if (i == 1) {
                                        $('#div').html("<div class=\"ou\"> Hola Bienvenido a tu asistente </div><br>");

                                    }




                                });



                            });



                        </script>


                        <script type="text/javascript">

                            $(document).ready(function () {

                                $("#st").click(function () {

                                    var str = $("#tt").val();

                                    $("#div").html(str);



                                });

                            });


                        </script>

                        <script>
                            //wait for page load to initialize script
                            $(document).ready(function () {

                                window.alreadySubmit = false;

                                $('#tt').keypress(function (f) {


                                    if (f.which == 13 && !alreadySubmit) {
                                        window.alreadySubmit = true;

                                        //listen for form submission

                                        $('form').on('submit', function (e) {
                                            //prevent form from submitting and leaving page
                                            e.preventDefault();

                                            // AJAX 
                                            $.ajax({
                                                type: "POST", //type of submit
                                                cache: false, //important or else you might get wrong data returned to you
                                                url: "components/process.php", //destination
                                                datatype: "html", //expected data format from process.php
                                                data: $('form').serialize(), //target your form's data and serialize for a POST
                                                success: function (result) { // data is the var which holds the output of your process.php

                                                    // locate the div with #result and fill it with returned data from process.php


                                                    $('#div').append("<div class=\"stt\"" + result + "</div>");

                                                    $('#tt').val("");

                                                }
                                            });
                                        });
                                    }



                                });


                            });


                        </script>

                        <div id='div' name="output">

                            <div id="div1"></div>


                        </div>
                        <br>


                        <div class="form-group">
                            <form action="process.php" id="form" name="f2" method="POST">
                                <input type="textarea" id="tt" name="input" placeholder="Escribe tu mensaje"
                                    style="position:absolute; bottom:0; height:30px; width:100%; height:50px;"
                                    required />
                            </form>


                        </div>




                    </div>
                </div>

            </div>

        </div>












    </div>










</body>

</html>