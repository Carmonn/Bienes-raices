<?php
  require "includes/funciones.php";

  incluirTemplate('header');
?>

  <main class="contenedor seccion contenido-centrado">
    <h1>Guía para la decoración de tu hogar</h1>

    <picture>
      <source srcset="build/img/destacada2.webp" type="image/webp">
      <source srcset="build/img/destacada2.jpg" type="image/jpeg">
      <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
    </picture>

    <p class="informacion-meta">Escrito el: <span>20/10/2012</span> por: <span>Admin</span></p>

    <div class="resumen-propiedad">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Dicta adipisci totam aperiam laboriosam! Officia, praesentium 
        sint placeat sapiente molestiae officiis expedita saepe cupiditate 
        aspernatur ab impedit et, quas, itaque consectetur Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Dicta adipisci totam aperiam laboriosam! Officia, praesentium 
        sint placeat sapiente molestiae officiis expedita saepe cupiditate 
        aspernatur ab impedit et, quas, itaque consectetur.
      </p>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Dicta adipisci totam aperiam laboriosam! Officia, praesentium 
        sint placeat sapiente molestiae officiis expedita saepe cupiditate 
        aspernatur ab impedit et, quas, itaque consectetur.
      </p>
    </div>
  </main>

<?php
  incluirTemplate('footer');
?>