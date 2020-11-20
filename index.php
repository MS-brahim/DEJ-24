<?php include_once "config.php"?>
<!doctype html>
<html lang="en">
  <head>
    <title>Accueil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <!-- start navbar  -->
      <nav class="navbar navbar-expand-md navbar-dark bg-warning">
        <a class="navbar-brand" href="#">Déj-24</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add.php">Ajoute des repas</a>
                </li>
            </ul>
        </div>
      </nav>
      <!-- end navbar  -->

      <!-- start contient -->
      <section class="container-fluid my-5">
        <center><h2 class="py-3 mb-3 bg-light">Choisissez votre repas</h2></center>
        <input type="search" name="" class="form-control mb-4 w-25" placeholder="Recherche">
        <form class="row" method="POST" action="">
            <?php
                $sql ="SELECT * FROM foods";
                if($result = $conn->query($sql)){
                    while($row = $result->fetch_assoc()){?>
                <div class="col-sm-3">
                    <div class="card text-left">
                        <img class="card-img-top" src="images/<?php echo $row['image'] ?>" alt="<?php $row['image'] ?>">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $row['title'] ?></h4>
                            <p class="card-text"><?php echo $row['price'] ?> Dhs</p>
                            <input type="hidden" name="SUB_ORDER">
                            <input type="submit" value="Commandez maintenant<?php $row['id'] ?>" class="btn btn-success w-100">
                        </div>
                    </div>
                </div>
            <?php } }  $date = date("Y-m-d", strtotime("+15 day") );
             echo $date;?>
        </form>
      </section>
      <!-- end contient  -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>