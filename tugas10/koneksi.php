<?php 

$conn = new mysqli ("localhost","root","","pijarcamp");

if (mysqli_connect_error()){
	echo "koneksi gagal" .mysqli_connect_error();
}

?>
