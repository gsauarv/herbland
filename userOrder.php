<?php
    session_start();
    if (!isset($_SESSION['id']))
    {
        header('Location:login.php');
    }
        include 'includes/nav_active.php';
        echo "<div class='container'>";
        $userEmail = $_SESSION['id'];

        include_once 'includes/db.php';
        $result = getCartDetails($userEmail);
        if(mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $itemName = $row['itemName'];
                $itemQty = $row['itemQty'];
                $itemPrice = $row['itemPrice'];
                $url = "uploads/".$row['itemPic'];
               
                echo "<div class='bucketContainer'>";
                    echo "<div class='itemOrder'>";
                    echo "<img src='$url'>";
                    echo "<h3>" .$itemName."</h3>";
                    echo "<span>"."Rs: ".$itemPrice*$itemQty."</span>";
                    echo "<form action='userOrder.php' method = 'POST'>";
                    echo "<input name='alterQty' placeholder = '$itemQty'>";
                    echo "<input name = 'hiddenValue' type='hidden' value = '$itemName'>";
                    echo "<button name='alter' type = 'submit'>"."Change Quantity"."</button>";      
                    echo "<button name = 'delete' type = 'submit' style = 'background-color:red;'>"."Remove"."</button>";      
                    echo "</form>";
               
                    
                   
                    
                    echo "</div>";
                echo "</div>";
            }

            if(isset($_POST['alter']))
                    {
                        $newQty = $_POST['alterQty'];
                        $userEmail = $_SESSION['id'];
                        $itemName = $_POST['hiddenValue'];
                        changeQty($itemName,$newQty,$userEmail);  
                        echo "<meta http-equiv='refresh' content='0'>";
                      
                    }
            
            if(isset($_POST['delete']))
            {
                $userEmail = $_SESSION['id'];
                $itemName = $_POST['hiddenValue'];
                removeItem($itemName,$userEmail);
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }

      

        echo '</div>';

    


?>