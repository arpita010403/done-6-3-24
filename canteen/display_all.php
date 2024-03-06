<?php 
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen website</title>
    <!-- boostrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--css link-->
    <link rel="stylesheet" href="style.css">
    <style>
      body{
        
       background:#3A1D0F;
       color:white;
      }
      .card {
      
      width: 300px; /* Set a fixed width for the card */
      height: 400px; /* Set a fixed height for the card */
      border: 1px solid #ccc;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
     
    }
    .card-img-top {
      width: 100%; /* Set the width to fill the entire space of the card */
      height: 200px; /* Set the desired height of the image */
      object-fit: cover; /* Ensure the image covers the entire space without stretching */
      border-top-left-radius: 10px; /* Optional: Apply border radius to match the card */
      border-top-right-radius: 10px; /* Optional: Apply border radius to match the card */
    }
    
    .card-body {
      height: 200px; /* Set the desired height for the card body */
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    
    .card-title {
      font-size: 1.25rem; /* Increase the font size of the title */
      margin-bottom: 10px; /* Add some bottom margin to the title */
    }
    
    .card-text {
      color: #555; /* Set the color of the text */
      font-size: 0.8rem; /* Set the font size of the text */
      margin-bottom: 15px; /* Add some bottom margin to the text */
    }
    
    .btn {
      
      color: black; /* Set the text color of the button */
      border: none; /* Remove the border */
      
      border-radius: 5px; /* Add some border-radius for rounded corners */
      text-decoration: none; /* Remove the default underline */
      transition: background-color 0.3s ease; /* Add a smooth transition for hover effects */
    }
    
    .btn:hover {
      background-color: grey; /* Change the background color on hover */
    }
    
         
    </style>
  </head>
<body>
    <!--navbar-->
 
    <div class="container p-0">
        <!---first child-->
        <nav class="navbar navbar-expand-lg text-light" style="background-color: #3A1D0F; width:150%; display:flex;">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse  " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
        
      <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="display_all.php">Menu</a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link text-light" href="contact.php">Contact</a>
        </li>
        

       
        <ul>
          <!--sidenav-->
<div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: rgba(0, 0, 0, 0.5);">
        <?php 
        //calling function
        getcategories();
        ?>
    </div>
</div>
        </ul>
        
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Total: ₹ <?php total_cart_price();?>/-</a>
        </li> 
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-info text-light" name="search_data_product">
      </form>
      <ul  style="list-style: none; padding: 0; display: flex;">
      <li class="nav-item text-light">
          <a class="nav-link" href="cart.php" style="color:white"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        
        <?php
if(isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link text-light' href='./users/profile.php' style='color:white'><i class='fa-solid fa-user'></i></a>
</li>";
}else{
  echo "<li class='nav-item'>
          <a class='nav-link text-light' href='./users/user_register.php'>Register</a>
        </li>";

}
?>
</li>
      </ul>
    </div>
  </div>
</div>
</nav>
<!-- calling cart function -->
<?php
cart();
?>


<!--second child-->
<nav class="navbar navbar-expand-lg navbar-light text-body">
    <ul class="navbar-nav me-auto">
    
        <?php 
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link text-light' href='#'>Welcome Guest</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link text-light' href='#'>Welcome " .$_SESSION['username']."</a>
        </li>";
        }
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='./users/user_login.php'>Login</a>
</li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link text-light' href='./users/logout.php'><i class='fa-solid fa-right-from-bracket'></i></a>
</li>";
}

?>


    </ul>
</nav>

<!--fourth child-->
<div class="row px-2 ">
  
    <div class="col-md-12">
        <!--products-->
            <div class="row">
    <!-- fetching products -->
            <?php 
            //calling function
             get_all_products();
             get_unique_categories();

            ?>
<!-- row end -->
</div>
<!-- col end -->
</div>
 
</div>
    
<!--last child -->
<?php 
include('includes/connect.php');
include('functions/common_function.php');
?>

 

<!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>