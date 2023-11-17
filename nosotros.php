<?php
  require "includes/funciones.php";

  incluirTemplate('header');
?>

  <main>
    <h1>Conoce sobre nosotros</h1>
    <div class="contenido-nosotros">
      <div class="imagen">
        <picture>
          <source srcset="build/img/nosotros.webp" type="image/webp">
          <source srcset="build/img/nosotros.jpg" type="image/jpeg">
          <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
        </picture>
      </div>
      <div class="texto-nosotros">
        <blockquote>25 años de experiencia</blockquote>
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
    </div>
  </main>

  <seccion class="contenedor seccion">
    <h1>Mas sobre nosotros</h1>
    <div class="iconos-nosotros">
      <div class="icono">
        <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
        <h3>Seguridad</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. 
          Unde aspernatur id delectus, similique, maxime recusandae 
          quia quam ex quisquam officiis voluptatibus voluptatum esse.
        </p>
      </div>
      <div class="icono">
        <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
        <h3>Precio</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. 
          Unde aspernatur id delectus, similique, maxime recusandae 
          quia quam ex quisquam officiis voluptatibus voluptatum esse.
        </p>
      </div>
      <div class="icono">
        <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
        <h3>A tiempo</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. 
          Unde aspernatur id delectus, similique, maxime recusandae 
          quia quam ex quisquam officiis voluptatibus voluptatum esse.
        </p>
      </div>
    </div>
  </seccion>

<?php
  incluirTemplate('footer');
?>