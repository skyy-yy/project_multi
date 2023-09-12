<?php
session_start();
include('server.php');

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header('location: login.php');
}
mysqli_query($conn, "set char set utf8");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body class="index">



  <!-- menu -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">C O N S E R T</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home </span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="index1.php">Ticket</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="admin/index3.php">Artist</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="admin/searching.php">Searching</a>
        </li>
      </ul>
    </div>
  </nav>
<!------ slide -------------------------------------------------------------------------------->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/11.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/22.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/33.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- รูปอัลบ้ัม-->
  <div class="album py-5 bg-light" style="background-color: #c9def3!important;">
    <div class="containerr">

      <!--  notification message -->
      <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
          <h5>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
          </h5>
        </div>
      <?php endif ?>

      <!-- logged in user information -->
      <?php if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
      <?php endif ?>

      <div class="row">

        <?php
        $query = mysqli_query($conn, "SELECT * FROM consert ");
        while ($result = mysqli_fetch_array($query)) {
        ?>

          <div class="col-md-3 ">
            <div class="card mb-3 shadow-sm">
              <a href="./zone.php?cid=<?= $result['cid'] ?>">
                <img src=<?= $result['img'] ?> width="100%" height="400" class=" card-img-top" />
              </a>
              <div class="card-body">
                <p class="card-text">
                  <center><?= $result['cname'] ?></center>
                </p>
              </div></a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <br><br>
  <center>
    <footer class="blog-footer">
      <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo" cursorshover="true">@mdo</a>.</p>
    </footer>
  </center>
</body>

</html>