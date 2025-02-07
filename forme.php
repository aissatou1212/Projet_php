<?php
   session_start();
   if (!isset($_SESSION["personnes"])){
    $_SESSION["personnes"] = [];
   }
 
   if ($_SERVER["REQUEST_METHOD"] === "POST") {
           if(isset($_POST["enregistrer"])){
                $personne = [
                  "id" => $_POST["id"],
                  "nom" => $_POST["nom"],
                  "prenom" => $_POST["prenom"],
                  "email" => $_POST["email"],
                  "password" => $_POST["password"]
                ];
           
           }
           $_SESSION["personnes"][]= $personne;
           if(isset($_POST["vider"])){
            $_SESSION["personnes"]= [];
            
           }
   }
   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>
<style>
  header{
    background-color: grey;
    color: white;
    height: 100px;
    text-align: center;
    font-size:35px;
  }
   form{
        margin-top: 25px;
        width: 600px;
        height: 500px;
    }
    .contenair{
      display: flex;
    }
    .table{
      height: 600px;
      width: 500px;
    }
</style>
<body>
    <HEader><STRong>Formulaires</STRong></HEader>
   <div class="contenair">
     
    <form method="post" action="forme.php">
      <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Id</label>
          <input type="text" class="form-control" name="id" id="exampleInputPassword1">
        </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" >Nom</label>
        <input type="text" name="nom" class="form-control">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Prenom</label>
        <input type="text"  name="prenom" class="form-control">
      </div>
      <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">email</label>
          <input type="email"  name="email" class="form-control">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
          <input type="password"  name="password" class="form-control">
        </div>

      <button type="submit"  name="enregistrer" class="btn btn-primary">Enregistrer</button>

    </form>
    

    <table class="table table-bordered" style="with:80%">
      <thead>
        <tr>
          
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">email</th>
          <th scope="col">password</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($_SESSION["personnes"] as $value):?>
        
          <tr>
          <td><?= $value["nom"] ?></td>
          <td><?= $value["prenom"] ?></td>
          <td><?= $value["email"] ?></td>
          <td><?= $value["password"] ?></td>
        </tr>
        
        <?php endforeach?>
      </tbody>
     
 
    </table>
   

   
   
   </div>
   <form action="forme.php" method="post" style="margin-left:60%;margin-top:-10%">
      <button type="submit"  name="vider" class="btn btn-primary">vider tableau</button>
   </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>