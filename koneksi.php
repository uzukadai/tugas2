<?php

$dbhost = "localhost";
$dbname = "dbtugas2";
$dbuser = "root";
$dbpass = "";

$koneksi = new PDO("mysql:host=" . $dbhost . "; dbname=".$dbname."",$dbuser,$dbpass);