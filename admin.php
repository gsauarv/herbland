<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Herbland | Admin Panel</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Cabin&family=Nunito&display=swap"
      rel="stylesheet"
    />
    <link href="static/css/style.css" rel="stylesheet" />
  </head>
  <body>
    <div class="formContainer">
      <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
          <p>Item Name</p>
          <input placeholder="Item Name" type="text" name = "itemName"required />
          <p>Item Price</p>
          <input placeholder="Price" type="number" name = "itemPrice" min="1" required />
          <p>Item Type</p>
          <select name ="itemType"required>
            <option value = "Indoor">Indoor</option>
            <option value = "Outdoor">Outdoor</option>
          </select>
          <p>Item Description</p>
          <textarea type="text" placeholder="description" name = "itemDesc"required /></textarea><br>
          <p>Item Image</p>

          <input type="file" name="itemImg"required><br />
          <button type="submit" name="submitBtn">Submit</button>
        </form>
      </div>
    </div>
  </body>
</html>

<?php
include_once 'includes/db.php';
insert_item_Data();
?>
