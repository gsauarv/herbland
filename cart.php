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
                echo "<div class='itemShow'>";
                   $url = "uploads/".$row['itemPic'];
                   echo "<img src = $url>";
                echo "</div>";

                echo "<div class= 'itemDesc'>";
                echo $row['itemName'];
                echo "</div>";
            }

        }
    ?>   
    </div>
    </div>
</body>
</html>
