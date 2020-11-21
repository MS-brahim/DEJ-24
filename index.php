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
        <a class="navbar-brand" href="index.php"> <img src="images/logo.png" alt=" Déj-24" width="90"></a>
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
                    <a class="nav-link" href="add.php">Ajoute une plat</a>
                </li>
            </ul>
        </div>
      </nav>
      <!-- end navbar  -->

      <!-- start contient -->
      <section class="container-fluid my-5">
        <center><h2 class="py-3 mb-3 bg-light">Choisissez votre plat</h2></center>
        <input type="search" name="" class="form-control mb-4 w-25" placeholder="Recherche">
        <div class="row">
            <?php
                $sql ="SELECT * FROM foods ORDER BY RAND() LIMIT 2";
                if($result = $conn->query($sql)){
                    while($row = $result->fetch_assoc()){?>
                <div class="col-sm-3">
                    <div class="card text-left">
                        <img class="card-img-top" src="images/<?php echo $row['image'] ?>" alt="<?php $row['image'] ?>">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $row['title'] ?></h4>
                            <p class="card-text"><?php echo $row['price'] ?> Dhs</p>
                            <!-- Button trigger modal -->
                            <a type="button" class="btn btn-success w-100 text-white" data-toggle="modal" data-target="#modelId<?php echo $row['id'] ?>">Commandez maintenant</a>                            
                            <!-- Modal -->
                            <div class="modal fade" id="modelId<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form class="modal-content" method="POST" action="order.php?O_ID=<?php echo $row['id'] ?>">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Remplissez les champs pour compléter la demande</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                      <label for="">Nom <span class="text-warning"> *</span></label>
                                                      <input type="text" name="fname" id="fname" class="form-control" placeholder="entrez votre nom"/>
                                                      <small id="helpfname" class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                      <label for="">Prénom <span class="text-warning"> *</span></label>
                                                      <input type="text" name="lname" id="lname" class="form-control" placeholder="entrez votre prénom"/>
                                                      <small id="helplname" class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                      <label for="">Numéro de téléphone <span class="text-warning"> *</span></label>
                                                      <input type="text" name="phone" id="phone" class="form-control" placeholder="212 XXX XX XX XX"/>
                                                      <small id="helpPhone" class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                      <label for="">Ville <span class="text-warning"> *</span></label>
                                                      <input type="text" name="city" id="city" class="form-control" placeholder="entrez votre ville actuel"/>
                                                      <small id="helpCity" class="text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                      <label for="">Adresse actuel <span class="text-warning"> *</span></label>
                                                      <input type="text" name="address" id="address" class="form-control" placeholder="entrez votre adress actuel"/>
                                                      <small id="helpAddress" class="text-danger"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="SUB_ORDER" id="SUB_ORDER" class="btn btn-warning">Finalser votre demande</button>                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } }  
            // $date = date("Y-m-d", strtotime("+15 day") );
            //  echo $date;
            ?>
        </div>
      </section>
      <!-- end contient  -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- validation form order  -->
    <script>
    $(document).ready(function() {
        $("#SUB_ORDER").click(function() {
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var phone = $("#phone").val();
            var city = $("#city").val();
            var address = $("#address").val();
            
            
            if(fname.length == "")
            {
                $("#helpfname").text("Entrez votre nom s'il vous plait !");
                $("#fname").focus();
                return false;
            }
            else if(lname.length == "")
            {
                $("#helplname").text("Entrez votre prénom s'il vous plait !");
                $("#lname").focus();
                return false;
            }
            else if(phone.length == "")
            {
                $("#helpPhone").text("Entrez votre numéro de téléphone s'il vous plait !");
                $("#phone").focus();
                return false;
            } 
            else if(city.length == "")
            {
                $("#helpCity").text("Le champ de votre ville est obligatoire !");
                $("#city").focus();
                return false;
            }    
            else if(address.length == "")
            {
                $("#helpAddress").text("Votre champ d'adresse est obligatoire !");
                $("#address").focus();
                return false;
            }         
        });
        
    });
    </script>
  </body>
</html>