<!DOCTYPE html>
<html>
<head>
    <title>Synaptica Col</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/fBarra.js"></script>
    <link rel="stylesheet" href="css/contacto.css">
</head>
<body onscroll="fBarra()">
    <div w3-include-html="header.html"></div>
    <main>
        <section id="formulario">
           <div class="contenedor">
               <div class="row">
                    <div class="col-sm-4"><img src="IMG/Mapa-contacto-18.svg" alt="Mapa"></div>
                    <div class="col-sm-2"><h2 id="titulo">CONTACTO</h2></div>
                    <div class="col-sm-6">    
                        <?php
                        if (!isset($_POST['email'])) {
                        ?>
                          <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <label>Nombres<input name="nombre" type="text"/></label>
                            <br>
                            <label>Teléfono<input name="telefono" type="text" /></label>
                            <br>
                            <label>Email<input name="email" type="email" /></label>
                            <br>
                            <label>Empresa<input name="empresa" type="text" /></label>
                            <br>
                            <label>Mensaje<textarea name="mensaje" rows="6" cols="50">
                            </textarea></label>
                            <div class="portaBoton">
                            <input type="reset" value="Borrar" />
                            <input type="submit" value="Enviar" />
                            </div> 
                          </form>
                        <?php
                        }else{
                          $mensaje="Mensaje del formulario de contacto Synaptica.com.co";
                          $mensaje.= "\nNombre: ". $_POST['nombre'];
                          $mensaje.= "\nEmail: ".$_POST['email'];
                          $mensaje.= "\nTelefono: ". $_POST['telefono'];
                          $mensaje.= "\nMensaje: \n".$_POST['mensaje'];
                          $mensaje.= "\nEmpresa: \n".$_POST['empresa'];
                          $destino= "juandados@gmail.com";
                          $remitente = $_POST['email'];
                          $asunto = "Mensaje enviado por: ".$_POST['nombre'];
                          mail($destino,$asunto,$mensaje,"FROM: $remitente");
                        ?>
                          <p><strong>Tu mensaje ha sido enviado!<br>Pronto estaremos en contacto!</strong></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
            <div w3-include-html="footer.html"></div>
        </footer>
    <script src="w3-include-HTML.js"></script>
    <script src="fBarra.js"></script>
</body>
</html>