<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "herblandStore";

$conn = mysqli_connect($servername,$username,$password,$dbName);
if(!$conn)
{
  die("Connection failed".mysqli_connect_error());
}

function insert_item_Data()
{
    if(isset($_POST['submitBtn']))
    {
        global $conn;
        $itemname = $_POST['itemName'];
        $itemType = $_POST['itemType'];
        $itemPrice = $_POST['itemPrice'];
        $itemDesc = $_POST['itemDesc'];
      
        $filename = $_FILES["itemImg"]["name"];
        $tempname = $_FILES["itemImg"]["tmp_name"];
        $folder = "uploads/".$filename;   
        
        $imgExt_tmp = explode('.',$filename);
        $imgExt = strtolower(end($imgExt_tmp));
        $allowedExt = array('jpg','jpeg','png');

        if(in_array($imgExt,$allowedExt))
        {
        if (move_uploaded_file($tempname,$folder))
        {
            $stmt = $conn->prepare("INSERT INTO itemStore(itemName,itemPrice,itemType,itemDesc,itemPic) VALUES (?,?,?,?,?);");
            $stmt -> bind_param("sssss",$itemname,$itemPrice,$itemType,$itemDesc,$filename);
            $stmt -> execute();
            $stmt -> close();
            $conn->close();
        }
    }

        else
        {
            echo "jpg,jpeg and png only are allowed";
        }
         
}

}

function createUser()
{
    if(isset($_POST['userRegister']))
    {
        global $conn;
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];
        $rePassword = $_POST['rePassword'];
        if($userPassword === $rePassword)
        {
            try {
                $stmt = $conn->prepare("INSERT INTO users (firstName,lastName,userEmail,userPassword) VALUES (?,?,?,?);");
                $stmt -> bind_param("ssss",$firstname,$lastname,$userEmail,$userPassword);
                $stmt->execute();
                $stmt->close();
                $conn ->close();       
                echo "Subbmited Successfully";   
                sendMail($userEmail);      
            }catch(Exception $e)
            {
                echo "Error";
            }       

           
        }

        else
        {
            echo "No Match";
        }
    }
}


function login()
{
    
    global $conn;
    if(isset($_POST['user_submit']))
    {

  
    $inputEmail = $_POST['Usremail'];
    $inputPassword = $_POST['Usrpassword'];
        try {
            $stmt = "SELECT userEmail,userPassword from users where userEmail = '$inputEmail';";
            $result = mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_array($result))
                     {
                         $userEmail = $row['userEmail'];
                         $userPassword = $row['userPassword'];
                     }
                    mysqli_close($conn);   
                   
                    if($userEmail === 'admin@admin.com' and $userPassword == $inputPassword)
                    {
                        header("Location:admin.php");
                    }
                    else if($userEmail == $inputEmail && $userPassword == $inputPassword)
                    { 
                        session_start();
                        $_SESSION['id'] = $userEmail;
                        header ("Location:shop.php");
                    }

            }
           
        }
        catch (Exception $e)
        {
            echo "Error",$e;
        }

    }

    
}

function getItems()
{
    global $conn;
    $stmt = "SELECT * from itemStore LIMIT 10;";
    $result = mysqli_query($conn,$stmt);
    if(mysqli_num_rows($result)>0)
    {  
        return $result;
    }

    mysqli_close($conn);
    
}

function get_items_details($itemId)
{
    global $conn;
    $stmt = "SELECT * FROM itemStore where itemId = '$itemId' ;";
    $result = mysqli_query($conn,$stmt);
    if(mysqli_num_rows($result))
    {
        return $result;
    }

    mysqli_close($conn);
}

function addTocart($userEmail,$itemName,$itemPic,$itemQty,$itemPrice)
{  

    global $conn;
    $stmt = $conn->prepare("INSERT INTO itemOrder (userEmail,itemName,itemPic,itemQty,itemPrice) VALUES (?,?,?,?,?);");
                $stmt -> bind_param("sssss",$userEmail,$itemName,$itemPic,$itemQty,$itemPrice);
                $stmt->execute();
                $stmt->close();
                $conn ->close(); 

}

function itemData($itemId)
{
    global $conn;
    $stmt = "SELECT itemName,itemPrice,itemPic from itemStore where itemId = '$itemId';";
    $result = mysqli_query($conn,$stmt);
    return $result;
    $stmt->close();
    $conn ->close(); 
    
   
}

function getCartDetails($userEmail)
{

    global $conn;
    $stmt = "SELECT * from itemOrder where userEmail = '$userEmail';";
    $result = mysqli_query($conn,$stmt);
    return $result; 
    $stmt->close();
}

function changeQty($itemName,$newQty,$userEmail)
{
    if(isset($_POST['alter']))
    {
        global $conn;
        $stmt = "UPDATE itemOrder SET itemQty = '$newQty' where itemName = '$itemName' and userEmail = '$userEmail';";
        mysqli_query($conn,$stmt);
    }
   

}

function removeItem($itemName,$userEmail)
{
    if(isset($_POST['delete']))
    {
        global $conn;
        $stmt = "DELETE FROM itemOrder where itemName = '$itemName' and userEmail = '$userEmail';";
        mysqli_query($conn,$stmt);
    }
}


function sendMail($to)
{
    require './phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = 'gsaurav2000@gmail.com';
    $mail->Password = 'aayxkywkkadfzuqb';

    $mail->setFrom('gsaurav2000@gmail.com','Herbland');
    $mail->addAddress($to);
    $mail->addReplyTo('gsaurav2000@gmail.com');

    $mail->isHTML(false);
    $mail->Subject = 'Herbland Registration';
    $mail->Body = 'Thanks for Registring for Herbland. Happy Shooping';
    if(!$mail->send())
    {
        echo "Not Send";
    }

    else
    {
        echo 'success';
    }

}

?>