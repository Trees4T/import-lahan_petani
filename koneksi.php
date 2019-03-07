<?php
$connection = "production"; // production, local

if ($connection=="production") {
  ##t4t_production
  $host = 'treesdbase.southeastasia.cloudapp.azure.com';
  $user = 't4t_production';
  $pass = 'superman2019';
  $dbase= 'prod_t4t_t4t';
  $port = '8889';
}elseif ($connection=="local") {
  ##localhost
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $dbase= 't4t_t4t';
  $port = '';
}




if ($port=='') {
  $koneksi = mysqli_connect("$host","$user","$pass","$dbase");
}else{
  $koneksi = mysqli_connect("$host","$user","$pass","$dbase","$port");
}

?>
