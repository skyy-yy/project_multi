<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'server.php';



//insert zone
mysqli_query($conn, "SELECT * FROM zone");
$sqlInsertzone	= "INSERT INTO  zone values(null, '$zid', '$zname_zone')";
$rsInsertzone	= mysqli_query($conn, $sqlInsertzone);
 


//insert user
mysqli_query($conn, "BEGIN");
$sqlInsertuser	= "INSERT INTO  user values(null, '$id', '$username', '$fullname', '$email', '$telephone', '$password')";
$rsInsertuser	= mysqli_query($conn, $sqlInsertuser);
 
//insert tbl_table
mysqli_query($conn, "BEGIN");
$sqlInserttbl_table	= "INSERT INTO  tbl_table values(null, '$tid', '$table_name', '$table_status')";
$rsInserttbl_table	= mysqli_query($conn, $sqlInserttbl_table);

//insert consert
mysqli_query($conn, "BEGIN");
$sqlInsertconsert	= "INSERT INTO  consert values(null, '$cname', '$zprine', '$date','$time', '$location', '$cid', '$img')";
$rsInsertconsert	= mysqli_query($conn, $sqlInsertconsert);
?>

<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'server.php';


//print_r($_POST);

if (isset($_POST['zname_zone']) ) {
	

//ประกาศตัวแปรรับค่าจากฟอร์ม

$zid = $_POST['zid'];
$zname_zone = $_POST['zname_zone'];


//insert booking
mysqli_query($conn, "SELECT * FROM zone");
$sqlInsertzone	= "INSERT INTO  zone values(null, '$zid', '$zname_zone')";
$rsInsertzone	= mysqli_query($conn, $sqlInsertzone);
 
//การใช้ Transection ประกอบด้วย  BEGIN COMMIT ROLLBACK 


//update table status

}

?>



