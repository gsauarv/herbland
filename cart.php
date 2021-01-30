<title>Herbland | Shop</title>
<?php
    include 'includes/header.php';
    include 'includes/nav.php';
?>   
<body>
    <div class="container">
    <div class="itemDetailContainer">
    <?php
        if(isset($_POST['cart']))
        {
            $itemId = $_POST['cart'];
            include 'includes/db.php';
            $result = get_items_details($itemId);
            while($row = mysqli_fetch_array($result))
            {

                $itemName = $row['itemName'];
                $itemDesc = $row['itemDesc'];
                $itemPrice = $row['itemPrice'];
                $itemType = $row['itemType'];
                $url = "uploads/".$row['itemPic'];


                echo "<div class='itemShow'>";                  
                echo "<img src = $url>";
             echo "</div>";
             echo "<div class= 'itemDesc'>";
             echo "<h4>".$itemName."</h3>";
             echo "<h5>"."Item Description"."</h4>";
             echo "<p>".$itemDesc."</p>";
             echo "<h5>"."Item Type: "."<span>".$itemType."</span>"."</h4>";
             echo "<h5>"."Price"."</h4>";
             echo "<h2 class='price'>"."Rs: ".$itemPrice."</h2>";
             echo "<h5>"."Item Quantity"."</h4>";                
             echo "<form method='POST' action='itemBucket.php'>";
             echo "<input name='itemQty' type='number' placeholder='Enter Quantity'  min='1' max='100' required>";
             echo "<br>";
             echo "<button class= 'addTocart' style = 'margin-top:40px;' value = '$itemId' name='carts'>"."Buy Now"."</button>";          
             echo "</form>";   
             echo "</div>";                
            }
            

        }
        else
        {
            echo "No Item Selected";
        }       
    ?> 
    </div>
    </div>
</body>
</html>
