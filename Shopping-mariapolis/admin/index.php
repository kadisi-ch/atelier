

<?php

session_start();


$user='ATL';
$password_defini='ATL';

if(isset($_POST['submit'])){

	$username=$_POST['username'];
	$password=$_POST['password'];

	if($username&&$password){

		if($username==$user&&$password==$password_defini){


			$_SESSION['username']=$username;
			header('location:admin.php');

		}else{

        echo('<script> alert("Identifiants erronés. Veuillez réesseyer " );</script>');

		}

	}else{

		echo('<script> alert("Veuillez remplir tous les champs !" );</script>');

	}

}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
<head>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="upload/images/favicon.png" type="">
<title>Atelier-Mariapolis SHOPPING</title>
<!-- FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- BOOTSTRAP CDN-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="style.css">
</head>


    <section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

                <form action="#" method="POST">
                  <img src="images/favicon.jpg" alt="">
              <h3 class="mb-5">Sign in</h3>
              <div class="form-outline mb-4">
                <input type="text"   name="username" class="form-control form-control-lg" />
                <label class="form-label">Login</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" name="password" class="form-control form-control-lg" />
                <label class="form-label">Password</label>
              </div>

              <button class="btn btn-primary btn-lg btn-block" input type="submit" name="submit"type="submit">Login</button>



            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html> 
