<?php
  require "../../includes/funciones.php";
  $auth = estaAutenticado();
  if(!$auth){header('Location: /');}

  //Base de datos
  require "../../includes/config/database.php";
  $db = conectarDB();

  //Consultar para obtener los vendedores
  $consulta = "SELECT * FROM vendedores";
  $resultado = mysqli_query($db, $consulta);

  //Arreglo con mensajes de errores
  $errores=[];

  $titulo = "";
  $precio = "";
  $descripcion = "";
  $habitaciones = "";
  $wc = "";
  $estacionamiento = "";
  $vendedorId = "";

  //Ejecutar el código después de que el usuario envia el formulario
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $numero = '1HOLA';
    $numero2 = 1;

    //Sanitizar
    //$resultado = filter_var($numero, FILTER_SANITIZE_NUMBER_INT);
    //$resultado = filter_var($numero2, FILTER_VALIDATE_INT);
    //var_dump($resultado);
    //exit;

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    //Asignar files hacia una variable
    $imagen = $_FILES['imagen'];

    if(!$titulo){$errores[]= "Debes añadir un titulo.";}
    if(!$precio){$errores[]= "El precio es obligatorio.";}
    if(strlen($descripcion) < 50){$errores[]= "La descripción es obligatoria y debe tener al menos 50 caracteres.";}
    if(!$habitaciones){$errores[]= "El numero de habitaciones es obligatorio.";}
    if(!$wc){$errores[]= "El numero de baños es obligatorio.";}
    if(!$estacionamiento){$errores[]= "El numero de lugares de estacionamiento es obligatorio.";}
    if(!$vendedorId){$errores[]= "Elige un vendedor";}
    if(!$imagen['name'] || $imagen['error']){$errores[]= "La imagen es obligatoria";}

    //Validar por tamaño(100kb)
    $medida = 1000 * 1000;
    if($imagen['size'] > $medida){$errores[] = "La imagen es muy pesada";}
    
    //Revisar que el array de errores este vacio
    if(empty($errores)){
      //Subida de archivos
      //crear carpeta
      $carpetaImagenes = '../../imagenes/';
      if(!is_dir($carpetaImagenes)){
        mkdir($carpetaImagenes);
      }

      //Generar un nombre único
      $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

      //Subir la imagen
      move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

      



      //Insertar en la base de datos
      $query = "INSERT INTO propiedades (titulo,precio, imagen,descripcion,habitaciones,
      wc,estacionamiento,creado,vendedorId) VALUES (
        '$titulo','$precio','$nombreImagen','$descripcion','$habitaciones',
        '$wc','$estacionamiento','$creado','$vendedorId'
      )";

      //echo $query;

      $resultado = mysqli_query($db, $query);
      if($resultado){
        //Redireccionar al usuario.
        header('Location: /admin?resultado=1');
      }
    }

  }

  incluirTemplate('header', $inicio = false);
?>

  <main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin"  class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error):?>
      <div class="alerta error">
        <?php echo $error; ?>
      </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
      <fieldset>
        <legend>Información general</legend>

        <label for="titulo">Titulo:</label>
        <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" 
          value="<?php echo $titulo ?>">

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" placeholder="Precio propiedad"
          value="<?php echo $precio ?>">

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
      </fieldset>

      <fieldset>
        <legend>Información propiedad</legend>

        <label for="habitaciones">Habitaciones:</label>
        <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" mac="9"
          value="<?php echo $habitaciones ?>">

        <label for="wc">Baños:</label>
        <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" mac="9"
          value="<?php echo $wc ?>">

        <label for="estacionamiento">Estacionamiento:</label>
        <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" mac="9"
          value="<?php echo $estacionamiento ?>">
      </fieldset>

      <fieldset>
        <legend>Vendedor</legend>

        <select name="vendedor">
          <option value="">-- Seleccione --</option>
          <?php while($vendedor = mysqli_fetch_assoc($resultado) ):?>
            <option 
            <?php echo $vendedorId===$vendedor['id'] ? 'selected' : ''; ?> 
            value="<?php echo $vendedor['id'] ?>">
              <?php echo $vendedor['nombre'] ." ". $vendedor['apellido'] ?>
            </option>
          <?php endwhile; ?>
        </select>
      </fieldset>

      <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
  </main>

<?php
  mysqli_close($db);
  incluirTemplate('footer');
?>