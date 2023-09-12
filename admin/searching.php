<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Searching Artist</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10"> <br>
                <h3>Searching System ระบบค้นหาข้อมูลจากชื่อศิลปิน</h3>
                <form action="" method="get">
                    <input type="search" name="q" required class="form-control" placeholder="ค้นหาชื่อศิลปินตามที่ต้องการ"> <br>
                    <button type="submit" class="btn btn-primary">ค้นหาข้อมูล</button>
                    <a href="Searching.php" class="btn btn-warning">เคลียร์ข้อมูล</a>
                </form>

                <?php
                //ถ้ามีการส่ง $_GET['q'] 
                if (isset($_GET['q'])) {
                    //คิวรี่ข้อมูลมาแสดงในตาราง
                    require_once 'connect.php';
                    //ประกาศตัวแปรรับค่าจากฟอร์ม
                    $q = "%{$_GET['q']}%";
                    $stmt = $conn->prepare("SELECT * FROM tbl_movies WHERE movie_name LIKE ?");
                    $stmt->execute([$q]);
                    $result = $stmt->fetchAll(); //แสดงข้อมูลทั้งหมด

                    //ถ้าเจอข้อมูลมากกว่า 0
                    if ($stmt->rowCount() > 0) {
                ?>
                        <br>
                        <h3>รายการชื่อศิลปินที่ค้นพบ </h3>
                        <table class="table table-striped  table-hover table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">ลำดับ</th>
                                    <th width="85%">ชื่อเอกสาร</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($result as $row) { ?>
                                    <tr>
                                        <td><?= $row['no_id']; ?></td>
                                        <td><?= $row['movie_name']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br>
                <?php } // if ($stmt->rowCount() > 0) {
                    else {
                        echo '<center> -ไม่พบข้อมูล !! </center>';
                    }
                } //isset 
                ?>
            </div>
        </div>
    </div>
</body>

</html>