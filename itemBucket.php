<?php
    session_start();
    if (isset($_SESSION['id']))
    {
        include 'includes/nav_active.php';
        echo "<div class='container'>";
        if(isset($_POST['cart']))
        {
            
            include 'includes/db.php';
            $itemQty = $_POST['itemQty'];
            $itemId = $_POST['cart'];
           $result = itemData($itemId);
           if(mysqli_num_rows($result)>0)
           {
               while($row = mysqli_fetch_array($result))
               {
                   $itemName =  $row['itemName'];
                   $itemPic = $row['itemPic'];
                   $userEmail = $_SESSION['id'];
                   $totalPrice = $row['itemPrice'] * $itemQty;
    
               }
               addTocart($userEmail,$itemName,$itemPic,$itemQty,$totalPrice);
               echo "Item Added SuccessFully";

           }

           else
           {
               echo "No Data";
           }
        }
        else
        {
            echo "No item Added";
        }

        
       
    }

    echo "</div>";
?>