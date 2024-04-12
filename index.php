<?php
//session_start();
//print_r($_SESSION["bus"]);
//print_r("IS NULL XDA ".is_null($_SESSION["XDA"][12]));
//print_r("ISSET ".!isset($_SESSION["bus"][1]));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="public/css/materialize.css" media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <link rel="icon" href="public/favicon.svg" sizes="32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Sistema de Boletos Autobús ADO</title>
</head>

<!-- Se llama al metodo onReady del js main -->
<body onload="onReady()">

<header>
    <div class="navbar-fixed">
        <nav class="blue darken-4">
            <div class="nav-wrapper" style="padding-left: 10px; padding-right: 10px">
                <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up"><i
                            class="material-icons">menu</i></a>
                <a href="#" class="brand-logo">Sistema de Boletos Autobús ADO</a>

                <ul id="nav-mobile" class="right hide-on-small-only">
                    <li><a class="waves-effect waves-light btn" onclick="crearDatos()">Datos Ramdom</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="public/assets/wallpaper.jpg">
                </div>
                <a href="#user"><img class="circle" src="public/favicon.svg"></a>
                <a href="#name"><span class="white-text name"><b>Luciano Bacab</b></span></a>
                <a href="#email"><span class="white-text email"><b>Vida Programacion</b></span></a>
            </div>
        </li>
        <li><a target="_blank" href="#"><b>Youtube</b></a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a target="_blank" href="#"><b>Facebook</b></a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a target="_blank" href="#"><b>Instagram</b></a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a target="_blank" href="#"><b>Github</b></a></li>
        <li>
            <div class="divider"></div>
        </li>
    </ul>
</header>
<main style="margin: 25px">

    <div class="">
        <div class="row">
            <div class="col s12 m6 l8 " style="padding: 15px;">

                <!-- Formulario -->
                <form method="post">
                    <div class="row">
                        <div class="input-field col s12 l4 m6">
                            <input placeholder="Nombre" id="inp_name" type="text" class="validate" required>
                            <label for="inp_name">Nombre</label>
                        </div>
                        <div class="input-field col s12 l4 m6">
                            <input placeholder="Apellidos" id="inp_first_name" type="text" class="validate" required>
                            <label for="inp_first_name">Apellidos</label>
                        </div>
                        <div class="input-field col s12 l4 m6">
                            <input placeholder="Destino" id="inp_destiny" type="text" class="validate" required>
                            <label for="inp_destiny">Destino</label>
                        </div>
                        <div class="input-field col s12 l4 m6">
                            <input placeholder="Origen" id="inp_origin" type="text" class="validate" required>
                            <label for="inp_origin">Origen</label>
                        </div>
                        <div class="input-field col s12 l4 m6">
                            <input placeholder="Precio" id="inp_cost" type="number" class="validate" required>
                            <label for="inp_cost">Precio</label>
                        </div>
                        <div class="input-field col s12 l4 m6" id="_select">

                        </div>
                        <div class="input-field col s12 l4 m6">
                            <!-- Button con metodo OnClick-->
                            <a class="waves-effect waves-light btn right" onclick="compraBoleto(); comprarBoleto();">
                                <i class="material-icons right">send</i>Guardar
                            </a>
                        </div>
                    </div>
                </form>
                <!-- -->

            </div>
            <div class="col s12 m6 l4" style="padding: 15px">
                <div class="row">

                    <div class="col s12 m12 l12 center-align">
                        <div class="col l1 m2 hide-on-small-only"></div>
                        <!-- div para mostrar los asientos del autobus -->
                        <div class="col s12 l10 m8">
                            <div class="collection" id="_detatail_bus"></div>
                        </div>
                        <!-- -->
                        <div class="col l1 m2 hide-on-small-only"></div>
                    </div>

                    <div class="col s12 m12 l12 center-align">
                        <div class="col l1 m2 hide-on-small-only"></div>
                        <!-- div para mostrar los asientos del autobus -->
                        <div class="col s12 l10 m8" id="_autobus"></div>
                        <!-- -->
                        <div class="col l1 m2 hide-on-small-only"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="_info" class="modal">
        <div class="modal-content">
            <h4>Detalles del Asiento</h4>
            <div id="_detail">

            </div>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
    </div>

</main>

<footer class="page-footer blue darken-4">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Luciano Bacab</h5>
                <p class="grey-text text-lighten-4">"Si lo Puedes Imaginar Puedes Programarlo" </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Sigueme</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" target="_blank"
                           href="#">Youtube</a></li>
                    <li><a class="grey-text text-lighten-3" target="_blank" href="#">Facebook</a>
                    <li><a class="grey-text text-lighten-3" target="_blank" href="#">Instagram</a>
                    </li>
                    <li><a class="grey-text text-lighten-3" target="_blank" href="#">Github</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2024 Vida Programacion
        </div>
    </div>
</footer>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="public/js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="public/js/materialize.js"></script>
<script type="text/javascript" src="public/js/faker.js"></script>
<script type="text/javascript" src="public/js/init.js"></script>
<script type="text/javascript" src="controllers/bd.js"></script>
<script type="text/javascript" src="controllers/main.js"></script>
</body>
</html>