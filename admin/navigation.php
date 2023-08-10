<?php 
error_reporting(0);
#beranda
if ($_GET['mod']=='databarang') {
	include 'databarang.php';
}elseif ($_GET['mod']=='barangmasuk') {
	include 'barangmasuk.php';
}elseif ($_GET['mod']=='barangkeluar') {
	include 'barangkeluar.php';
}elseif ($_GET['mod']=='kmeansform') {
	include 'kmeansform.php';
}elseif ($_GET['mod']=='perhitungan') {
	include 'perhitungan.php';
}elseif ($_GET['mod']=='datalowongan') {
	include 'datalowongan.php';
}elseif ($_GET['mod']=='ubahpassword') {
	include 'ubahpassword.php';
}elseif ($_GET['mod']=='detailpeserta') {
	include 'detailpeserta.php';
}elseif($statuslowongan=='0' || $statuslowongan=='1'){
	include 'timeline.php';
}else{
	include 'dashboard.php';
}
