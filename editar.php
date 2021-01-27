<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <title>Editar</title>
</head>

<?php
include_once 'conexion.php';
$sql_leer = 'SELECT * FROM `catalogo`';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();

$resultado = $gsent->fetchAll();

if ($_GET) {
    $id = $_GET['peliculas'];
    $sql_unico = 'SELECT * FROM catalogo WHERE id=?';
    $gsent_unico = $pdo->prepare($sql_unico);
    $gsent_unico->execute(array($id));

    $resultado_unico = $gsent_unico->fetch();

    $titulo = $resultado_unico['titulo'];
    $titulo = utf8_encode($titulo);
    $lastTitle = $resultado_unico['lastTitle'];
    $lastTitle = utf8_encode($lastTitle);
    $genero = $resultado_unico['genero'];
    $genero = utf8_encode($genero);
    $saga = $resultado_unico['saga'];
    $saga = utf8_encode($saga);
    $sagaPertenece = $resultado_unico['sagaPertenece'];
    $sagaPertenece = utf8_encode($sagaPertenece);
    $resumen = $resultado_unico['resumen'];
    $resumen = utf8_encode($resumen);
    $video = $resultado_unico['video'];
    $visto = $resultado_unico['visto'];
}
?>

<body>
<div class="overflow container-fluid  <?php if (!$_GET) : ?> fl-center fl-colu h-100vh <?php endif; ?>">
        <h1>Editar Peliculas</h1>
        <label for="pel">Escoje una Pelicula</label>
        <div class="fl-row">
            <select id="pel" name="peliculas" form="peli1">
                <?php foreach ($resultado as $key) : ?>
                    <option value="<?php echo $key['id'] ?>"><?php echo $key['titulo'] ?></option>
                <?php endforeach; ?>
            </select>
            <form id="peli1" action="editar.php" method="get">
                <input type="submit" value="editar">
            </form>
        </div>
        <?php if ($_GET) : ?>
            <form id="form2" action="pros.php" method="post">
                <fieldset>
                    <input type="text" name="Titulo" placeholder="Titulo" value="<?php echo $titulo ?>">
                    <input type="text" name="LastTitle" placeholder="LastTitle" value="<?php echo $lastTitle ?>">
                    <input type="text" name="Genero" placeholder="Genero" value="<?php echo $genero ?>">
                    <input type="text" name="Saga" placeholder="Saga" value="<?php echo $saga ?>">
                    <input type="text" name="Saga_Pertenece" placeholder="Saga Pertenece" value="<?php echo $sagaPertenece ?>">
                    <input type="text" name="visto" placeholder="visto" value="<?php echo $visto ?>">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                </fieldset>
                <fieldset>
                    <textarea name="resumen" cols="30" rows="10" placeholder="Resumen"><?php echo $resumen ?></textarea>
                    <textarea name="video" cols="30" rows="10" placeholder="Video"><?php echo $video ?></textarea>
                </fieldset>
                <input type="submit" value="finalizar">
            </form>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>

<?php
// cerrar conexión
$sentecia_agregar = null;
$pdo = null;

?>