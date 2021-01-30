<?php 
    include 'includes/header.php';
    include 'includes/nav.php';
?>
    <title>Herbland | Shop</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="static/js/script.js"></script>
  <body>
   
    <section class="itemContainer">
      <div class="container">
        <h4>Our Products</h4>   
          <div id="items">
                   
            <?php
              include 'includes/db.php';
              $items = getItems();
              while($row = mysqli_fetch_assoc($items))
              {
                echo "<div class='item'>";
                $url = "uploads/".$row['itemPic'];
                echo "<img src='$url'>";
                echo "<h3>"."Name: ".$row['itemName']."</h3>";
                $id = $row['itemId'];
                echo "<p>".$row['itemDesc']."</p>" ;
                echo "<strong>"."<p>"."Item Type: ".$row['itemType']."</p>"."</strong>";
                echo "<strong>"."<p class='span'>"."Price: ". $row['itemPrice'] . "</p>"."</strong>";
                echo "<form method = 'POST' action='cart.php'>";
                echo "<button type='submit' value = '$id' name = 'cart'  class ='addTocart'>" . 'Add to cart' . "</button>";
            
                echo "</form>";

               
                echo "</div>";        
          
              }
            ?>
      </div>

    </div>
    <div class="buttons">
 
        
  
      <button id="load_more">Load More</button>
    </div>
    
 
  </section>
  </body>
</html>
