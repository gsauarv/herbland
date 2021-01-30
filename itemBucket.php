<?php
    session_start();
    if (!isset($_SESSION['id']))
    {
        header('Location:login.php');
    }
        include 'includes/nav_active.php';
        echo "<div class='container'>";
        if(isset($_POST['carts']))
        {
            
            include 'includes/db.php';
            $itemQty = $_POST['itemQty'];
            $itemId = $_POST['carts'];
           $result = itemData($itemId);
           if(mysqli_num_rows($result)>0)
           {
               while($row = mysqli_fetch_array($result))
               {
                   $itemName =  $row['itemName'];
                   $itemPic = $row['itemPic'];
                   $userEmail = $_SESSION['id'];
                   $totalPrice = $row['itemPrice'];
    
               }
               addTocart($userEmail,$itemName,$itemPic,$itemQty,$totalPrice);
               echo "Item Added SuccessFully";
               header('Location:userOrder.php');

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

        
       
    

    echo "</div>";
?>