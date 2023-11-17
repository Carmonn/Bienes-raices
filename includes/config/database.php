<?php 

function conectarDB() : mysqli {
  $db = mysqli_connect('localhost','root','root','bienesraices_crud');
  if(!$db){
    echo "No se conectó";
    exit;
  }
  return $db;
}