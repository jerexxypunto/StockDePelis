<?php
include_once 'conexion.php';
$sql_leer = 'SELECT * FROM `catalogo`';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();

$visto = [];
$resultado = $gsent->fetchAll();
foreach ($resultado as $dato) {
  array_push($visto, $dato[6]);
}

if ($_GET) {
  $id = $_GET['id'];
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
}
include('header.php');
?>
<div class="container caja-interfaz">
  <div class="frontstage">
    <div class="viendo">
      <section><h3>Día de Series</h3> <p> Miercoles 12 | Mandalorian</p> </section>
      <section><h3>Día de Películas</h3> <p>Domingo 20 | Super 8</p> </section>
    </div>
    <div class="grid-container container-center column-7 gap-10 box-3d">
      <?php foreach ($resultado as $key => $dato) : ?>
        <div class="catalogo ocupado <?php if ($visto[$key] == "TRUE") {
                                        echo "visto";
                                      } ?>">
          <img class="girado" src="imagenes/<?php echo $dato['titulo'] ?>.jpg" alt="<?php echo $dato['titulo'] ?>">
          <form action="catalogo.php" method="GET">
            <input type="hidden" value="<?php echo $dato['id'] ?>" name="id">
            <input type="submit" value="">
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php if ($_GET) : ?>
    <div class="backstage">
      <div class="cajaBack">
        <header>
          <div>Titulo</div>
          <div>
            <form action="catalogo.php" method="get">
              <input type="hidden" value="#">
              <input type="submit" value="X">
            </form>
          </div>
        </header>
        <section>
          <div>
            <img src="imagenes/<?php echo $titulo ?>.jpg" alt="<?php echo $titulo ?>">
          </div>
          <div>
            <div>
              <p class="label">Titulo</p>
              <p class="contenido"><?php echo $titulo ?> : <?php echo $lastTitle ?> </p>
            </div>
            <div>
              <p class="label">Genero</p>
              <p class="contenido"><?php echo $genero ?></p>
            </div>
            <div>
              <p class="label">Saga</p>
              <p class="contenido">
                <?php
                echo $saga;
                if ($saga === "Sí") {
                  echo ", Saga " . $sagaPertenece;
                }
                ?>
              </p>
            </div>
            <div>
              <p class="label">Resumen</p>
              <p class="contenido"><?php echo $resumen ?></p>
            </div>
          </div>
        </section>
        <?php
        if ($video === "Null") {
        } else {
          echo $video;
        }
        ?>
      </div>
    </div>
  <?php endif; ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.js" integrity="sha512-14GPUgKFTeCsgj5WWZpTNQ525GYlOK3DMTqrjsly3TDIDnOUbZ5sWyfI6HqsWUmMmaCoa6q7FHrbq9xdqNhmYg==" crossorigin="anonymous"></script>
</body>

</html>

<?php
// cerrar conexión
$sentecia_agregar = null;
$pdo = null;

?>