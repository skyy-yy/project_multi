<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'server.php';

//print_r($_POST);

if (isset($_POST['table_id']) && isset($_POST['booking_name']) && isset($_POST['booking_date'])) {


	//ประกาศตัวแปรรับค่าจากฟอร์ม

	$booking_name = $_POST['booking_name'];
	$booking_date = $_POST['booking_date'];
	$booking_time = $_POST['booking_time'];
	$booking_phone = $_POST['booking_phone'];
	$booking_staff = $_POST['booking_staff'];
	$table_id = $_POST['table_id'];
	$dateCreate = date('Y-m-d H:i:s'); //วันที่บันทึก

	//insert booking
	mysqli_query($conn, "BEGIN");
	$sqlInsertBooking	= "INSERT INTO  tbl_booking values(null, '$table_id', '$booking_name', '$booking_date', '$booking_time', '$booking_phone', '$booking_staff', '$dateCreate')";
	$rsInsertBooking	= mysqli_query($conn, $sqlInsertBooking);

	//การใช้ Transection ประกอบด้วย  BEGIN COMMIT ROLLBACK 


	//update table status
	$sqlUpdate = "UPDATE tbl_table SET table_status=1 WHERE id = $table_id"; //1=จอง
	$rsUpdate = mysqli_query($conn, $sqlUpdate);


	if ($rsInsertBooking && $rsUpdate) { //ตรรวจสอบถ้า 2 ตัวแปรทำงานได้ถูกต้องจะทำการบันทึก แต่ถ้าเกิดข้อผิดพลาดจะ Rollback คือไม่บันทึกข้อมูลใดๆ
		mysqli_query($conn, "COMMIT");
		echo 'บันทึกข้อมูลการจองเรียบร้อยแล้ว <a href="index.php"> กลับหน้าหลัก </a>';
	} else {
		mysqli_query($conn, "ROLLBACK");
		$msg = 'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ  <a href="index.php"> กลับหน้าหลัก </a>';
	}
} //iset 
else {
	header("Location: index.php");
}

