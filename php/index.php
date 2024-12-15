<?php
session_start();
if(!isset($_SESSION['fullname'])){
  echo "you are logged out.";
  header('location : login.php');
}
?>
<!DOCTYPE html>
<html>
  <head><title>Food Recommendation System</title>

    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
<link rel="manifest" href="images/favicon/site.webmanifest">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!--font awesome-->
<script src="https://kit.fontawesome.com/56323ba008.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="stylesheet/style.css">

  </head>
  <body>
    <div id="container">
      <header>
      <div id="top-bar" class="uni-padd">
        <img src="images/foodbook.png" id="image">
      
      <div id="social-icons">
        <a href=""><i class="fab fa-facebook"></i></a>
        <a href=""><i class="fab fa-facebook-messenger"></i></a>
        <a href=""><i class="fab fa-instagram"></i></a>
        <a href=""><i class="fab fa-tiktok"></i></a>
        <a href=""><i class="fab fa-whatsapp"></i></a>
        <a href=""><i class="fab fa-x-twitter"></i></a>
      </div>

      <div id="nav-bar">
      <a href="search.html">Search</a>
        <a href="save.php">Save</a>
        <a href="favourite.php">Favourite</a>
        <a href="logout.php">logout</a>
      </div>
    </div>
    </header>

    <section id="nav-2">
      <div class="nav-2-div">
        <h2>Welcome to our Food Collection!</h2>
        <p><?php echo $_SESSION['fullname']?></p>
        <p>Search foods to satisfy your cravings.</p>
       
    </div>
    </section>

    <div> 
      <h2>Featured Food :-</h2>
    </div>

    <section class="food">
        <div class="food-card"> 
          <img src="images/tacos.jpeg" alt="">
          <h2> 1.Tacos</h2>
        </div> 

        <div class="food-card"> 
          <img src="images/pakora.jpg" alt="">
          <h2> 2.Pakora</h2>
        </div> 
      </section>

      <section class="food">
          <div class="food-card"> 
            <img src="images/naan.jpg" alt="">
          <h2> 3.Naan</h2>
          </div>

          <div class="food-card"> 
            <img src="images/bouillabaisse.webp" alt="">
            <h2> 4.Buillabaisse</h2>
          </div> 
            </section>

            <section class="food">
              <div class="food-card"> 
                <img src="images/tarte-tatin.webp" alt="">
                <h2> 5.Tarte-tatin</h2>
              </div> 
      
              <div class="food-card"> 
                <img src="images/crpes.webp" alt="">
                <h2> 6.Crpes</h2>
              </div> 
                </section>
    </div>
    <footer>
      <div>
        <p>&copy;2024 Project on Food Recommendation System by :- Srijal Thapa</p>
      </div>
    </footer>
    <script src="script.js"></script>
  </body>
</html>