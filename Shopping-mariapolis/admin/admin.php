
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    <!-- ***** Header Area Start ***** -->
<?php

session_start();
?>

<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="includes/assets/IMGS/logo.JPG">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="?action=add" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="clothes.php">Clothes</a></li>
                            <li class="scroll-to-section"><a href="all.php">All category</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Pages</a>
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="products.html">Products</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section">
							<img class="rounded-circle"src="includes/assets/IMGS/K10.JPG"alt="" style="width: 40px; height: 40px;">
							<a href="index.html"><strong style="color:blue">  Log out </strong> <?php echo $_SESSION['username'] ?></a> </li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
	<li class="scroll-to-section"><a href="index.html">  <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
<span class="d-none d-lg-inline-flex">K10 Chris</span>							</a></li>
   
                    
					 <br/><br/> <br/>
					 <body>

<?php

	try
	{
	$db = new PDO('mysql:host=127.0.0.1;dbname=productdb','root', '');
	$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //les noms des champs seront en caractères minuscules
	$db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); //les erreurs lanceront les exceptions
	}
		catch(Exception $e){

	die('Une erreur est survenue.');

	}

if(isset($_SESSION['username'])){
	if(isset($_GET['action'])){
	if($_GET['action']=='add'){

	if(isset($_POST['submit'])){
		
	$title=$_POST['title'];
	$description=$_POST['description'];
	$productoldprice=$_POST['product_oldprice'];
	$productprice=$_POST['product_price'];
	$stock=$_POST['stock'];
	$img=$_FILES['img']['name'];

$img_tmp=$_FILES['img']['tmp_name'];
if(!empty($img_tmp)){

		$image=explode('.',$img);
		$image_ext=end($image);
		if (in_array(strtolower($image_ext),array('png','jpg','jpeg'))===false){

		echo'Please! select an image of these extensions : jpg ou png ou jpej';

		}else{

		$image_size=getimagesize($img_tmp);

		if($image_size['mime']=='image/jpeg'){
		$image_src=imagecreatefromjpeg($img_tmp);
		}else if($image_size['mime']=='image/png'){
		$image_src=imagecreatefrompng($img_tmp);
		}else{
			$image_src=false;
			echo'Please, put a valid image';

			}
		if ($image_src!==false){

			$image_width=200;
			if ($image_size[0]==$image_width){
				$image_finale=$image_src;
			}else{

				$new_width[0]=$image_width;
				$new_height[1]=200;
				$image_finale=imagecreatetruecolor($new_width[0],$new_height[1]);
				imagecopyresampled($image_finale,$image_src,0,0,0,0,$new_width[0],$new_height[1],$image_size[0],$image_size[1]);
			}
				imagejpeg($image_finale,'../upload/'.$title.'.jpg');
		}
	}


	}else{

		echo'Select an image please ! ';

	}
	
	
	if($title && $description && $productoldprice && $productprice && $stock && $img){
		

		$request = $db->prepare('INSERT INTO producttb(title, description, product_oldprice, product_price, category, stock, img) 
		VALUES (?, ?, ?, ?, ?, ?, ?)');
		
		$request->execute(array($title, $description, $productoldprice, $productprice, $category, $stock, $img));
		

		
		  echo('<script> alert("Please ! \n complete all fields to validate" );</script>');
		
			}else{
			  
		
		
				echo('<script> alert(" '.$title.' \n is successfully recorded in the system" );</script>');
		
			}
		   
		   }

	?>

				 <div id="container">
						 <!-- zone de connexion -->
                         <label for="url"> <strong style="color:blue">  <h1>Data logging form</h1> </strong></label>
                         <br/>
                         
						 
						 <form action"" method="post" enctype="multipart/form-data">
	
    <div class="input-group mb-3">
                     <div class="input-group-prepend"><span class="input-group-text" id="url-base">title of item</span></div>
                     <input type="text" name="title"  class="form-control" id="url" aria-describedby="url-base" >
                 </div>
					                      <div class="input-group mb-3">
                     <div class="input-group-prepend"><span class="input-group-text">Description</span></div>
                     <textarea  name="description"class="form-control" aria-label="Biographie"></textarea>
                 </div>

                     <div class="input-group mb-3">
                     <div class="input-group-prepend"><span class="input-group-text">Price before reduction</span></div>
                     <input type="number" name="product_oldprice" min="0" class="form-control" aria-label="Somme arrondie">
                     <div class="input-group-append"><span class="input-group-text">Ksh</span></div>
					 </div>

					 
                 <div class="input-group mb-3">
                     <div class="input-group-prepend"><span class="input-group-text">Price</span></div>
                     <input type="number" name="product_price" min="0" class="form-control" aria-label="Somme arrondie">
                     <div class="input-group-append"><span class="input-group-text">Ksh</span></div>
					 </div>

                 <div class="input-group mb-3">
                 <div class="input-group-prepend"><span class="input-group-text" id="url-base">Categorie</span></div>
                 <select name="category" class="form-control" id="url" aria-describedby="url-base">
    <?php $select=$db->query("SELECT * FROM category");

	while($s=$select->fetch(PDO::FETCH_OBJ)){

		?>


		<option><?php echo $s->nom; ?></option>
		<?php
	}

	?>
	 </select>
</div>

					<div class="input-group mb-3">
                     <div class="input-group-prepend"><span class="input-group-text">Available quantity</span></div>
                     <input type="number" name="stock" min="0" class="form-control" aria-label="Somme arrondie">
                     <div class="input-group-append"><span class="input-group-text">pieces</span></div>
					 </div>



					 <div class="input-group mb-3">
                     <div class="input-group-prepend"><span class="input-group-text">Photo of item</span></div>
                     <input type="file" name="img"  class="form-control" aria-label="Somme arrondie">
                     <div class="input-group-append"></div>
					 </div>

                 <button class="btn btn-primary" type="submit" name="submit">Submit</button>
	</form>
	</div>
	</body>
	<?php

	}else if($_GET['action']=='modifyanddelete'){

	$select = $db->prepare("SELECT * FROM titres");
	$select->execute();

	while($s=$select->fetch(PDO::FETCH_OBJ)){
		?>
		
		<link href="../style/bootstrap.css" type="text/css" rel="stylesheet"/>
	<body>
				 <div id="container">
						 <!-- zone de connexion -->

	<form action="#" method="POST">

	<form action "" method="post" enctype="multipart/form-data">
		<center>
		<table class="table table-bordered table-striped table-condensed">
			 <tr class="danger">
		<center><h4><p style=" color:red; background:#F9FF9B; size:"strong""> <?php echo $s->title; ?> </p></h4></center>
</tr><th class="danger"> <a href="#"> <center><button type="button" class="btn btn-success">  <a href="?action=modify&amp;id=<?php echo $s->id;?>">Modifier</a>  </button> </center></a></th>

  <th class="success"><a href="#"> <center><button type="button" class="btn btn-danger">   	<a href="?action=delete&amp;id=<?php echo $s->id;?>">Supprimer</a>  </button> </center></a></th>
</tr>
  </table>  <br/>
</center>
		</form>
		</div>
		</body>


	<?php

	}

	}else if($_GET['action']=='modify'){
	$id=$_GET['id'];

	$select=$db->prepare("SELECT * FROM titres WHERE id=$id");
	$select->execute();

	$data=$select->fetch(PDO::FETCH_OBJ);


	?>


		<link href="../style/bootstrap.css" type="text/css" rel="stylesheet"/>
		<body>
					 <div id="container">
							 <!-- zone de connexion -->
		<form action "" method="post" enctype="multipart/form-data">

	<h3>Nom du titre :</h3><input value="<?php echo $data->title; ?>" type="text" name="title" />
	<h3>Description du titre :</h3><textarea name="description"><?php echo $data->description; ?></textarea>
	<h3>Prix :</h3><input value="<?php echo $data->price; ?>" type="text" name="price" /><br/>
	<h3>Categorie :</h3><select value="<?php echo $data->price; ?>" type="text" name="category"
	<?php $select=$db->query("SELECT * FROM category");

	while($s=$select->fetch(PDO::FETCH_OBJ)){

		?>

		<option><?php echo $s->name; ?></option>
		<?php
	}

	?>
	 </select><br/>
	<h3>Stock disponible :</h3><input value="<?php echo $data->stock; ?>" type="text" name="" /><br/><br/>
	<input  type="submit" name="submit" value="Modifier"/>
	</form>
	</div>
	</body>

	<?php
	if(isset($_POST['submit'])){
	$stock=$_POST['stock'];
	$title=$_POST['title'];
	$description=$_POST['description'];
	$price=$_POST['price'];
	$category=$_POST['category'];

	$update=$db->prepare("UPDATE titres SET title='$title', description='$description',price='$price', category='$category', stock='$stock' WHERE id=$id");
	$update->execute();
	header('location:admin.php?action=modifyanddelete');
	}

	}else if ($_GET['action']=='delete'){
		$id=$_GET['id'];
	$delete = $db->prepare("DELETE FROM titres WHERE id=$id");
	$delete->execute();


	}else if($_GET['action']=='add_category'){
		if(isset($_POST['submit'])){
		$name=$_POST['name'];
		if ($name){

	$insert = $db->prepare("INSERT INTO category VALUES('','$name')");
	$insert->execute();

	echo '<h3 style="color:yellow;">Enregistrement effectué avec succès.</h3>';

	}else{
			echo'<h3 style="color:red;">Veuillez remplir le champ</h3>';

		}
		}
		?>

		<link href="../style/bootstrap.css" type="text/css" rel="stylesheet"/>
		<body>
					 <div id="container">
							 <!-- zone de connexion -->

		<form action="#" method="POST">

		<form action "" method="post" enctype="multipart/form-data">
		<h3>Titre de la categorie</h3><input type="text" name="name"> <br/><br/>
		<input type="submit" name="submit" value="Ajouter">
		</form>
		</div>
		</body>
		<?php

		}else if($_GET['action']=='modifyanddelete_category'){

			$select = $db->prepare("SELECT * FROM category");
	$select->execute();

	while($s=$select->fetch(PDO::FETCH_OBJ)){

		?>

<link href="../style/bootstrap.css" type="text/css" rel="stylesheet"/>
	<body>
				 <div id="container">
						 <!-- zone de connexion -->

	<form action="#" method="POST">

	<form action "" method="post" enctype="multipart/form-data">
					<center>
		  <table class="table table-bordered table-striped table-condensed">
		  	 <tr class="danger">
		  <center><h4><p style=" color:red; background:#F9FF9B; size:"strong""> <?php 	echo $s->name;  ?> </p></h4></center>
  <th class="danger"><a href="#"> <center><button type="button" class="btn btn-success"> 	<a href="?action=modify_category&amp;id=<?php echo $s->id;?>">Modifier</a></button>
  </th><th class="success"><a href="#"> <center><button type="button" class="btn btn-danger"> 	<a href="?action=delete_category&amp;id=<?php echo $s->id;?>">Supprimer</a></button> </center></a></th>
  </tr>
  </table>
</center>
		</form>
		</div>
		</body>

	<?php

	}

	}else if($_GET['action']=='modify_category'){


	$id=$_GET['id'];

	$select=$db->prepare("SELECT * FROM category WHERE id=$id");
	$select->execute();

	$data=$select->fetch(PDO::FETCH_OBJ);


	?>

	<link href="../style/bootstrap.css" type="text/css" rel="stylesheet"/>
	<body>
				 <div id="container">
						 <!-- zone de connexion -->

	<form action="#" method="POST">

	<form action "" method="post" enctype="multipart/form-data">
	<h3>Titre de la categorie :</h3><input value="<?php echo $data->name; ?>" type="text" name="name" />

	<input  type="submit" name="submit" value="Modifier"/>

	</form>
	</div>
	</body>
	<?php
	if(isset($_POST['submit'])){
	$name=$_POST['name'];


	$update=$db->prepare("UPDATE category SET name='$title' WHERE id=$id");
	$update->execute();


	header('location:admin.php?action=modifyanddelete_category');

	}
	}else if($_GET['action']=='delete_category'){
	$id=$_GET['id'];
	$delete = $db->prepare("DELETE FROM category WHERE id=$id");
	$delete->execute();
	header('location:admin.php?action=modifyanddelete_category');

}
	}else{

	die('<h2 style="color:white; size:30;"><em>Félicitation, connexion reussie !</em></em>');
}


}

?>
