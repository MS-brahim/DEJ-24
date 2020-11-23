<?php
include_once "config.php";
session_start();
if (isset($_POST['add'])) {
    $title = htmlspecialchars($_POST['title']);
    $price = htmlspecialchars($_POST['price']);
    $image = htmlspecialchars($_POST['image']);

    if (empty($title) or empty($price) or empty($image)) {
        header('location:add.php');
    }else {
       $sql = "INSERT INTO foods (title, price, image)
        VALUES ('$title', '$price', '$image')"; 
        if ($result = mysqli_query($conn,$sql)) {
            $_SESSION['msg'] = "Élément ajouté avec succès";
        }
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Ajouter des repas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
        <!-- start navbar  -->
      <nav class="navbar navbar-expand-md navbar-dark bg-warning">
          <a class="navbar-brand" href="index.php"> <img src="images/logo.png" alt=" Déj-24" width="90"></a>
          <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item ">
                      <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="add.php">Ajoute une plat</a>
                  </li>
              </ul>
          </div>
      </nav>
      <!-- end navbar  -->
      <!-- start contient  -->
      <section class="container my-5 col-sm-4">
            <center><h2 class="py-2">Ajouter des plats</h2></center>
            <?php
                if(isset($_SESSION['msg'])){ ?>
                <div class="alert alert-success text-center">
                    <?php echo $_SESSION['msg']; ?>
                </div>
                <?php
                unset($_SESSION['msg']);
                } else { ?>
                    <div class="alert alert-danger text-center">
                        Remplissez les champs 
                    </div>
                <?php }
            ?>
            <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="card text-left p-5">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Nom de plat <span class="text-warning">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Ex: Pizza, Burger, ...">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Prix <span class="text-warning">*</span></label>
                            <input type="text" name="price" class="form-control" placeholder="00.00 Dhs">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">L'image de plat <span class="text-warning">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Télécharger</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input">
                                    <label class="custom-file-label" >Choissez une image</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary w-25" name="add">Ajouter</button>
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