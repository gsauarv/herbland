<?php
    include 'includes/db.php';
    $count = $_POST['itemCounter'];
    global $conn;
    $stmt = "SELECT * from itemStore LIMIT $count;";
    $result = mysqli_query($conn,$stmt);
    if(mysqli_num_rows($result)>0)
    {  
        while($row = mysqli_fetch_assoc($result))
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
    }

?>