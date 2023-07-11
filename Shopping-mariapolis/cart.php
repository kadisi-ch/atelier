<?php

session_start();

require_once("php/CreateDb.php");
require_once("php/component.php");

$db = new CreateDb ("Productdb", "Producttb");

if  (isset($_POST['remove'])){
  if($_GET['action'] == 'remove'){
    foreach($_SESSION['cart'] as $key=>$value){
        if ($value['product_id'] == $_GET['id']){
            unset($_SESSION['cart'][$key]);
            echo "<script>alert('Product has been removed...!')</script>";
            echo "<script>window.location = 'cart.php'</script>";
        }
    }
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
<body class="bg-light">

<?php
require_once('php/header.php');
?>

<div class="container-fluide">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My cart</h6>
                <hr>
            
            <?php
            
            $total = 0;
        if (isset($_SESSION['cart'])){
            $product_id = array_column($_SESSION['cart'], 'product_id');
            
            $result = $db->getData();
            while ($row = mysqli_fetch_assoc($result)){
                foreach ($product_id as $id){
                    if($row ['id'] == $id){
                        cartElement( $row['title'], $row['product_price'], $row['id']);
                        $total = $total + (int)$row['product_price'];
                    }
                }
            }
        }else{
            echo "<h4>Cart is empty</h5>";
        }

            ?>
          
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25"> 

            <div class="pt-4">
                <h6>PRICE DELAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                        if (isset ($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<h6>Price ($count items)</h6>";
                        }else{
                            echo "<h6>Price (0 item)</h6>"; 
                        }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>Kes<?php echo $total;?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                       <h6>Kes<?php
                        echo $total;
                        ?></h6>
                    </div>
                </div>
            </div>

        </div>
         
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html> 