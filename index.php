<?php
require_once("helper.php");
$mensaje = '';
if (isset($_POST["grabar"])) {
    if (filter_var(trim($_POST["nom"])) == false) {
        $mensaje .= 'El campo nombre es obligatorio<br />';
    }

    if (filter_var(trim($_POST["mensaje"])) == false) {
        $mensaje .= 'El campo mensaje es obligatorio<br />';
    }

    if (filter_var(trim($_POST["correo"])) == false) {
        $mensaje .= 'El campo E-Mail está vacío<br />';
    }
    if (filter_var(trim($_POST["correo"]), FILTER_VALIDATE_EMAIL) == false) {
        $mensaje .= 'El E-Mail ingresado no tiene un formato válido<br />';
    }

    //validar select

    if (filter_var($_POST["pais"], FILTER_CALLBACK, array("options" => "validaSelect")) == false) {
        $mensaje .= 'Debe seleccionar una opción en el campo país<br />';
    }
    if ($mensaje == '') {
        //acá proceso los campos porque ya han sido validados
        die("se pasaron todas las validaciones");
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>..:: Validación de formularios con PHP ::..</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">

        <form name="form" action="" method="post">


            <h1>Validación de formularios con PHP</h1>
            <?php
            if ($mensaje != '') {
                ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <?php echo $mensaje ?></div>
                <?php
            }
            ?>
            <p>
                <label for="nom">Nombre:</label>
                <input type="text" name="nom" class="form-control" autofocus="true"
                       value="<?php echo set_value_input(array(), 'nom', 'nom') ?>"/>
            </p>

            <p>
                <label for="nom">E-Mail:</label>
                <input type="text" name="correo" class="form-control"
                       value="<?php echo set_value_input(array(), 'correo', 'correo') ?>"/>
            </p>

            <p>
                <label for="nom">Teléfono:</label>
                <input type="text" name="tel" class="form-control"
                       value="<?php echo set_value_input(array(), 'tel', 'tel') ?>"/>
            </p>

            <p>
                <label for="nom">Mensaje:</label>
                <textarea rows="4" name="mensaje"
                          class="form-control"><?php echo set_value_input(array(), 'mensaje', 'mensaje') ?></textarea>
            </p>

            <p>
                <label for="nom">País:</label>
                <select name="pais" class="form-control">
                    <option value="0" <?php echo set_value_select(array(), 'pais', 'pais', '0') ?>>Seleccione.....
                    </option>
                    <option value="1" <?php echo set_value_select(array(), 'pais', 'pais', '1') ?>>Argentina</option>
                    <option value="2" <?php echo set_value_select(array(), 'pais', 'pais', '2') ?>>Chile</option>
                    <option value="3" <?php echo set_value_select(array(), 'pais', 'pais', '3') ?>>Paraguay</option>
                    <option value="4" <?php echo set_value_select(array(), 'pais', 'pais', '4') ?>>Uruguay</option>
                    <option value="5" <?php echo set_value_select(array(), 'pais', 'pais', '5') ?>>Perú</option>
                </select>
            </p>


            <p>
                <label for="nom">Multiple Select:</label>
                <select name="multipleSelect" multiple class="form-control">
                    <option value="Opcion1">Opcion1</option>
                    <option value="Opcion2">Opcion2</option>
                    <option value="Opcion3">Opcion3</option>
                    <option value="Opcion4">Opcion4</option>
                </select>
            </p>

            <p>
                <label for="nom">Genero:</label>
                <label class="radio-inline"><input type="radio" name="genero">Hombre</label>
                <label class="radio-inline"><input type="radio" name="genero">Mujer</label>
            </p>

            <p>
                <label for="nom">Intereses:</label>
                <label class="checkbox-inline"><input type="checkbox" value="Interes 1">Interes 1</label>
                <label class="checkbox-inline"><input type="checkbox" value="Interes 2">Interes 2</label>
                <label class="checkbox-inline"><input type="checkbox" value="Interes 3">Interes 3</label>
            </p>
            <hr/>
            <input type="hidden" name="grabar" value="si"/>

            <input type="submit" class="btn btn-primary" value="Enviar">
        </form>

    </div>
</div>

</body>
</html>
